<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Clibros::index');
$routes->get('registro', 'Clibros::registro');
$routes->post('registrar', 'Clibros::registrar');