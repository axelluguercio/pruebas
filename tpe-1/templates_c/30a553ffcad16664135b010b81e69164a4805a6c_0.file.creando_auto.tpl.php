<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:08:44
  from '/var/www/tpe-1/templates/auto_templates/creando_auto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c11cb193e9_18875003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30a553ffcad16664135b010b81e69164a4805a6c' => 
    array (
      0 => '/var/www/tpe-1/templates/auto_templates/creando_auto.tpl',
      1 => 1633213222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c11cb193e9_18875003 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>
<form name='formulario' method='GET' action='insertar_auto'>
    Modelo: <input type='text' name='modelo' value=''>
    Año: <input type='text' name='anio' value=''>
    <select name='id_marca'>";
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
		<option value='<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'> <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
 </option> 
	    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</select>
    <input type='submit' value='Crear' />
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
