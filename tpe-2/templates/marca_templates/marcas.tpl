{include file='../header.tpl'}

<h1 class="h1"> {$titulo} </h1>

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
    {foreach from=$marcas item=marca}
        <tr>
	    <td> <a href='mostrar_autos_marca/{$marca->id_marca}'> {$marca->nombre} </a> </td> 
            <td> {$marca->origen} </td>
	    <td> <a href='borrar_marca/{$marca->id_marca}'> eliminar </a> </td>
	    <td> <a href='modificar_marca/{$marca->id_marca}'> editar </a> </td>
        </tr>
    {/foreach}
    </tbody>
</table>

<div class="mb-3">
    {if isset($pag)}
        {for $foo=1 to $pag}
        <a href='home/?pagina={$foo}'> {$foo} </a>
        {/for}
    {/if}
</div>

{include file='../footer.tpl'}
