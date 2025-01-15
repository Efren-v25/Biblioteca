<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libros;
use App\Models\Etiquetas;

class CrudLibros extends Controller
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index() //listar
    {
        $session = session();

        $librosModel = new Libros();
        $tagsModel = new etiquetas();
        $idUsuario = session()->get('id_usuario'); // Obtén el ID del usuario actual desde la sesión.
        
        $data = [
            'etiquetas' => $tagsModel->orderBy("id_libro","ASC")->findAll(),
            'libros' => $librosModel->obtenerPorUsuario($idUsuario),
            'header' => view('templates/header'),
            'footer' => view('templates/footer')
        ];

        if ($this->request->getGet('clic')) {
            $session->remove('informatica');
            $session->remove('maritima');
        }

        return view("vistas-biblioteca/listar", $data);
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
        if($id == null){
            return redirect()->to('/');
        }

        $librosModel = new Libros();

        $data = [
            'id' => $id,
            'libro' => $librosModel->find($id),
            'header' => view('templates/header'),
            'footer' => view('templates/footer')
        ];
        
        return view('vistas-biblioteca/mostrarLibro',$data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new() //guardar
    {
        $data = [
            'header' => view('templates/header'),
            'footer' => view('templates/footer')
        ];

        return view("vistas-biblioteca/guardar", $data); 
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create() //guardado
    {
        $librosModel = new Libros();
        $tagsModel = new Etiquetas();
        $session = session();
        //validaciones
        $rules = [
            "titulo" => "required|min_length[3]|is_unique[libros.titulo]",
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
            "semestre" => "required"
        ];
        
        //validar el checkbox dinamico
        $checkboxError = false;
        if (session("informatica") == 'desactivado' && session("maritima") == 'desactivado'){
            $checkboxError = 'Debe seleccionar al menos una carrera.';
        }

        //procesar errores
        if (!$this->validate($rules) || $checkboxError) {
            $errors = $this->validator->getErrors(); //obtén los errores actuales
            if ($checkboxError) {
                $errors['checkbox'] = $checkboxError; //añadir error personalizado
            }
            $session->setFlashdata("errores", $errors);
            
            return redirect()->back()->withInput();
        }

        //verificar si se recibio el archivo
        if ($archivo = $this->request->getFile("archivo")) {
            $nombreOriginal = $archivo->getName(); //obtiene el nombre original del archivo
            $archivo->move("../public/uploads/archivos", $nombreOriginal); //mover el archivo
        
            if ($portada = $this->request->getFile("portada")) {
                $nuevoNombrePortada = $portada->getRandomName(); //asigna un nombre random a la foto
                $portada->move("../public/uploads/portadas", $nuevoNombrePortada); //mover la foto
            } else {
                $nuevoNombrePortada = null;
            } 

            //verificar la carrera para ingresarla a la bd
            if (session("informatica") == 'informatica'){
                $info = "informatica";
            }else{
                $info = "no";}
            if (session("maritima") == 'maritima'){
                $mari = "maritima";
            }else{
                $mari = "no";}

            //obtener el nombre y apellido del usuario
            $nombre = $session->get("nombre");
            $apellido = $session->get("apellido");
            $autor = $nombre . " " . $apellido;

            $idUsuario = $session->get('id_usuario');

            //recibir los datos
            $datos=[
                "id_usuario"=> $idUsuario,
                "titulo"=> $this->request->getVar("titulo"),
                "portada"=> $nuevoNombrePortada,
                "archivo"=> $nombreOriginal,
                "autor"=> $autor
            ];

            $idLibro = $librosModel->insert($datos, true); //insertarlos a la tabla libros

            //recibir los datos
            $tags=[
                "carrera_inf"=> $info,
                "carrera_mar"=> $mari,
                "materia"=> $this->request->getPost("materia"),
                "semestre"=> $this->request->getPost("semestre"),
                'id_libro' => $idLibro
            ];

        $tagsModel->insert($tags); //insertarlos a la tabla etiquetas

        $session->remove('informatica');
        $session->remove('maritima');
        }
        return $this->response->redirect(site_url("/listar")); //redirigir a la vista de inicio
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null) //editar
    {
        $librosModel = new libros();
        $tagsModel = new Etiquetas;

        $data = [
            'etiqueta' => $tagsModel->where("id_libro",$id)->first(),
            'libro' => $librosModel->where("id_libro",$id)->first(),
            'header' => view('templates/header'),
            'footer' => view('templates/footer')
        ];

        return view("vistas-biblioteca/editar",$data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null) //actualizar
    {
        $librosModel = new Libros(); // Modelo para la tabla 'libros'
        $tagsModel = new Etiquetas(); // Modelo para la tabla 'etiquetas'
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
            "titulo" => "required|min_length[3]|is_unique[libros.titulo,id_libro,{$id}",
            "semestre" => "required"
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
        $librosModel->update($id, $datosLibro);

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
                $datoslibro = $librosModel->where("id_libro", $id)->first();
        
                $ruta = "../public/uploads/archivos/" . $datoslibro["archivo"];
                if (file_exists($ruta)) {
                    unlink($ruta); // Eliminar archivo anterior
                }
                $nombreOriginal = $archivo->getName(); 
                $archivo->move("../public/uploads/archivos/", $nombreOriginal); 
                $datos = ["archivo" => $nombreOriginal];
                $librosModel->update($id, $datos); 
            }
        }

        // Procesar portada
        if ($portada = $this->request->getFile("portada")) {
            $datosLibro = $librosModel->find($id);
            $rutaPortada = "../public/uploads/portadas/" . $datosLibro["portada"];
            if (is_file($rutaPortada)) {
                unlink($rutaPortada);
            }

            $nombrePortada = $portada->getRandomName();
            $portada->move("../public/uploads/portadas/", $nombrePortada);
            $librosModel->update($id, ["portada" => $nombrePortada]);
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
        $tagsModel->update($id, $datosCarrera);

        $session->remove('informatica');
        $session->remove('maritima');

        return $this->response->redirect(site_url("/listar"));
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null) //borrar
    {
        $librosModel = new Libros(); //objeto libro
        $datosLibro = $librosModel->where("id_libro",$id)->first(); //comparar el id del libro con el de la bd
        
        if($foto=$this->request->getFile("portada")){
        $rutaPortada = ("../public/uploads/portadas/".$datosLibro["portada"]); //seleccionar la foto basandose en el id del libro
        unlink($rutaPortada); //borrar la foto
        $librosModel->where("id_libro",$id)->delete($id); //borrar libro
        return $this->response->redirect(site_url("/listar"));
        }
        if($foto=$this->request->getFile("archivo")){
            $rutaArchivo = ("../public/uploads/archivos/".$datosLibro["archivo"]); //seleccionar la foto basandose en el id del libro
            unlink($rutaArchivo); //borrar la foto
            $librosModel->where("id_libro",$id)->delete($id); //borrar libro
            return $this->response->redirect(site_url("/listar"));
        }

        $librosModel->where("id_libro",$id)->delete($id); //borrar libro
        return $this->response->redirect(site_url("/listar")); //redirigir a la vista de inicio
    }
}
