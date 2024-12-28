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
        $datos["header"] = view("templates/header"); //agregar el header
        $datos["footer"] = view("templates/footer"); //agregar el footer

        return view("vistas-biblioteca/inicio", $datos); //mostrar la vista + header y footer
    }

//funcion para mostrar el inicio de profesores
    public function inicio_profesores(){
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        return view("vistas-biblioteca/inicio_profesores", $datos);
    }

//funcion para mostrar el registro
    public function registro(){
        
        return view("vistas-biblioteca/registro-login/registro"); 
    }

//funcion para registrar usuarios
    public function registrar(){
        $registrar = new RegistroLogin(); 
        //validaciones
        $validation = $this->validate([
            "nombre" => [
                "rules" => "required|min_length[3]",
                "errors" => [
                    "required" => "El campo nombre es obligatorio.",
                    "min_length" => "El campo nombre debe tener al menos 3 caracteres."
                ]
            ],
            "apellido" => [
                "rules" => "required|min_length[2]",
                "errors" => [
                    "required" => "El campo apellido es obligatorio.",
                    "min_length" => "El campo apellido debe tener al menos 2 caracteres."
                ]
            ],
            "contraseña" => [
                "rules" => "required|min_length[6]",
                "errors" => [
                    "required" => "El campo contraseña es obligatorio.",
                    "min_length" => "La contraseña debe tener al menos 6 caracteres."
                ]
            ],
            "correo" => [
                "rules" => "required|valid_email|is_unique[login.correo]",
                "errors" => [
                    "required" => "El campo correo es obligatorio.",
                    "is_unique" => "Este correo ya esta registrado."
                ]
            ],
            "contraseña2" => [
                "rules" => "required|matches[contraseña]",
                "errors" => [
                    "required" => "Debe confirmar la contraseña.",
                    "matches" => "Las contraseñas no coinciden."
                ]
            ]
        ]);

        //obtener los errores
        if (!$validation) {
            $session = session();
            $session->setFlashdata("errores", $this->validator->getErrors()); // Obtiene todos los errores
            return redirect()->back()->withInput();
        }

        //hashear la contraseña
        $contraseña = $this->request->getPost("contraseña");
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

        if($correo=$this->request->getVar("correo")){
        //obtener los datos del formulario y la contraseña hasheada
        $datos=[
            "nombre"=> $this->request->getVar("nombre"),
            "apellido"=> $this->request->getVar("apellido"),
            "correo"=> $this->request->getVar("correo"),
            "code"=> $this->request->getVar("code"),
            "contraseña"=> $contraseña_hash    
        ];

        $registrar->insert($datos); //insertar los datos a la bd
        }
    return $this->response->redirect(site_url("/login")); //redirigir a la vista del login en caso de registrarse correctamente
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
                "nombre" => $datosUsuario[0]["nombre"],
                "apellido" => $datosUsuario[0]["apellido"],
                "code" => $datosUsuario[0]["code"]
            ];

            $session = session();
            $session->set($data);
        
        //verificar el tipo de usuario y redirigirlo a donde corresponda
        if(session("code") == 138062){
            return $this->response->redirect(site_url("/inicio_profesores"));
        }else{
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

//funcion para mostrar el guardado de libros/archivos
    public function guardar(){
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer"); 

        return view("vistas-biblioteca/guardar", $datos); 
    }


//funcion para guardar libros/archivos
    public function guardado(){
        $guardar = new Libros();
        $buscar = new Etiquetas();
        $session = session();
        //validaciones
        $validation = $this->validate([
            "titulo" => [
                "rules" => "required|min_length[3]|is_unique[libros.titulo]",
                "errors" => [
                    "required" => "El campo titulo es obligatorio.",
                    "min_length" => "El campo titulo debe tener al menos 3 caracteres.",
                    "is_unique" => "Este titulo ya esta registrado."
                ]
            ],
            "portada" => [
                "rules" => "mime_in[portada,image/jpg,image/jpeg,image/png]|max_size[portada,2048]",
                "errors" => [
                    "mime_in" => "La imagen debe estar en formato jpg, jpeg o png.",
                    "max_size" => "El tamaño de la imagen no debe exceder los 2mb"
                ]
            ],
            "archivo" => [
                "rules" => "uploaded[archivo]|mime_in[archivo,application/pdf]|",
                "errors" => [
                    "uploaded" => "Necesita subir un archivo.",
                    "mime_in" => "El archivo debe estar en formato PDF."
                ]
            ],
            "semestre" => [
                "rules" => "required",
                "errors" => [
            "required" => "Debe seleccionar un semestre."
        ]
            ]
    ]);
        //validar el checkbox dinamico
        $checkboxError = false;
        if (session("informatica") == 'desactivado' && session("maritima") == 'desactivado'){
            $checkboxError = 'Debe seleccionar al menos una carrera.';
        }

        //procesar errores
        if (!$validation || $checkboxError) {
            $errors = $this->validator->getErrors(); //obtén los errores actuales
            if ($checkboxError) {
                $errors['checkbox'] = $checkboxError; //añadir error personalizado
            }
            $session = session();
            $session->setFlashdata("errores", $errors);
            
            return redirect()->back()->withInput();
        }

        //verificar si se recibio el archivo
        if ($archivo = $this->request->getFile("archivo")) {
            $nombreOriginal = $archivo->getName(); //bbtiene el nombre original del archivo
            $archivo->move("../writable/uploads/archivos", $nombreOriginal); //mover el archivo
        
            if ($portada = $this->request->getFile("portada")) {
                $nuevoNombrePortada = $portada->getRandomName(); //asigna un nombre random a la foto
                $portada->move("../writable/uploads/portadas", $nuevoNombrePortada); //mover la foto
            } else {
                $nuevoNombrePortada = null;
            } 

            //verificar la carrera para ingresarla a la bd
            if (session("informatica") == 'inf'){
                $info = "informatica";
            }else{
                $info = "no";}
            if (session("maritima") == 'mar'){
                $mari = "maritima";
            }else{
                $mari = "no";}

            //obtener el nombre y apellido del usuario
            $nombre = $session->get("nombre");
            $apellido = $session->get("apellido");
            $autor = $nombre . " " . $apellido;

            //recibir los datos
            $datos=[
                "titulo"=> $this->request->getVar("titulo"),
                "portada"=> $nuevoNombrePortada,
                "archivo"=> $nombreOriginal,
                "autor"=> $autor
            ];

            $idLibro = $guardar->insert($datos, true); //insertarlos a la tabla libros

            //recibir los datos
            $tags=[
                "carrera_inf"=> $info,
                "carrera_mar"=> $mari,
                "materia"=> $this->request->getPost("materia"),
                "semestre"=> $this->request->getPost("semestre"),
                'id_libro' => $idLibro
            ];

        $buscar->insert($tags); //insertarlos a la tabla etiquetas
        }
        return $this->response->redirect(site_url("/listar")); //redirigir a la vista de inicio
    }

//funcion para mostrar la vista listar
    public function listar(){
        $datos["header"] = view("templates/header"); //agregar el header
        $datos["footer"] = view("templates/footer"); //agregar el footer

        return view("vistas-biblioteca/listar", $datos); //mostrar la vista + header y footer
    }
}  
