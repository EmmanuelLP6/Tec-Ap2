<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
//CONSTANTES DEL PORTAL
$routes->get('/', 'Portal\Inicio::index',['as' => 'inicio']);

//CONSTANTES DEL USUARIO
$routes->get('/acceso', 'Usuario\Acceso::index',['as' => 'acceso']);
$routes->get('/cerrar_acceso', 'Usuario\Cerrar_acceso::index',['as' => 'cerrar_acceso']);
//validar acceso
$routes->post('/validar_acceso', 'Usuario\Acceso::validar_acceso',['as' => 'validar_acceso']);

//CONSTANTES DEL PANEL


/*
 * --------------------------------------------------------------------
 * R O U T E S   T O  P A G E 
 * --------------------------------------------------------------------
 */
//Dashboard
$routes->get('/dashboard', 'Panel\Dashboard::index', ['as' => 'dashboard']);
//Usuarios
$routes->get('/usuarios', 'Panel\Usuarios::index', ['as' => 'usuarios']);
$routes->get('/usuario_nuevo', 'Panel\Usuario_nuevo::index', ['as' => 'usuario_nuevo']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
