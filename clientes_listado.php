<?php
require_once './class/Usuario.php';
require './require/header.php';
require_once 'funciones.php';

/** @var mysqli_result $rs */
?>

<main role="main" class="mt5">
    <div class="mt-5">
        <div class="container mt-2">
            <div class="border-bottom mb-2 d-flex justify-content-between">
                <h4 class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Lista de clientes
                </h4>
                <div class="card flex-row col-md-4 align-items-center mb-2">
                    <form class="flex-row form-check-inline align-items-center">
                        <input type="text" name="search" class="form-control my-1 col-12" id="inlineFormInput" placeholder="Buscar. . .">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary my-1">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <?php

            $getSearch = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

            if(!isset($_GET['search'])) {
                $clients = Usuario::getAllClients();
            }else{
                $clients = Usuario::searchClient($getSearch);
            }

            if($clients){
            ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id cliente</th>
                    <th scope="col">Nombre cliente</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if(Usuario::getCount() === 1 && isset($_GET['search'])){
                    echo getAlert('Se ha encontrado 1 resultado.', 'alert-info');
                }elseif(Usuario::getCount() > 1 && isset($_GET['search'])){
                    echo getAlert('Se han encontrado ' . Usuario::getCount() . ' resultados.', 'alert-info');
                }

                foreach($clients as $client){
                ?>
                    <tr>
                        <th scope="row"><?= $client->id_usuario ?></th>
                        <td><?= $client->nombre ?></td>
                        <td><?= $client->correo ?></td>
                        <td><?= $client->usuario ?></td>
                        <td class="text-center d-flex">
                            <button class="btn btn-sm btn-warning mx-1" type="button">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-white" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </button>
                            <button class="btn btn-sm btn-danger mx-1" type="button">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-white" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php
                  }
                ?>
                </tbody>
            </table>
            <?php
            }else{
                $alert = <<<HTML_TEXT
                    <p><strong>Atención</strong></p>
                    <p>No se han encontrado resultados.</p>
                    <p><a href="registro_usuario.php"></a>Dar de alta un nuevo cliente</p>
                HTML_TEXT;
                echo getAlert($alert,'alert-info');

            }
            ?>
        </div>
    </div>
</main>

<?php
require './require/footer.php';