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



/*
 * --------------------------------------------------------------------
 * R O U T E S   T O  P A G E 
 * --------------------------------------------------------------------
 */
//CONSTANTES DEL PANEL
//Dashboard
$routes->get('/dashboard', 'Panel\Dashboard::index', ['as' => 'dashboard']);
//Usuarios
$routes->get('/usuarios', 'Panel\Usuarios::index', ['as' => 'usuarios']);
$routes->get('/eliminar_usuario/(:num)', 'Panel\Usuarios::eliminar/$1', ['as' => 'eliminar_usuario']);
$routes->get('/estatus_usuario/(:num)/(:num)', 'Panel\Usuarios::estatus/$1/$2', ['as' => 'estatus_usuario']);
$routes->get('/usuario_nuevo', 'Panel\Usuario_nuevo::index', ['as' => 'usuario_nuevo']);
$routes->post('/registrar_usuario', 'Panel\Usuario_nuevo::registrar', ['as' => 'registrar_usuario']);
$routes->get('/detalles_usuario/(:num)', 'Panel\Usuario_detalles::index/$1', ['as' => 'detalles_usuario']);
$routes->post('/editar_usuario', 'Panel\Usuario_detalles::editar', ['as' => 'editar_usuario']);

//Catalogo
$routes->get('/catalogo_dama_panel', 'Panel\Catalogo_dama::index', ['as' => 'catalogo_dama_panel']);

$routes->get('/nuevo_calzado', 'Panel\Nuevo_calzado::index', ['as' => 'nuevo_calzado']);
$routes->post('/registrar_calzado', 'Panel\Nuevo_calzado::registrar', ['as' => 'registrar_calzado']);
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
