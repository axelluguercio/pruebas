"uses strict";

// agarra el div con el dataset
const data = document.querySelector('#div-data');

// credenciales
let api_pass = data.getAttribute('data-api-pass');
let api_user = data.getAttribute('data-api-user');
let id_auto = data.getAttribute('data-auto');
let modelo = data.getAttribute('data-auto-modelo');
let id_user = data.getAttribute('data-user-id');
let name_user = data.getAttribute('data-user-name');