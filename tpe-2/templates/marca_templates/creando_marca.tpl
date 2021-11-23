{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='insertar_marca'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre marca</label>
        <input type='text' name='nombre' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Origen</label>
        <input type='text' name='origen' value='' class="form-control">
    </div>
   <input type='submit' value='Crear' class="btn btn-primary" />
</form>

{include file='../footer.tpl'}
