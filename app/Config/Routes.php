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
$routes->setDefaultController('GuestController');
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
$routes->get('/', 'GuestController::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::actionLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::actionRegister');
$routes->get('/logout', 'AuthController::actionLogout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/users', 'DashboardController::users_management', ['filter' => 'auth']);
$routes->post('/users/add', 'DashboardController::user_add', ['filter' => 'auth']);
$routes->get('/users/edit/(:num)', 'DashboardController::user_edit/$1', ['filter' => 'auth']);
$routes->post('/users/edit/(:num)', 'DashboardController::actionUserEdit/$1', ['filter' => 'auth']);
$routes->get('/users/delete/(:any)', 'DashboardController::user_delete/$1', ['filter' => 'auth']);
$routes->get('/users/activate/(:any)', 'DashboardController::user_activate/$1', ['filter' => 'auth']);


$routes->get('/forms', 'DashboardController::forms_management', ['filter' => 'auth']);
$routes->get('/forms/detail/(:num)', 'DashboardController::form_detail/$1', ['filter' => 'auth']);
$routes->get('/forms/acc/(:num)', 'DashboardController::form_acc/$1', ['filter' => 'auth']);
$routes->get('/forms/decline/(:num)', 'DashboardController::form_decline/$1', ['filter' => 'auth']);
$routes->post('/forms/edit/(:any)', 'DashboardController::form_edit/$1', ['filter' => 'auth']);

$routes->get('/students', 'DashboardController::students_management', ['filter' => 'auth']);
$routes->get('/get-students-ajax', 'DashboardController::getStudentsAjax', ['filter' => 'auth']);
$routes->get('/students/export', 'DashboardController::export_students', ['filter' => 'auth']);
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
