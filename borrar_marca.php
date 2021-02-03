<?php


if(isset($_GET['id_marca'])){
    require './class/Marca.php';

    $marca = Marca::deleteMarca();

}

header('Location: marcas_listado.php');
