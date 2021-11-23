<?php

class userModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=mysql-server;'.'dbname=automotriz;charset=utf8', 'axel', 'password');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // verifica el email para no ingresar 2 veces
    function verifyUser($email) {
    
        $query = $this->db->prepare('SELECT email FROM usuario WHERE email = ?');
        return $query->execute([$email]);
    }

    function createUser($nombre, $email, $password){
    
        $query = $this->db->prepare('INSERT INTO usuario (nombre, email, contraseña, permisos) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $email, $password, 'U']); // crea el user sin permisos de administrador
        
        // 3. Obtengo y devuelo el ID de la tarea nueva
        return $this->db->lastInsertId();
    }

    // funcion para retorna rel user dado el mail
    function getUserbyEmail($email) {

        try {

            $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
            $query->execute([$email]);
            $user = $query->fetch(PDO::FETCH_OBJ);

            return $user;

        }
        catch (PDOException $error) {
    
            return $error->getMessage();
            
        }    
    }

    function getUsers() {
        try {

            // id user 6 es el admin principal no se modifica
            $query = $this->db->prepare('SELECT * FROM usuario WHERE id_usuario <> 6');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_OBJ);

            return $users;

        }
        catch (PDOException $error) {
            return $error->getMessage();
            
        }    
    }

    // funcion para modificar los permisos de usuario
    function changePermissions($id_user, $perm) {
        try {

            $query = $this->db->prepare('UPDATE usuario SET permisos=? WHERE id_usuario=?');
            $query->execute([$perm, $id_user]);
            
        }
        catch (PDOException $error) {
            $error->getMessage();

            echo $error;
        }
    }

    function drop($id_user) {
        try {
            
            $query = $this->db->prepare('DELETE from usuario where id_usuario = ?');
            $query->execute([$id_user]);

        }
        catch (PDOException $error) {

            // devuelve el error y lo imprime
            $error->getMessage();
    
            echo $error;
        }
    }
}

?>