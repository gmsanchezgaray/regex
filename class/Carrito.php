<?php

require_once 'Producto.php';

class Carrito
{
    public $productos = [];

    public function addProducto(Producto $producto = null)
    {
        if ($producto === null) {
            return;
        }
        if (!isset($this->productos[$producto->id_producto])) {
            $this->productos[$producto->id_producto]['Cantidad'] = 0;
        }
        $this->productos[$producto->id_producto]['Cantidad']++;
        $this->productos[$producto->id_producto]['Producto'] = $producto;
    }

    public function removeProducto(Producto $producto = null)
    {
        if ($producto === null) {
            return;
        }
        if (isset($this->productos[$producto->id_producto])) {
            if ($this->productos[$producto->id_producto]['Cantidad'] > 1) {
                $this->productos[$producto->id_producto]['Cantidad']--;
            } else {
                unset($this->productos[$producto->id_producto]);
            }
        }
    }
}