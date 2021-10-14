<?php

require_once DOCUMENT_ROOT.'libs/smarty/Smarty.class.php';

class autoView {

    private $smarty_for_auto;

    public function __construct() {

	$this->smarty_for_auto = new Smarty();

    }

    function showAutos($nombre_marca=null, $id = null, $autos, $buttons = []) {

	// Titulo
	$this->smarty_for_auto->assign('titulo', 'Autos');

	$this->smarty_for_auto->assign('marca', $nombre_marca);

	// pasa el array de materias a smarty
	$this->smarty_for_auto->assign('autos', $autos);

	$this->smarty_for_auto->assign('id', $id);
	$this->smarty_for_auto->assign('buttons', $buttons);

	// renderizo el template
	$this->smarty_for_auto->display('./templates/auto_templates/autos.tpl');
    }

    /*/ Filtrado de materia /*/

    function filterAuto() {

	// Titulo
	$this->smarty_for_auto->assign('titulo', 'Filtrando los autos');

	// renderizo el template
	$this->smarty_for_auto->display('./templates/auto_templates/filtrando_auto.tpl');
    }

    /*/ Formulario para crear carrera /*/

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
