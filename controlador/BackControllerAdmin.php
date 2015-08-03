<?php
namespace erd;

require_once '../modelo/ModeloAdmin.php';
require_once '../modelo/ModeloCliente.php';

class BackControllerAdmin
{
    private $loginCorrecto;
    private $idBanners;
    private $rutaBanners;
    private $rutaBannersEspecifico;
    private $descripcionBanner;
    private $descripcionBannerEspecifico;
    private $uploadCorrecto;
    private $rutaImagenesSubLineas;
    private $rutaImagenSubLineaEspecifico;
    private $nombreSubLineas;
    private $descripcionSubLineas;
    private $descripcionSubLineaEspecifico;
    private $rutaCatalogos;
    private $rutaCatalogoEspecifico;
    
    public function ctrlLoginAdmin($usuario, $password)
    {
                
        $modelAdmin = new ModeloAdmin();
                
        $this->loginCorrecto = $modelAdmin->mdlValidarLogin($usuario, $password);
        
        session_start();
        
        if ($this->loginCorrecto==true) {
            $_SESSION['login'] = $usuario;
            header("Location: FrontController.php?action=banners");
            
        } else {
            $_SESSION['login'] = "";
            header("Location: ../vista/errorLogin.php");
        }

    }
    
    public function ctrlAdministrarBanners()
    {
        
        
        $modelAdmin = new ModeloAdmin();
        $modelCliente = new ModeloCliente();
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        
        $this->idBanners = $modelAdmin->mdlObtenerIDBanners();
        
        $this->rutaBanners = $modelCliente->modelObtenerRutaBanners();

        $this->descripcionBanners = $modelCliente->modelObtenerDescripcionBanners();
        
        
        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        
        $_SESSION['idBanners'] = $this->idBanners;
        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;

        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/administrarBanners.php");
    }
    
    
    public function ctrlAgregarNuevoBanner($objetoImagen, $descripcionImagen)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->uploadCorrecto = $modelAdmin->mdlNuevoBanner($objetoImagen, $descripcionImagen);
        
        if ($this->uploadCorrecto==true) {
            header("Location: FrontController.php?action=banners");
            
        } else {
            header("Location: ../vista/errorBanner.php");
            
        }
    }
    
    public function ctrlEliminarBanner($idBanner)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        /*
         * METODO DEL OBJETO MODELO PARA ELIMINAR EL BANNER
         */
        $modelAdmin->mdlEliminarBanner($idBanner);
        
        /*
         * LLAMAR A LA VISTA ADMINISTRAR BANNER
         */
        header("Location: FrontController.php?action=banners");
    }
    
    public function ctrlVisualizarBanner($idBanner)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->rutaBannersEspecifico = $modelAdmin->mdlObtenerRutaBannerEspecifico($idBanner);
        
        $this->descripcionBannerEspecifico = $modelAdmin->mdlObtenerDescripcionBannerEspecifico($idBanner);
        
        $_SESSION['rutaBannerEspecifico'] = $this->rutaBannersEspecifico;
        
        $_SESSION['descripcionBannerEspecifico'] = $this->descripcionBannerEspecifico;
        
        header("Location: ../vista/mostrarBanner.php");
        
    }
    
    public function ctrlCambiarImagenPrincipal($lineaNegocio, $objFile)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlSubirImagenPrincipal($lineaNegocio, $objFile);
        
        /*
         * LLAMAR A LA VISTA ADMINISTRAR MARCA
         */
        header("Location: FrontController.php?action=lineanegocio&lineaNegocio=".$lineaNegocio);
    }
    
    public function ctrlAdministrarLineasNegocios($lineaNegocio)
    {
        $modelAdmin = new ModeloAdmin();
        $modelCliente = new ModeloCliente();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        
        /*
         * METODOS DEL MODELO
         */
        $this->rutaImagenesSubLineas = $modelCliente->modelObtenerRutaImagenesSubLinea($lineaNegocio);
        
        $this->nombreSubLineas= $modelCliente->modelObtenerNombreSubLinea($lineaNegocio);
        
        $this->descripcionSubLineas = $modelCliente->modelObtenerDescripcionSubLineas($lineaNegocio);
        
        $this->rutaCatalogos = $modelAdmin->mdlObtenerRutaCatalogos($lineaNegocio);
        

        /*
         * VARIABLES DE SESION
         */
        $_SESSION['rutaImagenesSubLineas'] = $this->rutaImagenesSubLineas;
        $_SESSION['nombreSubLineas'] = $this->nombreSubLineas;
        $_SESSION['descripcionSubLineas'] = $this->descripcionSubLineas;
        $_SESSION['rutaCatalogos'] = $this->rutaCatalogos;
        $_SESSION['nombreLineaNegocio'] = $lineaNegocio;
        
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: ../vista/administrarMarcas.php");
    }
    
    public function ctrlFormModificarSubLinea($subLineaNegocio)
    {
        $modelAdmin = new ModeloAdmin();
        $modelCliente = new ModeloCliente();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->rutaCatalogoEspecifico = $modelCliente->modelObtenerRutaCatalogoEspecifico($subLineaNegocio);
        
        $this->rutaImagenSubLineaEspecifico = $modelCliente->modelObtenerRutaImagenSubLineaEspecifico($subLineaNegocio);
        
        $this->descripcionSubLineaEspecifico =
                $modelCliente->modelObtenerDescripcionLineaNegocioEspecifico($subLineaNegocio);
        
        
        /*
         * VARIABLES DE SESION
         */
        $_SESSION['rutaImagenSubLineaEspecifico'] = $this->rutaImagenSubLineaEspecifico;
        
        $_SESSION['descripcionSubLineaEspecifico'] = $this->descripcionSubLineaEspecifico;
        
        $_SESSION['rutaCatalogoEspecifico'] = $this->rutaCatalogoEspecifico;
     
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: ../vista/formModificarSubLinea.php?subLineaNegocio=".$subLineaNegocio);
        
    }
}
