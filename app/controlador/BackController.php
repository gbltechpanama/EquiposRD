<?php
namespace erd;

class BackController
{

    public static $rutaAplicacion = "http://localhost/erd/";
    private $descripcionGeneralNegocio;
    private $descipcionLineaNegocio;
    private $rutaCatalogo;

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
        $model = new modelo();

        $this->rutaBanners = $model->M_obtenerRutaBanners();

        $this->descripcionBanners = $model->modelObtenerDescripcionBanners();

        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        session_start();

        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;

        header("Location: ".$this::$rutaAplicacion."app/vista/templates/home.php");
    }

    public function controlObtenerInformacionGeneral($lineaNegocio)
    {
        
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new modelo();

        $this->descripcionGeneralNegocio = $model->modelObtenerDescripcionGeneralNegocio($lineaNegocio);

        $this->rutaIntegradores = $model->modelObtenerIntegradores($lineaNegocio);


        /*
         * ASIGNACION VARIABLE SESION
         */
        session_start();

        $_SESSION['descripcionGeneralNegocio'] = $this->descripcionGeneralNegocio;

        $_SESSION['rutaIntegradores'] = $this->rutaIntegradores;


        if ($lineaNegocio=="hubbell") {
            $_SESSION['rutaImagen1'] = '../img/hubLevel1.jpg';
            $_SESSION['rutaImagen2'] = '../img/hubLevel2.jpg';
        } elseif ($lineaNegocio=="eclipse") {
            $_SESSION['rutaImagen1'] = '../img/eclipseLevel1.jpg';
            $_SESSION['rutaImagen2'] = '../img/eclipseLevel2.jpg';
        }


        /*
         * LLAMAR A LA VISTA CORRESPONDIENTE
         */
        header("Location: ".$this::$rutaAplicacion."app/vista/templates/level1neg.php");
    }

    public function controlObtenerInformacionDetalleLinea($lineaNegocio)
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new modelo();

        $this->descripcionLineaNegocio = $model->modelObtenerDescripcionLineaNegocio($lineaNegocio);

        $this->productos = $model->modelObtenerProductos($lineaNegocio);

        $this->rutaIntegradores = $model->modelObtenerIntegradores($lineaNegocio);

        $this->rutaCatalogo = $model->modelObtenerRutaCatalogo($lineaNegocio);

        /*
         * ASIGNO A LA VARIABLE GLOBAL
         */
         session_start();

         $_SESSION['descripcionLineaNegocio'] = $this->descripcionLineaNegocio;

         $_SESSION['productos'] = $this->productos;

         $_SESSION['rutaIntegradores'] = $this->rutaIntegradores;

         $_SESSION['rutaCatalogo'] = $this->rutaCatalogo;


        /*
         * LLAMAR A LA VISTA CORRESPONDIENTE
         */

        //header("Location: ".$this::$rutaAplicacion."app/vista/templates/level2neg.php");
    }
    
    public function controlObtenerInformacionAcademia()
    {
        /*
         * LLAMAR LAS FUNCIONES NECESARIAS DEL OBJETO MODELO
         */
        $model = new modelo();

        $this->idAcademia=$model->modelObtenerIDArticulosAcademia();

        $this->titulosAcademia=$model->modelObtenerTituloArticulosAcademia();

        $this->contenidoAcademia=$model->modelObtenerContenidoArticulosAcademia();

        $this->fechaAcademia=$model->modelObtenerfechaArticulosAcademia();

        $this->rutaImagenesAcademia = $model->modelObtenerRutaImagenArticulosAcademia();

        /*
         * ASIGNO LAS VARIABLES DE SESSION NECESARIAS
         */
        $_SESSION['idAcademia'] =$this->idAcademia;
        $_SESSION['titulosAcademia']=$this->titulosAcademia;
        $_SESSION['contenidoAcademia']=$this->contenidoAcademia;
        $_SESSION['fechaAcademia']= $this->fechaAcademia;
        $_SESSION['rutaImagenesAcademia']=$this->rutaImagenesAcademia;


        /*
         * LLAMADA A LA VISTA
         */
        //header("Location: ".$this::$rutaAplicacion."app/vista/templates/academia.php");
    }
}
