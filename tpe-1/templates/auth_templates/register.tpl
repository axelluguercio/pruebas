{include file='../header.tpl'}

<h1> {$titulo} </h1>

<form name='formulario' method='POST' action='register/'>
    Nombre: <input type='text' name='nombre' value=''>
    Email: <input type='email' placeholder='example@example.com' name='email' value=''>
    Contraseña: <input type='password' placeholder='minimo 6 caracteres' name='password' value=''>
   <input type='submit' value='Registrarse' />
</form>

<div>
    {if isset({$error})}
        {$error}
    {/if}
</div>

{include file='../footer.tpl'}