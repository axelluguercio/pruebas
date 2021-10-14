<?php

class marcaModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=automotriz;charset=utf8', 'axel', 'password');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getAllMarcas() {

        // 2. Enviamos la consulta
        $query = $this->db->prepare('SELECT * FROM marca');
        $query->execute();
    
        // 3. obtengo la respuesta de la DB
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);

        return $marcas;
    }

    function getMarcaByName($valor, $index=0) {
        try {

            if ($index == 0) {
                $query = $this->db->prepare('SELECT * FROM marca WHERE nombre LIKE ?');
                $query->execute(['%'.$valor.'%']);
            } else {
                $query = $this->db->prepare('SELECT * FROM marca WHERE id_marca LIKE ?');
                $query->execute([$valor]);
            }
            
            $marcas = $query->fetchall(PDO::FETCH_OBJ);

            return $marcas;

        }
        catch (PDOException $error) {
    
            $error->getMessage();
    
            echo $error;
        }    
    }

    function getMarca($id) {

        // 2. Enviamos la consulta
        $query = $this->db->prepare('SELECT * FROM marca WHERE id_marca=? ');
        $query->execute([$id]);
    
        // 3. obtengo la respuesta de la DB
        $marca = $query->fetch(PDO::FETCH_OBJ);

        return $marca;
    }

    // verifica el nombre para no ingresar 2 veces
    function verifyMarca($nombre) {
    
        $query = $this->db->prepare('SELECT nombre FROM marca WHERE nombre = ?');
        return $query->execute([$nombre]);
    
        //return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertMarca($nombre, $origen) {
    
        $query = $this->db->prepare('INSERT INTO marca (nombre, origen) VALUES (?, ?)');
        $query->execute([$nombre, $origen]);
    
         // 3. Obtengo y devuelo el ID de la tarea nueva
         return $this->db->lastInsertId();
    }

    function deleteMarca($id) {
        try {
            
            $query = $this->db->prepare('DELETE from marca where id_marca = ?');
            $query->execute([$id]);

            // imprime cuantas filas eliminadas
            echo $query->rowCount() . ' filas eliminadas ';
        }
        catch (PDOException $error) {

            // devuelve el error y lo imprime
            $error->getMessage();
    
            echo $error;
        }
    }

    /*/ Funcion para modificar la marca /*/
    function alterMarca($id, $nombre, $origen){
        try {

            $query = $this->db->prepare('UPDATE marca SET nombre=?, origen=? WHERE id_marca=?');
            $query->execute([$nombre, $origen, $id]);
    
            echo $query->rowCount() . ' filas modificadas ';
        }
        catch (PDOException $error) {
            $error->getMessage();

            echo $error;
        }
    }

    /*/ !!!!!!!!!!!!!!!!!!!!!!! ------ MARCAS AUTOS --------!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! /*/

    function getAllAutosFromMarca($id_marca) {
    
        // 2. Enviamos la consulta (almacena la sentencia en una variable)
        $sql = 'SELECT m.id_auto, m.modelo, m.anio FROM auto as m WHERE m.id_marca = ?';
        
        $query = $this->db->prepare($sql);
        $query->execute([$id_marca]);
    
        // 3. obtengo la respuesta de la DB
        $autos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $autos;
    }
} 

?>
