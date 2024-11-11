<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);  // Enables auto-routing
$routes->get('/', 'Home::index');
