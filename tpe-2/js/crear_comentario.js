"use strict";

let app_crear_comentario = new Vue({
    el: '#template-vue-crear-comentario',
    data: {
      subtitle: 'agregar un comentario',
      selected: '',
      message: '',
      token: ''
    },
    methods: {
        addRemark: function() {
            let remark = {
                descripcion: this.message, 
                puntuacion: this.selected,
                id_auto: id_auto,
                id_usuario: id_user};
            post(url, remark, this.token);
        }
    }
});

