<?php
    require_once './class/Usuario.php';
    require './require/header.php';
    require_once 'funciones.php';


    ///Start the variables, where the inputs will be empty ''
    iniciarVariablesCliente();

    $errores = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include './include/validar_cliente.php';

        if($errores != '') {
            $mensajeUsuario = getAlert($errores, 'alert-danger');
        }else{

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
            $rol = 4;

            $client = Usuario::createUser($nombre, $correo, $usuario, $contrasena,$rol);

            if(Usuario::getCount() > 0){
                $mensajeUsuario = getAlert('Se ha registrado la cuenta de manera exitosa.', 'alert-success');getAlert('Se dio de alta el producto de manera exitosa', 'alert-success');

                iniciarVariablesCliente();

            }else{
                $mensajeUsuario = getAlert('No se ha podido registrar la cuenta en la base de datos. Inténtelo nuevamente.', 'alert-success');getAlert('Se dio de alta el producto de manera exitosa', 'alert-success');

            }

        }
    }
    ?>

    <div class="container row-cols-1 my-5">
        <div class="card container col-md-6 px-0">
            <h4 class="text-primary card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Crear una cuenta
            </h4>
            <?= $mensajeUsuario ?? '' ?>
            <div class="card-body">

                <?php
                require './require/registro_cliente_form.php';
                ?>

            </div>
    </div>
</div>

<?php
    require './require/footer.php';