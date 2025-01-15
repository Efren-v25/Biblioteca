<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegistroLogin;
use App\Models\Libros;
use CodeIgniter\HTTP\Response;
class Cbiblioteca extends Controller{

//funcion para mostrar el login
    public function index(){
        return view("vistas-biblioteca/registro-login/login"); 
    }

//funcion para mostrar el inicio de estudiantes
    public function inicio(){
        $mostrar = new Libros();
        $datos["libros"] = $mostrar->where('visible', 1)->orderBy("fecha_subida","ASC")->findAll();
        $datos["header"] = view("templates/header"); //agregar el header
        $datos["footer"] = view("templates/footer"); //agregar el footer

        return view("vistas-biblioteca/inicio", $datos); //mostrar la vista + header y footer
    }

//funcion para mostrar el inicio de profesores
    public function inicio_profesores(){

        $mostrar = new Libros();
        $datos["libros"] = $mostrar->where('visible', 1)->orderBy("fecha_subida","ASC")->findAll();
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        return view("vistas-biblioteca/inicio_profesores", $datos);
    }

//funcion para iniciar sesión
    public function login(){
        $user = new RegistroLogin();
        $usuario = $this->request->getPost("correo"); //obtener correo del formulario y guardarlo
        $password = $this->request->getPost("contraseña"); //obtener la contraseña del formulario y guardarla

        $datosUsuario = $user->obtenerUsuario(["correo"=> $usuario]); //comparar correo ingresado con el de la bd y guardarlo


        //validar si el correo y la contraseña son correctos
        if(count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]["contraseña"])){
            $data = [
                "logged" => true,
                "id_usuario" => $datosUsuario[0]["id_usuario"],
                "nombre" => $datosUsuario[0]["nombre"],
                "apellido" => $datosUsuario[0]["apellido"],
                "code" => $datosUsuario[0]["code"]
            ];
            if($data["code"] == 138062){        //Verifica el codigo del usuario y lo agrega al array de datos de la session
                $data["profesor"] = true;
                $session = session();
                $session->set($data);
                return $this->response->redirect(site_url("/inicio_profesores"));
            }else{
                $data["profesor"] = false;
                $session = session();
                $session->set($data);
                return $this->response->redirect(site_url("/inicio"));
            }
        }else{
            $session = session();
            $session->setFlashdata("mensaje","El correo o la contraseña es incorrecto.");
            return redirect()->back()->withInput();
        }
    }

//funcion para cerrar sesión
    public function salir(){
        $session = session();
        $session->destroy();
        return $this->response->redirect(site_url("/login"));
    }

//funcion para el selector dinamico de carreras
    public function selector(){
        $session = session(); 

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['checkbox_inf'])) {
            $informatica = $this->request->getPost('checkbox_inf');
            $session->set('informatica', $informatica);
            }
        else if (!isset($_POST['checkbox_inf'])){
            $informatica = "desactivado"; 
            $session->set('informatica', $informatica);}
            
            if (isset($_POST['checkbox_mar'])) {
                $maritima = $this->request->getPost('checkbox_mar');
                $session->set('maritima', $maritima);
            }
        else if (!isset($_POST['checkbox_maritima'])){
            $maritima = "desactivado"; 
            $session->set('maritima', $maritima);}
        }
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");
        return view('vistas-biblioteca/guardar', $datos);
    }

//funcion para el selector dinamico de carreras actualizar
    public function selectorEditar(){
        $session = session();
        $guardar = new libros();
        $id = $this->request->getVar("id_libro");

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['checkbox_inf'])) {
            $informatica = $this->request->getPost('checkbox_inf');
            $session->set('informatica', $informatica);
            }
        else if (!isset($_POST['checkbox_inf'])){
            $informatica = "desactivado"; 
            $session->set('informatica', $informatica);}

            if (isset($_POST['checkbox_mar'])) {
                $maritima = $this->request->getPost('checkbox_mar');
                $session->set('maritima', $maritima);
            }
        else if (!isset($_POST['checkbox_maritima'])){
            $maritima = "desactivado"; 
            $session->set('maritima', $maritima);}
        }
        return $this->response->redirect(base_url("/editar/$id"));
    }   

//funcion para ocultar libros
    public function ocultar($id=null){ //recibir el id del libro que le demos click

        $libro = new libros(); //objeto libro

        $libro->update($id, ['visible' => 0]);

        return $this->response->redirect(site_url("/listar"));
    }

//funcion para mostrar libros
    public function mostrar($id=null){ //recibir el id del libro que le demos click
        $libro = new libros(); //objeto libro

        $libro->update($id, ['visible' => 1]);

        return $this->response->redirect(site_url("/listar"));
    }
//funcion del buscador navbar
    public function buscadorMostrar()
    {   
        $librosModel = new Libros();
        $data = [
            'header' => view('templates/header'),
            'footer' => view('templates/footer'),
        ]; 
        if(!isset($_POST['busqueda'])){
            $resultados = $librosModel->select('*')
                                      ->orderBy('titulo','ASC')
                                      ->findAll();
            $data['resultados'] = $resultados;
            return view('vistas-biblioteca/libros',$data);

        }else{
            $resultados = $librosModel->select('*')
                            ->like('titulo',$_POST['busqueda'])
                            ->findAll();
            $data['resultados'] = $resultados;
            return view('buscador/resultados',$data);
        }
    }

    public function descargar($id = null){

        if($id == null){
            return redirect()->back();
        }

        $librosModel = new Libros();

        $libro = $librosModel->find($id);
        $nombreArchivo = $libro['archivo'];

        $ruta = ROOTPATH . 'public/uploads/archivos/' . $nombreArchivo;

        if(file_exists($ruta)){
            echo $ruta;
            return $this->response->download($ruta, null);
        }else{
            return $this->response->setStatusCode(404,'Archivo no encontrado');
        }
        
    }
}

