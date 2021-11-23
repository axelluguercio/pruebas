<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
     <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title> {$titulo} </title>
</head>
<body class="d-flex flex-column min-vh-100">
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">automotriz</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {if isset($smarty.session.ID_USER)}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home/"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buscar/"> Buscar </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crear_marca/"> Nueva Marca </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="autos/"> Autos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insertar_auto/"> Nuevo Auto </a>
                        </li>
                        {if $smarty.session.PERMISSIONS == A}
                            <li class="nav-item">
                            <a class="nav-link" href="usuarios/"> Usuarios </a>
                            </li>
                        {/if}
                        <li class="nav-item">
                        <a class="nav-link" href="logout/"> Salir </a>
                        </li>
                    {else}
                        <li class="nav-item">
                        <a class="nav-link" " href="register/"> Registrarse </a>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
</header>
