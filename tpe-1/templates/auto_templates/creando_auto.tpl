{include file='../header.tpl'}

<h1> {$titulo} </h1>
<form name='formulario' method='GET' action='insertar_auto'>
    Modelo: <input type='text' name='modelo' value=''>
    Año: <input type='text' name='anio' value=''>
    <select name='id_marca'>";
	    {foreach from=$marcas item=marca}
		<option value='{$marca->id_marca}'> {$marca->nombre} </option> 
	    {/foreach}
	</select>
    <input type='submit' value='Crear' />
</form>

{include file='../footer.tpl'}
