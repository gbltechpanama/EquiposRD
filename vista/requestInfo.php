<?php ?>
<!DOCTYPE HTML>
<html>
<head>
<title>VERSION PRUEBAS</title>
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
      <div class="logo"> <a href="../../app/controlador/FrontController.php?action=principal">
              <img src="img/logo.png">
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
                   <td id="palabraLinea" style="width: 380px">
                       SOLICITUD DE INFORMACION
                   </td>
                   <td style="background-color: green;">    
                   </td>
               </tr>
           </table>
           
        </div>
    </div>
</div>
    
<!-- CONTENIDO CENTRAL -->
<div class="col-md-3"></div>

<div id="contenidoCentral" class="col-md-6" style="margin-left: auto; margin-right: auto">
    
<form>
    
    <div class="form-group">
      <label>Zona</label>
      <select class="form-control" id="txtZona">
        <option>Seleccione una zona...</option>
        <option>Zona Central</option>
        <option>Zona Oriente</option>
        <option>Zona Occidente</option>
      </select>
    </div>
    
    <div class="form-group">
      <label>Nombre</label>
      <input type="text" class="form-control" id="txtNombre" required>
    </div> 

    <div class="form-group">
      <label>Rif</label>
      <input type="text" class="form-control" id="txtRif" required>
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" id="txtEmail" required>
    </div>

    <div class="form-group">
      <label>Escriba su Mensaje</label>
      <textarea class="form-control" rows="9" id="txtArea" required></textarea>
    </div>
    
    <div class="form-group" style="text-align: right">
        <input type="submit" class="btn btn-success" value="Enviar Mensaje">
    </div>
    
    <br><br>
    
</form>
    
</div>

<div class="col-md-3"></div>


<div class="footer">
  <div class="footer_midle">
    <div class='container'>
      <div class="row">
          
        <div class="col-md-3">
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
          
        <div class="col-md-3">
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
          
          
        <div class="col-md-3">
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
          
          
        <div class="col-md-3">
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
      <p>&copy; 2015 Equipos y Controles R&D, C.A. RIF: J-31371156-1 TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
  </div>
  

</body>
</html>
