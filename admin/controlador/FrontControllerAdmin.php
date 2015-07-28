<?php

namespace erd;

require 'BackControllerAdmin.php';

$bc = new BackController();

$action = $_GET['action'];


/*
 * ROUTING FRONTCONTROLLER
 */
if ($action=="login") {
    $bc->ctrlLoginAdmin($_POST['txtUsuario'], $_POST['txtPassword']);

} else if ($action=="banners") {
    $bc->ctrlAdministrarBanners();

} else if ($action=="nuevobanner") {
    $bc->ctrlAgregarNuevoBanner($_POST['rutaImagen'], $_POST['archivoImagen'], $_POST['descripcionImagen']);
            
}
