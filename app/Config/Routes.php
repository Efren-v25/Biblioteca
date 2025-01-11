<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Cbiblioteca::index');

//CrudUsuarios
$routes->get('registro', 'CrudUsuarios::new');
$routes->post('registrar', 'CrudUsuarios::create');

$routes->post('login', 'Cbiblioteca::login');
$routes->get('inicio', 'Cbiblioteca::inicio');
$routes->get('inicio_profesores', 'Cbiblioteca::inicio_profesores');
$routes->get('salir', 'Cbiblioteca::salir');

//CrudLibros
$routes->get('guardar', 'CrudLibros::new');
$routes->post('guardado', 'CrudLibros:create');
$routes->match(['get', 'post'], 'guardar', 'Cbiblioteca::selector');
$routes->match(['get', 'post'], 'editar', 'Cbiblioteca::selectorEditar');
$routes->get('listar', 'CrudLibros::index');
$routes->get('borrar/(:num)', 'CrudLibros::delete/$1');
$routes->get('editar/(:num)', 'CrudLibros::edit/$1');
$routes->post('actualizar', 'Cbiblioteca::actualizar');
$routes->get('ocultar/(:num)', 'Cbiblioteca::ocultar/$1');
$routes->get('mostrar/(:num)', 'Cbiblioteca::mostrar/$1');

$routes->post('resultados','Cbiblioteca::buscador');