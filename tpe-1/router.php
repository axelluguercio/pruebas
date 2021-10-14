<?php

// document root

define ('DOCUMENT_ROOT', '/'.$_SERVER['DOCUMENT_ROOT'].'/');

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// defino la base url para la construccion de links con urls semánticas
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

// defino la base url para la construccion de links con urls semánticas
define('HOME', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/home');

/*/
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', TRUE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", BASE_URL."/php-error.log");

error_log( "Show below errors" );
/*/

require_once DOCUMENT_ROOT.'controller/marcaController.php';
require_once DOCUMENT_ROOT.'controller/autoController.php';
require_once DOCUMENT_ROOT.'controller/authController.php';

if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'login';
}

/*/ 
botones de crud para las autos en las marcaas
/*/

$buttons_auto_on_marca = array(
    array ( 
        'nombre' => 'quitar',
        'action' => 'quitar_auto_marca'
    ),
);

$params = explode('/', $action);

switch ($params[0]){

    case 'register':
        $auth_controller = new authController();
        $auth_controller->registerSession();
        break;

    case 'login':
        $auth_controller = new authController();
        $auth_controller->loginSession();
        break;
    
    case 'logout':
        $auth_controller = new authController();
        $auth_controller->logoutSession();
        break;

    /*/ Rutas para las marcas /*/
    case 'home':
        $marca_controller = new marcaController();
        $marca_controller->showAllMarcas();
        break;

    case 'buscar_marca':
        $marca_controller = new marcaController();
        $marca_controller->findMarca();
        break;

    case 'crear_marca':
        $marca_controller = new marcaController();
        $marca_controller->createNewMarca();
        break;

    case 'insertar_marca':
        $marca_controller->createNewMarca();
        break;

    case 'borrar_marca':
        $marca_controller = new marcaController();
        $marca_controller->cleanMarca($params[1]);
        break;

    case 'modificar_marca':
        $marca_controller = new marcaController();
        $marca_controller->modifyMarca($params[1]);
        break;

    case 'mostrar_autos_marca':

        $marca_controller = new marcaController();
        $auto_controller = new autoController();
        
        // almaceno el id de la marca //
        $id_marca = $params[1];
        $marca = $marca_controller->getMarca($id_marca);
        $nombre_marca = $marca[0]->nombre;
        $autos = $marca_controller->showAutoFromMarca($id_marca);
        $auto_controller->showAllAutosFromList($nombre_marca, $id_marca, $autos, $buttons_auto_on_marca);
        break;

    /*/ Rutas para las autos /*/
    case 'autos':

        $auto_controller = new autoController();
        $auto_controller->showAllAutos();
	    break;

    case 'buscar_auto':

        $auto_controller = new autoController();
        $auto_controller->findAuto();
        break;

    case 'insertar_auto':

        $marca_controller = new marcaController();
        $auto_controller = new autoController();
        $marcas = $marca_controller->getAllMarcas();
        $auto_controller->createNewAuto($marcas);
        break;

    case 'borrar_auto':

        $auto_controller = new autoController();
        $auto_controller->cleanAuto($params[1]);
        break;

    case 'modificar_auto':
        $marca_controller = new marcaController();
        $auto_controller = new autoController();
        $marcas = $marca_controller->getAllMarcas();
        $auto_controller->modifyAuto($params[1], $marcas);
        break;

    default:

        echo('404 pagina no encontrada');
        break;
}

?>
