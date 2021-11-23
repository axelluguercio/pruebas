<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:16:46
  from '/var/www/html/tpe-2/templates/auto_templates/autos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d684e9b0681_14414758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cd58adc10fa19cb125f3c85f158b61124edca64' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auto_templates/autos.tpl',
      1 => 1637705718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619d684e9b0681_14414758 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php ob_start();
echo $_smarty_tpl->tpl_vars['titulo']->value;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
    <h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>
<?php } else { ?> 
    <h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
 </h1>
<?php }?>

<table class="table table-striped">
    <thead>
        <th>
            <tr>
            <td> Foto </td>
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
            <td> <img src="<?php echo $_smarty_tpl->tpl_vars['auto']->value->img;?>
" height="15px" weight="15px"> </td>
		    <td> <a href='auto/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'> <?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
 </a> </td> 
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
/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
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
<div class="mb-3">
    <?php if ((isset($_smarty_tpl->tpl_vars['pag']->value))) {?>
        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['pag']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pag']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['marca']->value->nombre;
$_prefixVariable2 = ob_get_clean();
if (!(isset($_prefixVariable2))) {?>
                <a href='autos/?pagina=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
 </a>
            <?php } else { ?>
                <a href='mostrar_autos_marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
/?pagina=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
 </a>
            <?php }?>
        <?php }
}
?>
    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
