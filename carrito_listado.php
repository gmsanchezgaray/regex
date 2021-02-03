<?php /** @var Carrito $carrito */
if ($carrito) : ?>
    <table id="tablaCarrito">
        <tr class="dark">
            <th>Marca</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $total = 0;
        foreach ($carrito->productos as $id_producto => $unProducto) {
            $subTotal = $unProducto['Producto']->precio * $unProducto['Cantidad'];
            $total += $subTotal;
            ?>
            <tr>
                <td>
                    <?= $unProducto['Producto']->getMarcaNombre() ?>
                </td>
                <td><?= $unProducto['Producto']->nombre ?></td>
                <td class="text-right"><?= $unProducto['Producto']->getPrecioFormateado() ?></td>
                <td>
                    <form action="carrito_actualizar.php" method="post">
                        <?= $unProducto['Cantidad'] ?>
                        <input type="hidden" name="id" value="<?= $unProducto['Producto']->id_producto ?>">
                        <input type="submit" name="accion" value="+" title="Agregar una unidad al carrito">
                        <input type="submit" name="accion" value="-" title="Quitar una unidad del carrito">
                    </form>
                </td>
                <td>$<?= number_format($subTotal, 2, ',', '.') ?></td>
            </tr>
        <?php } ?>
        <tr class="dark">
            <td colspan="4"></td>
            <td>Total</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>$<?= number_format($total, 2, ',', '.') ?></td>
        </tr>
    </table>
<?php endif; ?>