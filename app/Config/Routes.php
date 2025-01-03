<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Cbiblioteca::index');
$routes->get('registro', 'Cbiblioteca::registro');
$routes->post('registrar', 'Cbiblioteca::registrar');
$routes->post('login', 'Cbiblioteca::login');
$routes->get('inicio', 'Cbiblioteca::inicio');
$routes->get('inicio_profesores', 'Cbiblioteca::inicio_profesores');
$routes->get('salir', 'Cbiblioteca::salir');
$routes->get('guardar', 'Cbiblioteca::guardar');
$routes->post('guardado', 'Cbiblioteca::guardado');
$routes->match(['get', 'post'], 'guardar', 'Cbiblioteca::selector');
$routes->match(['get', 'post'], 'editar', 'Cbiblioteca::selectorEditar');
$routes->get('listar', 'Cbiblioteca::listar');
$routes->get('borrar/(:num)', 'Cbiblioteca::borrar/$1');
$routes->get('editar/(:num)', 'Cbiblioteca::editar/$1');
$routes->post('actualizar', 'Cbiblioteca::actualizar');
$routes->get('ocultar/(:num)', 'Cbiblioteca::ocultar/$1');
$routes->get('mostrar/(:num)', 'Cbiblioteca::mostrar/$1');

$routes->post('resultados','Cbiblioteca::buscador');