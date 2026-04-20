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

    // CRUD Konten Inline Utama (Tentang / Beranda / Program)
    $routes->post('/admin-konten/update_utama', 'AdminKonten::update_utama');
    $routes->post('/admin-konten/update_logo', 'AdminKonten::update_logo');
    $routes->post('/admin-konten/update_hero', 'AdminKonten::update_hero');
    $routes->get('/admin-konten/create-item/(:segment)/(:segment)', 'AdminKonten::create_item/$1/$2');
    $routes->post('/admin-konten/store-item/(:segment)/(:segment)', 'AdminKonten::store_item/$1/$2');
    $routes->get('/admin-konten/edit-item/(:num)', 'AdminKonten::edit_item/$1');
    $routes->post('/admin-konten/update-item/(:num)', 'AdminKonten::update_item/$1');
    $routes->get('/admin-konten/delete-item/(:num)', 'AdminKonten::delete_item/$1');
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
