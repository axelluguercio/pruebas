{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='insertar_marca'>
    Nombre: <input type='text' name='nombre' value=''>
    Origen: <input type='text' name='origen' value=''>
   <input type='submit' value='Crear' />
</form>

{include file='../footer.tpl'}
