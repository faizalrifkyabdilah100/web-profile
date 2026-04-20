<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',        'Pages::index');
$routes->get('/tentang', 'Pages::about');
$routes->get('/program', 'Pages::programs');

// Auth Routes
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/authenticate', 'Auth::authenticate');
$routes->get('/auth/logout', 'Auth::logout');

// CRUD Data Guru (Hanya Super Admin)
$routes->get('/guru', 'Guru::index');
$routes->group('', ['filter' => 'auth:super_admin'], function($routes) {
    $routes->get('/guru/create', 'Guru::create');
    $routes->post('/guru/store', 'Guru::store');
    $routes->get('/guru/edit/(:num)', 'Guru::edit/$1');
    $routes->post('/guru/update/(:num)', 'Guru::update/$1');
    $routes->get('/guru/delete/(:num)', 'Guru::delete/$1');

    // CRUD Halaman Tentang
    $routes->get('/tentang-admin', 'TentangAdmin::index');
    $routes->post('/tentang-admin/update_utama', 'TentangAdmin::update_utama');
    $routes->post('/tentang-admin/update_logo', 'TentangAdmin::update_logo');
    $routes->get('/tentang-admin/create-item/(:segment)', 'TentangAdmin::create_item/$1');
    $routes->post('/tentang-admin/store-item/(:segment)', 'TentangAdmin::store_item/$1');
    $routes->get('/tentang-admin/edit-item/(:num)', 'TentangAdmin::edit_item/$1');
    $routes->post('/tentang-admin/update-item/(:num)', 'TentangAdmin::update_item/$1');
    $routes->get('/tentang-admin/delete-item/(:num)', 'TentangAdmin::delete_item/$1');
    
    // CRUD Halaman Dinamis
    $routes->get('/halaman-dinamis', 'HalamanDinamis::index');
    $routes->get('/halaman-dinamis/create', 'HalamanDinamis::create');
    $routes->post('/halaman-dinamis/store', 'HalamanDinamis::store');
    $routes->get('/halaman-dinamis/edit/(:num)', 'HalamanDinamis::edit/$1');
    $routes->post('/halaman-dinamis/update/(:num)', 'HalamanDinamis::update/$1');
    $routes->get('/halaman-dinamis/delete/(:num)', 'HalamanDinamis::delete/$1');
});

// CRUD Data Mata Pelajaran (Super Admin & Guru)
$routes->get('/mata-pelajaran', 'MataPelajaran::index');
$routes->group('', ['filter' => 'auth:super_admin,guru'], function($routes) {
    $routes->get('/mata-pelajaran/create', 'MataPelajaran::create');
    $routes->post('/mata-pelajaran/store', 'MataPelajaran::store');
    $routes->get('/mata-pelajaran/edit/(:num)', 'MataPelajaran::edit/$1');
    $routes->post('/mata-pelajaran/update/(:num)', 'MataPelajaran::update/$1');
    $routes->get('/mata-pelajaran/delete/(:num)', 'MataPelajaran::delete/$1');
});
