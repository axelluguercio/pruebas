{include file='../header.tpl'}

{if {$titulo}}
    <h1 class="h1"> {$titulo} </h1>
{else} 
    <h1 class="h1"> {$marca->nombre} </h1>
{/if}

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
        {foreach from=$autos item=auto} 
	    <tr>
            <td> <img src="{$auto->img}" height="15px" weight="15px"> </td>
		    <td> <a href='auto/{$auto->id_auto}'> {$auto->modelo} </a> </td> 
            <td> {$auto->anio} </td>
            {if empty($buttons)}
                <td> <a href='borrar_auto/{$auto->id_auto}'> eliminar </a> </td>
                <td> <a href='modificar_auto/{$auto->id_auto}'> editar </a> </td>
            {else} 
                {foreach from=$buttons item=button} 
                    <td> <a href='{$button['action']}/{$marca->id_marca}/{$auto->id_auto}'> {$button['nombre']} </a> </td>
                {/foreach} 
            {/if}
        </tr>
        {/foreach} 
    </tbody>
</table>
<div class="mb-3">
    {if isset($pag)}
        {for $foo=1 to $pag}
            {if !isset({$marca->nombre})}
                <a href='autos/?pagina={$foo}'> {$foo} </a>
            {else}
                <a href='mostrar_autos_marca/{$marca->id_marca}/?pagina={$foo}'> {$foo} </a>
            {/if}
        {/for}
    {/if}
</div>

{include file='../footer.tpl'}
