<?php

require_once DOCUMENT_ROOT . 'api/views/apiView.php';
require_once DOCUMENT_ROOT . 'model/userModel.php';
require_once DOCUMENT_ROOT . 'helpers/authApiHelper.php';

class userApiController {

    private $view;
    private $model;

    public function __construct() {
        $this->view = new apiView();
        $this->model = new userModel();
        $this->helper = new authApiHelper();
    }

    public function handlerToken($params=[]) {
        $userpass = $this->helper->getBasic();

        // Obtengo el usuario de la base de datos
        $user = $this->model->getUserbyEmail($userpass['usuario']);
        
        // Si el usuario existe y las contraseñas coinciden
        if ($user && password_verify($userpass['password'], $user->contraseña)) {
            $token = $this->helper->createToken($user);
            // devolver un token
            $this->view->response(["token"=>$token], 200);
        }else{
            $this->view->response("Usuario y contraseña incorrectos", 401);
        }
    }

    function getUsuario($params=[]) {
        // users/:ID
        $id = $params[":ID"];
        $user = $this->helper->getUser();
        if($user)
            if($id == $user->sub){
                $this->view->response($user, 200);
            }else{
                $this->view->response("Forbidden", 403);
            }
        else{
            $this->view->response("Unauthorized", 401);
        }
    }
}

?>