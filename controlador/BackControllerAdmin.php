<?php
namespace erd;

require_once '../modelo/ModeloAdmin.php';
require_once '../modelo/ModeloCliente.php';

class BackControllerAdmin
{
    private $loginCorrecto;
    private $idBanners;
    private $rutaBanners;
    private $descripcionBanner;
    private $uploadCorrecto;
    
    
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
    
    
    public function ctrlAgregarNuevoBanner($rutaImagen, $archivoImagen, $descripcionImagen)
    {
        $modelAdmin = new ModeloAdmin();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        session_start();
        
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->uploadCorrecto = $modelAdmin->mdlNuevoBanner($rutaImagen, $archivoImagen, $descripcionImagen);
        
        if ($this->uploadCorrecto==true) {
            header("Location: FrontController.php?action=banners");
            
        } else {
            header("Location: ../vista/errorBanner.php");
            
        }
    }
    
    public function ctrlEliminarBanner($idBanner)
    {
        
    }
    
    public function ctrlVisualizarBanner($idBanner)
    {
        
    }
}
