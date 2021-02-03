<?php

require_once 'DB.php';

class Usuario
{
    public $id_usuario;
    public $nombre;
    public $correo;
    public $usuario;
    public $contrasena;
    public $rol;

    static private $count = 0;


//    ---------------------------------------------------------------------------------------
//                                   All "get's" from User
//    ---------------------------------------------------------------------------------------

    static function getById($id_usuario){
            $stmt = DB::getStatement('SELECT * FROM usuarios WHERE id_usuario = :id_usuario');
            $stmt->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Usuario');
    }

    static function getLogin($usuario,$clave){
            $stmt = DB::getStatement('SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :clave');
            $stmt->bindParam(':usuario',$usuario,PDO::PARAM_STR);
            $stmt->bindParam(':clave',$clave,PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Usuario');
    }

    static public function getAllUsers(){
            $stmt = DB::getStatement('SELECT * FROM usuarios');
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

    static public function getAllClients(){
        $rol = 4;

            $stmt = DB::getStatement('SELECT * FROM usuarios WHERE rol = :rol');
            $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

//    ---------------------------------------------------------------------------------------
//    Create User (all roles) -In the case of Client, the role is specified on the registration page
//    ---------------------------------------------------------------------------------------

    static public function createUser($nombre, $correo, $usuario, $contrasena, $rol){
            $stmt = DB::getStatement('INSERT INTO usuarios (nombre, correo, usuario, contrasena, rol) VALUES (:nombre, :correo, :usuario, :contrasena, :rol)');
            $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo,PDO::PARAM_STR);
            $stmt->bindParam(':usuario', $usuario,PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena,PDO::PARAM_STR);
            $stmt->bindParam(':rol', $rol,PDO::PARAM_INT);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Usuario');
    }

//    ---------------------------------------------------------------------------------------
//                                   Search User (all roles)
//    ---------------------------------------------------------------------------------------

    static public function searchUser($getSearch){
            $stmt = DB::getStatement('SELECT * FROM usuarios WHERE nombre LIKE :busqueda || usuario LIKE :busqueda || correo LIKE :busqueda || rol LIKE :busqueda');
            $stmt->bindParam(':busqueda',$getSearch,PDO::PARAM_STR);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

//    ---------------------------------------------------------------------------------------
//                                   Search Client (only 1 role)
//    ---------------------------------------------------------------------------------------

    static public function searchClient($getSearch){
        $rol = 4;

        $stmt = DB::getStatement('SELECT * FROM  usuarios WHERE rol = :rol AND nombre LIKE :busqueda || usuario LIKE :busqueda || correo LIKE :busqueda');
        $stmt->bindParam(':busqueda',$getSearch,PDO::PARAM_STR);
        $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
        $stmt->execute();
        self::$count = $stmt->rowCount();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

//    ---------------------------------------------------------------------------------------
//                                   Update user
//    ---------------------------------------------------------------------------------------

    static public function updateUser($nombre, $correo, $usuario, $contrasena, $rol){
        $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';
            $stmt = DB::getStatement('UPDATE usuarios SET nombre = :nombre, correo = :correo, usuario = :usuario, contrasena = :contrasena, rol = :rol WHERE id_usuario = :id_usuario');
            $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo,PDO::PARAM_STR);
            $stmt->bindParam(':usuario', $usuario,PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena,PDO::PARAM_STR);
            $stmt->bindParam(':rol', $rol,PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario,PDO::PARAM_INT);
            $stmt->execute();
            self::$count = $stmt->rowCount();
        return $stmt->fetchObject('Usuario');
    }

//    ---------------------------------------------------------------------------------------
//                                   Delete User
//    ---------------------------------------------------------------------------------------

    static function deleteUser(){
        $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

            $stmt = DB::getStatement('DELETE FROM usuarios WHERE id_usuario = :id_usuario');
            $stmt->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject('Usuario');
    }

//    ---------------------------------------------------------------------------------------
//                Obtain the number of rows affected by a query .-> rowCount ().
//    ---------------------------------------------------------------------------------------

    public static function getCount(){
        return self::$count;
    }
}