<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Bibioteca
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Cbiblioteca::inicio');
$routes->get('inicio_profesores', 'Cbiblioteca::inicio_profesores');

//Manejo de sesiones
$routes->get('login', 'Cbiblioteca::index');
$routes->post('login', 'Cbiblioteca::login');
$routes->get('salir', 'Cbiblioteca::salir');

//CrudUsuarios
$routes->get('registro', 'CrudUsuarios::new');
$routes->post('registrar', 'CrudUsuarios::create');


//CrudLibros
$routes->get('listar', 'CrudLibros::index');
$routes->get('guardar', 'CrudLibros::new');
$routes->post('guardado', 'CrudLibros:create');
$routes->get('borrar/(:num)', 'CrudLibros::delete/$1');
$routes->get('editar/(:num)', 'CrudLibros::edit/$1');
$routes->post('actualizar', 'CrudLibros::update');

//Funcionalidades

$routes->match(['get', 'post'], 'guardar', 'Cbiblioteca::selector');
$routes->match(['get', 'post'], 'editar', 'Cbiblioteca::selectorEditar');
$routes->get('ocultar/(:num)', 'Cbiblioteca::ocultar/$1');
$routes->get('mostrar/(:num)', 'Cbiblioteca::mostrar/$1');
$routes->post('resultados','Cbiblioteca::buscador');


