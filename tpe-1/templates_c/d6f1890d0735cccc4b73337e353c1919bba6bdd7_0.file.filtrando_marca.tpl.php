<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:08:07
  from '/var/www/tpe-1/templates/marca_templates/filtrando_marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c0f75e4937_80003411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6f1890d0735cccc4b73337e353c1919bba6bdd7' => 
    array (
      0 => '/var/www/tpe-1/templates/marca_templates/filtrando_marca.tpl',
      1 => 1633213207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c0f75e4937_80003411 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='GET' action='buscar_marca'>
    Nombre: <input type='text' name='nombre' value=''>
    <input type='submit' value='Buscar' />
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
