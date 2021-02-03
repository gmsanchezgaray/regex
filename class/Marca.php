<?php

require_once 'DB.php';

class Marca
{

    public $id_marca;
    public $nombre;
    public $sitio_web;
    public $telefono;
    public $observaciones;

    static private $count = 0;


//    ---------------------------------------------------------------------------------------
//                                   All "get's" from Brand
//    ---------------------------------------------------------------------------------------
    static function getById($id_marca){
            $stmt = DB::getStatement('SELECT * FROM marcas WHERE id_marca = :id_marca');
            $stmt->bindParam(':id_marca',$id_marca,PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Marca');

    }

    static public function getAll(){
            $stmt = DB::getStatement('SELECT * FROM marcas');
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll( PDO::FETCH_CLASS,'Marca');
    }

//    ---------------------------------------------------------------------------------------
//                                  Create Brand
//    ---------------------------------------------------------------------------------------

    static function createMarca($nombre,$sitio_web,$telefono,$observaciones){
            $stmt = DB::getStatement('INSERT INTO marcas (nombre,sitio_web,telefono,observaciones) VALUES (:nombre,:sitio_web,:telefono,:observaciones)');
            $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
            $stmt->bindParam(':sitio_web',$sitio_web,PDO::PARAM_STR);
            $stmt->bindParam(':telefono',$telefono,PDO::PARAM_STR);
            $stmt->bindParam(':observaciones',$observaciones,PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Marca');
    }

//    ---------------------------------------------------------------------------------------
//                                  Search Brand
//    ---------------------------------------------------------------------------------------

    static function searchMarca($getSearch){

            $stmt = DB::getStatement('SELECT * FROM marcas WHERE nombre LIKE :busqueda');
            $stmt->bindParam(':busqueda', $getSearch, PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Marca');
    }

//    ---------------------------------------------------------------------------------------
//                                  Update Brand
//    ---------------------------------------------------------------------------------------

    static function updateMarca($nombre,$sitio_web,$telefono,$observaciones){
         $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : '';

         $stmt = DB::getStatement('UPDATE marcas SET nombre = :nombre, sitio_web = :sitio_web, telefono = :telefono, observaciones = :observaciones WHERE id_marca = :id_marca');
            $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
            $stmt->bindParam(':sitio_web',$sitio_web,PDO::PARAM_STR);
            $stmt->bindParam(':telefono',$telefono,PDO::PARAM_STR);
            $stmt->bindParam(':observaciones',$observaciones,PDO::PARAM_STR);
            $stmt->bindParam(':id_marca',$id_marca,PDO::PARAM_INT);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Marca');
     }

//    ---------------------------------------------------------------------------------------
//                                  Delete Brand
//    ---------------------------------------------------------------------------------------

    static function deleteMarca(){
        $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : '';

            $stmt = DB::getStatement('DELETE FROM marcas WHERE id_marca = :id_marca');
            $stmt->bindParam(':id_marca',$id_marca,PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Marca');

     }

//    ---------------------------------------------------------------------------------------
//                Obtain the number of rows affected by a query .-> rowCount ().
//    ---------------------------------------------------------------------------------------

    public static function getCount(){
        return self::$count;
    }
}