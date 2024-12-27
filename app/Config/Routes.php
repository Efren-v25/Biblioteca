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
$routes->get('guardado', 'Cbiblioteca::guardado');