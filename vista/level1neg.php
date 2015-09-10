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
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> 
    addEventListener("load", function() { 
        setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' 
      rel='stylesheet' type='text/css'>

</script>
</head>
<body>
    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> 
          <a href="../controlador/FrontController.php?action=principal">
              <img src="img/logo.png" class="img-responsive">
          </a> 
      </div>
      <div class="menu" style="padding-top: 25px"> 
          <a class="toggleMenu" href="#"><img src="img/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">
        <li><a href="../controlador/FrontController.php?action=principal">INICIO</a></li>
        <li><a href="about.php">ACERCA DE</a></li>
        <li><a href="../controlador/FrontController.php?action=academia">ACADEMIA</a></li>
        
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
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Marcas <b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: #ffffff;">
                <li style="width: 100%">
                    <a href="../controlador/FrontController.php?action=level1neg&linea=hubbell" style="color: #009900">
                        Hubbell
                    </a>
                </li>
                
                <li style="width: 100%">
                    <a href="../controlador/FrontController.php?action=level1neg&linea=eclipse" style="color: #009900">
                        Eclipse
                    </a>
                </li>
            </ul>
        </li>
        <!-- FIN DE MENU MARCAS DESPLEGALE -->
        
        
        <li><a href="contact.php">CONTACTO</a></li>
      </ul>
      <script type="text/javascript" src="js/responsive-nav.js"></script> 
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
    

<!-- BARRA SUPERIOR NEGRA -->
<div id="barraSuperiorLevel1" style="background-color: #000000; height: 1px;"></div>

<!-- NOMBRE LINEA -->    
<div class="main">
    <div style=" background-image: url('img/backHeaderLine.jpg'); text-align: left; height: 108px">

       <div id="contenedorInterno">
           <br>
           <table style="width: 100%; ">
               <tr>
                   <td id="palabraLinea">
                    <?php
                        echo strtoupper($_SESSION['lineaNegocio']);
                    ?>
                   </td>
                   <td style="background-color: green;">    
                   </td>
               </tr>
           </table>
           
        </div>
    </div>
</div>

    
<!-- LINEAS NEGOCIO -->
<div style="background-color: #e8e8e8">
    <div class="container">
        
        <div class="col-md-6" style="border-right-color: #bcbcbc; border-right-style: solid; border-right-width: 1px">
            
            <table style="max-width: 440px; margin-left: auto; margin-right: auto; margin-top: 45px">
                <tr>
                    <td>
                    <?php
                        
                        echo '<img src='.$_SESSION['rutaImagenSubLineas'][0].' class="img-responsive center-block">';
                    ?>
                    </td>
                <tr>
                <tr valign = top>
                    <td>
                    <p style="text-align: justify">
                        <br>
                        <?php
                            echo $_SESSION['descripcionGeneralNegocio'][0];
                        ?>
                    </p>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <br>
                        <br>
                        <?php
                            echo "<a href='../controlador/FrontController.php?action=level2neg&linea="
                        .$_SESSION['nombreSubLineaNegocio'][0]."' class='feature_btn'>Ver Productos</a>";
                        ?>
                        
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
        
        
        <div class="col-md-6">
            
            <table style="max-width: 440px; margin-left: auto; margin-right: auto; margin-top: 45px">
                <tr>
                    <td>
                    <?php
                        echo '<img src='.$_SESSION['rutaImagenSubLineas'][1].' class="img-responsive center-block">';
                    ?>
                    </td>
                <tr>
                <tr valign = top>
                    <td>
                    <p style="text-align: justify">
                        <br>
                        <?php
                            echo $_SESSION['descripcionGeneralNegocio'][1];
                        ?>                       
                    </p>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <br>
                        <br>
                        <?php
                            echo "<a href='../controlador/FrontController.php?action=level2neg&linea="
                        .$_SESSION['nombreSubLineaNegocio'][1]."' class='feature_btn'>Ver Productos</a>";
                        ?>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
<!--SECCION INTEGRADORES-->
<div id="integradoresContenedor" style="background-color: #eeeeee; width: 100%; min-height: 155px">
    <span style="font-family: arial; font-size: 18px; font-weight: bold; margin-left: 40px">INTEGRADORES</span> 
  
  <div class="itemIntegrador">
    <?php
        
    $n = count($_SESSION['rutaIntegradores']);
    
    for ($i=0; $i<$n; $i++) {
            
            echo "<img class='imgIntegradores' src=".$_SESSION['rutaIntegradores'][$i].">";
            
    }
      
    ?>
  </div>
</div>



  <div class="footer_midle">
    <div class='container'>
      <div class="row">
          
        <div class="col-lg-3 col-md-6">
          <ul class="social_left">
            <li class="facebook">
                <a href="https://www.facebook.com/pedrocachazo">
                    <i class="fa fa-facebook-square fa-3x" style="color: #3b5998"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="https://www.facebook.com/pedrocachazo">Follow us on Facebook</a></h4>
            </li>
            <div class="clearfix"> </div>
          </ul>
        </div>
          
        <div class="col-md-6 col-lg-3">
          <ul class="social_left">
            <li class="facebook">
                <a href="https://twitter.com/EquiposRYD">
                    <i class="fa fa-twitter-square fa-3x" style="color: #00aced"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="https://twitter.com/EquiposRYD">Follow us on Twitter</a></h4>
            </li>
            <div class="clearfix"> </div>
          </ul>
        </div>
          
          
        <div class="col-md-6 col-lg-3">
          <ul class="social_left">
            <li class="facebook">
                <a href="#">
                    <i class="fa fa-google-plus-square fa-3x" style="color: #dd4b39"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="#">Follow us on Google +</a></h4>
            </li>
            <div class="clearfix"> </div>
          </ul>
        </div>
          
          
        <div class="col-md-6 col-lg-3">
          <ul class="social_left">
            <li class="facebook">
                <a href="https://www.linkedin.com/company/equipos-y-controles-r&d-c-a-">
                    <i class="fa fa-linkedin-square fa-3x" style="color: #007bb6"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="https://www.linkedin.com/company/equipos-y-controles-r&d-c-a-">Follow us on LinkedIn</a></h4>
            </li>
            
            <div class="clearfix"> </div>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
    
    
<!-- PIE DE PAGINA -->
  <div class="footer_bottom">
    <div class="copy">
      <p>
          &copy; 2015 Equipos y Controles R&D, C.A. RIF: J-31371156-1 TODOS LOS DERECHOS RESERVADOS.
          <br>
          <a href="http://www.gbltechpanama.com" target="_blank">
              <img src="img/gbltech.png" style="width: 100px;">
          </a>
      </p>
  </div>
  
  
</div>
</body>
</html>
