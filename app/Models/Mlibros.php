<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mlibros extends Model{
    protected $table      = 'login'; //tabla
    protected $primaryKey = 'id'; //llave primaria
    protected $allowedFields= ["nombre","apellido","correo","contraseña"];
}