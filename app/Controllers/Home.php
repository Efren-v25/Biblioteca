<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller{
    function index(){
        if(!session()->get('logged'))
        {
            return redirect()->to('/login');
        }else if(!session()->get('profesor'))
        {
            return redirect()->to('/inicio');
        }else
        {
            return redirect()->to('/inicio_profesores');
        }
    }
}
?>