<?php
namespace erd;

require '../modelo/ModeloAdmin.php';

class BackController
{

    public static $rutaAplicacion = "http://localhost/erd/";
    private $loginCorrecto;
    
    public function ctrlLoginAdmin($usuario, $password)
    {
                
        $model = new Modelo();
        
        $this->loginCorrecto = $model->mdlValidarLogin($usuario, $password);
        
        if ($this->loginCorrecto==true) {
            $_SESSION['login'] = $usuario;
            header("Location: ".$this::$rutaAplicacion."admin/vista/login.php");
            
        } else {
            $_SESSION['login'] = "";
            header("Location: ".$this::$rutaAplicacion."admin/vista/errorLogin.php");
        }

    }
}
