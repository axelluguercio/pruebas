<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title> {$titulo} </title>
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
                    {if isset($smarty.session.ID_USER)}
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
                    {else}
                        <li class="">
                        <a class="" href="register/"> Registrarse </a>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
</header>
