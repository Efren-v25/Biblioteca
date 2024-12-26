<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller{
    function index(){
        $data = ['header' => view('templates/header'), 'footer' => view('templates/footer')];
        return view('vistas-biblioteca/inicio',$data);
    }
}
?>