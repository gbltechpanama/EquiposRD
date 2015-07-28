<?php
namespace erd;

require '../modelo/ModeloAdmin.php';
require '../app/modelo/ModeloCliente.php';


class BackController
{
    private $loginCorrecto;
    private $idBanners;
    private $rutaBanners;
    private $descripcionBanner;
    private $uploadCorrecto;
    
    
    public function ctrlLoginAdmin($usuario, $password)
    {
                
        $model = new Modelo();
        
        $this->loginCorrecto = $model->mdlValidarLogin($usuario, $password);
        
        if ($this->loginCorrecto==true) {
            $_SESSION['login'] = $usuario;
            header("Location: ../vista/login.php");
            
        } else {
            $_SESSION['login'] = "";
            header("Location: ../vista/errorLogin.php");
        }

    }
    
    public function ctrlAdministrarBanners()
    {
        $model = new Modelo();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->idBanners = $model->mdlObtenerIDBanners();
        
        $this->rutaBanners = $model->modelObtenerRutaBanners();
        
        $this->descripcionBanners = $model->modelObtenerDescripcionBanners();
        
        
        /*
         * ASIGNO EL ARRAY A LAS VARIABLES DE SESION PARA PODERLAS USAR EN LA VISTA
         */
        session_start();

        $_SESSION['idBanners'] = $this->rutaBanners;
        $_SESSION['rutaBanners'] = $this->rutaBanners;
        $_SESSION['descripcionBanners'] = $this->descripcionBanners;
        
        
        /*
         * LLAMADA A LA VISTA
         */
        header("Location: ../vista/administrarBanners.php");
    }
    
    
    public function ctrlAgregarNuevoBanner($rutaImagen, $archivoImagen, $descripcionImagen)
    {
        $model = new Modelo();
        
        /*
         * VALIDACION DE USUARIO LOGUEADO
         */
        if ($_SESSION['login']=="") {
            header("Location: ../vista/errorLogin.php");
        }
        
        $this->uploadCorrecto = $model->mdlNuevoBanner($rutaImagen, $archivoImagen, $descripcionImagen);
        
        if ($this->uploadCorrecto==true) {
            header("Location: FrontControllerAdmin.php?accion='banners'");
            
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
