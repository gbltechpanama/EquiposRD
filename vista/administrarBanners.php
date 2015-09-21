<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Equipos Y Controles R&D</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="js/flexslider.css" rel="stylesheet" />



<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> 
    addEventListener("load", function() { 
        setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 
    
</script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' 
      rel='stylesheet' type='text/css'>


<!-- CONFIRMAR ELIMINAR -->
<script type="text/javascript">
function confirmarEliminar(idBanner)
{
    if(confirm('Desea eliminar este registro?')){
        
        document.location.href = "../controlador/FrontController.php?action=elmbanner&idBanner=" + idBanner;
        
    }
    
}
    
</script>

</head>
<body>
    


    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> 
        <img src="img/logo.png" class="img-responsive">
      </div>
      
      <div class="menu" style="padding-top: 25px"> 
          <a class="toggleMenu" href="#"><img src="img/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">
            <li><a href="../controlador/FrontController.php?action=banners">BANNERS</a></li>

        <!-- MENU MARCAS DESPLEGABLE -->
        <script>
            /*
             * CODIGO PARA QUE EL MENU DESPLEGABLE ABRA CON MOUSEOVER
             */
            $(document).ready(function () {
               $('.dropdown-toggle').mouseover(function() {
                   $('.dropdown-menu').show();
               });

               $('.dropdown-toggle').mouseout(function() {
                   t = setTimeout(function() {
                       $('.dropdown-menu').hide();
                   }, 100);

                   $('.dropdown-menu').on('mouseenter', function() {
                       $('.dropdown-menu').show();
                       clearTimeout(t);
                   }).on('mouseleave', function() {
                       $('.dropdown-menu').hide();
                   });
               });
            });
        </script>
        
        <li class="dropdown hidden-sm hidden-xs">
            <a href="" data-toggle="dropdown" class="dropdown-toggle">Marcas <b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: #ffffff;">
                <li style="width: 100%">
                    <a href="../controlador/FrontController.php?action=lineanegocio&lineaNegocio=hubbell" style="color: #009900">
                        Hubbell
                    </a>
                </li>
                
                <li style="width: 100%">
                    <a href="../controlador/FrontController.php?action=lineanegocio&lineaNegocio=eclipse" style="color: #009900">
                        Eclipse
                    </a>
                </li>
            </ul>
        </li>
        <!-- FIN DE MENU MARCAS DESPLEGALE -->
        
        <li class="hidden-md hidden-lg visible-sm visible-xs">
            <a href="../controlador/FrontController.php?action=lineanegocio&lineaNegocio=hubbell">MARCA HUBBELL</a>
        </li>
        
        <li class="hidden-md hidden-lg visible-sm visible-xs">
            <a href="../controlador/FrontController.php?action=lineanegocio&lineaNegocio=eclipse">MARCA ECLIPSE</a>
        </li>
        
        
        <li><a href="../controlador/FrontController.php?action=cargarsublineas">PRODUCTOS</a></li>
        <li><a href="../controlador/FrontController.php?action=cargarlineas">INTEGRADORES</a></li>
        <li><a href="../controlador/FrontController.php?action=administraracademia">ACADEMIA</a></li>
        <li><a href="formCambioClave.php">CAMBIO CLAVE ADMIN</a></li>
      </ul>
      <script type="text/javascript" src="js/responsive-nav.js"></script> 
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
    

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>


<!-- CENTRO -->
<div class="featured_content" id="feature" style="height: 600px">
    
    <div class="container" style="height: 600px">
      
    <div class="row text-center">

        <div class="col-md-12" style="margin-top: 10px;">
            
            <!-- INDICADOR DE SECCION -->
            <div style="width: 100%; text-align: right; color: green; font-size: 18px; font-weight: bold">BANNERS</div>

            <div style="margin-top: 90px; width: 100%">
                <a href="formAgregarBanner.php"> 
                    <img src="img/btnAgregar.jpg" style=" float: left;" border="0">
                </a>
            </div>
            
            <table border="1" style="margin-top: 140px; width: 100%; font-size: 13px; background-color: white">
                <tr style="font-weight: bold;">
                    <td style="width: 4%">
                        ID
                    </td>
                    <td style="width: 10%">
                        RUTA BANNER
                    </td>
                    <td style="width: 60%">
                        DESCRIPCION BANNER
                    </td>
                    <td style="width: 5%">
                        VER
                    </td>
                    <td style="width: 5%">
                        ELM
                    </td>
                </tr>
                
                <?php
                
                $n = count($_SESSION['idBanners']);

                for ($i=0; $i<$n; $i++) {
                    echo "<tr>";
                    echo "<td>".$_SESSION['idBanners'][$i]."</td>";
                    echo "<td>".$_SESSION['rutaBanners'][$i]."</td>";
                    echo "<td>".$_SESSION['descripcionBanners'][$i]."</td>";
                    echo "<td>";
                        echo "<a href='../controlador/FrontController.php?action=verbanner&idBanner=".$_SESSION['idBanners'][$i]."'>";
                            echo "<img src='img/iconoBuscar.jpg'>";
                        echo "</a>";
                    echo "</td>";
                    
                    echo "<td>";
                        echo "<a href='#' onclick='confirmarEliminar(".$_SESSION['idBanners'][$i].")'>";
                            echo "<img src='img/iconoEliminar.jpg'>";
                        echo "</a>";
                    echo "</td>";
                    
                    echo "</tr>";
                }

                ?>
                
            </table>

        </div>

      </div>

  </div>

</div>

  
    
 <!-- PIE DE PAGINA -->
  <div class="footer_bottom">
    <div class="copy">
      <p>
          &copy; 2015 Equipos y Controles R&D, C.A. RIF: J-31371186-1 TODOS LOS DERECHOS RESERVADOS.
          <br>
          <a href="http://www.gbltechpanama.com" target="_blank">
              <img src="img/gbltech.png" style="width: 100px;">
          </a>
      </p>
  </div>
  
  
</div>

<script src="js/jquery.flexslider.js"></script>

<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
</script>
  
</body>
</html>
