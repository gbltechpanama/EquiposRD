<?php ?>
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
        <li class="current"><a href="#">ACERCA DE</a></li>
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
    

<!-- BARRA SUPERIOR NEGRA -->
<div id="barraSuperiorLevel1" style="background-color: #000000; height: 1px;"></div>


<!-- NOMBRE LINEA -->    
<div class="main">
    <div style=" background-image: url('img/backHeaderLine.jpg'); text-align: left; height: 108px" class="img-responsive">

       <div id="contenedorInterno">
           <br>
           <table style="width: 100%; ">
               <tr>
                   <td id="palabraLinea">
                       ACERCA DE
                   </td>
                   <td style="background-color: green;">    
                   </td>
               </tr>
           </table>
           
        </div>
    </div>
</div>
    
<!-- LINEAS NEGOCIO -->
<div class="clearfix"></div>

<br><br>     

    <!--div class="col-lg-12" style="font-size: 24px; font-weight: bold; text-align:left; background-color: red; float: left">
        EQUIPOS Y CONTROLES R&D
    </div-->

    <div class="clearfix"></div>
    <div class="container">
    <div class="row" style="margin-top: 30px">
       
       

        <div class="col-lg-4 col-md-5 col-sm-12" style="float:left;">
            <img src="img/acercaImagen.jpg" class="img-responsive">
        </div>

        <div class="col-lg-8 col-md-7 col-sm-12" style=" float:left; text-align:justify; ">

                <?php

                echo utf8_decode('
                Somos una empresa venezolana, con más de 10 años de experiencia en venta, atención, 
                y asesorías a proyectos tecnológicos industriales, comerciales y residenciales. 
                Nos especializamos en la comercialización, distribución y venta al mayor de equipos para 
                proyectos de: cableado estructurado de la marca Hubbell Premise, tanto en cobre con las 
                categorías 5E, 6 y 6A, como en fibra óptica monomodo y multimodo y todas las soluciones 
                pasivas para proyectos de data centers y sistemas de redes, electricidad industrial y 
                doméstica de la marca Hubbell Wiring Devices, sistemas de video vigilancia con circuito 
                cerrado de televisión y sistemas de control de acceso de la marca Eclipse.
                <br><br>
                Adicionalmente contamos con bandejas porta cables tipo rejillas, nacionales de altísima calidad,
                tipo Cablofil, muy versátiles por su gran rapidez de instalación y al requerir un mínimo de 
                accesorios solo para unión y fijación. 
                <br><br>
                Prestamos servicios de consultoría y asesoría en nuestras áreas de competencia, talleres 
                inductivos y cursos de Certificación HUBBELL Premise Wiring para integradores y usuarios
                finales.');
                ?>
                <br><br>

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
  

</body>
</html>
