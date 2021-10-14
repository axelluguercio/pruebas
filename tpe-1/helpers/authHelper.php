<?php

class authHelper {

    public function __construct() {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user) {

        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['USERNAME'] = $user->nombre;

        // Guarda el tiempo
        $_SESSION['LAST_ACTIVITY'] = time();

        header('Location: ' . HOME);
    }

    public function logout() {

        // destruye la sesion
        session_destroy();

        header('Location: ' . LOGIN );
    }

    public function checkLoggedIn() {

        if (!isset($_SESSION['ID_USER'])) {
            $this->logout();
            die();
        }       
    }

    public function getLoggedUserName() {return $_SESSION['USERNAME'];}

    public function checkSessionTimeOut() {
        // verifica que este logueado
        if(!isset($_SESSION['ID_USER'])) {
            $this->logout();
            die();
        } 
        else { // si esta logueado
              if (time() - $_SESSION['LAST_ACTIVITY'] > 120) { // expiro el timeout (2 minutos)
                  $this->logout();
                  die();
              } else $_SESSION['LAST_ACTIVITY'] = time();
        } 
    }
}

?>