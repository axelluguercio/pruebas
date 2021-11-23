<?php

require_once DOCUMENT_ROOT.'libs/smarty/Smarty.class.php';

class autoView {

    private $smarty_for_auto;

    public function __construct() {

		$this->smarty_for_auto = new Smarty();

    }

	function displayAuto($auto) {
		// pasa el auto a smarty
		$this->smarty_for_auto->assign('auto', $auto);
		// renderizo el template
		$this->smarty_for_auto->display('./templates/auto_templates/auto.tpl');
	}

    function showAutos($autos, $pag=null) {
		// Titulo
		$this->smarty_for_auto->assign('titulo', 'Autos');
		$this->smarty_for_auto->assign('id_user', $_SESSION['ID_USER']);
		// pasa el array de autos a smarty
		$this->smarty_for_auto->assign('autos', $autos);
		// pasa la cant de paginas
		$this->smarty_for_auto->assign('pag', $pag);
		// renderizo el template
		$this->smarty_for_auto->display('./templates/auto_templates/autos.tpl');
    }

    /*/ Formulario para crear auto/*/

    function formCreateAuto($marcas) {

		// Titulo
		$this->smarty_for_auto->assign('titulo', 'Creando nuevo auto');

		// paso las carreras
		$this->smarty_for_auto->assign('marcas', $marcas);
		// renderizo el template
		$this->smarty_for_auto->display('./templates/auto_templates/creando_auto.tpl');
    }

	function showUpdateAuto($auto, $marcas) {
		
		// Titulo
		$this->smarty_for_auto->assign('titulo', 'Modificando auto');

		// paso la materia
		$this->smarty_for_auto->assign('auto', $auto);
		// paso las carreras
		$this->smarty_for_auto->assign('marcas', $marcas);
		// renderizo el template
		$this->smarty_for_auto->display('./templates/auto_templates/modificando_auto.tpl');
	}
}

?>
