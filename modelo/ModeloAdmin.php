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
    
    public function mdlModificarSubLineaNegocio($subLineaNegocio, $nombreNuevo, $objImagen, $rutaCatalogo, $descripcion)
    {

        
        $BD = new BaseDatos();
        
        /*
         * SUBIR IMAGEN
         */
        $nroRandom = rand(100, 50000);
        
        $target_file = "../vista/img/".$nroRandom.".jpg";

        move_uploaded_file($objImagen["tmp_name"], $target_file);
       

        /*
         * TOMAR LA RUTA DE LA IMAGEN ACTUAL
         */
        $sql = "Select rutaImagenSubLinea from lineasnegocios where nombreSubLineaNegocio='".$subLineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $rutaImagenAnterior = $row[0];
        
        
        /*
         * ESCRIBIR DATOS EN LA BD
         */
        if ($objImagen["tmp_name"]!="") {
            $sql = "update lineasnegocios set nombreSubLineaNegocio='".$nombreNuevo.
                "', descripcionSubLinea='".$descripcion."', enlaceCatalogo='".$rutaCatalogo.
                "', rutaImagenSubLinea='img/".$nroRandom.".jpg' where nombreSubLineaNegocio='".$subLineaNegocio."'";
            
            //EJECUTAR QUERY
            $BD->modelQueryDB($sql);
            
            
            //ELIMINAR IMAGEN ANTERIOR
            unlink("../vista/".$rutaImagenAnterior);
            
        } else {
            $sql = "update lineasnegocios set nombreSubLineaNegocio='".$nombreNuevo.
                "', descripcionSubLinea='".$descripcion."', enlaceCatalogo='".$rutaCatalogo.
                "' where nombreSubLineaNegocio='".$subLineaNegocio."'";
            
            //EJECUTAR QUERY
            $BD->modelQueryDB($sql);
            
        }
    }
    
    public function mdlObtenerIdProducto($subLinea)
    {
        $BD = new BaseDatos();

        $sql = "Select idProductos from productos where nombreSubLineaNegocio "
                . "= '".$subLinea."' order by idproductos";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function mdlAgregarProducto($subLinea, $nombreProducto)
    {
        $BD = new BaseDatos();
            
        $sql = "insert into productos values ('','".$subLinea."','".$nombreProducto."')";

        $BD->modelQueryDB($sql);
    }
    
    public function mdlEliminarProducto($idProducto)
    {
        $BD = new BaseDatos();

        $sql = "delete from productos where idProductos = ".$idProducto;

        $BD->modelQueryDB($sql);
    }
    
    public function mdlObtenerTodasSubLineasNegocios()
    {
        $BD = new BaseDatos();

        $sql = "Select nombreSubLineaNegocio from lineasnegocios";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlObtenerTodasLineasNegocios()
    {
        $BD = new BaseDatos();

        $sql = "Select distinct(nombreLineaPadre) from lineasnegocios";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlObtenerIdIntegradores($lineaNegocio)
    {
        
        $BD = new BaseDatos();

        $sql = "Select idIntegradores from integradores where nombreLineaPadre = '"
                .$lineaNegocio."' order by idIntegradores";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlEliminarIntegrador($idIntegrador)
    {
        $BD = new BaseDatos();

        /*
         * TOMAR LA RUTA DE LA IMAGEN ACTUAL DEL INTEGRADOR A ELIMINAR
         */
        $sql = "select rutaLogo from integradores where idIntegradores = ".$idIntegrador;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $rutaLogoAnterior = $row[0];
        
        
        /*
         * ELIMINO DE LA BD EL REGISTRO
         */
        $sql = "delete from integradores where idIntegradores = ".$idIntegrador;

        $BD->modelQueryDB($sql);
        
        
        /*
         * ELIMINO EL ARCHIVO FISICO EN EL DIRECTORIO
         */
        unlink('../vista/'.$rutaLogoAnterior);
    }
    
    public function mdlAgregarIntegrador($lineaNegocio, $objFile)
    {
        $nroRandom = rand(100, 50000);
        
        $target_file = "../vista/img/".$nroRandom.".jpg";
        
        $temporal = move_uploaded_file($objFile["tmp_name"], $target_file);

        if ($temporal==true) {
            /*
             * GUARDAR EN LA BASE DE DATOS
             */
            $BD = new BaseDatos();
            
            $sql = "insert into integradores values ('','img/".$nroRandom.".jpg','".$lineaNegocio."')";

            $BD->modelQueryDB($sql);
        }
        
        return $temporal;
    }
    
    public function mdlObtenerIdAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select idAcademia from academia order by idAcademia desc";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlObtenerTitulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select tituloArticulo from academia order by idAcademia desc";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlObtenerFotosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select rutaFotoArticulo from academia order by idAcademia desc";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
    
    public function mdlObtenerFechaArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select fechaPublicacion from academia order by idAcademia desc";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function mdlObtenerContenidoArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select contenidoArticulo from academia order by idAcademia desc";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function mdlNuevoArticulo($tituloArticulo, $objetoFoto, $fechaArticulo, $contenidoArticulo)
    {

        
        $nroRandom = rand(100, 50000);
        
        $target_file = "../vista/img/".$nroRandom.".jpg";
        
        $temporal = move_uploaded_file($objetoFoto["tmp_name"], $target_file);

        if ($temporal==true) {
            /*
             * GUARDAR EN LA BASE DE DATOS
             */
            $BD = new BaseDatos();
            
            $sql = "insert into academia values ('','".$tituloArticulo."','".$contenidoArticulo."','img/".$nroRandom.".jpg','".$fechaArticulo."')";

            $BD->modelQueryDB($sql);
        }
        
        return $temporal;
        
    }
    
    public function mdlEliminarAcademia($idAcademia)
    {
        $BD = new BaseDatos();

        /*
         * TOMAR LA RUTA DE LA IMAGEN ACTUAL DEL INTEGRADOR A ELIMINAR
         */
        $sql = "select rutaFotoArticulo from academia where idAcademia = ".$idAcademia;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $rutaImagenAnterior = $row[0];
        
        /*
         * ELIMINO EL REGISTRO DESDE LA BD
         */
        $sql = "delete from academia where idAcademia = ".$idAcademia;

        $BD->modelQueryDB($sql);
        
        
        /*
         * ELIMINO EL ARCHIVO FISICO EN EL DIRECTORIO
         */
        unlink('../vista/'.$rutaImagenAnterior);
        
    }
    
    public function mdlObtenerFotoArticuloEspecifico($idAcademia)
    {
        $BD = new BaseDatos();

        $sql = "Select rutaFotoArticulo from academia where idAcademia = ".$idAcademia;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $data = $row[0];
                
        return $data;

    }

    public function mdlObtenerTituloArticuloEspecifico($idAcademia)
    {
        $BD = new BaseDatos();

        $sql = "Select tituloArticulo from academia where idAcademia = ".$idAcademia;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $data = $row[0];
                
        return $data;
    }
    
    
    public function mdlObtenerFechaArticuloEspecifico($idAcademia)
    {
        $BD = new BaseDatos();

        $sql = "Select fechaPublicacion from academia where idAcademia = ".$idAcademia;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $data = $row[0];
                
        return $data;
    }
    
    
    public function mdlObtenerContenidoArticuloEspecifico($idAcademia)
    {
        $BD = new BaseDatos();

        $sql = "Select contenidoArticulo from academia where idAcademia = ".$idAcademia;

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $data = $row[0];
                
        return $data;
    }
    
    public function mdlObtenerCantidadIntegradores($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select COUNT(*) from integradores where nombreLineaPadre = '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);
        
        $data = $row[0];
                
        return $data;
        
    }
    public function mdlCambiarClaveAdmin($nvaClave)
    {
        $BD = new BaseDatos();

        $sql = "update usuario set password = md5('".$nvaClave."') where usuario = 'admin'";

        $BD->modelQueryDB($sql);
    }
}
