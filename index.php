<?php
    require_once './require/header.php';
    require_once './class/Producto.php';

    if(!isset($_GET['search'])){
        ///If no search is performed, the main page is displayed for browsing.
        require_once './require/index_body.php';

    }else{
    ///If any search is made,, the content is changed to that of the store.
    require_once './tienda.php';

    }


    require ('./require/footer.php');
