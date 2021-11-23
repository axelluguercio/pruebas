<?php

// document root
define ('DOCUMENT_ROOT', '/' . $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']) . '/');
// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// defino la base url para la construccion de links con urls semánticas
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

// defino la base url para la construccion de links con urls semánticas
define('HOME', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/home');

require_once DOCUMENT_ROOT.'libs/router.php';
require_once DOCUMENT_ROOT.'controller/marcaController.php';
require_once DOCUMENT_ROOT.'controller/autoController.php';
require_once DOCUMENT_ROOT.'controller/authController.php';

// crea el router
$router = new Router();

// define la ruta por default
$router->setDefaultRoute('authController', 'loginSession');

// define la tabla de ruteo

/*/ Login /*/
$router->addRoute('login', 'GET', 'authController', 'loginSession');
$router->addRoute('login', 'POST', 'authController', 'loginSession');
/*/ Register /*/
$router->addRoute('register', 'GET', 'authController', 'registerSession');
$router->addRoute('register', 'POST', 'authController', 'registerSession');
/*/ Logout /*/ 
$router->addRoute('logout', 'GET', 'authController', 'logoutSession');
/*/ Marcas /*/
$router->addRoute('home', 'GET', 'marcaController', 'showAllMarcas');
$router->addRoute('buscar', 'GET', 'marcaController', 'handlerBuscador');
$router->addRoute('crear_marca', 'GET', 'marcaController', 'createNewMarca');
$router->addRoute('insertar_marca', 'GET', 'marcaController', 'createNewMarca');
$router->addRoute('borrar_marca/:ID', 'GET', 'marcaController', 'cleanMarca');
$router->addRoute('modificar_marca/:ID', 'GET', 'marcaController', 'modifyMarca');
$router->addRoute('mostrar_autos_marca/:ID', 'GET', 'marcaController', 'handlerAutosFromMarca');
/*/ Autos /*/
$router->addRoute('auto/:ID', 'GET', 'autoController', 'showAuto');
$router->addRoute('autos', 'GET', 'autoController', 'showAllAutos');
$router->addRoute('insertar_auto', 'GET', 'autoController', 'handlerCreateAuto');
$router->addRoute('borrar_auto/:ID', 'GET', 'autoController', 'cleanAuto');
$router->addRoute('modificar_auto/:ID', 'GET', 'autoController', 'handlerModifyAuto');
/*/ Usuarios /*/
$router->addRoute('usuarios', 'GET', 'authController', 'Users');
$router->addRoute('mod_perm/:ID', 'GET', 'authController', 'modifyPermissions');
$router->addRoute('elim_user/:ID', 'GET', 'authController', 'deleteUser');

// rutea
$resource = $_GET['action'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);

?>