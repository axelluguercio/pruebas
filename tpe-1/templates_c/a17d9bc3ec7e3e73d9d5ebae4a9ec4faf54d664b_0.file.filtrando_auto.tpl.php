<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:15:52
  from '/var/www/tpe-1/templates/auto_templates/filtrando_auto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c2c8529f31_23754605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a17d9bc3ec7e3e73d9d5ebae4a9ec4faf54d664b' => 
    array (
      0 => '/var/www/tpe-1/templates/auto_templates/filtrando_auto.tpl',
      1 => 1633213227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c2c8529f31_23754605 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='GET' action='buscar_auto'>
    Nombre: <input type='text' name='modelo' value=''>
    <input type='submit' value='Buscar' />    
 </form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
