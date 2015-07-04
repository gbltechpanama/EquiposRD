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
    
	private function M_abrirConexionBD()
	{
		
                $conn_string = "host=localhost port=5432 dbname=erd user=postgres password=123456";
                                
		$conexion = pg_connect($conn_string);

		return $conexion;
	}
	
	
	
	public function M_queryDB($query)
	{      
        
                $conexion = $this->M_abrirConexionBD();
                
                $resultado=pg_query($conexion, $query);
                
                $this->M_cerrarConexionBD();
                
		return $resultado;		
	}
	
	
	
	private function M_cerrarConexionBD()
	{
		
            pg_close();
		
	}
}
?>