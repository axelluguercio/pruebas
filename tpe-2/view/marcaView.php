<?php

require_once DOCUMENT_ROOT.'libs/smarty/Smarty.class.php';

class marcaView {
	
    private $smarty_for_marca;

    public function __construct() {

	$this->smarty_for_marca = new Smarty();

    }
    
    function showMarcas($marcas, $pag) {

        $this->smarty_for_marca->assign('titulo', 'Marcas');	
        $this->smarty_for_marca->assign('marcas', $marcas);
        $this->smarty_for_marca->assign('pag', $pag);
        $this->smarty_for_marca->display('./templates/marca_templates/marcas.tpl');
    }

    function showUpdateMarca($marca) {

        $this->smarty_for_marca->assign('titulo', 'Modificando Marcas');	
        $this->smarty_for_marca->assign('marca', $marca);
        $this->smarty_for_marca->display('./templates/marca_templates/modificando_marca.tpl');
    }

    function showAutosFromMarca($marca, $autos, $buttons, $pag) {
		$this->smarty_for_marca->assign('marca', $marca);
		$this->smarty_for_marca->assign('id_user', $_SESSION['ID_USER']);

		// pasa el array de autos a smarty
		$this->smarty_for_marca->assign('autos', $autos);

		$this->smarty_for_marca->assign('buttons', $buttons);

		// pasa la cant de paginas
		$this->smarty_for_marca->assign('pag', $pag);
		// renderizo el template
		$this->smarty_for_marca->display('./templates/auto_templates/autos.tpl');
    }

    /*/ Filtrado /*/

    function buscador($marcas, $autos=null) {
        
        $this->smarty_for_marca->assign('titulo', 'Buscador avanzado');	
        $this->smarty_for_marca->assign('marcas', $marcas);
        $this->smarty_for_marca->assign('autos', $autos);
        $this->smarty_for_marca->display('./templates/buscar.tpl');
    }

    /*/ Formulario para crear marcaa /*/

    function formCreateMarca() {

        $this->smarty_for_marca->assign('titulo', 'Insertando Marca');	
        $this->smarty_for_marca->display('./templates/marca_templates/creando_marca.tpl');
    }
}

?>