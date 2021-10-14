<?php

require_once DOCUMENT_ROOT.'libs/smarty/Smarty.class.php';

class marcaView {
	
    private $smarty_for_marca;

    public function __construct() {

	$this->smarty_for_marca = new Smarty();

    }
    
    function showMarcas($marcas) {

	$this->smarty_for_marca->assign('titulo', 'Marcas');	
	$this->smarty_for_marca->assign('marcas', $marcas);
	$this->smarty_for_marca->display('./templates/marca_templates/marcas.tpl');
    }

    function showUpdateMarca($marca) {

	$this->smarty_for_marca->assign('titulo', 'Modificando Marcas');	
	$this->smarty_for_marca->assign('marca', $marca);
	$this->smarty_for_marca->display('./templates/marca_templates/modificando_marca.tpl');
    }

    /*/ Filtrado de marcaa /*/

    function filterMarca() {
        
	$this->smarty_for_marca->assign('titulo', 'Filtrando Marcas');	
	$this->smarty_for_marca->display('./templates/marca_templates/filtrando_marca.tpl');
    }

    /*/ Formulario para crear marcaa /*/

    function formCreateMarca() {

	$this->smarty_for_marca->assign('titulo', 'Insertando Marca');	
	$this->smarty_for_marca->display('./templates/marca_templates/creando_marca.tpl');
    }
}

?>