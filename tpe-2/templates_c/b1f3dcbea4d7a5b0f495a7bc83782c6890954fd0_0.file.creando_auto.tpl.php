<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:16:30
  from '/var/www/html/tpe-2/templates/auto_templates/creando_auto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d683ee84561_84658935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1f3dcbea4d7a5b0f495a7bc83782c6890954fd0' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auto_templates/creando_auto.tpl',
      1 => 1637689818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619d683ee84561_84658935 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="mb-3"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>
<form name='formulario' method='POST' action='insertar_auto' enctype='multipart/form-data'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Cargar imagen</label>
        <input type="file" name="img" class="form-control">
    </div>
    <select name='id_marca' class="form-control">;
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
    <input type='submit' value='Crear' class="btn btn-primary">
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
