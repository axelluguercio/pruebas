{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='modificar_marca/{$marca->id_marca}'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type='text' name='nombre' value='{$marca->nombre}' class="form-control">
         <label for="exampleInputEmail1" class="form-label">Origen</label>
        <input type='text' name='origen' value='{$marca->origen}' class="form-control">
    </div>
    <input type='submit' value='Modificar' class="btn btn-primary" />
</form>

{include file='../footer.tpl'}
