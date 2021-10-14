<?php
/* Smarty version 3.1.39, created on 2021-10-12 14:01:38
  from '/var/www/tpe-1/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165bf72b41c80_45617015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5ebb57cb30a98fbd584fe1ac652476ba0640a1f' => 
    array (
      0 => '/var/www/tpe-1/templates/header.tpl',
      1 => 1633278118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6165bf72b41c80_45617015 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </title>
</head>
<body>
<header>
    <nav class="">
        <div class="">
            <a class="" href="home/"> Marcas y sus autos </a>
            <button class="" type="button">
                <span class=""></span>
            </button>
            <div class="" id="">
                <ul class="">
                    <?php if ((isset($_SESSION['ID_USER']))) {?>
                        <li class="">
                            <a class="" href="home/"> Home </a>
                        </li>
                        <li class="">
                        <a class="" href="buscar_marca/"> Buscar Marca </a>
                        </li>
                        <li class="">
                        <a class="" href="crear_marca/"> Crear Nueva Marca </a>
                        </li>
                        <li class="">
                        <a class="" href="autos/"> Ver Autos </a>
                        </li>
                        <li class="">
                        <a class="" href="buscar_auto/"> Buscar Auto </a>
                        </li>
                        <li class="">
                        <a class="" href="insertar_auto/"> Crear Nueva Auto </a>
                        </li>
                        <li class="">
                        <a class="" href="logout/"> Salir </a>
                        </li>
                    <?php } else { ?>
                        <li class="">
                        <a class="" href="register/"> Registrarse </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php }
}
