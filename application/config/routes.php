<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'upload';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


$route['viewpasteles/(:num)']['get'] = 'viewpasteles/index/$1';//devuelve todos los valores de la tablas
$route['viewpasteles/(:num)/(:num)']['get'] = 'viewpasteles/find/$1/$2';//devuelve los valores de la tabla pasteles dependiendo del ID
$route['viewpasteles']['post'] = 'viewpasteles/index';//metodo para insertar
$route['viewpasteles/(:num)']['put'] = 'viewpasteles/index/$1';//metodo para realizar update
$route['viewpasteles/(:num)']['delete'] = 'viewpasteles/index/$1';//metodo para borrar
$route['viewpasteles']['options'] = 'viewpasteles/index/';
//rutas para categorias
$route['categoria/(:num)']['get'] = 'categoria/index/$1';
$route['categoria/(:num)/(:num)']['get'] = 'categoria/find/$1/$2';
$route['categoria']['post'] = 'categoria/index';
$route['categoria/(:num)']['put'] = 'categoria/index/$1';
$route['categoria/(:num)']['delete']='categoria/index/$1';
$route['categoria']['options'] = 'categoria/index/';
//ruta de productos por categoria
$route['categoria/proventas/(:num)/(:num)']['get']='categoria/proventas/$1/$2';

/*
rutas para los clientes
 */
$route['cliente/(:num)']['get'] = 'cliente/index/$1';
$route['cliente/(:num)/(:num)']['get'] = 'cliente/find/$1/$2';
$route['cliente']['post'] = 'cliente/index';
$route['cliente/(:num)']['put'] = 'cliente/index/$1';
$route['cliente/(:num)']['delete'] = 'cliente/index/$1';
$route['cliente']['options'] = 'cliente/index/';
/*
*rutas para detallepedido
*
*
*/
$route['detallepedido/(:num)']['get'] = 'detallepedido/index/$1';
$route['detallepedido/(:num)/(:num)']['get'] = 'detallepedido/find/$1/$2';
$route['detallepedido']['post'] = 'detallepedido/index';
$route['detallepedido/(:num)']['put'] = 'detallepedido/index/$1';
$route['detallepedido/(:num)']['delete'] = 'detallepedido/index/$1';
$route['detallepedido']['options'] = 'detallepedido/index/';
/*
*rutas para empresa
*
*/
$route['empresa/(:num)']['get'] = 'empresa/index/$1';
$route['empresa/(:num)/(:num)']['get'] = 'empresa/find/$1/$2';
$route['empresa']['post'] = 'empresa/index';
$route['empresa/(:num)']['put'] = 'empresa/index/$1';
$route['empresa/(:num)']['delete'] = 'empresa/index/$1';
$route['empresa']['options'] = 'empresa/index/';
/*
*rutas para fotografias
*
*/
$route['fotografia/(:num)']['get'] = 'fotografia/index/$1';
$route['fotografia/(:num)/(:num)']['get'] = 'fotografia/find/$1/$2';
$route['fotografia']['post'] = 'fotografia/index';
$route['fotografia/(:num)']['put'] = 'fotografia/index/$1';
$route['fotografia`/(:num)']['delete'] = 'fotografia/index/$1';
$route['fotografia']['options'] = 'fotografia/index/';
/*
*Notifiacion
*
*/
$route['notificacion/(:num)']['get'] = 'notificacion/index/$1';
$route['notificacion/(:num)/(:num)']['get'] = 'notificacion/find/$1/$2';
$route['notificacion']['post'] = 'notificacion/index';
$route['notificacion/(:num)']['put'] = 'notificacion/index/$1';
$route['notificacion/(:num)']['delete'] = 'notificacion/index/$1';
$route['notificacion']['options'] = 'notificacion/index/';
/*
*ocacion
*
*/
$route['ocacion/(:num)']['get'] = 'ocacion/index/$1';
$route['ocacion/(:num)/(:num)']['get'] = 'ocacion/find/$1/$2';
$route['ocacion']['post'] = 'ocacion/index';
$route['ocacion/(:num)']['put'] = 'ocacion/index/$1';
$route['ocacion/(:num)']['delete'] = 'ocacion/index/$1';
$route['ocacion']['options'] = 'ocacion/index/';


