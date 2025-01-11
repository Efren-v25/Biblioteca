<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegistroLogin;

class CrudUsuarios extends Controller
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new() //registro
    {
        return view("vistas-biblioteca/registro-login/registro");
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create() //registrar
    {
        $usuariosModel = new RegistroLogin(); 
        //validaciones
        $rules = [
            "nombre" => "required|min_length[3]",
            "apellido" => "required|min_length[2]",
            "contraseña" => "required|min_length[6]",
            "correo" => "required|valid_email|is_unique[login.correo]",
            "contraseña2" => "required|matches[contraseña]"
        ];

        //obtener los errores
        if (!$this->validate($rules)) {
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

            $usuariosModel->insert($datos); //insertar los datos a la bd
        }
        return $this->response->redirect(site_url("/login")); //redirigir a la vista del login en caso de registrarse correctamente
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}

