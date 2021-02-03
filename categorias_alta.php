<?php
require './require/header.php';
require_once 'funciones.php';
require_once './class/Categoria.php';

/** @var string $nombre */

$errores = '';
$nombre = '';

/* ------------------------------------------------------------------------------------*/
/*                          Category validation                                        */
/* ------------------------------------------------------------------------------------*/


if (isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
}


$nombreMinimo = 3;
$nombreMaximo = 65;
$nombreCaracteres = strlen($nombre);


if ($nombre === '') {

    $errores .= 'El nombre de la categoria no puede estar vacío.<br>';

}elseif (is_numeric($nombre)){

    $errores .='El nombre de la categoria no debe tener valor numérico.<br>';

} elseif ($nombreCaracteres < $nombreMinimo) {

    $errores .= 'El nombre de la categoria debe ser mayor a 3 carácteres.<br>';

}  elseif($nombreCaracteres > $nombreMaximo){

    $errores .= 'El nombre de la categoria debe ser menor a 65 carácteres.<br>';

}

////////////////////////////////////////////////////////////////////////////////


/// If the page is being accessed by POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    /// If errors occurred
    if ($errores !== '') {
        /// show errors
        $mensajeUsuario = getAlert($errores, 'alert-danger');
    } else {
        /// If there were no errors in the form
        $insertCategoria = isset($_POST['nombre']) ? ucfirst($_POST['nombre']) : '';
        $categoria = Categoria::createCategoria(ucfirst($insertCategoria));

        if(Categoria::getCount() > 0){

            /// The Category is registered in the database
            $mensajeUsuario = getAlert('Se dio de alta la categoria de manera exitosa.', 'alert-success');
        }else{

            ///If there was a problem in the database
            $mensajeUsuario = getAlert(' No se pudo agregar la categoria al registro de la base de datos.', 'alert-danger');
        }


    }
}

?>
    <div class="container row-cols-1 my-5">
        <div class="card container col-md-8 px-0">
            <h4 class="text-primary card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
                    <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                </svg>
                Alta de categorias
            </h4>
            <?= $mensajeUsuario ?? '' ?>
            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="nombre">Nombre <span class="small text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" autofocus>
                        </div>
                        <div class="form-group col-lg-6 align-self-end">
                            <button type="submit" class="btn btn-primary">Cargar</button>
                            <button type="reset" class="btn btn-outline-primary">Reestablecer</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php

require './require/footer.php';
