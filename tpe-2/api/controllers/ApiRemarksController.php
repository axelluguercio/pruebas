<?php

require_once DOCUMENT_ROOT . 'api/views/apiView.php';
require_once DOCUMENT_ROOT . 'model/remarkModel.php';

class remarkApiController {

    private $view;
    private $model;
    private $data;
    private $helper;

    public function __construct() {
        $this->view = new apiView();
        $this->model = new remarkModel();
        $this->helper = new authApiHelper();
        $this->data = file_get_contents("php://input");
    }

    // funcion para atender a la query all
    function getRemarks($params = null) {
        $remarks = $this->model->getAll();
        if ($remarks) {
            $this->view->response($remarks, 200);
        } else {
            $this->view->response("not found", 404); 
        }
    }

    function getRemark($params = []) {
        $remark_id = $params[':ID'];
        $remark = $this->model->getbyId($remark_id);
        if ($remark) {
            $this->view->response($remark, 200);
        }
        else 
            $this->view->response("comentario id=$remark_id not found", 404);
    }

    function getRemarkFromAuto($params = []) {
        $id_auto = $params[':ID_AUTO'];
        $remarks = $this->model->query_remark_auto($id_auto);
        if (!empty($remarks)) {
            $this->view->response($remarks, 200);
        }
        else 
            $this->view->response('', 404);
    }

    // opcion de filtrado por puntos
    public function getRemarkFromAutoFiltered($params=[]) {
        $remarks = null;
        $id_auto = $params[':ID_AUTO'];
        if ($params[':PUNTO']) {
            $remarks = $this->model->query_remark_auto($id_auto, $filter=true, $params[':PUNTO']);
        if (!empty($remarks)) {
            $this->view->response($remarks, 200);
        }
        else
            $this->view->response('', 404);
        }
    }

    public function deleteRemark($params = []) {
        $user = $this->helper->getUser();
        if ($user) {
            $remark_id = $params[':ID'];
            $remark = $this->model->getbyId($remark_id);
            if ($remark) {
                if ($user->rol === 'A') {
                    $this->model->delete($remark_id);
                    $this->view->response("comentario id=$remark_id eliminado con éxito", 200);
                } else 
                    $this->view->response("Unauthorized", 401);
            }
            else 
                $this->view->response("comentario id=$remark_id not found", 404);  
        } else 
        $this->view->response("Unauthorized", 401);
    }           

    public function addRemark($params = []) {
        $user = $this->helper->getUser();
        if ($user) {
            // devuelve el objeto JSON enviado por POST     
            $body = json_decode($this->data);
            // inserta el comentario
            $desc = $body->descripcion;
            $punt = $body->puntuacion;
            $obj = $body->id_auto;
            $auth = $body->id_usuario;

            $id_new_remark = $this->model->post($desc, $punt, $obj, $auth);
            if (!empty($id_new_remark))
                $this->view->response($id_new_remark, 200);
            else
                $this->view->response("Forbidden: ".$id_new_remark, 403);
        } else 
            $this->view->response("Unauthorized", 401);
    }
    
    /*/
    function modifyRemark($params = []) {
        if ($user) {
        $user = $this->helper->getUser();
        $remark_id = $params[':ID'];
        $remark = $this->model->getbyId($remark_id);

        if ($remark) {
            // devuelve el objeto JSON enviado por POST     
            $body = json_decode($this->data);
            $desc = $body->descripcion;
            $punt = $body->puntuacion;
            $obj = $body->id_auto;
            $auth = $body->id_usuario;

            $status = $this->model->put($remark_id, $desc, $punt, $obj, $auth);

            if($status) {
                $this->view->response("comentario con id=$remark_id modificado con exito", 200);
            } else {
                $this->view->response($status, 500);
            }
        } else {$this->view->response("comentario con id=$id not found", 404);}
    }
    /*/
}

?>