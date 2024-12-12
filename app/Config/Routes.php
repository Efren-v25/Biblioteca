<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Clibros::index');
$routes->get('registro', 'Clibros::registro');
$routes->post('registrar', 'Clibros::registrar');
$routes->post('login', 'Clibros::login');
$routes->get('inicio', 'Clibros::inicio');
$routes->get('inicio_profesores', 'Clibros::inicio_profesores');
$routes->get('salir', 'Clibros::salir');