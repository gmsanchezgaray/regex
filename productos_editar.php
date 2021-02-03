<?php
require_once './class/Producto.php';
require './require/header.php';
require_once 'funciones.php';

/** @var string $nombre */
/** @var string $precio */
/** @var string $stock */
/** @var string $categoria */
/** @var string $marca */
/** @var string $imagen */
/** @var string $garantia */
/** @var string $envio */
/** @var string $descripcion */
/** @var mysqli_conect $link */


/// The variables are initialized so that they always exist (accessed or not by POST)
iniciarVariables();

$errores = '';


$id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';

$product = Producto::getById($id_producto);

///////////////////////////////////////////////////////////////////////////////

/* ------------------------------------------------------------------------------------*/
/*                          Image Validation                                           */
/* ------------------------------------------------------------------------------------*/


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $filename = $_FILES['file']['name'];
    $tmp_dir = $_FILES['file']['tmp_name'];
    $imageSize = $_FILES['file']['size'];

    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $validExtension = array("png", "jpeg", "jpg");

    $picProfile = rand(1000,1000000).".".$fileExtension;

    $imagen = 'upload/'.$picProfile;


    if (!$filename) {

        $errores .= 'Debe agregar una imagen al formulario.<br>';

    } elseif (!in_array($fileExtension, $validExtension)) {

        $errores .= 'Elija un archivo que sea válido<br>';


    }elseif ($errores === ''){

        move_uploaded_file($tmp_dir,$imagen);

    }

}
//////////////////////////////////////////////////////////////////////////////////



/// If the page is being accessed by POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    include './include/validar.php';

    /// If errors occurred
    if ($errores !== '') {
        /// show errors
        $mensajeUsuario = getAlert($errores, 'alert-danger');
    } else {
        /// If there were no errors

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $stock = isset($_POST['stock']) ? $_POST['stock'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
        $garantia = isset($_POST['garantia']) ? $_POST['garantia'] : '';
        $envio = isset($_POST['envio']) ? $_POST['envio'] : '';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : '';

        $product = Producto::updateProduct($nombre,$precio,$stock,$categoria,$marca,$imagen,$garantia,$envio,$descripcion,$observaciones);

        if(Producto::getCount() > 0){

            $mensajeUsuario = getAlert('Se actualizo el producto de manera exitosa.', 'alert-success');

            iniciarVariables();
        }else{

            $mensajeUsuario = getAlert('No se ha podido registrar el producto en la base de datos.', 'alert-danger');

        }

    }

}


?>
    <div class="container row-cols-1 my-5">
        <div class="card container col-md-8 px-0">
            <h4 class="text-primary card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
                Editar productos
            </h4>
            <?= $mensajeUsuario ?? '' ?>
            <?php
                if(Producto::getCount() === 0) {
            ?>
            <div class="card-body">

                <h4>Id del producto a modificar: <span class="text-info"><?= $product->id_producto ?></span></h4>

                <?php
                    require './require/productos_editar_form.php';
                ?>

            </div>
            <?php
                }
            ?>
        </div>
    </div>
<?php

require './require/footer.php';
