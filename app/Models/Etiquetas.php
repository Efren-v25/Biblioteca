<?php 
namespace App\Models;

use CodeIgniter\Model;

class Etiquetas extends Model{
    protected $table      = 'etiquetas'; //tabla
    protected $primaryKey = 'id_libro'; //llave primaria
    protected $allowedFields= ["carrera_inf","carrera_mar","carrera_otros","materia","semestre"];
}