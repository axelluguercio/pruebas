<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:59:40
  from '/var/www/html/tpe-2/templates/vue/vue-comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d725c863968_18936877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccf194fe7022d856c6b7a1adc7887b884a7fc784' => 
    array (
      0 => '/var/www/html/tpe-2/templates/vue/vue-comentarios.tpl',
      1 => 1637708378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619d725c863968_18936877 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="template-vue-comentarios">
    <div class="mb-3">
        <h3 class="h3"> {{ subtitle }} </h3>
        <form name='formulario' method='GET'>
            <label for="exampleInputEmail1" class="form-label">Filtrar por puntuacion</label>
            <select v-model="filtro" class="form-control">
                <option disabled value="">Elija un puntaje</option>
                <option value=''></option>
                <option value='1'> 1 </option> 
                <option value='2'> 2 </option>
                <option value='3'> 3 </option>
                <option value='4'> 4 </option>
                <option value='5'> 5 </option>
            </select>
            <button @click="handlerFilter" :value='filtro' class="btn btn-primary"> Filtrar </button>
        </form>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item" v-for="comt in comts">
                <span> {{ comt.modelo }} - {{ comt.nombre }} - {{ comt.descripcion }} - {{ comt.puntuacion }} </span> 
                <button @click="handlerButton" :value="comt.id" class="btn btn-secondary"> Eliminar </button>
            </li> 
            <div class='mb-2'>
                    {{ mess_err }}
            </div>
        </ul>
    </div>
</section>

<?php }
}
