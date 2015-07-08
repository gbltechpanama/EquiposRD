<!DOCTYPE HTML>
<html>
<head>
<title>Equipos y Controles R&D</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
</script>
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
<?php
    session_start();
?>

    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> <a href="home.php"><img src="img/logo.png"></a> </div>
      <div class="menu" style="padding-top: 25px"> 
          <a class="toggleMenu" href="#"><img src="img/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">
        <li class="current"><a href="home.php">INICIO</a></li>
        <li><a href="#">ACERCA DE</a></li>
        <li><a href="#">ACADEMIA</a></li>
        <li><a href="#">MARCAS</a></li>
        <li><a href="#">CONTACTO</a></li>
        <div class="clear"></div>
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

        <div id="contenedorInterno" style="background-color: red;">
        
            <div id="palabraLinea" style=" padding-left: 10px; width: 10%; float: left; margin-top: 43px; color: green; font-family: arial; font-size: 24px; font-weight: bold">
                <?php
                    echo strtoupper($_SESSION['lineaNegocio']);
                ?>
            </div>
            <div style="height: 26px; background-color: green; width: 90%; float: left; margin-top: 48px"></div>
            
        </div>
    </div>
</div>
    
<!-- LINEAS NEGOCIO -->
<div style="background-color: #e8e8e8">
    <div class="container">
        
        <div class="col-md-6" style=" border-right-color: #bcbcbc; border-right-style: solid; border-right-width: 1px">
            
            <table style="width: 440px; margin-left: auto; margin-right: auto; margin-top: 45px">
                <tr>
                    <td>
                    <?php
                        
                        echo '<img src='.$_SESSION['rutaImagenSubLineas'][0].' width=441px; height=195px>';
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
                        <a href="#" class="feature_btn">Ver Productos</a>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
        
        
        <div class="col-md-6">
            
            <table style="width: 440px; margin-left: auto; margin-right: auto; margin-top: 45px">
                <tr>
                    <td>
                    <?php
                        echo '<img src='.$_SESSION['rutaImagenSubLineas'][1].' width=441px; height=195px>';
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
                        <a href="#" class="feature_btn">Ver Productos</a>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
        
        
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
<!--    <div class="container">
      
      <div class="row text-center" style="background-color: red; float: left; height: auto">
        
        <div class="col-md-6 col-lg-6" style="float:left; height: 800px; background-color: yellow;"> 

            <div id="contenidoCentrado" style="margin-left: auto; margin-right: auto; background-color: green; width: 440px">
                
                <div style="margin-top: 45px; text-align: center">
                    <?php
                        session_start();
                        echo '<img src='.$_SESSION['rutaImagen1'].'>';
                    ?>
                </div>

                <div style="width: 100%; background-color: blanchedalmond; 
                     text-align: justify;">
                    
                     <br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting 
                    industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer took a galley of type 
                    and scrambled it to make a type specimen book. It has survived not 
                    only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. 
                    <br><br>
                    It was popularised in the 1960s with the release of Letraset sheets 
                    containing Lorem Ipsum passages, and more recently with desktop 
                    publishing software like Aldus PageMaker including versions of 
                    Lorem Ipsum.
                    
 
                </div>

                <div style="float: left; text-align: center; width: 100%">
                    <a href="#" class="feature_btn">Ver Productos</a> 
                </div>
            </div>

      </div>
        
        
      <div class="col-md-6 col-lg-6"> 
          
        <p class="m_2" style="margin-top: 45px">
            <?php
                echo '<img src='.$_SESSION['rutaImagen2'].'>';
            ?>
        </p>

        <a href="#" class="feature_btn">Ver Productos</a> 
        
      </div>
        
    </div>
  </div>
</div>-->
    
<!-- SECCION REDES SOCIALES -->

<div class="footer">
  <div class="footer_midle">
    <div class='container'>
      <div class="row">
          
        <div class="col-md-3">
          <ul class="social_left">
            <li class="facebook">
                <a href="#">
                    <i class="fa fa-facebook-square fa-3x" style="color: #3b5998"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="#">Follow us on Facebook</a></h4>
            </li>
            <div class="clearfix"> </div>
          </ul>
        </div>
          
        <div class="col-md-3">
          <ul class="social_left">
            <li class="facebook">
                <a href="#">
                    <i class="fa fa-twitter-square fa-3x" style="color: #00aced"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="#">Follow us on Twitter</a></h4>
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
                <a href="#">
                    <i class="fa fa-linkedin-square fa-3x" style="color: #007bb6"></i>
                </a>
            </li>
            <li class="fb_text">
              <h4><a href="#">Follow us on LinkedIn</a></h4>
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
  
  
</div>
</body>
</html>
