<?php

class remarkModel {

private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=mysql-server;'.'dbname=automotriz;charset=utf8', 'axel', 'password');
        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function set($desc, $punt, $id_author, $id_item){

        $query = $this->db->prepare('INSERT INTO comentario (descripcion, puntucion, id_usuario, id_auto) VALUES (?, ?, ?, ?)');
        $query->execute([$desc, $punt, $id_author, $id_item]);
        
        // 3. Obtengo y devuelo el ID de la tarea nueva
        return $this->db->lastInsertId();
    }

    // funcion para retorna rel user dado el mail
    function getbyId($id) {

        try {
            $sql = 'SELECT c.id, c.descripcion, c.puntuacion, a.modelo, a.anio, u.nombre FROM comentario as c JOIN auto as a ON a.id_auto = c.id_auto JOIN usuario as u ON u.id_usuario = c.id_usuario WHERE id = ?';
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            $remark = $query->fetch(PDO::FETCH_OBJ);

            return $remark;
        }
        catch (PDOException $error) {

            return $error->getMessage();  
        }    
    }

    // retornar todos los comentarios 
    function getAll() {

        try {

            $sql = 'SELECT c.id, c.descripcion, c.puntuacion, a.modelo, a.anio, u.nombre FROM comentario as c JOIN auto as a ON a.id_auto = c.id_auto JOIN usuario as u ON u.id_usuario = c.id_usuario';
            $query = $this->db->prepare($sql);
            $query->execute();
            $remarks = $query->fetchAll(PDO::FETCH_OBJ);

            return $remarks;
        }
        catch (PDOException $error) {

            return $error->getMessage();  
        }    
    }

    function delete($id) {
        try {

            $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
            $query->execute([$id]);
            $remark = $query->fetch(PDO::FETCH_OBJ);

            // imprime cuantas filas eliminadas
            echo $query->rowCount() . ' filas eliminadas ';
        }
        catch (PDOException $error) {

            return $error->getMessage();  
        }    
    }
    
    function post($desc, $punt, $obj, $auth) {
        try {
            $query = $this->db->prepare('INSERT INTO comentario (descripcion, puntuacion, id_usuario, id_auto) VALUES (?, ?, ?, ?)');
            $query->execute([$desc, $punt, $auth, $obj]);
        
            // 3. Obtengo y devuelo el ID nuevo
            return $this->db->lastInsertId();
        }
        catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    function put($id, $desc, $punt, $auth, $obj) {
        try {

            $query = $this->db->prepare('UPDATE comentario SET descripcion=?, puntuacion=?, id_usuario=?, id_auto=? WHERE id=?');
            return $query->execute([$desc, $punt, $auth, $obj, $id]);
            
        }
        catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    function query_remark_auto($id_auto, $filter=false, $value=null) {
        try {
            $sql = 'SELECT c.id, c.descripcion, c.puntuacion, a.modelo, a.anio, u.nombre FROM comentario as c JOIN auto as a ON a.id_auto = c.id_auto JOIN usuario as u ON u.id_usuario = c.id_usuario WHERE c.id_auto=?';
            if ($filter && !empty($value)) {
                $query = $this->db->prepare($sql. ' AND c.puntuacion = ?');
                $query->execute([$id_auto, $value]);
            } else {
                $query = $this->db->prepare('SELECT c.id, c.descripcion, c.puntuacion, a.modelo, a.anio, u.nombre FROM comentario as c JOIN auto as a ON a.id_auto = c.id_auto JOIN usuario as u ON u.id_usuario = c.id_usuario WHERE c.id_auto=?');
                $query->execute([$id_auto]);
            }
            
            $remarks = $query->fetchAll(PDO::FETCH_OBJ);
            return $remarks;
        }
        catch (PDOException $error) {
            return $error->getMessage();
        }
    }
}

?>