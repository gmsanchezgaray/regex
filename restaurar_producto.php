<?php


if(isset($_GET['id_producto'])){
    require './class/Producto.php';


    /** @var mysqli $link */
    $producto = Producto::restoreProduct();
}

header('Location: lista_papelera.php');
