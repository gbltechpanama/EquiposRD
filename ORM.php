<?php

namespace erd;

class ORM
{

    /*
     *  MANEJO DE BASE DE DATOS
     */

    private function leerArchivoConfig()
    {


    }
    
    private function modelAbrirConexionBD()
    {
        $conn_string = "host=localhost port=5432 dbname=erd user=postgres password=123456";

        $conexion = pg_connect($conn_string);

        return $conexion;
    }

    public function modelQueryDB($query)
    {
        $conexion = $this->modelAbrirConexionBD();

        $resultado=pg_query($conexion, $query);

        $this->modelCerrarConexionBD();

        return $resultado;
    }
    
    private function modelCerrarConexionBD()
    {

        pg_close();

    }
}
