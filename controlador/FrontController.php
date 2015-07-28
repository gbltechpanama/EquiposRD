<?php

namespace erd;

require_once 'BackControllerCliente.php';
require_once 'BackControllerAdmin.php';

$bkCliente = new BackControllerCliente();
$bkAdmin = new BackControllerAdmin();

$action = $_GET['action'];

/*
 * ROUTING FRONTCONTROLLER CLIENTE
 */
if ($action=="principal") {
    $bkCliente->controlPaginaPrincipal();
} elseif ($action=="level1neg") {
    $linea = $_GET['linea'];
    $bkCliente->controlObtenerInformacionGeneral($linea);
} elseif ($action=="level2neg") {
    $linea = $_GET['linea'];
    $bkCliente->controlObtenerInformacionDetalleLinea($linea);
} elseif ($action=="academia") {
    $linea = $_GET['linea'];
    $bkCliente->controlObtenerInformacionAcademia();
}

/*
 * ROUTING FRONTCONTROLLER ADMINISTRADOR
 */

if ($action=="login") {
    $bkAdmin->ctrlLoginAdmin($_POST['txtUsuario'], $_POST['txtPassword']);

} elseif ($action=="banners") {
    $bkAdmin->ctrlAdministrarBanners();

} elseif ($action=="nuevobanner") {
    $bkAdmin->ctrlAgregarNuevoBanner($_POST['rutaImagen'], $_POST['archivoImagen'], $_POST['descripcionImagen']);
            
}
