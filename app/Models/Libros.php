<?php 
namespace App\Models;

use CodeIgniter\Model;

class Libros extends Model{
    protected $table      = 'libros'; //tabla
    protected $primaryKey = 'id_libros'; //llave primaria
    protected $allowedFields= ["titulo","portada","archivo","autor"];

}