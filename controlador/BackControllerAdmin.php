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
    private $idProductos;
    private $productos;
    private $nombreLineasNegocio;
    private $idIntegradores;
    private $integradores;
    
    
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
        
        $this->rutaBanners = $modelCliente->mdlObtenerRutaBanners();

        $this->descripcionBanners = $modelCliente->mdlObtenerDescripcionBanners();
        
        
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
        $this->rutaImagenesSubLineas = $modelCliente->mdlObtenerRutaImagenesSubLinea($lineaNegocio);
        
        $this->nombreSubLineas= $modelCliente->mdlObtenerNombreSubLinea($lineaNegocio);
        
        $this->descripcionSubLineas = $modelCliente->mdlObtenerDescripcionSubLineas($lineaNegocio);
        
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
        
        $this->rutaCatalogoEspecifico = $modelCliente->mdlObtenerRutaCatalogoEspecifico($subLineaNegocio);
        
        $this->rutaImagenSubLineaEspecifico = $modelCliente->mdlObtenerRutaImagenSubLineaEspecifico($subLineaNegocio);
        
        $this->descripcionSubLineaEspecifico =
                $modelCliente->mdlObtenerDescripcionLineaNegocioEspecifico($subLineaNegocio);
        
        
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
    
    public function ctrlModificarSubLinea($subLineaNegocio, $nombreNuevo, $objImagen, $rutaCatalogo, $descripcion)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlModificarSubLineaNegocio($subLineaNegocio, $nombreNuevo, $objImagen, $rutaCatalogo, $descripcion);
        
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: FrontController.php?action=lineanegocio&lineaNegocio=".$_SESSION['nombreLineaNegocio']);
        
    }

    
    public function ctrlCargarSubLineasNegocios()
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        
        $this->nombreSubLineas = $modelAdmin->mdlObtenerTodasSubLineasNegocios();
        
        
        /*
         * VARIABLE DE SESION QUE SE UTILIZARA EN LA VISTA
         */
        $_SESSION['todasSubLineasNegocio'] = $this->nombreSubLineas;
        
        
        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/formSeleccionSubLinea.php");
        
    }
    
    public function ctrlAdministrarProductos($subLinea)
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
         * METODOS DEL OBJETO MODELO
         */
        $this->idProductos = $modelAdmin->mdlObtenerIdProducto($subLinea);
        
        $this->productos = $modelCliente->mdlObtenerProductos($subLinea);
        
        /*
         * VARIABLES DE SESION
         */
        $_SESSION['idProductos'] = $this->idProductos;
        $_SESSION['productos'] = $this->productos;
        $_SESSION['subLineaNegocios'] = $subLinea;
        
        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/administrarProductos.php");
    }
    
    
    public function ctrlAgregarProducto($subLinea, $nombreProducto)
    {
        $modelAdmin = new ModeloAdmin();
      
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlAgregarProducto($subLinea, $nombreProducto);
        
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: FrontController.php?action=productos&subLinea=".$subLinea);
    }
    
    
    public function ctrlEliminarProducto($idProducto)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlEliminarProducto($idProducto);
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: FrontController.php?action=productos&subLinea=".$_SESSION['subLineaNegocios']);
        
    }
    
    public function ctrlCargarLineasNegocios()
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        
        $this->nombreLineasNegocio = $modelAdmin->mdlObtenerTodasLineasNegocios();
       
        
        /*
         * VARIABLE DE SESION QUE SE UTILIZARA EN LA VISTA
         */
        $_SESSION['todasLineasNegocio'] = $this->nombreLineasNegocio;
        
        
        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/formSeleccionLineaNegocio.php");
        
    }
    
    public function ctrlAdministrarIntegradores($lineaNegocio)
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
        
        $this->idIntegradores = $modelAdmin->mdlObtenerIdIntegradores($lineaNegocio);
        
        $this->integradores = $modelCliente->mdlObtenerIntegradores($lineaNegocio);
        
        /*
         * VARIABLES DE SESION
         */
        $_SESSION['idIntegradores'] = $this->idIntegradores;
        $_SESSION['integradores'] = $this->integradores;
        $_SESSION['lineaNegocio'] = $lineaNegocio;
        
        
        /*
         * LLAMAR A LA VISTA
         */
         header("Location: ../vista/administrarIntegradores.php");
        
    }
    
    public function ctrlEliminarIntegrador($idIntegrador)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlEliminarIntegrador($idIntegrador);
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: FrontController.php?action=integradores&lineaNegocio=".$_SESSION['lineaNegocio']);
        
    }
    
    
    public function ctrlAgregarIntegrador($lineaNegocio, $objFile)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $modelAdmin->mdlAgregarIntegrador($lineaNegocio, $objFile);
        
        /*
         * LLAMAR A LA VISTA
         */
        header("Location: FrontController.php?action=integradores&lineaNegocio=".$lineaNegocio);
        
    }
}
