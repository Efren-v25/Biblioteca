<?php 
namespace App\Models;

use CodeIgniter\Model;

class RegistroLogin extends Model{
    protected $table      = 'login'; //tabla
    protected $primaryKey = 'id_usuario'; //llave primaria
    protected $allowedFields= ["nombre","apellido","correo","contraseña","code"];

    public function obtenerUsuario($data){
        $user = $this->db->table("login");
        $user->where($data);
        return $user->get()->getResultArray();
    }
}