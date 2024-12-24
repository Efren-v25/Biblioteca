<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegistroLogin;
use App\Models\Libros;
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

//funcion para mostrar el guardado de libros/archivos
    public function guardado(){
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer"); 

        return view("vistas-biblioteca/guardado", $datos); 
    }

//funcion para guardar libros/archivos
    public function guardar(){
        $guardar = new Libros(); 
        //validaciones
        $validation = $this->validate([
            "titulo" => [
                "rules" => "required|min_length[3]|is_unique[.titulo]",
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
            ]
        ]);

        //obtener los errores
        if (!$validation) {
            $session = session();
            $session->setFlashdata("errores", $this->validator->getErrors()); // Obtiene todos los errores
            return redirect()->back()->withInput();
        }
    }
}  
