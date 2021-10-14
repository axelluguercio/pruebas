<?php

class userModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=automotriz;charset=utf8', 'axel', 'password');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // verifica el email para no ingresar 2 veces
    function verifyUser($email) {
    
        $query = $this->db->prepare('SELECT email FROM usuario WHERE email = ?');
        return $query->execute([$email]);
    }

    function createUser($nombre, $email, $password){
    
        $query = $this->db->prepare('INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)');
        $query->execute([$nombre, $email, $password]);
        
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

}

?>