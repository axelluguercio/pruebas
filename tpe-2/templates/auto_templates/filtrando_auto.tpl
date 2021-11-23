{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='GET' action='buscar_auto'>
    Nombre: <input type='text' name='modelo' value=''>
    <input type='submit' value='Buscar' />    
 </form>

{include file='../footer.tpl'}
