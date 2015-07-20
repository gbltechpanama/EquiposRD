<?php
namespace erd;

require '../../ORM.php';

class Modelo
{

    /*
     * PAGINA PRINCIPAL
     */
    public function modelObtenerRutaBanners()
    {
        $orm = new ORM();

        $sql = "Select rutaBanner from banners order by idBanner";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerDescripcionBanners()
    {
        $orm = new ORM();

        $sql = "Select descripcionBanner from banners order by idBanner";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    /*
     * LINEAS DE NEGOCIO LEVEL 1
     */

    public function modelObtenerDescripcionGeneralNegocio($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select descripcionSubLinea from lineasnegocios where "
                . "nombreLineaPadre = '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    
    public function modelObtenerIntegradores($lineaNegocio) //LEVEL 1 Y LEVEL 2
    {
        $orm = new ORM();

        $sql = "Select rutaLogo from integradores where "
                . "nombreLineaPadre = '".$lineaNegocio."' order by idIntegradores";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }
    
    public function modelObtenerRutaImagenesSubLinea($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select rutaImagenSubLinea from lineasnegocios where nombreLineaPadre "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;

    }

    public function modelObtenerNombreSubLineaNegocios($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select nombreSubLineaNegocio from lineasnegocios where nombreLineaPadre "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);
                
        return $data_array;

    }

    /*
     * LINEAS DE NEGOCIOS LEVEL 2
     */

    public function modelObtenerDescripcionLineaNegocio($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select descripcionSubLinea from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $row = mysql_fetch_array($resultado);

        $data = $row[0];

        return $data;
    }

    public function modelObtenerRutaImagenSubLineaEspecifico($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select rutaImagenSubLinea from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $row = mysql_fetch_array($resultado);

        $data = $row[0];

        
        return $data;
    }
    
    public function modelObtenerProductos($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select nombreProducto from productos where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }


    public function modelObtenerRutaCatalogo($lineaNegocio)
    {
        $orm = new ORM();

        $sql = "Select enlaceCatalogo from lineasnegocios where nombreSubLineaNegocio "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $row = mysql_fetch_row($resultado);

        $data = $row[0];

        return $data;
    }


    /** UTILITARIOS **/
    public function modelConvertirEnArray($resultado)
    {
        $i = 0;

        while ($row = mysql_fetch_row($resultado)) {
                $data_array[$i] = $row[0];
                $i++;
        }

        return $data_array;
    }
    /************************************************/


    /*
     * ACADEMIA
     */
    public function modelObtenerIDArticulosAcademia()
    {
        $orm = new ORM();

        $sql = "Select idAcademia from academia";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerTituloArticulosAcademia()
    {
        $orm = new ORM();

        $sql = "Select tituloArticulo from academia";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerRutaImagenArticulosAcademia()
    {
        $orm = new ORM();

        $sql = "Select rutaFotoArticulo from academia";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerContenidoArticulosAcademia()
    {
        $orm = new ORM();

        $sql = "Select contenidoArticulo from academia";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
        
    }

    public function modelObtenerfechaArticulosAcademia()
    {
        $orm = new ORM();

        $sql = "Select fechaPublicacion from academia";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
}
