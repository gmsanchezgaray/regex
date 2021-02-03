<?php

require_once 'DB.php';
require_once 'Marca.php';
require_once  'Categoria.php';

class Producto
{
     public $id_producto;
     public $nombre;
     public $precio;
     public $stock;
     public $id_categoria;
     public $categoria;
     public $id_marca;
     public $marca;
     public $imgContenido;
     public $garantia;
     public $envio_sin_cargo;
     public $fecha_de_alta;
     public $descripcion;
     public $observaciones;
     public $status;

     static private $count = 0;


//    ---------------------------------------------------------------------------------------
//                                   All "get's" from Product
//    ---------------------------------------------------------------------------------------

    static function getById($id_producto){
            $stmt = DB::getStatement('SELECT * FROM productos WHERE id_producto = :id_producto');
            $stmt->bindParam(':id_producto',$id_producto,PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Producto');
        
    }

    static function getAllProducts(){
        $status = '1';
            $stmt = DB::getStatement('SELECT * FROM productos WHERE status = :status');
            $stmt->bindParam(':status',$status, PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    static function getDeletedProducts(){
        $status = '0';
        $stmt = DB::getStatement('SELECT * FROM productos WHERE status = :status');
        $stmt->bindParam(':status',$status, PDO::PARAM_STR);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    static function getLatestProducts(){
        $status = '1';
        $limit = 5;
            $stmt = DB::getStatement('SELECT * FROM productos WHERE status = :status ORDER BY id_producto DESC LIMIT :limit');
            $stmt->bindParam(':status',$status, PDO::PARAM_STR);
            $stmt->bindParam(':limit',$limit, PDO::PARAM_INT);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }


    public function getCategoria(){
        if(!$this->categoria){
            $this->categoria = Categoria::getById($this->id_categoria);
        }
        return $this->categoria;
    }


    public function getCategoriaNombre(){
            $categoria = $this->getCategoria();
        return $categoria ? $categoria->nombre : '';
    }


    public function getMarca(){
        if(!$this->marca){
            $this->marca = Marca::getById($this->id_marca);
        }
        return $this->marca;
    }

    public function getMarcaNombre(){
        $marca = $this->getMarca();
        return $marca ? $marca->nombre : '';
    }
    
    public function getMarcaSitioWeb(){
        $marca = $this->getMarca();
        return $marca ? $marca->sitio_web : '';
    }

    public function getPrecioFormateado(){
        return '$' . number_format($this->precio, 2, ',', '.');
    }

    public function getFecha(){
        $texto_fecha = date_create_from_format('Y-m-d H:i:s', $this->fecha_de_alta);
        return date_format($texto_fecha, 'd/m/Y');
    }

    public function getInfoFecha(){
        return  date_format(date_create_from_format('Y-m-d H:i:s', $this->fecha_de_alta), 'd/m/Y H:i:s');
    }

//    ---------------------------------------------------------------------------------------
//                                  Create Product
//    ---------------------------------------------------------------------------------------

    static public function createProduct($nombre, $precio, $stock, $categoria, $marca, $imagen, $garantia, $envio, $descripcion, $observaciones){

        $stmt = DB::getStatement('INSERT INTO productos (
                                        nombre,
                                        precio,
                                        stock,
                                        id_categoria,
                                        id_marca,
                                        imagen,
                                        garantia,
                                        envio_sin_cargo,
                                        fecha_de_alta,
                                        descripcion,
                                        observaciones) 
                                        VALUES (
                                        :nombre,
                                        :precio,
                                        :stock,
                                        :id_categoria,
                                        :id_marca,
                                        :imagen,
                                        :garantia,
                                        :envio_sin_cargo,
                                        NOW(),
                                        :descripcion,
                                        :observaciones)'
        );
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
            $stmt->bindParam(':id_categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':id_marca', $marca, PDO::PARAM_INT);
            $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
            $stmt->bindParam(':garantia', $garantia, PDO::PARAM_INT);
            $stmt->bindParam(':envio_sin_cargo', $envio, PDO::PARAM_INT);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Producto');
    }

//    ---------------------------------------------------------------------------------------
//                                  Search Product
//    ---------------------------------------------------------------------------------------

    static public function searchProduct(){
        $marcaInput = $_GET['buscar_marca'];
        $categoriaInput = $_GET['buscar_categoria'];
        $nombreInput = $_GET['buscar_nombre'];


        $whereNombre = $nombreInput  ? " AND nombre LIKE '%$nombreInput%'" : '';
        $whereMarca = $marcaInput ? " AND id_marca = '$marcaInput'" : '';
        $whereCategoria = $categoriaInput ? " AND id_categoria = '$categoriaInput'" : '';
        $precioMinInput =  $_GET['precio_min'] === '' ? 0 : $_GET['precio_min'];
        $precioMaxInput = $_GET['precio_max'] === '' ? 99999999 : $_GET['precio_max'];

        $filaBetwen = " AND precio BETWEEN $precioMinInput AND $precioMaxInput";

///  -----------------------              Order                  ----------------------

/// $_GET['sort'] to sort the columns by ASC or DESC. First check if $order is set, if not give it a default value.
        if(isset($_GET['order'])){
            $order = $_GET['order'];
        }else{
            $order = 'id_producto';
        }

///In this case, we do the same as the $order variable. We set a $sort DESC in case of that nothing has been set.
        if(isset($_GET['sort'])){

            $sort = $_GET['sort'];

        }else{

            $sort = 'DESC';

        }

//If $_GET['sort'] is equal to 'DESC', then $sort will have the value of 'ASC'.Then $sort will have the value 'DESC'.
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        $filaOrder = " ORDER BY $order $sort";


            $stmt = DB::getStatement("SELECT * FROM productos WHERE status = 1 $whereNombre $whereCategoria $whereMarca $filaBetwen $filaOrder");
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Producto');
    }


//    ---------------------------------------------------------------------------------------
//                              Search Deleted Products
//    ---------------------------------------------------------------------------------------

    static public function searchDeletedProduct(){
        $marcaInput = $_GET['buscar_marca'];
        $categoriaInput = $_GET['buscar_categoria'];
        $nombreInput = $_GET['buscar_nombre'];


        $whereNombre = $nombreInput  ? " AND nombre LIKE '%$nombreInput%'" : '';
        $whereMarca = $marcaInput ? " AND id_marca = '$marcaInput'" : '';
        $whereCategoria = $categoriaInput ? " AND id_categoria = '$categoriaInput'" : '';
        $precioMinInput =  $_GET['precio_min'] === '' ? 0 : $_GET['precio_min'];
        $precioMaxInput = $_GET['precio_max'] === '' ? 99999999 : $_GET['precio_max'];

        $filaBetwen = " AND precio BETWEEN $precioMinInput AND $precioMaxInput";

//  -----------------------              Order                  ----------------------

/// $_GET['sort'] to sort the columns by ASC or DESC. First check if $order is set, if not give it a default value.
        if(isset($_GET['order'])){
            $order = $_GET['order'];
        }else{
            $order = 'id_producto';
        }

///In this case, we do the same as the $order variable. We set a $sort DESC in case of that nothing has been set.
        if(isset($_GET['sort'])){

            $sort = $_GET['sort'];

        }else{

            $sort = 'DESC';

        }

//If $_GET['sort'] is equal to 'DESC', then $sort will have the value of 'ASC'.Then $sort will have the value 'DESC'.
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        $filaOrder = " ORDER BY $order $sort";


        $stmt = DB::getStatement("SELECT * FROM productos WHERE status = 0 $whereNombre $whereCategoria $whereMarca $filaBetwen $filaOrder");
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Producto');
    }


//    ---------------------------------------------------------------------------------------
//                                  Search Products in the store
//    ---------------------------------------------------------------------------------------

    static public function searchTienda($getSearch){
        $stmt = DB::getStatement("SELECT * FROM productos WHERE status = 1 AND  nombre LIKE :busqueda ");
        $stmt->bindParam(':busqueda',$getSearch,PDO::PARAM_STR);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Producto');
    }

//    ---------------------------------------------------------------------------------------
//                                  Update Products
//    ---------------------------------------------------------------------------------------

    static function updateProduct($nombre,$precio,$stock,$categoria,$marca,$imagen,$garantia,$envio,$descripcion,$observaciones){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';

        $sql=<<<SQL_INSERT
                UPDATE productos
                SET
                nombre = :nombre,
                precio = :precio,
                stock = :stock,
                id_categoria = :id_categoria,
                id_marca = :id_marca,
                imagen = :imagen,
                garantia = :garantia,
                envio_sin_cargo = :envio_sin_cargo,
                fecha_de_alta = NOW(),
                descripcion = :descripcion,
                observaciones = :observaciones
                WHERE id_producto = :id_producto;
            SQL_INSERT;

                $stmt = DB::getStatement($sql);
                $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
                $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
                $stmt->bindParam(':id_categoria', $categoria, PDO::PARAM_INT);
                $stmt->bindParam(':id_marca', $marca, PDO::PARAM_INT);
                $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
                $stmt->bindParam(':garantia', $garantia, PDO::PARAM_INT);
                $stmt->bindParam(':envio_sin_cargo', $envio, PDO::PARAM_INT);
                $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);
                $stmt->execute();
                self::$count = $stmt->rowCount();
            return $stmt->fetchObject('Producto');
    }


//    ---------------------------------------------------------------------------------------
//                                 Delete and Restore Products
//    ---------------------------------------------------------------------------------------
    static function deleteProduct(){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
        $status = '0';
            $stmt = DB::getStatement('UPDATE productos SET status = :status WHERE id_producto = :id_producto');
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Producto');
    }

    static function restoreProduct(){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
        $status = '1';
            $stmt = DB::getStatement('UPDATE productos SET status = :status WHERE id_producto = :id_producto');
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Producto');
    }

//    ---------------------------------------------------------------------------------------
//                Obtain the number of rows affected by a query .-> rowCount ().
//    ---------------------------------------------------------------------------------------
    public static function getCount(){
        return self::$count;
    }
}