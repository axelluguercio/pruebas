<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:18:57
  from '/var/www/tpe-1/templates/auth_templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c3817f11a5_92742696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ccb5e33ad8d8151638e638b90050c8222c69e50' => 
    array (
      0 => '/var/www/tpe-1/templates/auth_templates/login.tpl',
      1 => 1633213033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c3817f11a5_92742696 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='POST' action='login/'>
    <input type='email' placeholder='example@example.com' name='email' value=''>
    <input type='password' placeholder='Ingrese su password...' name='password' value=''>
   <input type='submit' value='Ingresar' />
</form>

<div>
    <h3> No esta Registrado? <a href='register/'> Registrarse </a>  </h3>
</div>

<div>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['error']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
