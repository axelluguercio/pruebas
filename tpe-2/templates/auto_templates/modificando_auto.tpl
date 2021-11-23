{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='POST' action='modificar_auto/' enctype='multipart/form-data'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='{$auto->modelo}' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='{$auto->anio}' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Cargar imagen</label>
        <input type="file" name="img" class="form-control">
    </div>
    <select name='id_marca' class="form-control">
	    {foreach from=$marcas item=marca}
            {if {$marca->id_marca} eq {$auto->id_marca}}
		        <option value='{$marca->id_marca}' selected='selected'> {$marca->nombre} </option> 
            {else}
                <option value='{$marca->id_marca}'> {$marca->nombre} </option> 
            {/if}
	    {/foreach}
	</select>
    <input type='submit' value='Modificar' class="btn btn-primary" />
</form>

{include file='../footer.tpl'}