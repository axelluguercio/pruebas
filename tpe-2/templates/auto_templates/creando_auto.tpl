{include file='../header.tpl'}

<h1 class="mb-3"> {$titulo} </h1>
<form name='formulario' method='POST' action='insertar_auto' enctype='multipart/form-data'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Cargar imagen</label>
        <input type="file" name="img" class="form-control">
    </div>
    <select name='id_marca' class="form-control">;
	    {foreach from=$marcas item=marca}
		<option value='{$marca->id_marca}'> {$marca->nombre} </option> 
	    {/foreach}
	</select>
    <input type='submit' value='Crear' class="btn btn-primary">
</form>

{include file='../footer.tpl'}
