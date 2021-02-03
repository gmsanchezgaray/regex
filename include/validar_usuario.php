<?php
    /** @var TYPE_NAME $errores */



/* ------------------------------------------------------------------------------------*/
/*                               Name validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
}


$nombreMinimo = 3;
$nombreMaximo = 45;
$nombreCaracteres = strlen($nombre);


if ($nombre === '') {

    $errores .= 'El nombre no puede estar vacío.<br>';

    } elseif ($nombreCaracteres < $nombreMinimo) {

    $errores .= 'El nombre debe ser mayor a 3 carácteres.<br>';

    }  elseif($nombreCaracteres > $nombreMaximo){

    $errores .= 'El nombre debe ser menor a 45 carácteres.<br>';

    }

/* ------------------------------------------------------------------------------------*/
/*                              Email validation                                       */
/* ------------------------------------------------------------------------------------*/


if (isset($_POST['correo'])) {
    $correo = trim($_POST['correo']);
}
$correoMaximo = 45;
$correoCaracteres = strlen($correo);


    if($correo === ''){

        $errores .= 'El correo no puede estar vacío.<br>';

    } elseif (!strpos($correo, "@") &&  !strpos($correo, ".")){

        $errores .='El correo debe ser un valor válido.<br>';

    } elseif($correoCaracteres > $correoMaximo){

        $errores .= 'El correo debe ser menor a 45 carácteres.<br>';

    }

/* ------------------------------------------------------------------------------------*/
/*                               User validation                                       */
/* ------------------------------------------------------------------------------------*/

if (isset($_POST['usuario'])) {
    $usuario = trim($_POST['usuario']);
}

$usuarioMinimo = 3;
$usuarioMaximo = 45;
$usuarioCaracteres = strlen($usuario);

    if($usuario === ''){

        $errores .= 'El usuario no puede estar vacío.<br>';

    } elseif ($usuarioCaracteres < $usuarioMinimo) {

        $errores .= 'El usuario debe ser mayor a 3 carácteres.<br>';

    }  elseif($usuarioCaracteres > $usuarioMaximo){

        $errores .= 'El usuario debe ser menor a 45 carácteres.<br>';

    }


/* ------------------------------------------------------------------------------------*/
/*                           Password validation                                       */
/* ------------------------------------------------------------------------------------*/


if (isset($_POST['contrasena'])) {
    $contrasena = trim($_POST['contrasena']);
}

$contrasenaMinimo = 3;
$contrasenaMaximo = 45;
$contrasenaCaracteres = strlen($contrasena);

if($contrasena === ''){

    $errores .= 'La contraseña no puede estar vacío.<br>';

} elseif ($contrasenaCaracteres < $contrasenaMinimo) {

    $errores .= 'La contraseña debe ser mayor a 3 carácteres.<br>';

}  elseif($contrasenaCaracteres > $contrasenaMaximo){

    $errores .= 'La contraseña debe ser menor a 45 carácteres.<br>';

}

/* ------------------------------------------------------------------------------------*/
/*                               Role validation                                       */
/* ------------------------------------------------------------------------------------*/

$listaRol = array('1','2','3','4');

if (isset($_POST['rol'])) {
    $rol = trim($_POST['rol']);
}


if(empty($rol)){

    $errores .= 'El rol no puede estar vacío.<br>';

}elseif (!in_array($rol,$listaRol)){

    $errores .= 'El valor de el rol no es válido.<br>';

}