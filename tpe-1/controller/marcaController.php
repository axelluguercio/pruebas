<?php

include_once DOCUMENT_ROOT.'model/marcaModel.php';
include_once DOCUMENT_ROOT.'view/marcaView.php';
include_once DOCUMENT_ROOT.'helpers/authHelper.php';

class marcaController {

    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new marcaView();
        $this->model = new marcaModel();

        $this->helper = new authHelper();

        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut(); 

    }

    // Retornar nombre de la marca
    function getMarca($id) {
        $marca = $this->model->getMarcaByName($id, 1);
        return $marca;
    }

    function getAllMarcas() {
        return $marcas = $this->model->getAllMarcas();
    }

    function showAllMarcas() {
        $marcas = $this->model->getAllMarcas();
        $this->view->showMarcas($marcas);
    }

    function cleanMarca($id) {
        $this->model->deleteMarca($id);
    }

    function modifyMarca($id) {
        if ( (isset($_GET['nombre']) || !empty($_GET['nombre'])) && (isset($_GET['origen']) || !empty($_GET['origen'])) ) {
	    $new_nombre = $_GET['nombre']; 
	    $new_origen = $_GET['origen'];

            $this->model->alterMarca($id, $new_nombre, $new_origen);
        } else {
            $marca = $this->model->getMarca($id);
            $this->view->showUpdateMarca($marca);
        }
    }

    /*/ Funcion para buscar el nombre filtrado en el modelo /*/
    function findMarca() {
        if ( isset($_GET['nombre']) || !empty($_GET['nombre']) ) {
            $nombre = $_GET['nombre'];
            $marcas_finded = $this->model->getMarcaByName($nombre);
            $this->view->showMarcas($marcas_finded);
        } else {
            $this->view->filterMarca();
        }
    }

    /*/ Funcion para comuinicarse con el modelo e insetar nueva marcaa /*/
    function createNewMarca() {
        if ( (isset($_GET['nombre']) || !empty($_GET['nombre'])) &&  (isset($_GET['origen']) || !empty($_GET['origen']))) {
            $nombre = $_GET['nombre'];
            $origen = $_GET['origen'];
            if ($this->model->verifyMarca($nombre) == 1) {
                $new_id = $this->model->insertMarca($nombre, $origen);

                echo "Nueva marca insertada con el id " . $new_id;
            } else {
                echo "La marca ya existe, modifiquela";
            }
        } else {
            $this->view->formCreateMarca();
        }
    }
    
    /*/ Funcion para mostrar las materias de una marcaa atraves del modelo y la vista /*/
    function showAutoFromMarca($id_marca) {
        $autos = $this->model->getAllAutosFromMarca($id_marca);
        return $autos;
    }

    /*/ Funcion para eliminar las materias de una marca atraves del modelo y la vista /*/
    function deleteAutoFromMarca($id_marca) {
        $autos = $this->model->getAllAutosFromMarca($id_marca);
        return $autos;
    }
}

?>
