<?php 
namespace App\Models;

use CodeIgniter\Model;

class Libros extends Model{
    protected $table      = 'libros'; //tabla
    protected $primaryKey = 'id_libros'; //llave primaria
    protected $allowedFields= ["id_usuario","titulo","portada","archivo","autor"];

    public function obtenerPorUsuario($idUsuario)
    {
        return $this->where('id_usuario', $idUsuario)->findAll();
    }

}