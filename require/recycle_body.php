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


            //Info de envío y condicional para establecer un valor NO númerico.
//            $envio_sin_cargo = $fila['envio_sin_cargo'];
//            $resultado_envio =  $envio_sin_cargo == '0' ? 'No' : 'Sí';
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
                <button class="btn btn-sm btn-success mx-1" type="button">
                    <a onclick="return confirm('¿Quieres restuarar el producto: \r\n<?= $product->nombre ?> ?');"
                       href="restaurar_producto.php?id_producto=<?= $product->id_producto ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bootstrap-reboot text-white" viewBox="0 0 16 16">
                            <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 0 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
                            <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
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
    