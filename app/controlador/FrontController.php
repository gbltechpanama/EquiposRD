<?php

namespace erd;

require("BackController.php");

$bc = new BackController();

$action = isset($_GET['action']);

/*
 * ROUTING FRONTCONTROLLER
 */
if ($action=="principal") {
    $bc->C_PaginaPrincipal();
} elseif ($action=="level1neg") {
    $linea = $_GET['linea'];
    $bc->C_obtenerInformacionGeneral($linea);
} elseif ($action=="level2neg") {
    $linea = $_GET['linea'];
    //$bc->C_obtenerInformacionGeneral($linea);
}
