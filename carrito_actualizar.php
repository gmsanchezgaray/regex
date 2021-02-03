<?php

require_once 'class/Carrito.php';
session_start();

if (!isset($_SESSION['carrito_serializado'])) {
    $carrito = new Carrito();
} else {
    $carrito = unserialize($_SESSION['carrito_serializado']);
}

if (isset($_POST['id']) && isset($_POST['accion'])) {
    if ($_POST['accion'] === '+') {
        $carrito->addProducto(Producto::getById($_POST['id']));
    } else if ($_POST['accion'] === '-') {
        $carrito->removeProducto(Producto::getById($_POST['id']));
    }
}

$_SESSION['carrito_serializado'] = serialize($carrito);


header('Location: cart.php');