{include file='header.tpl'}

<div class='mb-3'>
    <form name='formulario' method='GET' action='buscar'>
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='' class="form-control">
        Marca:
            <select name='id_marca' class="form-control">
                <option value=''>
                {foreach from=$marcas item=marca}
                    <option value='{$marca->id_marca}'> {$marca->nombre} </option> 
                {/foreach}
            </select>
        <input type='submit' value='Buscar' class="btn btn-primary" />
    </form>
</div>

<div class="mb-3">
    <table class="table table-striped">
        <thead>
        <th>
        <tr>
            <td> Modelo </td>
            <td> Año de fabricacion </td>
            <td> Marca </td>
        </tr>
        </th>
        </thead> 
        <tbody>
            {if isset({$autos})}
                {foreach from=$autos item=auto}
                    <tr>
                    <td> <img src='{$auto->img}' height='30px' widht='30px'> </td>
                    <td> <a href='auto/{$auto->id_auto}'> {$auto->modelo} </td> 
                    <td> {$auto->anio} </td>
                    </tr>
                {/foreach}
            {/if}
        </tbody>
    </table>
</div>

<div class="mb-3">
    {if isset($pag)}
        {for $foo=1 to $pag}
        <a href='home/?pagina={$foo}'> {$foo} </a>
        {/for}
    {/if}
</div>

{include file='footer.tpl'}