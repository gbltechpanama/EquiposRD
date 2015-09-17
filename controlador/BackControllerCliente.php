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
        
    private $resultadoEnvio;
    
    public function ctrlPaginaPrincipal()
    {

        $modelCliente = new ModeloCliente();

        $this->rutaBanners = $modelCliente->mdlObtenerRutaBanners();
    
        $this->descripcionBanners = $modelCliente->mdlObtenerDescripcionBanners();
 
        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        session_start();

        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;
    
        header("Location: ../vista/home.php");
    }

    public function ctrlObtenerInformacionGeneral($lineaNegocio)
    {
        
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->descripcionGeneralNegocio = $modelCliente->mdlObtenerDescripcionSubLineas($lineaNegocio);

        $this->nombreSubLineasNegocio = $modelCliente->mdlObtenerNombreSubLineasNegocios($lineaNegocio);
        
        $this->rutaIntegradores = $modelCliente->mdlObtenerIntegradores($lineaNegocio);
  
        $this->rutaImagenSubLinea = $modelCliente->mdlObtenerRutaImagenSubLinea($lineaNegocio);


        
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

    public function ctrlObtenerInformacionDetalleLinea($lineaNegocio)
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->descripcionLineaNegocio = $modelCliente->mdlObtenerDescripcionLineaNegocioEspecifico($lineaNegocio);

        $this->productos = $modelCliente->mdlObtenerProductos($lineaNegocio);
        
        $this->rutaCatalogo = $modelCliente->mdlObtenerRutaCatalogoEspecifico($lineaNegocio);

        $this->rutaImagenSubLineaEspecifico = $modelCliente->mdlObtenerRutaImagenSubLineaEspecifico($lineaNegocio);
                

        /*
         * ASIGNO A LA VARIABLE GLOBAL
         */
        session_start();
 
        //AQUI UTILIZO LA LINEA DE NEGOCIO PADRE
         $this->rutaIntegradores = $modelCliente->mdlObtenerIntegradores($_SESSION['lineaNegocio']);

        
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
    
    public function ctrlObtenerInformacionAcademia()
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $modelCliente = new ModeloCliente();

        $this->idAcademia=$modelCliente->mdlObtenerIDArticulosAcademia();

        $this->titulosAcademia=$modelCliente->mdlObtenerTituloArticulosAcademia();

        $this->contenidoAcademia=$modelCliente->mdlObtenerContenidoArticulosAcademia();

        $this->fechaAcademia=$modelCliente->mdlObtenerfechaArticulosAcademia();

        $this->rutaImagenesAcademia = $modelCliente->mdlObtenerRutaImagenArticulosAcademia();

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
    
    public function ctrlEnviarInformacion($zona, $nombre, $rif, $remitente, $mensaje)
    {
        $modelCliente = new ModeloCliente();
        
        if ($zona=="Zona Oriente") {
            $destinatario = "jvelasquez@ryd.com.ve";
        } elseif ($zona=="Zona Central") {
            $destinatario = "jcarrillo@ryd.com.ve";
        } elseif ($zona=="Zona Occidente") {
            $destinatario = "obaptista@ryd.com.ve";
        }
        
        
        /*PRUEBA*/
        //$destinatario = "abraham.verde@gbltechpanama.com";
        
        $resultadoEnvio = $modelCliente->mdlEnviarCorreo($nombre, $rif, $remitente, $destinatario, $mensaje);
        
        if ($resultadoEnvio==true) {
            header("Location: ../vista/successEmail.php");
        } else {
            header("Location: ../vista/errorEmail.php");
        }
        
    }
}
