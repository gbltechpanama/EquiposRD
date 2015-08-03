<?php
namespace erd;

require_once '../modelo/ModeloCliente.php';

class BackControllerCliente
{

    //public static $rutaAplicacion = "http://localhost/erd/";
    private $descripcionGeneralNegocio;
    private $nombreSubLineaNegocio;
    private $descipcionLineaNegocio;
    private $rutaCatalogo;
    private $rutaImagenSubLinea;
    private $rutaImagenSubLineaEspecifico;

    private $rutaIntegradores;
    private $productos;
    private $rutaBanners;
    private $descripcionBanners;
    private $idAcademia;
    private $titulosAcademia;
    private $rutaImagenesAcademia;
    private $contenidoAcademia;
    private $fechaAcademia;
        
    public function controlPaginaPrincipal()
    {

        $modelCliente = new ModeloCliente();

        $this->rutaBanners = $modelCliente->modelObtenerRutaBanners();
    
        $this->descripcionBanners = $modelCliente->modelObtenerDescripcionBanners();
 
        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        session_start();

        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;
    
        header("Location: ../vista/home.php");
    }

    public function controlObtenerInformacionGeneral($lineaNegocio)
    {
        
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->descripcionGeneralNegocio = $modelCliente->modelObtenerDescripcionSubLineas($lineaNegocio);

        $this->nombreSubLineasNegocio = $modelCliente->modelObtenerNombreSubLinea($lineaNegocio);
        
        $this->rutaIntegradores = $modelCliente->modelObtenerIntegradores($lineaNegocio);
  
        $this->rutaImagenSubLinea = $modelCliente->modelObtenerRutaImagenesSubLinea($lineaNegocio);


        
        /*
         * ASIGNACION VARIABLE SESION
         */
        session_start();

        $_SESSION['descripcionGeneralNegocio'] = $this->descripcionGeneralNegocio;
        
        $_SESSION['nombreSubLineaNegocio'] = $this->nombreSubLineasNegocio;
                
        $_SESSION['rutaIntegradores'] = $this->rutaIntegradores;
 
        $_SESSION['rutaImagenSubLineas'] = $this->rutaImagenSubLinea;

        $_SESSION['lineaNegocio'] = $lineaNegocio;
        
        
        /*
         * LLAMAR A LA VISTA CORRESPONDIENTE
         */
        header("Location: ../vista/level1neg.php");
    }

    public function controlObtenerInformacionDetalleLinea($lineaNegocio)
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->descripcionLineaNegocio = $modelCliente->modelObtenerDescripcionLineaNegocioEspecifico($lineaNegocio);

        $this->productos = $modelCliente->modelObtenerProductos($lineaNegocio);
        
        $this->rutaCatalogo = $modelCliente->modelObtenerRutaCatalogoEspecifico($lineaNegocio);

        $this->rutaImagenSubLineaEspecifico = $modelCliente->modelObtenerRutaImagenSubLineaEspecifico($lineaNegocio);
                

        /*
         * ASIGNO A LA VARIABLE GLOBAL
         */
        session_start();
 
        //AQUI UTILIZO LA LINEA DE NEGOCIO PADRE
         $this->rutaIntegradores = $modelCliente->modelObtenerIntegradores($_SESSION['lineaNegocio']);

        
         $_SESSION['descripcionLineaNegocio'] = $this->descripcionLineaNegocio;

         $_SESSION['productos'] = $this->productos;

         $_SESSION['rutaIntegradores'] = $this->rutaIntegradores;

         $_SESSION['rutaCatalogo'] = $this->rutaCatalogo;

         $_SESSION['subLineaNegocios'] = $lineaNegocio;
         
         $_SESSION['rutaImagenSubLineaEspecifico'] = $this->rutaImagenSubLineaEspecifico;
         
        /*
         * LLAMAR A LA VISTA CORRESPONDIENTE
         */

        header("Location: ../vista/level2neg.php");
    }
    
    public function controlObtenerInformacionAcademia()
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->idAcademia=$modelCliente->modelObtenerIDArticulosAcademia();

        $this->titulosAcademia=$modelCliente->modelObtenerTituloArticulosAcademia();

        $this->contenidoAcademia=$modelCliente->modelObtenerContenidoArticulosAcademia();

        $this->fechaAcademia=$modelCliente->modelObtenerfechaArticulosAcademia();

        $this->rutaImagenesAcademia = $modelCliente->modelObtenerRutaImagenArticulosAcademia();

        /*
         * ASIGNO LAS VARIABLES DE SESSION NECESARIAS
         */
        session_start();
        $_SESSION['idAcademia'] =$this->idAcademia;
        $_SESSION['titulosAcademia']=$this->titulosAcademia;
        $_SESSION['contenidoAcademia']=$this->contenidoAcademia;
        $_SESSION['fechaAcademia']= $this->fechaAcademia;
        $_SESSION['rutaImagenesAcademia']=$this->rutaImagenesAcademia;


        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/academy.php");
    }
}
