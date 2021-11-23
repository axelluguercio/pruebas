"uses strict";

function handlerError(response) {
    if (response.status == 201 || response.status == 200) {
        console.log('acción ejecutada correctamente');
        return true;
    } 
    else if (response.status == 401) {
        app.mess_err = "no tienes permisos";
        return false;
    }
    else {
        console.log('error en la acción');
        return false;
    }
}

// funcion para logearse y obtener un token desde la api
async function authenticate(url, user, pass) {
    try {
        let encode = window.btoa(user+':'+pass);
        let res = await fetch(url, {
            method: 'GET',
            headers: {
                'Authorization': 'Basic ' + encode,
                'Content-Type': 'application/json'
            }});
        let token_json = await res.json();
        return token_json['token'];
    }
    catch (error) {
        console.log('Ocurrio un error' + error);
    }
}

function fetchAll(url) {
    fetch(url)
    .then(response => response.json())
    .then(remarks => {
        app.comts = remarks;
    })
    .catch(error => console.log(error));
}

function getByID(url, id) {
    fetch(url+id)
    .then(response => {
        if (response.ok) 
            response.json()
            .then(remark => app.comts.push(remark));
    })
    .catch(error => console.log(error));
}

async function post(url, object, token_container) {
    try {
        // autentica y almacena el token en json
        if (!token_container) {
            // autentica
            token_container = await authenticate('api/users/token', api_user, window.atob(api_pass));
        }
        let res = await fetch(url, {
                'method': 'POST',
                'headers': {
                    // pasa el token para autenticar el usuario
                    'Authorization': 'Bearer ' + token_container,
                    'Content-Type': 'application/json'
                    },
                    'body': JSON.stringify(object)
            }); 
        let new_id = await res.json();
        // parse to int el nuevo id creado 
        let remark_id = parseInt(new_id);
        getByID(url, remark_id);
    }
    catch (error) {
        console.log('Ocurrio un error' + error);
    }
}

async function remove(url, id_com, token_container) {
    try {
        if (!token_container) {
            // autentica
            token_container = await authenticate('api/users/token', api_user, window.atob(api_pass));
        }
        let res = await fetch(url+id_com, {
                'method': 'DELETE',
                'headers': {
                    // pasa el token para autenticar el usuario
                        'Authorization': 'Bearer ' + token_container,
                        'Content-Type': 'application/json'
                        }
            });
        if (handlerError(res))
            app.comts = app.comts.filter(function(el) {
                return el.id != id_com;
            });
    } catch (error) {
        console.log('Ocurrio un error' + error);
    }
}