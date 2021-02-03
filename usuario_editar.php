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

$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

$user = Usuario::getById($id_usuario);


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

            $user = Usuario::updateUser($nombre,$correo,$usuario,$contrasena,$rol);

            if(Usuario::getCount() > 0){
                $alertText = <<< HTML_TEXT
                        <p>Se actualizo el usuario de manera exitosa.</p>
                        <p><a href="usuarios_listado.php">Volver a la lista de usuarios.</a></p>
                    HTML_TEXT;

                $mensajeUsuario = getAlert($alertText, 'alert-success');


            }else{

                $mensajeUsuario = getAlert('No se ha podido actualizar el usuario en la base de datos.', 'alert-success');

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
                Editar un usuario
            </h4>
            <?= $mensajeUsuario ?? '' ?>


            <?php
            if(!isset($_POST['actualizar']) || $errores !== ''){
            ?>
            <div class="card-body">

                <h4>Id del usuario a modificar: <span class="text-info"><?= $user->id_usuario?></span></h4>

                <form action="" method="post" class="container row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nombre">Nombre <span class="small text-danger">(*)</span></label>
                                <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $user->nombre ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="correo">E-mail <span class="small text-danger">(*)</span></label>
                                <input type="email" name="correo" class="form-control" id="correo" value="<?= $user->correo ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="usuario">Usuario<span class="small text-danger">(*)</span></label>
                                <input type="text" name="usuario" class="form-control" id="usuario" value="<?= $user->usuario ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="contrasena">Contraseña<span class="small text-danger">(*)</span></label>
                                <input type="password" name="contrasena" class="form-control" id="contrasena">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="rol">Rol <span class="small text-danger">(*)</span></label>
                                <select id="rol" name="rol" class="form-control">
                                    <option value="">Seleccioná una rol</option>
                                    <option value="1" <?php if($user->rol === '1'){echo "checked";} ?>>Administrador</option>
                                    <option value="2" <?php if($user->rol === '2'){echo "checked";} ?>>Supervisor</option>
                                    <option value="3" <?php if($user->rol === '3'){echo "checked";} ?>>Vendedor</option>
                                    <option value="4" <?php if($user->rol === '4'){echo "checked";} ?>>Cliente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 align-self-end">
                            <button type="submit" name="actualizar" class="btn btn-primary ml-md-2">Actualizar</button>
                            <a class="btn btn-outline-primary" href="usuarios_listado.php">Cancelar</a>
                        </div>
                    </div>
                </form>

            </div>

    <?php
            }
    ?>
    </div>
</div>

<?php
    require './require/footer.php';