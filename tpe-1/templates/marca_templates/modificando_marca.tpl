{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='modificar_marca/{$marca->id_marca}'>
    Nombre: <input type='text' name='nombre' value='{$marca->nombre}'>
    Origen: <input type='text' name='origen' value='{$marca->origen}'>
    <input type='submit' value='Modificar' />
</form>

{include file='../footer.tpl'}
