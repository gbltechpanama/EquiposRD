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

}
