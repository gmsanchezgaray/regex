<?php

    require './require/header.php';
    require_once 'funciones.php';

    $mensajeUsuario = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        require_once './class/Usuario.php';

        if(!empty($_POST)){

            if(empty($_POST['usuario']) || empty($_POST['clave'])){

                $mensajeUsuario = getAlert('Ingrese su usuario y la clave', 'alert-danger');

            }else {

                /** @var mysqli_connect $link */
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];

                $loginPersona = Usuario::getLogin($usuario,$clave);


                if (Usuario::getCount() === 1 ) {

                    $id_usuario = $loginPersona->id_usuario;
                    $nombre = $loginPersona->nombre;
                    $correo = $loginPersona->correo;
                    $usuario1 = $loginPersona->usuario;
                    $rol = $loginPersona->rol;

                    $_SESSION['active'] = true;
                    $_SESSION['id_usuario'] = $id_usuario;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['usuario'] = $usuario1;
                    $_SESSION['rol'] = $rol;

                    $_SESSION['usuario_logueado'] = $usuario;
                    header('Location: index.php');
                    die;

                }else{
                    $mensajeUsuario = getAlert('Usuario y/o contraseña incorrectos', 'alert-danger');
                    session_destroy();
                }
            }
        }
    }


    if(!isset($_SESSION['active'])){
?>

<main role="main">
    <div class="container my-5">
        <div class="container mt-2 row no-gutters justify-content-center">
            <div class="card col-md-5">
                <h4 class="bg-lblue border-bottom p-2 mb-3 text-white text-center font-weight-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    Iniciar sesión
                </h4>
                <form class="form-signin card-body mb-2" method="post">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" required autofocus>
                    <label for="clave">Contraseña</label>
                    <input type="password" id="clave" name="clave" class="form-control" required>
                    <button class="btn btn-lg btn-primary btn-block my-4" type="submit">Ingresar</button>
                    <p class="small text-center">¿No tienes una cuenta? <a href="registro_cliente.php">Registrate</a></p>
                    <?= $mensajeUsuario ?>
                </form>
            </div>
        </div>
    </div>
</main>

    <?php
    }else{
        ?>
    <div class="container-fluid row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-10 card mb-3 p-md-4">
            <div class="row g-0">
                <div class="col-md-3 align-self-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-check-fill text-success" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4>Bienvenido/a <b><?= $_SESSION['nombre'] ?></b></h4>
                        <ul>
                            <li>Ir a la <a href="./index.php">página principal</a>.</li>
                            <li>Ir a la <a href="./tienda.php">tienda</a>.</li>
                            <li>Ir a los <a href="./lista_productos.php">listados de productos</a>.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    }
        require ('./require/footer.php');
