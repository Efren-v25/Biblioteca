<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mlibros;
class Clibros extends Controller{

    public function index(){
       
        return view("vistas-biblioteca/inicio"); //mostrar la vista junto con el header/footer
    }
}