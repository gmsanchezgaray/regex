<?php
    require_once './class/Usuario.php';
    require './require/header.php';
    require_once 'funciones.php';

/** @var string $nombre */
/** @var string $correo */
/** @var string $usuario */
/** @var string $contrasena */
/** @var string $rol */



    ///Start the variables, where the inputs will be empty ''
    iniciarVariablesUsuario();

    $errores = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include './include/validar_usuario.php';

        if($errores != '') {
            $mensajeUsuario = getAlert($errores, 'alert-danger');
        }else{

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
            $rol = isset($_POST['rol']) ? $_POST['rol'] : '';

            $user = Usuario::createUser($nombre,$correo,$usuario,$contrasena,$rol);

            if(Usuario::getCount() > 0){
                $mensajeUsuario = getAlert('Se ha registrado el usuario de manera exitosa.', 'alert-success');

                iniciarVariablesUsuario();

            }else{

                $mensajeUsuario = getAlert('No se ha podido registrar el usuario en la base de datos.', 'alert-success');

            }

        }
    }
    ?>

    <div class="container row-cols-1 my-5">
        <div class="card container col-md-6 px-0">
            <h4 class="text-primary card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd"
                          d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                Crear un usuario
            </h4>
            <?= $mensajeUsuario ?? '' ?>
            <div class="card-body">

                <?php
                require './require/registro_usuario_form.php';
                ?>

            </div>
    </div>
</div>

<?php
    require './require/footer.php';