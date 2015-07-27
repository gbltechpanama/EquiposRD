<?php
namespace erd;

require '../../ORM.php';

class Modelo
{

    public function mdlValidarLogin($usuario, $password)
    {
        $BD = new BaseDatos();
        
        $sql = "Select * from privilegios where usuario = ".$usuario." and password = md5('".$password."')";

        $resultado = $BD->modelQueryDB($sql);

        if (mysql_num_rows($resultado)>0) {
            return true;
        } else {
            return false;
        }
        
    }
}
