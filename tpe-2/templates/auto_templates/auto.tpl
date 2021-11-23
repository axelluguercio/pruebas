{include file='../header.tpl'}

<div class="mb-3">
    <img src='{$auto->img}' height="50px" weight="65px">
</div>
<div class="mb-3" id='div-data' data-auto="{$auto->id_auto}" data-auto-modelo="{$auto->modelo}" data-user-id="{$smarty.session.ID_USER}" data-api-pass='{$smarty.session.PASSWORD}' data-api-user='{$smarty.session.USERNAME}'>
    <h2> {$auto->modelo} </h2>
    <p> modelo {$auto->anio} </p>
</div>

{include file="vue/vue-crear-comentario.tpl"}
{include file="vue/vue-comentarios.tpl"}

<script src= "{BASE_URL}/js/fetchs.js"></script>
<script src= "{BASE_URL}/js/dataset.js"></script>
<script src= "{BASE_URL}/js/comentario-auto.js"></script>
<script src= "{BASE_URL}/js/crear_comentario.js"></script>

{include file='../footer.tpl'}