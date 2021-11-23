<?php
/* Smarty version 3.1.39, created on 2021-11-23 22:20:10
  from '/var/www/html/tpe-2/templates/vue/vue-crear-comentario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619d691ab83cb4_91536673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b9fe75326abe81586c3e8877641a7f7781c641f' => 
    array (
      0 => '/var/www/html/tpe-2/templates/vue/vue-crear-comentario.tpl',
      1 => 1637690540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619d691ab83cb4_91536673 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="template-vue-crear-comentario">

    <h3 class="h3"> {{ subtitle }} </h3>
    
    <form @submit.prevent="addRemark">
        <div class="mb-3">
            <span>Su opinion:</span>
            <p style="white-space: pre-line;"> {{ message }} </p>
            <br>
            <textarea v-model="message" placeholder="agregar su opinion" class="form-control"></textarea>
        </div>
        <select v-model="selected" class="form-control">
            <option disabled value="">Elija un puntaje</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
            <span>Puntaje seleccionado: {{ selected }} </span>
        </select> 
        <input type="submit" value="comentar" class="btn btn-primary">
    </form>
</section>

<?php }
}
