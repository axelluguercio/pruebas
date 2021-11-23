<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:15:25
  from '/var/www/html/tpe-2/templates/marca_templates/marcas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d67fd47ebb1_09869657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd6d6eff7f68a114a7f752291be842815086449b' => 
    array (
      0 => '/var/www/html/tpe-2/templates/marca_templates/marcas.tpl',
      1 => 1637704848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619d67fd47ebb1_09869657 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<table class="table table-striped">
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

<div class="mb-3">
    <?php if ((isset($_smarty_tpl->tpl_vars['pag']->value))) {?>
        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['pag']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pag']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
        <a href='home/?pagina=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
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
