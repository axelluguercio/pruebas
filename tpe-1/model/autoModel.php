<?php

class autoModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=automotriz;charset=utf8', 'axel', 'password');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getAllAutos() {

        // 2. Enviamos la consulta
        $query = $this->db->prepare('SELECT * FROM auto');
        $query->execute();
    
        // 3. obtengo la respuesta de la DB
        $autos = $query->fetchAll(PDO::FETCH_OBJ);

        return $autos;
    }

    function getAutoByName($modelo) {
        try {

            $query = $this->db->prepare('SELECT * FROM auto WHERE modelo LIKE ?');
            $query->execute(['%'.$modelo.'%']);
            $autos = $query->fetchAll(PDO::FETCH_OBJ);

            return $autos;

        }
        catch (PDOException $error) {
    
            $error->getMessage();
    
            echo $error;
        }    
    }

    function getAuto($id) {

        // 2. Enviamos la consulta
        $query = $this->db->prepare('SELECT * FROM auto WHERE id_auto=? ');
        $query->execute([$id]);
    
        // 3. obtengo la respuesta de la DB
        $auto = $query->fetch(PDO::FETCH_OBJ);

        return $auto;
    }

    // verifica el modelo para no ingresar 2 veces
    function verifyAuto($modelo) {
    
        $query = $this->db->prepare('SELECT modelo FROM auto WHERE modelo = ?');
        return $query->execute([$modelo]);
    
    }

    function insertAuto($modelo, $anio, $marca) {
    
        $query = $this->db->prepare('INSERT INTO auto (modelo, anio, id_marca) VALUES (?, ?, ?)');
        $query->execute([$modelo, $anio, $marca]);
    
         // 3. Obtengo y devuelo el ID de la tarea nueva
         return $this->db->lastInsertId();
    }

    function deleteAuto($id) {
        try {
            
           
            $query = $this->db->prepare('DELETE from auto where id_auto = ?');
            $query->execute([$id]);

            // imprime cuantas filas eliminadas
            echo $query->rowCount() . ' fila(s) eliminadas ';
        }
        catch (PDOException $error) {

            // devuelve el error y lo imprime
            $error->getMessage();
    
            echo $error;
        }
    }

    /*/ Funcion para modificar la auto /*/
    function alterAuto($id, $modelo, $anio, $marca){
        try {

            $query = $this->db->prepare('UPDATE auto SET modelo=?, anio=?, id_marca=? WHERE id_auto=?');
            $query->execute([$modelo, $anio, $marca, $id]);
    
            echo $query->rowCount() . ' filas modificadas ';
        }
        catch (PDOException $error) {
            $error->getMessage();

            echo $error;
        }
    }
}

?>
