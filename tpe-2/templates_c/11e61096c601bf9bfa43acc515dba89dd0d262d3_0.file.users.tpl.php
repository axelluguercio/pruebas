<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:15:54
  from '/var/www/html/tpe-2/templates/auth_templates/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d681a8f2203_91949910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11e61096c601bf9bfa43acc515dba89dd0d262d3' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auth_templates/users.tpl',
      1 => 1637705752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619d681a8f2203_91949910 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<table class="table table-striped">
    <thead>
        <th>
            <tr>
            <td> nombre </td>
            <td> mail </td>
            </tr>
        </th>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?> 
	    <tr>
		    <td>  <?php echo $_smarty_tpl->tpl_vars['user']->value->nombre;?>
 </td> 
            <td> <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
 </td>
            <td> <a href='elim_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->id_usuario;?>
'> eliminar usuario </a> </td>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value->permisos;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 'U') {?>
                <td> <a href='mod_perm/<?php echo $_smarty_tpl->tpl_vars['user']->value->id_usuario;?>
?permisos=A'> agregar permisos adm </a> </td>
            <?php } else { ?>
                <td> <a href='mod_perm/<?php echo $_smarty_tpl->tpl_vars['user']->value->id_usuario;?>
?permisos=U'> quitar permisos adm </a> </td>
            <?php }?>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    </tbody>
</table>
<div class='mb-3'>
    <?php if ((isset($_smarty_tpl->tpl_vars['pag']->value))) {?>
        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['pag']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pag']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
            <a href='usuarios/?pagina=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
 </a>
        <?php }
}
?>
    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
