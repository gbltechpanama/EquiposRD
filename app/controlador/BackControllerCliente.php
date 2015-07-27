<?php
namespace erd;

require '../modelo/ModeloCliente.php';

class BackController
{

    public static $rutaAplicacion = "http://localhost/erd/";
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
       
        $model = new Modelo();

        $this->rutaBanners = $model->modelObtenerRutaBanners();

        $this->descripcionBanners = $model->modelObtenerDescripcionBanners();
        
        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        session_start();

        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;

       
        header("Location: ".$this::$rutaAplicacion."app/vista/home.php");
    }

    public function controlObtenerInformacionGeneral($lineaNegocio)
    {
        
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new Modelo();

        $this->descripcionGeneralNegocio = $model->modelObtenerDescripcionLineasNegocios($lineaNegocio);

        $this->nombreSubLineasNegocio = $model->modelObtenerNombreSubLineaNegocios($lineaNegocio);
        
        $this->rutaIntegradores = $model->modelObtenerIntegradores($lineaNegocio);
  
        $this->rutaImagenSubLinea = $model->modelObtenerRutaImagenesSubLinea($lineaNegocio);


        
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
        header("Location: ".$this::$rutaAplicacion."app/vista/level1neg.php");
    }

    public function controlObtenerInformacionDetalleLinea($lineaNegocio)
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new Modelo();

        $this->descripcionLineaNegocio = $model->modelObtenerDescripcionLineaNegocioEspecifico($lineaNegocio);

        $this->productos = $model->modelObtenerProductos($lineaNegocio);
        
        $this->rutaCatalogo = $model->modelObtenerRutaCatalogo($lineaNegocio);

        $this->rutaImagenSubLineaEspecifico = $model->modelObtenerRutaImagenSubLineaEspecifico($lineaNegocio);
                

        /*
         * ASIGNO A LA VARIABLE GLOBAL
         */
        session_start();
 
        //AQUI UTILIZO LA LINEA DE NEGOCIO PADRE
         $this->rutaIntegradores = $model->modelObtenerIntegradores($_SESSION['lineaNegocio']);

        
         $_SESSION['descripcionLineaNegocio'] = $this->descripcionLineaNegocio;

         $_SESSION['productos'] = $this->productos;

         $_SESSION['rutaIntegradores'] = $this->rutaIntegradores;

         $_SESSION['rutaCatalogo'] = $this->rutaCatalogo;

         $_SESSION['subLineaNegocios'] = $lineaNegocio;
         
         $_SESSION['rutaImagenSubLineaEspecifico'] = $this->rutaImagenSubLineaEspecifico;
         
        /*
         * LLAMAR A LA VISTA CORRESPONDIENTE
         */

        header("Location: ".$this::$rutaAplicacion."app/vista/level2neg.php");
    }
    
    public function controlObtenerInformacionAcademia()
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new Modelo();

        $this->idAcademia=$model->modelObtenerIDArticulosAcademia();

        $this->titulosAcademia=$model->modelObtenerTituloArticulosAcademia();

        $this->contenidoAcademia=$model->modelObtenerContenidoArticulosAcademia();

        $this->fechaAcademia=$model->modelObtenerfechaArticulosAcademia();

        $this->rutaImagenesAcademia = $model->modelObtenerRutaImagenArticulosAcademia();

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
        header("Location: ".$this::$rutaAplicacion."app/vista/academy.php");
    }
}
