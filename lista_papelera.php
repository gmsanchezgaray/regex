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
            <div class="container my-5">
                <div class="border-bottom mb-2">
                    <h4 class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Lista de productos eliminados
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
                $productos = Producto::getDeletedProducts();
            }else{
                $productos = Producto::searchDeletedProduct();;
            }

            if(Producto::getCount() === 1 && isset($_GET['search'])){

                echo getAlert('Se ha encontrado 1 resultado.','alert-info');

            }elseif(Producto::getCount() > 1 && isset($_GET['search'])){

                echo getAlert('Se han encontrado '.Producto::getCount().' resultados.', 'alert-info');

            }

            if($productos){

                require './require/recycle_body.php';

            }else{

                echo getAlert('No se han encontrado resultados', 'alert-danger');

            }
             
                ?>
        </div>
    </main>

<?php
require './require/footer.php';
