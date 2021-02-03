<?php /** @var Carrito $carrito */
if ($carrito) : ?>
       <div class="my-3 d-flex row no-gutters shadow">
            <table class="table-sm col-8">
                <tr class="dark">
                    <th class="text-black-50 ">Detalles del producto</th>
                    <th class="text-black-50">Precio</th>
                    <th class="text-black-50">Cantidad</th>
                    <th class="text-black-50">Subtotal</th>
                </tr>
                <?php
                $total = 0;
                foreach ($carrito->productos as $id_producto => $unProducto) {
                    $subTotal = $unProducto['Producto']->precio * $unProducto['Cantidad'];
                    $total += $subTotal;
                    ?>
                    <tr class="table-light">
                        <td class="d-flex">
                            <div>
                                <img class="table-images" src="<?= $unProducto['Producto']->imagen ?>">
                            </div>
                            <div>
                                <p class="small mb-1"><?= $unProducto['Producto']->nombre ?></p>
                                <p class="small">Marca: <a href="<?= $unProducto['Producto']->getMarcaSitioWeb() ?>"><?= $unProducto['Producto']->getMarcaNombre() ?></a></p>
                            </div>
                        </td>
                        
                        <td ><?= $unProducto['Producto']->getPrecioFormateado() ?></td>
                        <td >
                            <form action="carrito_actualizar.php" method="post">
                                <input type="hidden" name="id" value="<?= $unProducto['Producto']->id_producto ?>">
                                <input class="btn btn-outline-info btn-sm" type="submit" name="accion" value="-" title="Quitar una unidad del carrito">
                                <?= $unProducto['Cantidad'] ?>
                                <input class="btn btn-outline-info btn-sm" type="submit" name="accion" value="+" title="Agregar una unidad al carrito">
                            </form>
                        </td>
                        <td>$<?= number_format($subTotal, 2, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </table>

           <div class="card col-4">
               <div class="card-header font-weight-bold text-white bg-lblue">
                   Lista de compra
               </div>
               <ul class="list-group list-group-flush">
                   <li class="list-group-item">
                       <a href="javascript:history.back()">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                               <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                           </svg> Seguir comprando
                       </a>
                   </li>
                   <li class="list-group-item text-uppercase d-flex justify-content-between">Costo total <span class="font-weight-bold">$<?= number_format($total, 2, ',', '.') ?></span></li>
               </ul>
               <div class="card-body">
                   <a href="#" class="btn btn-primary btn-block">Comprar</a>
               </div>
           </div>



       </div>
   

<?php endif; ?>