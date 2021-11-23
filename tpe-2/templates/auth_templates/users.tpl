{include file='../header.tpl'}

<h1 class="h1"> {$titulo} </h1>

<table class="table table-striped">
    <thead>
        <th>
            <tr>
            <td> nombre </td>
            <td> mail </td>
            </tr>
        </th>
    </thead>
    <tbody>
        {foreach from=$users item=user} 
	    <tr>
		    <td>  {$user->nombre} </td> 
            <td> {$user->email} </td>
            <td> <a href='elim_user/{$user->id_usuario}'> eliminar usuario </a> </td>
            {if {$user->permisos} == U}
                <td> <a href='mod_perm/{$user->id_usuario}?permisos=A'> agregar permisos adm </a> </td>
            {else}
                <td> <a href='mod_perm/{$user->id_usuario}?permisos=U'> quitar permisos adm </a> </td>
            {/if}
        </tr>
        {/foreach} 
    </tbody>
</table>
<div class='mb-3'>
    {if isset($pag)}
        {for $foo=1 to $pag}
            <a href='usuarios/?pagina={$foo}'> {$foo} </a>
        {/for}
    {/if}
</div>

{include file='../footer.tpl'}