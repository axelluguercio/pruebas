<?php

class authHelper {

    public function __construct() {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user) {

        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['USERNAME'] = $user->email;

        // limpia la pass
        //$_SESSION['PASSWORD'] = '';

        // Guarda el tiempo
        $_SESSION['LAST_ACTIVITY'] = time();

        // Almacena los permisos 
        $_SESSION['PERMISSIONS'] = $user->permisos;

        header('Location: ' . HOME);
    }

    public function logout() {

        // destruye la sesion
        session_destroy();

        header('Location: ' . LOGIN );
    }

    public function checkLoggedIn($context = true) {

        if (!isset($_SESSION['ID_USER'])) {
            if ($context) {
                    $this->logout();
                    die();
            } else {
                return "Debe loguearse para poder realizar la siguiente operacion";
            }
        }  
    }

    public function getLoggedUserName() {return $_SESSION['USERNAME'];}

    public function getLoggedUserPermissions() {return $_SESSION['PERMISSIONS'];}
    
    public function checkSessionTimeOut() {
        // verifica que este logueado
        if(!isset($_SESSION['ID_USER'])) {
            $this->logout();
            die();
        } 
        else { // si esta logueado
              if (time() - $_SESSION['LAST_ACTIVITY'] > 5000) { // expiro el timeout (2 minutos)
                  $this->logout();
                  die();
              } else $_SESSION['LAST_ACTIVITY'] = time();
        } 
    }
}

?>