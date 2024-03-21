<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'login']);

$routes->get('servicios', 'ServicioController::index');
$routes->get('servicios/nuevo', 'ServicioController::nuevo');
$routes->post('servicios/guardar', 'ServicioController::guardar');
$routes->get('servicios/editar/(:segment)', 'ServicioController::editar/$1');
$routes->post('servicios/actualizar', 'ServicioController::actualizar');
$routes->get('servicios/eliminar/(:segment)', 'ServicioController::eliminar/$1');