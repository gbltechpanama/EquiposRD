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
      
      <div class="menu" style="padding-top: 25px;"> 
          <a class="toggleMenu" href="#">
              <img src="img/nav_icon.png" alt="" /> 
          </a>
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
        
        
        <li class="dropdown hidden-xs hidden-sm">
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
        
        <li class="hidden-md hidden-lg visible-sm visible-xs">
            <a href="../controlador/FrontController.php?action=level1neg&linea=hubbell">MARCA HUBBELL</a>
        </li>
        
        <li class="hidden-md hidden-lg visible-sm visible-xs">
            <a href="../controlador/FrontController.php?action=level1neg&linea=eclipse">MARCA ECLIPSE</a>
        </li>
        
        
        <li><a href="contact.php">CONTACTO</a></li>
      </ul>
      <script type="text/javascript" src="js/responsive-nav.js"></script> 
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
    

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>


<!-- BANNER -->
<div class="text-center banner" style="clear: both">
    
    <div class="container" style="padding-left: 0px; 
         padding-right: 0px; padding-bottom: 0px; padding-top: 0px; width: 100%">

    <!-- Slider -->
    <div id="main-slider" class="flexslider col-lg-12 col-md-12">
            <ul class="slides">
                <?php
            
                $n = count($_SESSION["rutaBanners"]);
            
                for ($i=0; $i<$n; $i++) {
                    echo "<li>";
                    echo '<img src="'.trim($_SESSION["rutaBanners"][$i]).'" '
                            . 'style="margin-left:auto; margin-right:auto; max-height: 283px" '
                            . 'class="img-responsive center-block">';
                    echo '
                    <div id="descripcion">
                        <p style="padding-top: 25px; text-align: center">
                                '.$_SESSION['descripcionBanners'][$i].'
                        </p>
                    </div>';

                    echo "</li>";
                }
            
            ?> 
            </ul>
    </div>
    <!-- end slider -->
    </div> 
</div>


<!-- COMENTARIO -->    
<!--div class="main"-->
<div class="content_white" style="background-color: #f6f6f6">
    <h2>Equipos y Controles R&D</h2>
    <p>Hubbell / Eclipse</p>
</div>
    
<!-- LINEAS NEGOCIO -->

<div class="featured_content" id="feature">
    
  <div class="container">
      
    <div class="row text-center">
        
      <div class="col-lg-6 col-md-12"> 

        <p class="m_2" style="margin-top: 45px">
            <img src="img/hubbell.jpg" width="441px" height="195px" class="img-responsive center-block">
        </p>

        <a href="../controlador/FrontController.php?action=level1neg&linea=hubbell" class="feature_btn">Mas</a> 
        
      </div>
        
        
      <div class="col-lg-6 col-md-12"> 
          
        <p class="m_2" style="margin-top: 45px">
            <img src="img/eclipse.jpg" width="441px" height="195px" class="img-responsive center-block">
        </p>

        <a href="../controlador/FrontController.php?action=level1neg&linea=eclipse" class="feature_btn">Mas</a> 
        
      </div>
        
    </div>
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
