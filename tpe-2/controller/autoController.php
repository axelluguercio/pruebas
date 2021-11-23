<?php

include_once DOCUMENT_ROOT . 'model/autoModel.php';
include_once DOCUMENT_ROOT . 'model/marcaModel.php';
include_once DOCUMENT_ROOT . 'view/autoView.php';
include_once DOCUMENT_ROOT . 'helpers/authHelper.php';
include_once DOCUMENT_ROOT . 'helpers/paginationHelper.php';

class autoController {

    private $view;
    public $model;
    private $helper;
    private $pagination;

    public function __construct() {
        $this->view = new autoView();
        $this->model = new autoModel();
        // modelo marca
        $this->model_marca = new marcaModel();
        $this->helper = new authHelper();
        $this->pagination  = new paginationHelper(2);

        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut();

        // chequea el numero de paginas como resultado 
        $this->pagination->nResultados = $this->model->countAllAutos(); 

        // calcula las paginas
        $this->pagination->calcularPaginas();
    }

    function showAuto($params=[]){ 
        $id = $params[':ID'];
        $auto = $this->model->getAuto($id);
        $this->view->displayAuto($auto);
    }

    function showAllAutos() {
        // si la pagina esta seteada, es un numero y es igual o mayor a 1 y menor o igual a total paginas
        if(isset($_GET['pagina'])) {
            if(is_numeric($_GET['pagina'])) {
                if(($_GET['pagina']) >= 1 && ($_GET['pagina']) <= $this->pagination->totalPaginas) {
                    $this->pagination->paginaActual = $_GET['pagina'];
                    $this->pagination->indice = ($this->pagination->paginaActual - 1) * ($this->pagination->resultadosPorPagina);
                }   
            }
        }
        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;
        // obtiene los autos paginados
        $result_autos = $this->model->getAllAutos($pagination=true, $pos, $n);
        $nPaginas = $this->pagination->totalPaginas;
        $this->view->showAutos($result_autos, $pag=$nPaginas);
    }

    function cleanAuto($params=[]) {
        $id = $params[':ID'];
        $this->model->deleteAuto($id);
    }

    function modifyAuto($id, $marcas) {
        if ( (isset($_POST['modelo']) || !empty($_POST['modelo'])) && (isset($_POST['anio']) || !empty($_POST['anio'])) && (isset($_POST['id_marca']) || !empty($_POST['id_marca']) ) ) {
            $new_modelo = $_POST['modelo'];
            $new_anio = $_POST['anio'];
            $new_marca = $_POST['id_marca'];
            $new_img = null;
            $pathext = null;
            // verifica imagen
            $new_img = $this->handlerImage();
            $pathext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

            $this->model->alterAuto($id, $new_modelo, $new_anio, $new_marca, $new_img, $pathext);
        } else {
            $auto = $this->model->getAuto($id);
            $this->view->showUpdateAuto($auto, $marcas);
        }
    }

    function handlerModifyAuto($params=[]) {
        $id_auto = $params[':ID'];
        $marcas = $this->model_marca->getAllMarcas();
        $this->modifyAuto($id_auto, $marcas);
    }

    /*/ Funcion para comuinicarse con el modelo e insetar nueva carrera /*/
    function createNewAuto($marcas) {
        if ( (isset($_POST['modelo']) || !empty($_POST['modelo'])) && (isset($_POST['anio']) || !empty($_POST['anio'])) && (isset($_POST['id_marca']) || !empty($_POST['id_marca']) ) ) {
            $new_modelo = $_POST['modelo'];
            $new_anio = $_POST['anio'];
            $new_marca = $_POST['id_marca'];
            $img = null;
            $pathext = null;
            if ($this->model->verifyAuto($new_modelo ) == 1) {
                // verifica imagen
                $img = $this->handlerImage();
                $pathext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $new_id = $this->model->insertAuto($new_modelo, $new_anio, $new_marca, $img, $pathext); 

                echo "
                <script>
                alert(auto creado con exito con el id $new_id);
                </script>";

            } else {
                echo "
                <script>
                alert(El auto ya existe, ingrese otro);
                </script>";
            }
        } else $this->view->formCreateAuto($marcas);
    }

    function handlerCreateAuto() {
        $marcas = $this->model_marca->getAllMarcas;
        $this->createNewAuto($marcas);
    }

    function handlerImage() {
        if (isset($_FILES['img']['name'])) {
            $ext = $_FILES['img']['type'];
            $allow_extension = array('image/jpg', 'image/png', 'image/jpeg');
            if (in_array($ext, $allow_extension) == false) {
                die();
            } else {
                $img = $_FILES['img']['tmp_name'];
                return $img;
            }
        }
    }
    
}

?>
