{include file='../header.tpl'}

{if isset($marca)}
<h1> {$marca} </h1>
{/if}

<table>
    <thead>
        <th>
            <tr>
            <td> Modelo </td>
            <td> Año </td>
            </tr>
        </th>
    </thead>
    <tbody>
        {foreach from=$autos item=auto} 
	    <tr>
		<td> {$auto->modelo} </td> 
                <td> {$auto->anio} </td>
            {if empty($buttons)}
                <td> <a href='borrar_auto/{$auto->id_auto}'> eliminar </a> </td>
                <td> <a href='modificar_auto/{$auto->id_auto}'> editar </a> </td>
            {else} 
                {foreach from=$buttons item=button} 
                    <td> <a href='{$button['action']}/{$id}/{$auto->id_auto}'> {$button['nombre']} </a> </td>
                {/foreach} 
            {/if}
            </tr>
        {/foreach} 
    </tbody>
</table>

{include file='../footer.tpl'}
