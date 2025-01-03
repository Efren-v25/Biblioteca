<?php 
namespace App\Models;

use CodeIgniter\Model;

class LibrosModel extends Model{
    protected $table      = 'libros'; //tabla
    protected $primaryKey = 'id_libro'; //llave primaria
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields= ["titulo","portada","archivo","fecha_subida","autor"];

}