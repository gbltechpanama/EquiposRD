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
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Marcas <b class="caret"></b></a>
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
<div class="featured_content" id="feature" style="height: 600px">
    
    <div class="container" style="height: 600px">
      
    <div class="row text-center">

        <div class="col-md-12" style="margin-top: 10px;">
            
            <!-- INDICADOR DE SECCION -->
            <div style="width: 100%; text-align: right; color: green; font-size: 18px; font-weight: bold">
            AGREGAR ACADEMIA
            </div>
            <div style="width: 100%; text-align: right; color:navy; font-size: 14px;">
                <a href="" onclick="history.back();">VOLVER...</a>
            </div>
            
            <br><br>
                <form method="post" action="../controlador/FrontController.php?action=nuevoacademia" enctype="multipart/form-data">
            
                    <table border="0" style="width: 400px; margin-left: auto; margin-right: auto;">
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">TITULO ARTICULO</label>
                            </td>
                            <td style="text-align: left; padding-left: 10px">
                                <input type="text" name="tituloArticulo">
                            </td>
                        </tr>
                        
                        
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">FOTO ARTICULO</label>
                            </td>
                            <td style="text-align: left; padding-left: 10px">
                                <input type="file" name="objFoto">
                            </td>
                        </tr>
                        
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">FECHA ARTICULO</label>
                            </td>
                            <td style="text-align: left; padding-left: 10px">
                                <input type="text" name="fechaArticulo">
                            </td>
                        </tr>
                        
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">CONTENIDO ARTICULO</label>
                            </td>
                            <td style="text-align: left; padding-left: 10px">
                                <textarea name="contenidoArticulo"></textarea>
                            </td>
                        </tr>
                        
                        
                        <tr style=" height: 50px">
                            <td>
                            </td>
                            <td style="text-align: left; padding-left: 15px">
                                <img src="img/btnAceptar.jpg" 
                                     style="cursor: pointer" onclick="document.forms[0].submit();">
                            </td>
                        </tr>
                    </table>
            </form>

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
