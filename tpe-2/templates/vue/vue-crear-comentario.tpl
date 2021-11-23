{literal}
<section id="template-vue-crear-comentario">

    <h3 class="h3"> {{ subtitle }} </h3>
    
    <form @submit.prevent="addRemark">
        <div class="mb-3">
            <span>Su opinion:</span>
            <p style="white-space: pre-line;"> {{ message }} </p>
            <br>
            <textarea v-model="message" placeholder="agregar su opinion" class="form-control"></textarea>
        </div>
        <select v-model="selected" class="form-control">
            <option disabled value="">Elija un puntaje</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
            <span>Puntaje seleccionado: {{ selected }} </span>
        </select> 
        <input type="submit" value="comentar" class="btn btn-primary">
    </form>
</section>

{/literal}