<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:05:23
  from '/var/www/tpe-1/templates/marca_templates/marcas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165c053d33981_21803543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2927b2ef019d7734a6f562eef12cb3685a80561f' => 
    array (
      0 => '/var/www/tpe-1/templates/marca_templates/marcas.tpl',
      1 => 1633277192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_6165c053d33981_21803543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table>
    <thead>
    <th>
    <tr>
        <td> Nombre </td>
        <td> Origen </td>
    </tr>
    </th>
    </thead> 
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
        <tr>
	    <td> <a href='mostrar_autos_marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'> <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
 </a> </td> 
            <td> <?php echo $_smarty_tpl->tpl_vars['marca']->value->origen;?>
 </td>
	    <td> <a href='borrar_marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'> eliminar </a> </td>
	    <td> <a href='modificar_marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'> editar </a> </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
