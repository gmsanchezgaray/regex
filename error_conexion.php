<?php

require './require/header.php';

?>


<div class="container-fluid  d-flex justify-content-center py-2">
        <main role="main" class=" container inner cover row align-items-center justify-content-between py-1">
            <div class="col-md-6 ">
                <h1 class="cover-heading">Error 404</h1>
                <p class="lead">La página que estas buscando no está disponible. <br> En caso de que el problema persista, contáctenos por media de este mail <a href="#">asistencia@regex.com</a>.</p>
                <p class="lead">
                    <a href="./index.php" class="btn btn-primary">Volver al inicio</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img class="img-fluid" src="./public/error404.svg" alt="imagen de error">
            </div>
        </main>
</div>

<?php
require './require/footer.php';
