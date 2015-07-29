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

    
  </div>
</div>
    
<div class="clearfix"> </div>

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>

<!-- CENTRO -->
<div class="featured_content" id="feature" style="height: 600px">

<form action="../controlador/FrontController.php?action=login" method="post">
        
    <div class="container" style="height: 600px">
      
    <div class="row text-center">

        <div class="col-md-12" style="margin-top: 100px">
            
            <div style="width: 565px; height: 202px; background-color: white; margin-left: auto; margin-right: auto">
                
                <div id="imagen" style="float: left; clear: both; width: 180px; height: 202px;">
                    <img src="img/candado.jpg">
                </div>

                <div>
                    <br><br>
                    <table border="0" style="width: 360px; margin-left: auto; margin-right: auto;">
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">USUARIO</label>
                            </td>
                            <td>
                                <input type="text" class="text" name="txtUsuario" style="width: 250px"/>
                            </td>
                        </tr>
                        <tr style=" height: 40px">
                            <td style="text-align: right">
                                <label style=" font-family: arial; font-size: 12px; font-weight: bold">PASSWORD</label>
                            </td>
                            <td>
                                <input type="password" name="txtPassword" style="width: 250px"/>
                            </td>
                        </tr>
                        <tr style=" height: 50px">
                            <td>
                             
                            </td>
                            <td>
                                <img src="img/btnAceptar.jpg" 
                                     style="cursor: pointer" onclick="document.forms[0].submit();">
                            </td>
                        </tr>
                    </table>
                    
                </div>
                
               
                </div>
            </div>
        </div>
    </div>
</form>
</div>


<div class="clearfix"> </div>
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
