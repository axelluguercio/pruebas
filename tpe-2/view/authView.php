<?php

require_once DOCUMENT_ROOT.'libs/smarty/Smarty.class.php';

class authView {

    private $smarty_for_auth;

    public function __construct() {

	    $this->smarty_for_auth = new Smarty();

    }

    function showForm($context, $error = null) {

        // Titulo
		$this->smarty_for_auth->assign('titulo', $context);

        // el error 
        $this->smarty_for_auth->assign('error', $error);

		// renderizo el template
		$this->smarty_for_auth->display('./templates/auth_templates/'.$context.'.tpl');
    }

    function showUsers($users) {
         // Titulo
		$this->smarty_for_auth->assign('titulo', 'Usuarios');

        //los usuarios 
        $this->smarty_for_auth->assign('users', $users);

        // renderizo el template
		$this->smarty_for_auth->display('./templates/auth_templates/users.tpl');
    }
}

?>