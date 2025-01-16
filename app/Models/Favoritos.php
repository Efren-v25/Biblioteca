<?php

namespace App\Models;

use CodeIgniter\Model;

class Favoritos extends Model
{
    protected $table            = 'favoritos';
    protected $primaryKey       = false;
    protected $allowedFields    = ["id_usuario","id_libro"];

    public function obtenerPorUsuario($idUsuario){
        return $this->where('id_usuario', $idUsuario)->findAll();
    }
}
