<?php

namespace erd;

session_start();

require_once 'BackControllerCliente.php';
require_once 'BackControllerAdmin.php';

$bkCliente = new BackControllerCliente();
$bkAdmin = new BackControllerAdmin();

$action = $_GET['action'];



/*
 * ROUTING FRONTCONTROLLER CLIENTE
 */
if ($action=="principal") {
    $bkCliente->ctrlPaginaPrincipal();
} elseif ($action=="level1neg") {
    $linea = $_GET['linea'];
    $bkCliente->ctrlObtenerInformacionGeneral($linea);
} elseif ($action=="level2neg") {
    $linea = $_GET['linea'];
    $bkCliente->ctrlObtenerInformacionDetalleLinea($linea);
} elseif ($action=="academia") {
    $linea = $_GET['linea'];
    $bkCliente->ctrlObtenerInformacionAcademia();
}

/*
 * ROUTING FRONTCONTROLLER ADMINISTRADOR
 */

if ($action=="login") {
    $bkAdmin->ctrlLoginAdmin($_POST['txtUsuario'], $_POST['txtPassword']);

} elseif ($action=="banners") {
    $bkAdmin->ctrlAdministrarBanners();

} elseif ($action=="nuevobanner") {
    $bkAdmin->ctrlAgregarNuevoBanner($_FILES["objFile"], strtoupper($_POST['descripcionImagen']));
    
} elseif ($action=="verbanner") {
    $bkAdmin->ctrlVisualizarBanner($_GET['idBanner']);
            
} elseif ($action=="elmbanner") {
    $bkAdmin->ctrlEliminarBanner($_GET['idBanner']);
    
} elseif ($action=="lineanegocio") {
    $bkAdmin->ctrlAdministrarLineasNegocios($_GET['lineaNegocio']);
    
} elseif ($action=="cambioImagenPrincipal") {
    $bkAdmin->ctrlCambiarImagenPrincipal($_GET['lineaNegocio'], $_FILES["objFile"]);
    
} elseif ($action=="formmodsublinea") {
    $bkAdmin->ctrlFormModificarSubLinea($_GET['subLineaNegocio']);

} elseif ($action=="modsublinea") {
    $bkAdmin->ctrlModificarSubLinea($_GET['subLineaNegocio'], $_POST['txtNombre'], $_FILES['objFileImagen'], $_POST['txtRutaCatalogo'], $_POST['txtDescripcion']);
    
} elseif ($action=="cargarsublineas") {
    $bkAdmin->ctrlCargarSubLineasNegocios();
    
} elseif ($action=="productos") {
    $bkAdmin->ctrlAdministrarProductos($_REQUEST['subLinea']);
    
} elseif ($action=="agregarproducto") {
    $subLinea = $_SESSION['subLineaNegocios'];
    $bkAdmin->ctrlAgregarProducto($subLinea, $_REQUEST['nombreProducto']);
    
} elseif ($action=="eliminarproducto") {
    $bkAdmin->ctrlEliminarProducto($_REQUEST['idProducto']);
    
} elseif ($action=="cargarlineas") {
    $bkAdmin->ctrlCargarLineasNegocios();
    
} elseif ($action=="integradores") {
    $bkAdmin->ctrlAdministrarIntegradores($_REQUEST['lineaNegocio']);
    
} elseif ($action=="eliminarintegrador") {
    $bkAdmin->ctrlEliminarIntegrador($_REQUEST['idIntegrador']);
    
} elseif ($action=="agregarintegrador") {
    $bkAdmin->ctrlAgregarIntegrador($_REQUEST['lineaNegocio'], $_FILES['objFile']);
    
} elseif ($action=="administraracademia") {
    $bkAdmin->ctrlAdministrarAcademia();
    
} elseif ($action=="nuevoacademia") {
    $bkAdmin->ctrlAgregarArticuloAcademia($_REQUEST['tituloArticulo'], $_FILES['objFoto'], $_REQUEST['fechaArticulo'], $_REQUEST['contenidoArticulo']);
    
} elseif ($action=="eliminaracademia") {
    $bkAdmin->ctrlEliminarAcademia($_REQUEST['idAcademia']);
    
} elseif ($action=="veracademia") {
    $bkAdmin->ctrlVisualizarAcademia($_REQUEST['idAcademia']);
}
