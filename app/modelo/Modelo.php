<?php
namespace erd;

class Modelo
{

    /*
     * PAGINA PRINCIPAL
     */
    public function modelObtenerRutaBanners()
    {
            $orm = new ORM();

            $sql = "Select \"rutaBanner\" from \"banners\"";
            
            $resultado = $orm->modelQueryDB($sql);
            
            $data_array = $this->modelConvertirEnArray($resultado);
            
            return $data_array;
    }

    public function modelObtenerDescripcionBanners()
    {
        $orm = new orm();

        $sql = "Select \"descripcionBanner\" from \"banners\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    /*
     * LINEAS DE NEGOCIO LEVEL 1
     */

    public function modelObtenerDescripcionGeneralNegocio($lineaNegocio)
    {
        $orm = new orm();

        $sql = "Select \"descripcionSubLinea\" from \"lineasNegocios\" where \"nombreLineaPadre\" "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    
    public function modelObtenerIntegradores($lineaNegocio) //LEVEL 1 Y LEVEL 2
    {
        $orm = new orm();

        $sql = "Select \"rutaLogo\" from \"integradores\" where \"nombreLineaPadre\" "
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
        $orm = new orm();

        $sql = "Select \"descripcionSubLinea\" from \"lineasNegocios\" where \"nombreSubLineaNegocio\" "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $row = pg_fetch_array($resultado);

        $data = $row[0];

        return $data;
    }


    public function modelObtenerProductos($lineaNegocio)
    {
        $orm = new orm();

        $sql = "Select \"nombreProducto\" from \"productos\" where \"nombreSubLineaNegocio\" "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }


    public function modelObtenerRutaCatalogo($lineaNegocio)
    {
        $orm = new orm();

        $sql = "Select \"enlaceCatalogo\" from \"lineasNegocios\" where \"nombreSubLineaNegocio\" "
                . "= '".$lineaNegocio."'";

        $resultado = $orm->modelQueryDB($sql);

        $row = pg_fetch_array($resultado);

        $data = $row[0];

        return $data;
    }


    /** UTILITARIOS **/
    public function modelConvertirEnArray($resultado)
    {
        $i = 0;

        while ($row = pg_fetch_array($resultado)) {
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
        $orm = new orm();

        $sql = "Select \"idArticulo\" from \"academia\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerTituloArticulosAcademia()
    {
        $orm = new orm();

        $sql = "Select \"tituloArticulo\" from \"academia\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerRutaImagenArticulosAcademia()
    {
        $orm = new orm();

        $sql = "Select \"rutaFotoArticulo\" from \"academia\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
    }

    public function modelObtenerContenidoArticulosAcademia()
    {
        $orm = new orm();

        $sql = "Select \"contenidoArticulo\" from \"academia\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
        
    }

    public function modelObtenerfechaArticulosAcademia()
    {
        $orm = new orm();

        $sql = "Select \"fechaPublicacion\" from \"academia\"";

        $resultado = $orm->modelQueryDB($sql);

        $data_array = $this->modelConvertirEnArray($resultado);

        return $data_array;
        
    }
}
