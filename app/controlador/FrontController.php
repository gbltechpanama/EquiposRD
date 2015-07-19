<?php

namespace erd;

require("BackController.php");

$bc = new BackController();

$action = $_GET['action'];


/*
 * ROUTING FRONTCONTROLLER
 */
if ($action=="principal") {
    $bc->controlPaginaPrincipal();
} elseif ($action=="level1neg") {
    $linea = $_GET['linea'];
    $bc->controlObtenerInformacionGeneral($linea);
} elseif ($action=="level2neg") {
    $linea = $_GET['linea'];
    $bc->controlObtenerInformacionDetalleLinea($linea);
} elseif ($action=="academia") {
    $linea = $_GET['linea'];
    $bc->controlObtenerInformacionAcademia();
}
