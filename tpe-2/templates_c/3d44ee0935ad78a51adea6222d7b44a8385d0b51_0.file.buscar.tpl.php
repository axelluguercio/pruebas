<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:17:36
  from '/var/www/html/tpe-2/templates/buscar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d68805befe5_97602817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d44ee0935ad78a51adea6222d7b44a8385d0b51' => 
    array (
      0 => '/var/www/html/tpe-2/templates/buscar.tpl',
      1 => 1637697545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_619d68805befe5_97602817 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class='mb-3'>
    <form name='formulario' method='GET' action='buscar'>
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='' class="form-control">
        Marca:
            <select name='id_marca' class="form-control">
                <option value=''>
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
        <input type='submit' value='Buscar' class="btn btn-primary" />
    </form>
</div>

<div class="mb-3">
    <table class="table table-striped">
        <thead>
        <th>
        <tr>
            <td> Modelo </td>
            <td> Año de fabricacion </td>
            <td> Marca </td>
        </tr>
        </th>
        </thead> 
        <tbody>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['autos']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
                    <tr>
                    <td> <img src='<?php echo $_smarty_tpl->tpl_vars['auto']->value->img;?>
' height='30px' widht='30px'> </td>
                    <td> <a href='auto/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'> <?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
 </td> 
                    <td> <?php echo $_smarty_tpl->tpl_vars['auto']->value->anio;?>
 </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </tbody>
    </table>
</div>

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

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
