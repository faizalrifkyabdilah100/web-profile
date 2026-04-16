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

// CRUD Data Guru
$routes->get('/guru',              'Guru::index');
$routes->get('/guru/create',      'Guru::create');
$routes->post('/guru/store',      'Guru::store');
$routes->get('/guru/edit/(:num)', 'Guru::edit/$1');
$routes->post('/guru/update/(:num)', 'Guru::update/$1');
$routes->get('/guru/delete/(:num)', 'Guru::delete/$1');
