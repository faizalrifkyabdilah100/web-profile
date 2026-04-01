<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',        'Pages::index');
$routes->get('/tentang', 'Pages::about');
$routes->get('/program', 'Pages::programs');
$routes->get('/galeri',  'Pages::gallery');
$routes->get('/kontak',  'Pages::contact');
