<?php


if(isset($_GET['id_usuario'])){
    require './class/Usuario.php';

    $user = Usuario::deleteUser();

}

header('Location: usuarios_listado.php');
