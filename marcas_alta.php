<?php
require './require/header.php';
require_once 'funciones.php';
require_once './class/Marca.php';

/** @var string $nombre */

$errores = '';
$nombre = '';
$sitio_web = '';
$telefono = '';
$observaciones = '';

////////////////////////////////////////////////////////////////////////////////

/* ------------------------------------------------------------------------------------*/
/*                              Brand validation                                       */
/* ------------------------------------------------------------------------------------*/

/* ------------------------------------------------------------------------------------*/
/*                              Name validation                                        */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
}


$nombreMinimo = 3;
$nombreMaximo = 65;
$nombreCaracteres = strlen($nombre);


if ($nombre === '') {

    $errores .= 'El nombre de la Marca no puede estar vacío.<br>';

}elseif (is_numeric($nombre)){

    $errores .='El nombre de la Marca no debe tener valor numérico.<br>';

} elseif ($nombreCaracteres < $nombreMinimo) {

    $errores .= 'El nombre de la Marca debe ser mayor a 3 carácteres.<br>';

}  elseif($nombreCaracteres > $nombreMaximo){

    $errores .= 'El nombre de la Marca debe ser menor a 65 carácteres.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                           Website validation                                        */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['sitio_web'])) {
    $sitio_web = trim($_POST['sitio_web']);
}


if($sitio_web === ''){

    $errores .= 'El campo del sitio web no debe estar vacío.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                         Telephone validation                                        */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['telefono'])) {
    $telefono = trim($_POST['telefono']);
}

$telefonoMinimo = 9;
$telefonoMaximo = 20;
$telefonoCaracteres = strlen($telefono);

if ($telefono === '') {

    $errores .= 'El campo del teléfono no puede estar vacío.<br>';

}elseif ($telefonoCaracteres < $telefonoMinimo){

    $errores .= 'El campo del teléfono debe tener un mínimo de 9 caracteres<br>';

}elseif ($telefonoCaracteres > $telefonoMaximo){

    $errores .= 'El campo del teléfono no debe superar los 20 caracteres<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                    Validation of Observations                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['observaciones'])) {
    $observaciones = trim($_POST['observaciones']);
}

////////////////////////////////////////////////////////////////////////////////


/// If the page is being accessed by POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    /// If errors occurred
    if ($errores !== '') {
        /// show errors
        $mensajeUsuario = getAlert($errores, 'alert-danger');
    } else {
        /// If there were no errors
        $nombre = isset($_POST['nombre']) ? ucfirst($_POST['nombre']) : '';
        $sitio_web = isset($_POST['sitio_web']) ? $_POST['sitio_web'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : '';
        $marca = Marca::createMarca(ucfirst($nombre),$sitio_web,$telefono,$observaciones);

        if(Marca::getCount() > 0){

            /// The Brand was registered in the database
            $mensajeUsuario = getAlert('Se dio de alta la marca de manera exitosa.', 'alert-success');
        }else{

            ///If there was a problem in the database
            $mensajeUsuario = getAlert(' No se pudo agregar la marca al registro de la base de datos.', 'alert-danger');
        }

    }
}

?>
    <div class="container row-cols-1 my-5">
        <div class="card container col-md-8 px-0">
            <h4 class="text-primary card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-front" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5z"/>
                </svg>
                Alta de marcas
            </h4>
            <?= $mensajeUsuario ?? '' ?>
            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="nombre">Nombre <span class="small text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" autofocus>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="sitio_web">Sitio Web <span class="small text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="sitio_web" name="sitio_web">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="telefono">Télefono <span class="small text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="form-group col-lg-6">
                            <label  for="observaciones">Observaciones</label>
                            <div>
                                <textarea class="w-100 form-control" name="observaciones" id="observaciones"  rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Cargar</button>
                            <button type="reset" class="btn btn-outline-primary">Reestablecer</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
<?php

require './require/footer.php';
