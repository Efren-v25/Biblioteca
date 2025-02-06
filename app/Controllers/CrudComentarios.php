<?php

namespace App\Controllers;

use App\Models\ComentariosModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class CrudComentarios extends ResourceController
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
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $comentariosModel = new ComentariosModel();
        $session = session();
        $rules = [
            'comentario' => "max_length[255]|is_unique[comentarios.comentario]"
        ];

        if (!$this->validate($rules)){
            $errors = $this->validator->getErrors();
            $session->setFlashdata($errors);
            return redirect()->back()->withInput();
        };
        if (!$session->get('id_usuario')){
            $errors = "Para poder comentar, debes iniciar sesión.";
            return redirect()->back()->withInput();
        }

        $datos = [
            'id_libro' => $this->request->getPost('id_libro'),
            'id_usuario' => $session->get('id_usuario'),
            'comentario' => $this->request->getPost('comentario')
        ];

        $comentariosModel->insert($datos);

        return redirect()->back();
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
        $comentariosModel = new ComentariosModel();
        $session = session();

        $comentariosModel->where('id_usuario',$session->get('id_usuario'))
                         ->where('id_libro',$id);

    }
}
