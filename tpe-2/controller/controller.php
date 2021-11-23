<?php

include_once DOCUMENT_ROOT . 'helpers/authHelper.php';
include_once DOCUMENT_ROOT . 'helpers/paginationHelper.php';

class controller {

    private $helper;
    private $pagination;

    public function __construct() {
        $this->helper = new authHelper();
        $this->pagination  = new paginationHelper(2);

        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut();
    }
}

?>