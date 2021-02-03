<?php


if(isset($_GET['id_categoria'])){
    require './class/Categoria.php';

    $categoria = Categoria::deleteCategoria();

}

header('Location: categorias_listado.php');
