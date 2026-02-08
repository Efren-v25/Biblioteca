<?php 
namespace App\Controllers;

use App\Models\Favoritos;
use App\Models\Etiquetas;
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
        $librosModel = new Libros();
        $favoritosModel = new Favoritos();
        $idUsuario = session()->get('id_usuario');
        $tagsModel = new Etiquetas();

        $fav = $favoritosModel->where('id_usuario',$idUsuario)
                            ->findAll();

        $data = [
            "libros" => $librosModel->where('visible', 1)
                                    ->orderBy("RAND()")
                                    ->limit(8)
                                    ->findAll(),
            'etiquetas' => $tagsModel->orderBy("id_libro","ASC")->findAll(),                        
            "favoritosIds" => array_column($fav,"id_libro"),
            "header" => view("templates/header"),
            "footer" => view("templates/footer"),
        ];
    
        return view("vistas-biblioteca/inicio", $data); //mostrar la vista + header y footer
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

            $data["profesor"] = $data["code"] !== null && trim((string) $data["code"]) !== "";

            $session = session();
                $session->set($data);
                return $this->response->redirect(site_url("/inicio"));
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

            if (isset($_POST['checkbox_otros'])) {
                $otros = $this->request->getPost('checkbox_otros');
                $session->set('otros', $otros);
            }
            else if (!isset($_POST['checkbox_otros'])){
                $otros = "desactivado"; 
                $session->set('otros', $otros);
            }
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

            if (isset($_POST['checkbox_otros'])) {
                $otros = $this->request->getPost('checkbox_otros');
                $session->set('otros', $otros);
            }
            else if (!isset($_POST['checkbox_otros'])){
                $otros = "desactivado"; 
                $session->set('otros', $otros);
            }
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
        $favoritosModel = new Favoritos();
        $librosModel = new Libros();
        $idUsuario = session()->get('id_usuario');

        $fav = $favoritosModel->where("id_usuario",$idUsuario)
                              ->findAll();

        $data = [
            "favoritosIds" => array_column($fav,"id_libro"),
            'header' => view('templates/header'),
            'footer' => view('templates/footer'),
        ]; 
        if(!isset($_POST['busqueda'])){
            $resultados = $librosModel->join("etiquetas","libros.id_libro = etiquetas.id_libro")
                                      ->select('*')
                                      ->where("visible", 1)
                                      ->orderBy('titulo','ASC')
                                      ->findAll();

            $data['resultados'] = $resultados;
    
            return view('vistas-biblioteca/libros',$data);

        }else{
            $resultados = $librosModel->join("etiquetas","libros.id_libro = etiquetas.id_libro")
                            ->select('*')
                            ->where("visible", 1)
                            ->like("titulo",$_POST['busqueda'])
                            ->orLike("autor",$_POST['busqueda'])
                            ->orLike("materia",$_POST['busqueda'])
                            ->orLike("carrera_inf",$_POST['busqueda'])
                            ->orLike("carrera_mar",$_POST['busqueda'])
                            ->findAll();

            $data['resultados'] = $resultados;
            $data['busqueda'] = $_POST['busqueda'];

            return view('buscador/resultados',$data);
        }
    }

//funcion para descargar archivos (NO SE UTILIZA POR AHORA)
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

//funcion para guardar favoritos
    public function favs($id=null){
        $favoritosModel = new Favoritos();
        $idUsuario = session()->get('id_usuario');

        $data = [
            "id_usuario" => $idUsuario,
            "id_libro" => $id
        ];
        
        $favoritosModel->insert($data);

        if (isset($_GET['buscador'])){
            return redirect()->to('favoritos');
        }
        return redirect()->back()->withInput();
        
    }

//funcion para eliminar de favoritos
    public function favsdelete($id=null){
        $favoritosModel = new Favoritos();
        $idUsuario = session()->get('id_usuario');

        $favoritosModel->where("id_libro",$id)
                       ->where("id_usuario",$idUsuario)
                       ->delete();
                       
        if (isset($_GET['buscador'])){
            return redirect()->to('favoritos');
        }
        return redirect()->back()->withInput();
    }

//funcion para mostrar la vista favoritos
    public function favoritos(){
        $librosModel = new Libros();
        $favoritosModel = new Favoritos();
        $idUsuario = session()->get('id_usuario');

        $fav = $favoritosModel->where("id_usuario",$idUsuario)
                            ->findAll();
        
        $data = [
            "favoritosIds" => array_column($fav,"id_libro"),
            "libros" => $librosModel->join("etiquetas","libros.id_libro = etiquetas.id_libro")
                                    ->where('visible',1)
                                    ->orderBy("fecha_subida","ASC")
                                    ->findAll(),
            "favoritos" => $favoritosModel->obtenerPorUsuario($idUsuario),
            "header" => view('templates/header'),
            "footer" => view('templates/footer')
        ];

        return view("vistas-biblioteca/favoritos", $data);
    }
}

