<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>VERSION PRUEBAS</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="js/flexslider.css" rel="stylesheet" />

<!-- SE INCLUYEN LA LIBRERIA JQUERY, FANCYBOX Y EL ESTILO DE FANCYBOX.CSS -->
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css" media="screen" />


<!-- SCRIPT ARRANQUE FANCYBOX -->
<script>

    $(document).ready(function() {
            <!-- FANCYBOX -->
            $(".fancybox").fancybox();
    
            $("a#single_image").fancybox();
    });

</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> 
    addEventListener("load", function() { 
        setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 
    
</script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' 
      rel='stylesheet' type='text/css'>


</head>
<body>
    


    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> 
        <img src="img/logo.png">
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
        <li class="dropdown"">
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
        
        <li><a href="../controlador/FrontController.php?action=cargarsublineas">PRODUCTOS</a></li>
        <li><a href="../controlador/FrontController.php?action=cargarlineas">INTEGRADORES</a></li>
        <li><a href="../controlador/FrontController.php?action=administraracademia">ACADEMIA</a></li>
        
      </ul>
      <script type="text/javascript" src="js/responsive-nav.js"></script> 
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
    

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>


<!-- CENTRO -->
<div class="featured_content" id="feature" style=" height: 850px">
    
    <div class="container">
      
    <div class="row text-center">

        <div class="col-md-12" style="margin-top: 10px;">
            
            <!-- INDICADOR DE SECCION -->
            <div style="width: 100%; text-align: right; color: green; font-size: 18px; font-weight: bold">
            <?php
                echo 'MARCA '.strtoupper($_SESSION['nombreLineaNegocio']);
            ?>
            </div>
            
            <div style="margin-top: 30px; height: 230px; text-align: left;">
                <div style="float: left"> 
                    <span><b>IMAGEN PRINCIPAL</b></br><br></span>
                    <?php
                    
                    if ($_SESSION['nombreLineaNegocio']=='hubbell') {
                        echo '<img src ="img/hubbell.jpg" style="width: 441px; height: 195px">';

                    } elseif ($_SESSION['nombreLineaNegocio']=='eclipse') {
                        echo '<img src ="img/eclipse.jpg" style="width: 441px; height: 195px">';
                    }
                    ?>
                   
                </div>
                
                <div style=" width: 160px; float: left; margin-top: 180px; margin-left: 45px;">
                    <?php
                        echo '<a href="formCambiarImagenPrincipal.php?lineaNegocio='.$_SESSION['nombreLineaNegocio'].'">';
                    ?>
                        <img src="img/btnCambioImagen.jpg">
                    </a>
                </div>

            </div>
            
            <!-- SEPARADOR -->
            <div style="height: 1px; width: 100%; background-color: #009900; clear: both; margin-top: 50px"></div>

            
            <div>
            <div style="text-align: left"></br><br><br><b>SUB LINEA DE NEGOCIOS:</b></br><br></div>   
            <table border="1" style="margin-top: 20px; width: 100%; font-size: 13px; background-color: white">
                <tr style="font-weight: bold;">
                    <td>
                        R
                    </td>
                    <td>
                       NOMBRE SUB LINEA
                    </td>
                    <td>
                        RUTA CATALOGO
                    </td>
                    <td>
                        RUTA IMAGEN
                    </td>
                    <td style=" width: 600px;">
                        DESCRIPCION
                    </td>
                    
                    <td>
                        EDIT
                    </td>
                </tr>
                
                <?php

                $n = count($_SESSION['nombreSubLineas']);

                for ($i=0; $i<$n; $i++) {
                    $cont = $cont + 1;
                    
                    echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$_SESSION['nombreSubLineas'][$i]."</td>";
                    echo "<td><a href='".$_SESSION['rutaCatalogos'][$i]."' target='_blank'><u>".$_SESSION['rutaCatalogos'][$i]."</u></a></td>";
                    echo "<td><a id='single_image' href='".$_SESSION['rutaImagenesSubLineas'][$i]."' target='_blank'><u>".$_SESSION['rutaImagenesSubLineas'][$i]."</u></a></td>";
                    echo "<td>".$_SESSION['descripcionSubLineas'][$i]."</td>";
                   
                    
                    echo "<td>";
                        echo "<a href='../controlador/FrontController.php?"
                              . "action=formmodsublinea&subLineaNegocio=".$_SESSION['nombreSubLineas'][$i]."'>";
                            echo "<img src='img/iconoEditar.jpg'>";
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

</div>

  
    
  <!-- PIE DE PAGINA -->
  <div class="footer_bottom">
    <div class="copy">
      <p>&copy; 2015 Equipos y Controles R&D, C.A. RIF: J-31371156-1 TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
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
