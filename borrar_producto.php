<?php


if(isset($_GET['id_producto'])){
    require './class/Producto.php';
    

    $product = Producto::deleteProduct();

}

header('Location: lista_productos.php');
