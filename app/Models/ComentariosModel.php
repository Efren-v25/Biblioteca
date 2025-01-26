<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentariosModel extends Model
{
    protected $table            = 'comentarios';
    protected $primaryKey       = false;
    protected $allowedFields    = ['id_usuario','id_libro','comentario'];

}
