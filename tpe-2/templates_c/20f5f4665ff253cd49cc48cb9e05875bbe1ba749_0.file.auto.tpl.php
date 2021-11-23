<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:41:44
  from '/var/www/html/tpe-2/templates/auto_templates/auto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d6e28278a32_98928394',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20f5f4665ff253cd49cc48cb9e05875bbe1ba749' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auto_templates/auto.tpl',
      1 => 1637707301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:vue/vue-crear-comentario.tpl' => 1,
    'file:vue/vue-comentarios.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619d6e28278a32_98928394 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="mb-3">
    <img src='<?php echo $_smarty_tpl->tpl_vars['auto']->value->img;?>
' height="50px" weight="65px">
</div>
<div class="mb-3" id='div-data' data-auto="<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
" data-auto-modelo="<?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
" data-user-id="<?php echo $_SESSION['ID_USER'];?>
" data-api-pass='<?php echo $_SESSION['PASSWORD'];?>
' data-api-user='<?php echo $_SESSION['USERNAME'];?>
'>
    <h2> <?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
 </h2>
    <p> modelo <?php echo $_smarty_tpl->tpl_vars['auto']->value->anio;?>
 </p>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:vue/vue-crear-comentario.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:vue/vue-comentarios.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src= "<?php echo BASE_URL;?>
/js/fetchs.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src= "<?php echo BASE_URL;?>
/js/dataset.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src= "<?php echo BASE_URL;?>
/js/comentario-auto.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src= "<?php echo BASE_URL;?>
/js/crear_comentario.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
