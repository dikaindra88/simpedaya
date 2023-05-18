<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->post('cek_login', 'Auth::cek_login');
$routes->get('logout', 'Auth::logout');
$routes->get('/Dashboard', 'Home::index');


//Users
$routes->get('/Users', 'Users::index');
$routes->post('Add-users', 'Users::insert');
$routes->post('/Users/update/(:num)', 'Users::update/$1');
$routes->get('/Users/update/(:num)', 'Users::update/$1');
$routes->post('/Edit-users/(:num)', 'Users::EditAction/$1');
$routes->delete('/Users/Delete/(:num)', 'Users::deleteData/$1');

//Dana-masuk
$routes->post('Add-masuk', 'DanaMasuk::insert');
$routes->get('/Dana-masuk', 'DanaMasuk::index');
$routes->post('/Dana-masuk/detail/(:num)', 'DanaMasuk::getDetail/$1');
$routes->get('/Dana-masuk/detail/(:num)', 'Home::index/$1');
$routes->post('/Dana-masuk/update/(:num)', 'DanaMasuk::update/$1');
$routes->get('/Dana-masuk/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-masuk/(:num)', 'DanaMasuk::EditAction/$1');
$routes->delete('/delete-masuk/(:num)', 'DanaMasuk::delete/$1');

//Dana-keluar
$routes->post('Add-keluar', 'DanaKeluar::insert');
$routes->get('/Dana-keluar', 'DanaKeluar::index');
$routes->post('/Dana-keluar/detail/(:num)', 'DanaKeluar::getDetail/$1');
$routes->get('/Dana-keluar/detail/(:num)', 'Home::index/$1');
$routes->post('/Dana-keluar/update/(:num)', 'DanaKeluar::update/$1');
$routes->get('/Dana-keluar/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-keluar/(:num)', 'DanaKeluar::EditAction/$1');
$routes->delete('/delete-keluar/(:num)', 'DanaKeluar::delete/$1');

//report data keluar
$routes->get('/Report-keluar', 'DanaKeluar::out');
$routes->post('Search-keluar', 'DanaKeluar::show');
$routes->get('Print-keluar/(:any)/(:num)', 'DanaKeluar::print/$1/$2/$2');
$routes->get('Print/keluar/(:any)/(:num)', 'DanaKeluar::pdf/$1/$2/$2');
$routes->get('Print-keluar//', 'DanaKeluar::alert');
$routes->get('Print/keluar//', 'DanaKeluar::alert');

//report data masuk
$routes->get('/Report-masuk', 'DanaMasuk::in');
$routes->post('Search-masuk', 'DanaMasuk::show');
$routes->get('Print-masuk/(:any)/(:num)', 'DanaMasuk::print/$1/$2/$2');
$routes->get('Print/masuk/(:any)/(:num)', 'DanaMasuk::pdf/$1/$2/$2');
$routes->get('Print-masuk//', 'DanaMasuk::alert');
$routes->get('Print/masuk//', 'DanaMasuk::alert');

//report data donatur
$routes->get('Print-donatur', 'Donatur::print');
$routes->get('Pdf-donatur', 'Donatur::pdf');

//report data donatur
$routes->get('Print-penerima', 'Penerima::print');
$routes->get('Pdf-penerima', 'Penerima::pdf');

//Data-Donatur
$routes->post('Add-donatur', 'Donatur::insert');
$routes->get('/Data-donatur', 'Donatur::index');
$routes->post('/Data-donatur/detail/(:num)', 'Donatur::getDetail/$1');
$routes->get('/Data-donatur/detail/(:num)', 'Home::index/$1');
$routes->post('/Data-donatur/update/(:num)', 'Donatur::update/$1');
$routes->get('/Data-donatur/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-donatur/(:num)', 'Donatur::EditAction/$1');
$routes->delete('/delete-donatur/(:num)', 'Donatur::delete/$1');

//Data-Penerima
$routes->post('Add-penerima', 'Penerima::insert');
$routes->get('/Data-penerima-bantuan', 'Penerima::index');
$routes->post('/Data-penerima-bantuan/detail/(:num)', 'Penerima::getDetail/$1');
$routes->get('/Data-penerima-bantuan/detail/(:num)', 'Home::index/$1');
$routes->post('/Data-penerima-bantuan/update/(:num)', 'Penerima::update/$1');
$routes->get('/Data-penerima-bantuan/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-penerima/(:num)', 'Penerima::EditAction/$1');
$routes->delete('/delete-penerima/(:num)', 'Penerima::delete/$1');

//Data-Penerima
$routes->post('Add-penerima', 'Penerima::insert');
$routes->get('/Data-penerima-bantuan', 'Penerima::index');
$routes->post('/Data-penerima-bantuan/detail/(:num)', 'Penerima::getDetail/$1');
$routes->get('/Data-penerima-bantuan/detail/(:num)', 'Home::index/$1');
$routes->post('/Data-penerima-bantuan/update/(:num)', 'Penerima::update/$1');
$routes->get('/Data-penerima-bantuan/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-penerima/(:num)', 'Penerima::EditAction/$1');
$routes->delete('/delete-penerima/(:num)', 'Penerima::delete/$1');

//Data-Satuan
$routes->post('Add-satuan', 'Satuan::insert');
$routes->get('/Data-satuan', 'Satuan::index');
$routes->post('/Data-satuan/detail/(:num)', 'Satuan::getDetail/$1');
$routes->get('/Data-satuan/detail/(:num)', 'Home::index/$1');
$routes->post('/Data-satuan/update/(:num)', 'Satuan::update/$1');
$routes->get('/Data-satuan/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-satuan/(:num)', 'Satuan::EditAction/$1');
$routes->delete('/delete-satuan/(:num)', 'Satuan::delete/$1');

//Data-jenis
$routes->post('Add-jenis', 'Jenis::insert');
$routes->get('/Data-jenis', 'Jenis::index');
$routes->post('/Data-jenis/detail/(:num)', 'Jenis::getDetail/$1');
$routes->get('/Data-jenis/detail/(:num)', 'Home::index/$1');
$routes->post('/Data-jenis/update/(:num)', 'Jenis::update/$1');
$routes->get('/Data-jenis/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-jenis/(:num)', 'Jenis::EditAction/$1');
$routes->delete('/delete-jenis/(:num)', 'Jenis::delete/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
