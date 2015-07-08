<?php

namespace erd;

class ORM
{

    /*
     *  MANEJO DE BASE DE DATOS
     */
    private static $servidor = "localhost";
    private static $puerto = "3306";
    private static $baseDatos = "erd";
    private static $usuario = "root";
    private static $password = "";
    
    private function modelAbrirConexionBD()
    {

        $conexion = mysql_connect($this::$servidor, $this::$usuario, $this::$password);
        
        mysql_select_db($this::$baseDatos, $conexion);
                
        return $conexion;
        
    }

    public function modelQueryDB($query)
    {
        $conexion = $this->modelAbrirConexionBD();
        
        $resultado = mysql_query($query, $conexion);
        
        $this->modelCerrarConexionBD();

        return $resultado;
    }
    
    private function modelCerrarConexionBD()
    {
        mysql_close();
    }
}
