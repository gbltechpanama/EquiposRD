<?php
namespace erd;

require_once '../ORM.php';

class ModeloAdmin
{

    public function mdlValidarLogin($usuario, $password)
    {
        
        
        $BD = new BaseDatos();
        
        $sql = "Select * from usuario where usuario = '".$usuario."' and password = md5('".$password."')";

        $resultado = $BD->modelQueryDB($sql);

        if (mysql_num_rows($resultado)>0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function mdlObtenerIDBanners()
    {
        $BD = new BaseDatos();

        $sql = "Select idBanner from banners order by idBanner";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function mdlNuevoBanner($objetoFile, $descripcionImagen)
    {
        $nroRandom = rand(100, 50000);
        
        $target_file = "../vista/img/".$nroRandom.".jpg";
        
        $temporal = move_uploaded_file($objetoFile["tmp_name"], $target_file);

        if ($temporal==true) {
            /*
             * GUARDAR EN LA BASE DE DATOS
             */
            $BD = new BaseDatos();
            
            $sql = "insert into banners values ('','".$descripcionImagen."','img/".$nroRandom.".jpg')";

            $BD->modelQueryDB($sql);
        }
        
        return $temporal;
    }
    
    public function mdlEliminarBanner($idBanner)
    {
        $BD = new BaseDatos();
        
        /*
         * TOMAR LA RUTA DEL BANNER A ELIMINAR
         */
        $sql = "Select rutaBanner from banners where idBanner = ".$idBanner;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $ruta = $row[0];
        
        
        /*
         * ELIMINAR EL BANNER DE LA BD
         */
        $sql = "delete from banners where idBanner = ".$idBanner;

        $BD->modelQueryDB($sql);
        
        
        /*
         * ELIMINAR EL ARCHIVO SUBIDO EN EL DIRECTORIO /IMG
         */
        unlink("../vista/".$ruta);
        
    }
    
    public function mdlObtenerRutaBannerEspecifico($idBanner)
    {
        $BD = new BaseDatos();

        $sql = "Select rutaBanner from banners where idBanner = ".$idBanner;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        return $row[0];
    }
    
    
    public function mdlObtenerDescripcionBannerEspecifico($idBanner)
    {
        $BD = new BaseDatos();

        $sql = "Select descripcionBanner from banners where idBanner = ".$idBanner;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        return $row[0];
    }
    
    public function mdlSubirImagenPrincipal($lineaNegocio, $objFile)
    {
        $target_file = $target_file = "../vista/img/";
        
        if ($lineaNegocio=="hubbell") {
            $target_file = $target_file."hubbell.jpg";
            
        } else if($lineaNegocio=="eclipse") {
            $target_file = $target_file."eclipse.jpg";
        }
        
        move_uploaded_file($objFile["tmp_name"], $target_file);
        
    }
    
    
    public function mdlObtenerRutaCatalogos($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select enlaceCatalogo from lineasnegocios where nombreLineaPadre "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
}