/*
*oferta
*/
$route['oferta/(:num)']['get'] = 'oferta/index/$1';
$route['oferta/(:num)/(:num)']['get'] = 'oferta/find/$1/$2';
$route['oferta']['post'] = 'oferta/index';
$route['oferta/(:num)']['put'] = 'oferta/index/$1';
$route['oferta/(:num)']['delete'] = 'oferta/index/$1';
$route['oferta']['options'] = 'oferta/index/';
/*
 *Pedido
 */
$route['pedido/(:num)']['get'] = 'pedido/index/$1';
$route['pedido/(:num)/(:num)']['get'] = 'pedido/find/$1/$2';
$route['pedido']['post'] = 'pedido/index';
$route['pedido/(:num)']['put'] = 'pedido/index/$1';
$route['pedido/(:num)']['delete'] = 'pedido/index/$1';
$route['pedido']['options'] = 'pedido/index/';
/*
*rutas para productos venta
*
*/
$route['proventa/(:num)/(:num)']['get'] = 'proventa/index/$1/$2';
$route['proventa/(:num)/(:num)']['get'] = 'proventa/find/$1/$2';
$route['proventa']['post'] = 'proventa/index';
$route['proventa/(:num)']['put'] = 'proventa/index/$1';
$route['proventa/(:num)']['delete'] = 'proventa/index/$1';
$route['proventa']['options'] = 'proventa/index/';

//Ofertas del producto
$route['proventa/ofertas/(:num)']['get'] = 'proventa/ofertas/$1';
//  ruta de imagenes de productos
$route['proventa/imagen/(:num)']['get'] ='proventa/imagen/$1';


$route['inner']['get'] = 'inner/index';
/*
*Rutas para tipo Usuario
*
*/
$route['tipousuario/(:num)']['get'] = 'tipousuario/index/$1';
$route['tipousuario/(:num)/(:num)']['get'] = 'tipousuario/find/$1/$2';
$route['tipousuario']['post'] = 'tipousuario/index';
$route['tipousuario/(:num)']['put'] = 'tipousuario/index/$1';
$route['tipousuario/(:num)']['delete'] = 'tipousuario/index/$1';
$route['tipousuario']['options'] = 'tipousuario/index/';
/*
*rutas para usuario
*/
$route['usuario/(:num)']['get'] = 'usuario/index/$1';
$route['usuario/(:num)/(:num)']['get'] = 'usuario/find/$1/$2';
$route['usuario']['post'] = 'usuario/index';
$route['usuario/(:num)']['put'] = 'usuario/index/$1';
$route['usuario/(:num)']['delete'] = 'usuario/index/$1';
$route['usuario']['options'] = 'usuario/index/';

/*
*rutas para validar pedidp
*/
$route['validarpedido/(:num)']['get'] = 'validarpedido/index/$1';
$route['validarpedido/(:num)/(:num)']['get'] = 'validarpedido/find/$1/$2';
$route['validarpedido']['post'] = 'validarpedido/index';
$route['validarpedido/(:num)']['put'] = 'validarpedido/index/$1';
$route['validarpedido/(:num)']['delete'] = 'validarpedido/index/$1';
$route['validarpedido']['options'] = 'validarpedido/index/';
//
//
/*
*Rutas para pro venta a oferta tabla intermedia
*/
$route['ventaoferta/(:num)']['get'] = 'ventaoferta/index/$1';
$route['ventaoferta/(:num)/(:num)']['get'] = 'ventaoferta/find/$1/$2';
$route['ventaoferta']['post'] = 'ventaoferta/index';
$route['ventaoferta/(:num)']['put'] = 'ventaoferta/index/$1';
$route['ventaoferta/(:num)']['delete'] = 'ventaoferta/index/$1';
$route['ventaoferta']['options'] = 'ventaoferta/index/';
/*
*rutas para login
*/
$route['login']['get'] = 'login/index';
$route['login']['post'] = 'login/index';
$route['logincliente']['get'] = 'logincliente/index';
$route['logincliente']['post'] = 'logincliente/index';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
