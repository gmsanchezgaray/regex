<?php
      require_once 'DB.php';

class Categoria
{

      public $id_categoria;
      public $nombre;
      static private $count = 0;


//    ---------------------------------------------------------------------------------------
//                                   All "get's" from Categorie
//    ---------------------------------------------------------------------------------------
      static function getById($id_categoria){
              $stmt = DB::getStatement('SELECT * FROM categorias WHERE id_categoria = :id_categoria');
              $stmt->bindParam(':id_categoria',$id_categoria, PDO::PARAM_INT);
              $stmt->execute();
            return $stmt->fetchObject('Categoria');
      }


    static public function getAll(){
        $stmt = DB::getStatement('SELECT * FROM categorias');
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Categoria');
    }

//    ---------------------------------------------------------------------------------------
//                                  Create Categories
//    ---------------------------------------------------------------------------------------
    static function createCategoria($insertCategoria){

        $stmt = DB::getStatement('INSERT INTO categorias (nombre) VALUES(:nombre)');
        $stmt->bindParam(':nombre',$insertCategoria,PDO::PARAM_STR);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Categoria');
    }

//    ---------------------------------------------------------------------------------------
//                                  Search Categories
//    ---------------------------------------------------------------------------------------
    static function searchCategoria($getNombre){

        $stmt = DB::getStatement('SELECT * FROM categorias WHERE nombre LIKE :nombre');
        $stmt->bindParam(':nombre',$getNombre, PDO::PARAM_STR);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Categoria');
    }

//    ---------------------------------------------------------------------------------------
//                                   Update Categories
//    ---------------------------------------------------------------------------------------

    static function updateCategoria($nombre){
        $updateCategoria = isset($_POST['nombre']) ? ucfirst($_POST['nombre']) : '';
        $id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : '';
        
        $stmt = DB::getStatement('UPDATE categorias SET nombre = :nombre WHERE id_categoria = :id_categoria');
        $stmt->bindParam(':nombre',$updateCategoria,PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria',$id_categoria,PDO::PARAM_INT);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Categoria');
    }

//    ---------------------------------------------------------------------------------------
//                                   Delete Categories
//    ---------------------------------------------------------------------------------------

    static function deleteCategoria(){
        $id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : '';

        $stmt = DB::getStatement('DELETE FROM categorias WHERE id_categoria = :id_categoria');
        $stmt->bindParam(':id_categoria',$id_categoria,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject('Categoria');
    }


//    ---------------------------------------------------------------------------------------
//                Obtain the number of rows affected by a query .-> rowCount ().
//    ---------------------------------------------------------------------------------------
    public static function getCount(){
        return self::$count;
    }
}