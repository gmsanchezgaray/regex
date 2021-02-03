<?php
/** @var string $errores */



/* ------------------------------------------------------------------------------------*/
/*                               Name validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
}


$nombreMinimo = 3;
$nombreMaximo = 65;
$nombreCaracteres = strlen($nombre);


if ($nombre === '') {

    $errores .= 'El nombre no puede estar vacío.<br>';

} elseif ($nombreCaracteres < $nombreMinimo) {

    $errores .= 'El nombre debe ser mayor a 3 carácteres.<br>';

}  elseif($nombreCaracteres > $nombreMaximo){

    $errores .= 'El nombre debe ser menor a 65 carácteres.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                              Price validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['precio'])) {
    $precio = trim($_POST['precio']);
}


if($precio === ''){

    $errores .= 'El precio no puede estar vacío.<br>';

} elseif (!is_numeric($precio)){

    $errores .='El precio debe contener un valor numérico.<br>';

} elseif($precio < 0){

    $errores .= 'El precio debe contener un valor positivo.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                              Stock validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['stock'])) {
    $stock = trim($_POST['stock']);
}


if($stock === ''){

    $errores .= 'El stock no puede estar vacío.<br>';

}

elseif (!is_numeric($stock)){

    $errores .= 'El stock debe contener un valor numérico.<br>';

}

else{

    $stock += 0;

    if(!is_int($stock)) {

        $errores .= 'El stock debe contener un valor entero.<br>';

    }

}

/* ------------------------------------------------------------------------------------*/
/*                          Categorie validation                                       */
/* ------------------------------------------------------------------------------------*/


$listaCategoria = ['1', '2', '3', '4', '5', '6',];

if (isset($_POST['categoria'])) {
    $categoria = trim($_POST['categoria']);
}


if($categoria === ''){

    $errores .= 'La categoría no puede estar vacía.<br>';

}

elseif (!in_array($categoria, $listaCategoria)) {

    $errores .= 'El valor de la categoría no es válido.<br>';
}



/* ------------------------------------------------------------------------------------*/
/*                               Brand validation                                       */
/* ------------------------------------------------------------------------------------*/

$listaMarca = ['1', '2', '3', '4', '5',];

if (isset($_POST['marca'])) {
    $marca = trim($_POST['marca']);
}


if($marca === ''){

    $errores .= 'La marca no puede estar vacía.<br>';

}

elseif (!in_array($marca,$listaMarca)){

    $errores .= 'El valor de la marca no es válido.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                           Warranty validation                                       */
/* ------------------------------------------------------------------------------------*/

$listaGarantia = array('6','12','24','36');

if (isset($_POST['garantia'])) {
    $garantia = trim($_POST['garantia']);
}


if(empty($garantia)){

    $errores .= 'La garantía no puede estar vacía.<br>';

}elseif (!in_array($garantia,$listaGarantia)){

    $errores .= 'El valor de la garantía no es válido.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                           Shipment validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['envio'])) {
    $envio = trim($_POST['envio']);
}

if($envio != '1' && $envio != '0'){

    $errores .= 'El valor de envío sin cargo no es válido<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                    Validation of Descriptions                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['descripcion'])) {
    $descripcion = trim($_POST['descripcion']);
}


$descripcionCaracteres = strlen($descripcion);
$descripcionMaximo = 500;

if($descripcion === ''){

    $errores .= 'La descripción no puede estar vacía.<br>';

}

elseif($descripcionCaracteres > $descripcionMaximo){

    $errores .= 'La descripción debe contener 500 caracteres como máximo.<br>';

}


/* ------------------------------------------------------------------------------------*/
/*                    Validation of Observations                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['observaciones'])) {
    $observaciones = trim($_POST['observaciones']);
}


