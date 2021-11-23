{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='buscar_marca'>
    Nombre: <input type='text' name='nombre' value=''>
    <input type='submit' value='Buscar' />
</form>

{include file='../footer.tpl'}
