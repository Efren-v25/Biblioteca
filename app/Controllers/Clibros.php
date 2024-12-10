<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mlibros;
class Clibros extends Controller{

    public function index(){
        return view("vistas-biblioteca/registro-login/login"); 
    }

    public function registro(){
        
        return view("vistas-biblioteca/registro-login/registro"); 
    }

    public function registrar(){
        $registrar = new mlibros(); 
        $validation = $this->validate([
            "nombre" => "required|min_length[3]",
            "apellido" => "required|min_length[2]",
            "correo" => "required"
        ]);
        if(!$validation){
            $session = session();
            $session->setFlashdata("mensaje","Error al ingresar los datos");
            return redirect()->back()->withInput();
        }

        if($correo=$this->request->getVar("correo")){
        $datos=[
            "nombre"=> $this->request->getVar("nombre"),
            "apellido"=> $this->request->getVar("apellido"),
            "correo"=> $this->request->getVar("correo"),
            "contraseña"=> $this->request->getVar("contraseña")
        ];

        $registrar->insert($datos); //insertar los datos a la bd
        }
    return $this->response->redirect(site_url("/login")); //redirigir a la vista de inicio
    }
}
