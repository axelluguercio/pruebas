{include file='../header.tpl'}

<table>
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

{include file='../footer.tpl'}
