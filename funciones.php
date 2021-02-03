<?php

function getAlert($alertText, $alertClass = 'alert-info') {
    return <<< HTML_ALERT
    <div class="alert $alertClass alert-dismissible fade show" role="alert">
        $alertText
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    HTML_ALERT;
}

function iniciarVariables(){
    global $nombre, $precio, $stock, $categoria, $marca, $imagen, $garantia, $descripcion, $envio,  $sitioWeb, $observaciones;
    $nombre = '';
    $precio = '';
    $stock = '';
    $categoria = '';
    $marca = '';
    $imagen = '';
    $garantia = '';
    $descripcion = '';
    $envio = '0';
    $sitioWeb = '';
    $observaciones = '';

}



function sortSeteados(){

    $host= $_SERVER["HTTP_HOST"];
    $url= $_SERVER["REQUEST_URI"];

    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }else{
        $sort = 'DESC';
    }
    $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';


    if($sort == 'DESC'){
        $flecha = <<<EOD
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
        </svg>
        EOD;
        $flechaId = <<<EOD
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.204 11L8 5.519 12.796 11H3.204zm-.753-.659l4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z"/>
        </svg>
        EOD;
    }else{
        $flecha = <<<EOD
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.204 11L8 5.519 12.796 11H3.204zm-.753-.659l4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z"/>
        </svg>
        EOD;
        $flechaId = <<<EOD
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
        </svg>
        EOD;
    }


    if($url != '/curso-php/regex/lista_productos.php'){
             ?>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=id_producto&&sort=$sort" ?>">Id <?= $flechaId ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=nombre&&sort=$sort" ?>">Nombre <?= $flecha ?></a></th>
             <th scope="col" class="pl-2 pr-2"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=precio&&sort=$sort" ?>">Precio <?= $flecha ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=stock&&sort=$sort" ?>">Stock <?= $flecha ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=id_categoria&&sort=$sort" ?>">Categoria <?= $flecha ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=id_marca&&sort=$sort" ?>">Marca <?= $flecha ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=garantia&&sort=$sort" ?>">Garantia <?= $flecha ?></a></th>
             <th scope="col" class="text-nowrap"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=envio_sin_cargo&&sort=$sort" ?>">Envío <?= $flecha ?></a></th>
             <th scope="col"><a class="vinculo" href="<?= "http://" . $host . $url . "&order=fecha_de_alta&&sort=$sort" ?>">Fecha <?= $flecha ?></a></th>
             <th scope="col">Descripción</th>
             <th scope="col">Acciones</th>
<?php
         }
}

function iniciarVariablesCliente(){
    global $nombre, $correo, $usuario, $contrasena;
    $nombre = '';
    $correo = '';
    $usuario = '';
    $contrasena = '';
}

function iniciarVariablesUsuario(){
    global $nombre, $correo, $usuario, $contrasena, $rol;
    $nombre = '';
    $correo = '';
    $usuario = '';
    $contrasena = '';
    $rol = '';
}