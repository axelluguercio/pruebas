<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:05:54
  from '/var/www/tpe-1/templates/auto_templates/autos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c072ab09e3_94438582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2907aba08e27132cc5285b113ffccb7697f43d6b' => 
    array (
      0 => '/var/www/tpe-1/templates/auto_templates/autos.tpl',
      1 => 1634058350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c072ab09e3_94438582 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['marca']->value))) {?>
<h1> <?php echo $_smarty_tpl->tpl_vars['marca']->value;?>
 </h1>
<?php }?>

<table>
    <thead>
        <th>
            <tr>
            <td> Modelo </td>
            <td> Año </td>
            </tr>
        </th>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?> 
	    <tr>
		<td> <?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
 </td> 
                <td> <?php echo $_smarty_tpl->tpl_vars['auto']->value->anio;?>
 </td>
            <?php if (empty($_smarty_tpl->tpl_vars['buttons']->value)) {?>
                <td> <a href='borrar_auto/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'> eliminar </a> </td>
                <td> <a href='modificar_auto/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'> editar </a> </td>
            <?php } else { ?> 
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['buttons']->value, 'button');
$_smarty_tpl->tpl_vars['button']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['button']->value) {
$_smarty_tpl->tpl_vars['button']->do_else = false;
?> 
                    <td> <a href='<?php echo $_smarty_tpl->tpl_vars['button']->value['action'];?>
/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'> <?php echo $_smarty_tpl->tpl_vars['button']->value['nombre'];?>
 </a> </td>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
            <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
