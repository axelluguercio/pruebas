<?php

include_once DOCUMENT_ROOT.'model/marcaModel.php';
include_once DOCUMENT_ROOT.'model/autoModel.php';
include_once DOCUMENT_ROOT.'view/marcaView.php';
include_once DOCUMENT_ROOT.'helpers/authHelper.php';
include_once DOCUMENT_ROOT . 'helpers/paginationHelper.php';

class marcaController {

    private $view;
    private $model;
    private $helper;
    public $pagination;

    public function __construct() {
        $this->view = new marcaView();
        $this->model = new marcaModel();
        $this->model_auto = new autoModel();
        $this->helper = new authHelper();
        $this->pagination  = new paginationHelper(2);

        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut(); 

        // chequea el numero de paginas como resultado 
        $this->pagination->nResultados = $this->model->countAllMarcas(); 

        // calcula las paginas
        $this->pagination->calcularPaginas();

    }

    // funcion para el buscar
    function handlerBuscador() {
        $marcas = $this->getAllMarcas();
        $this->showBuscador($marcas);
    }

    // Retornar nombre de la marca
    function getMarca($id) {
        $marca = $this->model->getMarcaByName($id, $index=1);
        return $marca;
    }

    function getAllMarcas() {
        return $marcas = $this->model->getAllMarcas();
    }

    function handlerPagination() {
        // si la pagina esta seteada, es un numero y es igual o mayor a 1 y menor o igual a total paginas
        if(isset($_GET['pagina'])) {
            if(is_numeric($_GET['pagina'])) {
                if(($_GET['pagina']) >= 1 && ($_GET['pagina']) <= $this->pagination->totalPaginas) {
                    $this->pagination->paginaActual = $_GET['pagina'];
                    $this->pagination->indice = ($this->pagination->paginaActual - 1) * ($this->pagination->resultadosPorPagina);
                }   
            }
        }
    }

    function showAllMarcas() {
        $this->handlerPagination();
    
        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;

        // obtiene las marcas paginadas
        $marcas = $this->model->getAllMarcas($pagination=true, $pos, $n);
        $this->view->showMarcas($marcas, $pag=$this->pagination->totalPaginas);
    }

    function cleanMarca($params=[]) {
        $id = $params[':ID'];
        $this->model->deleteMarca($id);
    }

    function modifyMarca($params=[]) {
        $id = $params[':ID'];
        if ( (isset($_GET['nombre']) || !empty($_GET['nombre'])) && (isset($_GET['origen']) || !empty($_GET['origen'])) ) {
	    $new_nombre = $_GET['nombre']; 
	    $new_origen = $_GET['origen'];
            $this->model->alterMarca($id, $new_nombre, $new_origen);
        } else {
            $marca = $this->model->getMarca($id);
            $this->view->showUpdateMarca($marca);
        }
    }

    function showBuscador($marcas) {
        if ( !empty($_GET['modelo']) || !empty($_GET['anio']) || !empty($_GET['id_marca']) ) {
            $modelo = $_GET['modelo'];
            $anio = $_GET['anio'];
            $id_marca = $_GET['id_marca'];

            $autos = $this->model->advanceFilter($id_marca, $modelo, $anio);
            $this->view->buscador($marcas, $autos);
        } else
            $this->view->buscador($marcas);
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
        $this->handlerPagination();

        $this->pagination->calcularPaginas();

        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;

        // obtiene los autos de la marca paginados
        $autos = $this->model->getAllAutosFromMarca($id_marca, $pagination=true, $pos, $n);
        return $autos;
    }

    function handlerAutosFromMarca($params=[]) {
        $id_marca = $params[':ID'];
        $marca = $this->getMarca($id_marca);
        // cuenta los autos de la marca disponibles
        $nAutos = $this->model_auto->countAllAutoFromMarca($id_marca);
        // lo instancia como nuevo valor de autos por pagina
        $this->pagination->nResultados = $nAutos;

        $autos = $this->showAutoFromMarca($id_marca);
        $pag = $this->pagination->totalPaginas;

        $this->view->showAutosFromMarca($marca, $autos, array(
            array ( 
                'nombre' => 'quitar',
                'action' => 'quitar_auto_marca'
            ),
        )
        , $pag);
    }
    /*/ Funcion para eliminar las materias de una marca atraves del modelo y la vista /*/
    function deleteAutoFromMarca($id_marca) {
        $autos = $this->model->getAllAutosFromMarca($id_marca);
        return $autos;
    }
}

?>
