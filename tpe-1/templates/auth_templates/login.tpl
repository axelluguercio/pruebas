{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='POST' action='login/'>
    <input type='email' placeholder='example@example.com' name='email' value=''>
    <input type='password' placeholder='Ingrese su password...' name='password' value=''>
   <input type='submit' value='Ingresar' />
</form>

<div>
    <h3> No esta Registrado? <a href='register/'> Registrarse </a>  </h3>
</div>

<div>
    {if isset({$error})}
        {$error}
    {/if}
</div>

{include file='../footer.tpl'}