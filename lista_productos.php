<?php
require_once './class/Producto.php';
require './require/header.php';
require_once 'funciones.php';
/** @var mysqli_result $resultado */
/** @var input $nombreProducto */
/** @var input $nombreMarca */
/** @var input $nombreCategoria */
/** @var input $precioMinimo */
/** @var input $precioMaximo */


?>

    <main role="main">
        <div class="container mt-5">
            <div class="border-bottom mb-2">
                <h4 class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg>
                    Lista de productos
                </h4>
            </div>
            <?php
            /* ------------------------------------------------------------------------------------*/
            /*                                  Search filter                                      */
            /* ------------------------------------------------------------------------------------*/
            ?>
            <div>
                <form method="" action="">
                    <div class=" form-row align-items-center input-group">
                        <div class="col-auto">
                            <input type="text" name="buscar_nombre" class="form-control mb-2" id="inlineFormInput" placeholder="Inserte un nombre">
                        </div>
                        <div class="col-auto">
                            <select id="categoria" name="buscar_categoria" class="form-control custom-select mb-2">
                                <option value="" selected>Seleccioná una categoría</option>
                                <option value="1">Celulares</option>
                                <option value="2">Consolas</option>
                                <option value="3">Lavarropas</option>
                                <option value="4">Lavasecarropas</option>
                                <option value="5">Secarropas</option>
                                <option value="6">Televisores</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select id="marca" name="buscar_marca" class="form-control custom-select mb-2">
                                <option value="" selected>Seleccioná una marca</option>
                                <option value="1" >Samsung</option>
                                <option value="2" >Drean</option>
                                <option value="3" >LG</option>
                                <option value="4" >Philips</option>
                                <option value="5" >Sony</option>
                            </select>
                        </div>
                        <div class="card flex-row col-md-4 align-items-center mb-2">
                            <div class="col-auto ">
                                Precio
                            </div>
                            <div class="col-4">
                                <input type="text" name="precio_min" class="form-control " id="inlineFormInput" placeholder="Min">
                            </div>
                            <div class="col-auto">
                                -
                            </div>
                            <div class="col-4">
                                <input type="text" name="precio_max" class="form-control " id="inlineFormInput" placeholder="Max">
                            </div>
                        </div>
                        <div class="col-auto ml-2">
                            <button type="submit" name="search" class="btn btn-primary mb-2">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php

            if(!isset($_GET['search'])){
                $productos = Producto::getAllProducts();
            }else{
                $productos = Producto::searchProduct();;
            }
            

            if(Producto::getCount() === 1 && isset($_GET['search'])){

                echo getAlert('Se ha encontrado 1 resultado.','alert-info');

            }elseif(Producto::getCount() > 1 && isset($_GET['search'])){

                echo getAlert('Se han encontrado '.Producto::getCount().' resultados.', 'alert-info');

            }
            if($productos){

                    require './require/list_body.php';

                }else{
                    $alertText = <<< HTML_TEXT
                        <p><strong>Atención:</strong></p>
                        <p>No se han encontrado resultados</p>
                        <p><a href="productos_alta.php">Dar de alta un nuevo producto</a></p>
                    HTML_TEXT;
                    echo getAlert($alertText, 'alert-info');


                }

            

            ?>
        </div>
    </main>

<?php
require './require/footer.php';
