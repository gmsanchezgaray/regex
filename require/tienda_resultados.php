<?php
/* ------------------------------------------------------------------------------------*/
/*                              Side section Filters and more                          */
/* ------------------------------------------------------------------------------------*/
?>

<div class="row d-flex">
    <div class="col-md-3">
        <h4><?= $textoBusqueda ?></h4>
        <?= $textoResultado ?>
        <h6 class="mt-3">Categorías</h6>
        <div class="d-flex flex-column">
            <a href="#" class="small text-dark">Celulares</a>
            <a href="#" class="small text-dark d-block">Consolas</a>
            <a href="#" class="small text-dark d-block">Lavarropas</a>
            <a href="#" class="small text-dark d-block">Secarropas</a>
            <a href="#" class="small text-dark d-block">Lavasecarropas</a>
            <a href="#" class="small text-dark d-block">Televisores</a>
        </div>
        <h6 class="mt-3">Costo de envío</h6>
        <div class="d-flex flex-column">
            <a href="#" class="small text-dark d-block">Envío gratis</a>
            <a href="#" class="small text-dark d-block">Envío sin cargo</a>
        </div>
        <h6 class="mt-3">Garantía</h6>
        <div class="d-flex flex-column">
            <a href="#" class="small text-dark d-block">6 meses</a>
            <a href="#" class="small text-dark d-block">12 meses</a>
            <a href="#" class="small text-dark d-block">24 meses</a>
            <a href="#" class="small text-dark d-block">36 meses</a>
        </div>
        <h6 class="mt-3">Precio</h6>
        <div class="d-flex flex-column">
            <a href="#" class="small text-dark d-block">Hasta $ 950</a>
            <a href="#" class="small text-dark d-block">$950 a $3.000</a>
            <a href="#" class="small text-dark d-block">Más de $3.000</a>
        </div>
        <div class="d-flex align-items-center ml-3 input-group mt-3">
            <form action="" class="row align-items-center">
                <input type="number" class="col-3 form-control ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                </svg>
                <input type="number" class="col-3 form-control">
                <button type="submit" name="search" class="btn btn-primary rounded-circle badge mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <?php
    /* ------------------------------------------------------------------------------------*/
    /*                             Obtained results section.                               */
    /* ------------------------------------------------------------------------------------*/
    ?>

    <div class="card col-md-9">
        <?php
        foreach($productos as $product){


            if($product->envio_sin_cargo == '0'){
                $filaEnvioStock = <<<STOCK
                            <div class="row d-flex justify-content-end ml-0">
                                    <p class="">Stock <span class="badge rounded-pill bg-primary"> {$product->stock}</span></p>
                            </div>
                            STOCK;

            }else{
                $filaEnvioStock = <<<EOD
                            <div class="row d-flex justify-content-between ml-0">
                            <p class="small text-primary font-weight-bold">Envío gratis
                                <span>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                </span>
                            </p>
                            <p class="">Stock <span class="badge rounded-pill bg-primary"> {$product->stock} </span></p>
                            </div>
                            EOD;
            }

            ?>
            <div class="list-group list-group-flush">
                <div class="list-group-item row g-0">
                    <div class="col-md-3">
                        <img class="imagenes-card-horizontal" src="<?= $product->imagen ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title font-weight-normal my-0"><?= $product->nombre ?></h5>
                            <p class="small text-muted"><a href="<?= $product->getMarcaSitioWeb() ?>>" class="text-muted"><?= $product->getMarcaNombre() ?></a></p>
                            <h5 class="card-title "><?= $product->getPrecioFormateado() ?></h5>
                            <p class="small text-primary my-0">Hasta <?= $product->garantia ?> meses de garantía</p>
                            <?= $filaEnvioStock ?>
                            <form action="carrito_actualizar.php" method="post">
                                <input type="hidden" name="id" value="<?= $product->id_producto ?>">
                                <input type="hidden" name="accion" value="+" title="Agregar una unidad al carrito">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>