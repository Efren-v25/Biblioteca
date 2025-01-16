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
$routes->get('usuario/(:num)','CrudUsuarios::show/$1');
$routes->get('usuario/(:num)/editar', 'CrudUsuarios::edit/$1');
$routes->put('usuario/(:num)','CrudUsuarios::update/$1');


//CrudLibros
$routes->get('listar', 'CrudLibros::index');
$routes->get('guardar', 'CrudLibros::new');
$routes->post('guardado', 'CrudLibros::create');
$routes->get('borrar/(:num)', 'CrudLibros::delete/$1');
$routes->get('editar/(:num)', 'CrudLibros::edit/$1');
$routes->post('actualizar', 'CrudLibros::update');
$routes->get('libros/(:num)','CrudLibros::show/$1');

//Funcionalidades

$routes->match(['get', 'post'], 'guardar', 'Cbiblioteca::selector');
$routes->match(['get', 'post'], 'editar', 'Cbiblioteca::selectorEditar');
$routes->get('ocultar/(:num)', 'Cbiblioteca::ocultar/$1');
$routes->get('mostrar/(:num)', 'Cbiblioteca::mostrar/$1');
$routes->get('libros','Cbiblioteca::buscadorMostrar');      //boton libros de la navbar
$routes->post('resultados','Cbiblioteca::buscadorMostrar'); //buscador

//Favoritos
$routes->get('favs/(:num)', 'Cbiblioteca::favs/$1');
$routes->get('favsdelete/(:num)', 'Cbiblioteca::favsdelete/$1');
$routes->get('favoritos', 'Cbiblioteca::favoritos');

