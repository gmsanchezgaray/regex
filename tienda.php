<?php
    require_once './class/Producto.php';
    require_once './require/header.php';

?>

    <div class="container-fluid m-0 p-0">
        <img src="./public/Frame%206.jpg" class="w-100 " alt="">
    </div>
    <main role="main">
        <div class=" jumbotron mb-0">
                <?php


                $getSearch = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

                if(!isset($_GET['search'])){
                    $productos = Producto::getAllProducts();
                }else{
                    $productos = Producto::searchTienda($getSearch);;
                }

                $textoResultado = '<p class="small">Se han encontrado <span class="font-weight-bold">'.Producto::getCount().'</span> resultados.</p>';


                if(isset($_GET['search']) && Producto::getCount() === 1) {

                    $textoResultado = '<p class="small">Se ha encontrado <span class="font-weight-bold">'.Producto::getCount().'</span> resultado.</p>';

                } elseif(Producto::getCount() > 1 && isset($_GET['search'])) {

                    $textoResultado = '<p class="small">Se han encontrado <span class="font-weight-bold">'.Producto::getCount().'</span> resultados.</p>';

                }

                if($productos){

                    require './require/tienda_resultados.php';

                }else{

                    require './require/sin_resultados.php';

                }

                ?>

        </div>
    </main>


