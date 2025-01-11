<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegistroLogin;
use App\Models\Libros;
use App\Models\Etiquetas;
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

//funcion para mostrar la vista listar checked
    public function listar(){
        $session = session();

        $libroModel = new Libros();
        $etiqueta = new etiquetas();
        $idUsuario = session()->get('id_usuario'); // Obtén el ID del usuario actual desde la sesión.
        
        $datos["etiquetas"] = $etiqueta->orderBy("id_libro","ASC")->findAll();
        $datos['libros'] = $libroModel->obtenerPorUsuario($idUsuario);
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        if ($this->request->getGet('clic')) {
            $session->remove('informatica');
            $session->remove('maritima');
        }

        return view("vistas-biblioteca/listar", $datos);
    }

//funcion para borrar libros checked
    public function borrar($id=null){ //recibir el id del libro que le demos click
    
        $libro = new libros(); //objeto libro
        $datoslibro = $libro->where("id_libro",$id)->first(); //comparar el id del libro con el de la bd
        
        if($foto=$this->request->getFile("portada")){
        $rutaPortada = ("../public/uploads/portadas/".$datoslibro["portada"]); //seleccionar la foto basandose en el id del libro
        unlink($rutaPortada); //borrar la foto
        $libro->where("id_libro",$id)->delete($id); //borrar libro
        return $this->response->redirect(site_url("/listar"));
        }
        if($foto=$this->request->getFile("archivo")){
            $rutaArchivo = ("../public/uploads/archivos/".$datoslibro["archivo"]); //seleccionar la foto basandose en el id del libro
            unlink($rutaArchivo); //borrar la foto
            $libro->where("id_libro",$id)->delete($id); //borrar libro
            return $this->response->redirect(site_url("/listar"));
        }

        $libro->where("id_libro",$id)->delete($id); //borrar libro
        return $this->response->redirect(site_url("/listar")); //redirigir a la vista de inicio
    }

//funcion para editar libros checked
    public function editar($id=null){
        $libros = new libros();
        $etiquetas = new Etiquetas;

        $datos["etiqueta"] = $etiquetas->where("id_libro",$id)->first();
        $datos["libro"] = $libros->where("id_libro",$id)->first();
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        return view("vistas-biblioteca/editar",$datos);
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

//funcion para actualizar libros checked
    public function actualizar() {
        $guardar = new libros(); // Modelo para la tabla 'libros'
        $buscar = new Etiquetas(); // Modelo para la tabla 'etiquetas'
        $session = session();

        $id = $this->request->getVar("id_libro");
        if (!$id) {
            $session->setFlashdata("errores", ["id_libro" => "No se recibió un ID válido para actualizar."]);
            return redirect()->back()->withInput();
        }

        // Datos principales para la tabla 'libros'
        $datosLibro = ["titulo" => $this->request->getVar("titulo")];

        // Validaciones
        $validation = $this->validate([
            "titulo" => [
                "rules" => "required|min_length[3]|is_unique[libros.titulo,id_libro,{$id}]",
                "errors" => [
                    "required" => "El campo título es obligatorio.",
                    "min_length" => "El título debe tener al menos 3 caracteres.",
                    "is_unique" => "Este título ya está registrado."
                ]
            ],
            "semestre" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Debe seleccionar un semestre."
                ]
            ]
        ]);

        // Validación de checkboxes
        $checkboxError = false;
            if (session("informatica") == 'desactivado' && session("maritima") == 'desactivado'){
                $checkboxError = 'Debe seleccionar al menos una carrera.';
            }

        if (!$validation || $checkboxError) {
            $errors = $this->validator->getErrors();
            if ($checkboxError) {
                $errors['checkbox'] = $checkboxError;
            }
            $session->setFlashdata("errores", $errors);
            return redirect()->back()->withInput();
        }

        // Actualización en la tabla 'libros'
        $guardar->update($id, $datosLibro);

        $validation = $this->validate([
            "portada" => [
                "rules" => "mime_in[portada,image/jpg,image/jpeg,image/png]|max_size[portada,2048]|uploaded[portada]",
                "errors" => [
                    "mime_in" => "La imagen debe estar en formato jpg, jpeg o png.",
                    "max_size" => "El tamaño de la imagen no debe exceder los 2 MB."
                ]
            ],
            "archivo" => [
                "rules" => "mime_in[archivo,application/pdf]|uploaded[archivo]",
                "errors" => [
                    "mime_in" => "El archivo debe estar en formato PDF."
                ]
            ]
        ]);

        // Procesar archivo PDF
        if($validation){
        if ($archivo = $this->request->getFile("archivo")) {
            if ($archivo->isValid() && !$archivo->hasMoved()) {
                // Procesar el archivo si es válido y no se ha movido aún
                $datoslibro = $guardar->where("id_libro", $id)->first();
        
                $ruta = "../public/uploads/archivos/" . $datoslibro["archivo"];
                if (file_exists($ruta)) {
                    unlink($ruta); // Eliminar archivo anterior
                }
                $nombreOriginal = $archivo->getName(); 
                $archivo->move("../public/uploads/archivos/", $nombreOriginal); 
                $datos = ["archivo" => $nombreOriginal];
                $guardar->update($id, $datos); 
            }
        }

        // Procesar portada
        if ($portada = $this->request->getFile("portada")) {
            $datosLibro = $guardar->find($id);
            $rutaPortada = "../public/uploads/portadas/" . $datosLibro["portada"];
            if (is_file($rutaPortada)) {
                unlink($rutaPortada);
            }

            $nombrePortada = $portada->getRandomName();
            $portada->move("../public/uploads/portadas/", $nombrePortada);
            $guardar->update($id, ["portada" => $nombrePortada]);
        }}

        //verificar la carrera para ingresarla a la bd
        if (session("informatica") == 'informatica'){
            $info = "informatica";
        }else{
            $info = "no";}
        if (session("maritima") == 'maritima'){
            $mari = "maritima";
        }else{
            $mari = "no";}

        // Actualización en la tabla 'etiquetas'
        $datosCarrera = [
            "carrera_inf" => $info,
            "carrera_mar" => $mari,
            "materia" => $this->request->getPost("materia"),
            "semestre" => $this->request->getPost("semestre")
        ];
        $buscar->update($id, $datosCarrera);

        $session->remove('informatica');
        $session->remove('maritima');

        return $this->response->redirect(site_url("/listar"));
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
    public function buscador()
    {   
        $librosModel = new Libros();
        $resultados = $librosModel->select('*')
                                 ->like('titulo',$_POST['busqueda'])
                                 ->findAll();
        $data = [
            'header' => view('templates/header'),
            'footer' => view('templates/footer'),
            'resultados' => $resultados
        ];
        return view('buscador/resultados',$data);
    }
}

