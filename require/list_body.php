<?php
/** @var variable $sort */

?>

<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
        <tr>
            <?php
/* ------------------------------------------------------------------------------------*/
/*  In case you do a REQUEST, the function will modify the elements to be able to Sort the ASC and DESC columns.                                           */
/* ------------------------------------------------------------------------------------*/
            sortSeteados();
            ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php

            /** @var mysqli_result $resultado */
            

            foreach ($productos as $product) {

            if($product->envio_sin_cargo == '0'){
                $resultado_envio = 'No';
            }else{
                $resultado_envio = 'Sí';
            }


            ?>
            <th scope="row"><?= $product->id_producto ?></th>
            <td> <?= $product->nombre ?></td>
            <td class="text-nowrap text-right"><?= $product->getPrecioFormateado() ?></td>
            <td class="text-center"> <?= $product->stock ?></td>
            <td class="text-center"> <?= $product->getCategoriaNombre() ?></td>
            <td class="text-center">
                <a title="Ir a <?= $product->getMarcaSitioWeb() ?>" href="<?= $product->getMarcaSitioWeb() ?>" target="_blank"><?= $product->getMarcaNombre() ?></a>
            </td>
            <td class="text-nowrap text-center"> <?= $product->garantia ?> meses</td>
            <td class="text-center"> <?= $resultado_envio ?></td>
            <td title="<?= $product->getInfoFecha() ?>"><?= $product->getFecha() ?> </td>
            <td>
                <p>
                    <button class="btn btn-sm btn-link btn-block" type="button" data-toggle="collapse" data-target="#descripcion<?= $product->id_producto ?>" aria-expanded="false" aria-controls="collapseExample">
                        Ver descripción
                    </button>
                </p>
                <div class="collapse" id="descripcion<?= $product->id_producto ?>">
                    <?= $product->descripcion ?>
                </div>
            </td>
            <td class="text-center d-flex">
                <button class="btn btn-sm btn-warning mx-1" type="button">
                    <a href="productos_editar.php?id_producto=<?= $product->id_producto ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-white" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                </button>
                <button class="btn btn-sm btn-danger mx-1" type="button">
                <a onclick="return confirm('¿Estás seguro de querer eliminar el producto: \r\n<?= $product->nombre ?>?');"
                   href="borrar_producto.php?id_producto=<?= $product->id_producto ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-white" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </a>
                </button>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

