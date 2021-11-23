<?php

// document root
define ('DOCUMENT_ROOT', '/' . $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once DOCUMENT_ROOT.'libs/router.php';
require_once DOCUMENT_ROOT.'api/controllers/ApiRemarksController.php';
require_once DOCUMENT_ROOT.'api/controllers/ApiUserController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('remarks', 'GET', 'remarkApiController', 'getRemarks');
$router->addRoute('remarks', 'POST', 'remarkApiController', 'addRemark');
$router->addRoute('remarks/:ID', 'GET', 'remarkApiController', 'getRemark');
$router->addRoute('remarks/auto/:ID_AUTO/', 'GET', 'remarkApiController', 'getRemarkFromAuto');
/*/ opcion de filtro por punto /*/
$router->addRoute('remarks/filter/auto/:ID_AUTO/:PUNTO', 'GET', 'remarkApiController', 'getRemarkFromAutoFiltered');
$router->addRoute('remarks/:ID', 'DELETE', 'remarkApiController', 'deleteRemark');
$router->addRoute('remarks/:ID', 'PUT', 'remarkApiController', 'modifyRemark');
// token de autenticacion para agregar y eliminar comentarios
$router->addRoute('users/token', 'GET', 'userApiController', 'handlerToken');
// devuelve el usuario
$router->addRoute('users/:ID', 'GET', 'userApiController', 'getUsuario');

// rutea
$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);

?>