<?php

class marcaModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=mysql-server;'.'dbname=automotriz;charset=utf8', 'axel', 'password');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // devuelve la cuenta de totales
    function countAllMarcas() {
        $query = $this->db->prepare('SELECT COUNT(*) AS total FROM marca');
        $query->execute();

        // devuelve el resultado del conteo
        $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

        return $resultado;
    }

    function getAllMarcas($pagination=false, $pos=null, $n=null) {
        if ($pagination) {
            // 2. Enviamos la consulta con la palabra limit para la paginacion
            $query = $this->db->prepare('SELECT * FROM marca LIMIT ?, ?');
            $query->bindParam(1, $pos, PDO::PARAM_INT);
            $query->bindParam(2, $n, PDO::PARAM_INT);  
            $query->execute();
        } else {
            // 2. Enviamos la consulta normal
            $query = $this->db->prepare('SELECT * FROM marca');
            $query->execute();
        }
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
            
            $marcas = $query->fetch(PDO::FETCH_OBJ);

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

    function getAllAutosFromMarca($id_marca=null, $pagination=false, $pos=null, $n=null) {
        
        $sql = 'SELECT m.id_auto, m.modelo, m.anio, m.img FROM auto as m WHERE m.id_marca = ?';

        if ($pagination) {
            $sql_pag = $sql . ' LIMIT ?, ?';
            $query = $this->db->prepare($sql_pag);
            $query->bindParam(1, $id_marca);
            $query->bindParam(2, $pos, PDO::PARAM_INT);
            $query->bindParam(3, $n, PDO::PARAM_INT);  
            $query->execute();
        } else {
            // 2. Enviamos la consulta (almacena la sentencia en una variable)
            
            $query = $this->db->prepare($sql);
            $query->execute([$id_marca]);
        }
        
        // 3. obtengo la respuesta de la DB
        $autos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $autos;
    }

    function advanceFilter($id_marca=null, $modelo=null, $anio=null) {
        
        //Creamos las variables para la consulta dinamica sabiendo las marcas
        $consulta='';
        $parametros='';
        $values=array();

        //Creamos el primer parametro en caso de que exista
        if (!empty($_GET['modelo'])) {
            $parametros.="m.modelo LIKE :modelo".'&';
            $values[':modelo'] = '%'.$modelo.'%';
        }
        //Creamos el segundo parametro en caso de que exista
        if (!empty($_GET['anio'])) {
            $parametros.="m.anio = :anio".'&';
            $values[':anio'] = $anio;
        }
        //Creamos el tercer parametro en caso de que exista
        if (!empty($_GET['id_marca'])) {
            $parametros.="m.id_marca = :id_marca".'&';
            $values[':id_marca'] = $id_marca;
        }

        //Dividimos los parametros
        $porciones=explode('&',$parametros);

        //Contamos la cantidad de parametros
        $cantidad=count($porciones)-1;

        //Si hay mas de 1 parametro los unimos con AND para mysql
        if ($cantidad>1){
        for ($i=0; $i < $cantidad; $i++) {
            $consulta.= $porciones[$i].' AND ';
        }
        } else {
            $consulta.= $porciones[0].' AND ';
        }

        //Eliminamos el AND del final
        $consulta = substr ($consulta, 0, strlen($consulta) - 4);

        //Pasamos los parametros dinámicos de $consulta despues del WHERE
        $query_Consulta = sprintf("SELECT m.id_auto, m.modelo, m.anio, m.img FROM auto as m WHERE $consulta");

        $query = $this->db->prepare($query_Consulta);
        foreach ($values as $key=>$value)
            $query->bindValue($key, $value);
        $query->execute();

        // 3. obtengo la respuesta de la DB
        $autos = $query->fetchAll(PDO::FETCH_OBJ);

        return $autos;
    }
} 

?>
