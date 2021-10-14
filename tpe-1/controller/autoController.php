<?php

include_once DOCUMENT_ROOT.'model/autoModel.php';
include_once DOCUMENT_ROOT.'view/autoView.php';
include_once DOCUMENT_ROOT.'helpers/authHelper.php';

class autoController {

    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new autoView();
        $this->model = new autoModel();
        $this->helper = new authHelper();

        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut();
    }

    function showAllAutosFromList($nombre_auto=null, $id, $autos, $buttons) {
        $this->view->showAutos($nombre_auto, $id, $autos, $buttons);
    }

    function showAllAutos() {
        $result_autos = $this->model->getAllAutos();
        $this->view->showAutos($result_autos);
    }

    function cleanAuto($id) {
        $this->model->deleteAuto($id);
    }

    function modifyAuto($id, $marcas) {
        if ( (isset($_GET['modelo']) || !empty($_GET['modelo'])) && (isset($_GET['anio']) || !empty($_GET['anio'])) && (isset($_GET['id_marca']) || !empty($_GET['id_marca']) ) ) {
            $new_modelo = $_GET['modelo'];
            $new_anio = $_GET['anio'];
            $new_marca = $_GET['id_marca'];
            $this->model->alterAuto($id, $new_modelo, $new_anio, $new_marca);
        } else {
            $auto = $this->model->getAuto($id);
            $this->view->showUpdateAuto($auto, $marcas);
        }
    }

    /*/ Funcion para buscar el nombre filtrado en el modelo /*/
    function findAuto() {
        if ( isset($_GET['modelo']) || !empty($_GET['modelo']) ) {
            $modelo = $_GET['modelo'];
            $auto_finded = $this->model->getAutoByName($modelo);
            $this->view->showAutos($auto_finded);
        } else $this->view->filterAuto();
    }


    /*/ Funcion para comuinicarse con el modelo e insetar nueva carrera /*/
    function createNewAuto($marcas) {
        if ( (isset($_GET['modelo']) || !empty($_GET['modelo'])) && (isset($_GET['anio']) || !empty($_GET['anio'])) && (isset($_GET['id_marca']) || !empty($_GET['id_marca']) ) ) {
            $new_modelo = $_GET['modelo'];
            $new_anio = $_GET['anio'];
            $new_marca = $_GET['id_marca'];
            if ($this->model->verifyAuto($new_modelo ) == 1) {
                $new_id = $this->model->insertAuto($new_modelo, $new_anio, $new_marca);

                echo "Nueva materia insertada con el id " . $new_id;
            } else {
                echo "La materia ya existe, modifiquela";
            }
        } else $this->view->formCreateAuto($marcas);
    }
}

?>
