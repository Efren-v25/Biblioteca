<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mlibros;
class Clibros extends Controller{

    public function index(){
        return view("vistas-biblioteca/registro-login/login"); 
    }

    public function inicio(){
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        return view("vistas-biblioteca/inicio", $datos);
    }

    public function inicio_profesores(){
        $datos["header"] = view("templates/header"); 
        $datos["footer"] = view("templates/footer");

        return view("vistas-biblioteca/inicio_profesores", $datos);
    }

    public function registro(){
        
        return view("vistas-biblioteca/registro-login/registro"); 
    }

//funcion para registrar usuarios
    public function registrar(){
        $registrar = new mlibros(); 
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

        if (!$validation) {
            $session = session();
            $session->setFlashdata("errores", $this->validator->getErrors()); // Obtiene todos los errores
            return redirect()->back()->withInput();
        }

        $contraseña = $this->request->getPost("contraseña");
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

        if($correo=$this->request->getVar("correo")){
        $datos=[
            "nombre"=> $this->request->getVar("nombre"),
            "apellido"=> $this->request->getVar("apellido"),
            "correo"=> $this->request->getVar("correo"),
            "code"=> $this->request->getVar("code"),
            "contraseña"=> $contraseña_hash    
        ];

        $registrar->insert($datos); //insertar los datos a la bd
        }
    return $this->response->redirect(site_url("/login")); //redirigir a la vista de inicio
    }

//funcion para el login
    public function login(){
        $user = new mlibros();
        $usuario = $this->request->getPost("correo");
        $password = $this->request->getPost("contraseña");

        $datosUsuario = $user->obtenerUsuario(["correo"=> $usuario]); 

        if(count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]["contraseña"])){
            $data = [
                "nombre" => $datosUsuario[0]["nombre"],
                "apellido" => $datosUsuario[0]["apellido"],
                "code" => $datosUsuario[0]["code"]
            ];

            $session = session();
            $session->set($data);
        
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

    public function salir(){
        $session = session();
        $session->destroy();
        return $this->response->redirect(site_url("/login"));
    }
}
