{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='modificar_auto/'>
    Modelo: <input type='text' name='modelo' value='{$auto->modelo}'>
    Año: <input type='text' name='anio' value='{$auto->anio}'>
     <select name='id_marca'>
	    {foreach from=$marcas item=marca}
            {if {$marca->id_marca} eq {$auto->id_marca}}
		        <option value='{$marca->id_marca}' selected='selected'> {$marca->nombre} </option> 
            {else}
                <option value='{$marca->id_marca}'> {$marca->nombre} </option> 
            {/if}
	    {/foreach}
	</select>
    <input type='submit' value='Modificar' />
</form>

{include file='../footer.tpl'}