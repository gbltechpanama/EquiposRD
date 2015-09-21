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


</head>
<body>
    
    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> 
        <img src="img/logo.png" class="img-responsive">  
      </div>

    
  </div>
</div>
    
<div class="clearfix"> </div>

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>

<!-- CENTRO -->
<div class="featured_content" id="feature" style="height: 600px">
        
    <div class="container" style="height: 600px">
      
    <div class="row text-center">

        <div class="col-md-12" style="margin-top: 100px">
            
            <div style="width: 565px; height: 202px; background-color: white; margin-left: auto; margin-right: auto">
                
                <div id="imagen">
                    <img src="img/warning.png" style="width: 130px; margin-top: 30px">
                </div>

                <div>
                    <br><br>
                    <div id="escrito">
                        <span style="font-family:arial; font-size: 14px; font-weight: bold">
                            USTED DEBE INICIAR SESION PARA INGRESAR AL ADMINISTRADOR DE CONTENIDOS. <br><br><br>
                        </span>
                        <a href="formLogin.php"> Ir al Inicio... </a>
                        
                    </div>

                </div>
                
               
                </div>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"> </div>


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
