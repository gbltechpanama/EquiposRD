<?php
namespace erd;

require_once '../ORM.php';

class ModeloCliente
{

    /*
     * PAGINA PRINCIPAL
     */
    public function modelObtenerRutaBanners()
    {
        $BD = new BaseDatos();

        $sql = "Select rutaBanner from banners order by idBanner";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerDescripcionBanners()
    {
        $BD = new BaseDatos();

        $sql = "Select descripcionBanner from banners order by idBanner";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    /*
     * LINEAS DE NEGOCIO LEVEL 1
     */

    public function modelObtenerDescripcionLineasNegocios($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select descripcionSubLinea from lineasnegocios where "
                . "nombreLineaPadre = '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    
    public function modelObtenerIntegradores($lineaNegocio) //LEVEL 1 Y LEVEL 2
    {
        $BD = new BaseDatos();

        $sql = "Select rutaLogo from integradores where "
                . "nombreLineaPadre = '".$lineaNegocio."' order by idIntegradores";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function modelObtenerRutaImagenesSubLinea($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select rutaImagenSubLinea from lineasnegocios where nombreLineaPadre "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;

    }

    public function modelObtenerNombreSubLineaNegocios($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select nombreSubLineaNegocio from lineasnegocios where nombreLineaPadre "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);
                
        return $data_array;

    }

    /*
     * LINEAS DE NEGOCIOS LEVEL 2
     */

    public function modelObtenerDescripcionLineaNegocioEspecifico($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select descripcionSubLinea from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_array($resultado);

        $data = $row[0];

        return $data;
    }

    public function modelObtenerRutaImagenSubLineaEspecifico($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select rutaImagenSubLinea from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_array($resultado);

        $data = $row[0];

        
        return $data;
    }
    
    public function modelObtenerProductos($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select nombreProducto from productos where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }


    public function modelObtenerRutaCatalogo($lineaNegocio)
    {
        $BD = new BaseDatos();

        $sql = "Select enlaceCatalogo from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $BD->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);

        $data = $row[0];

        return $data;
    }


    


    /*
     * ACADEMIA
     */
    public function modelObtenerIDArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select idAcademia from academia";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerTituloArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select tituloArticulo from academia";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerRutaImagenArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select rutaFotoArticulo from academia";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerContenidoArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select contenidoArticulo from academia";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }

    public function modelObtenerfechaArticulosAcademia()
    {
        $BD = new BaseDatos();

        $sql = "Select fechaPublicacion from academia";

        $resultado = $BD->modelQueryDB($sql);

        $data_array = $BD->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
}
