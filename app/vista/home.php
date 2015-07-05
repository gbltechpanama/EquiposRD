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
    

    
<!-- ENCABEZADO -->
<div class="header">
  <div class="container">
      <div class="logo"> <a href="home.php"><img src="img/logo.png"></a> </div>
      <div class="menu" style="padding-top: 25px"> 
          <a class="toggleMenu" href="#"><img src="img/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">
        <li class="current"><a href="home.php">INICIO</a></li>
        <li><a href="about.html">ACERCA DE</a></li>
        <li><a href="services.html">ACADEMIA</a></li>
        <li><a href="blog.html">MARCAS</a></li>
        <li><a href="contact.html">CONTACTO</a></li>
        <div class="clear"></div>
      </ul>
      <script type="text/javascript" src="js/responsive-nav.js"></script> 
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
    

<!-- BARRA SUPERIOR VERDE -->
<div id="barraSuperior"></div>


<!-- BANNER -->
<div class="text-center banner">
    <div class="container" style="background-color: #0033ff; padding-left: 0px; 
         padding-right: 0px; padding-bottom: 0px; padding-top: 0px">

        <div id="imagen" style="width: 100%;background-color: #ff0000">
            <?php
                session_start();
                echo '<img src="'.trim($_SESSION["rutaBanners"][0]).'" class="img-responsive">';
            ?>
        </div>  
    </div>
</div>

<!-- DESCRIPCION -->
<div id="descripcion">
    <p style="padding-top: 25px; text-align: center">
        <?php
            echo $_SESSION['descripcionBanners'][0];
        ?>
    </p>
</div>

<!-- COMENTARIO -->    
<div class="main">
    <div class="content_white" style="background-color: #f6f6f6">
  <h2>Equipos y Controles R&D</h2>
  <p>Hubbell / Eclipse</p>
</div>
    
<!-- LINEAS NEGOCIO -->
<div class="featured_content" id="feature">
    
  <div class="container">
      
    <div class="row text-center">
        
      <div class="col-md-6"> 

        <p class="m_2" style="margin-top: 45px">
            <img src="img/hubbell.jpg">
        </p>

        <a href="#" class="feature_btn">Mas</a> 
        
      </div>
        
        
      <div class="col-md-6"> 
          
        <p class="m_2" style="margin-top: 45px">
            <img src="img/ecplise.jpg">
        </p>

        <a href="#" class="feature_btn">Mas</a> 
        
      </div>
        
    </div>
  </div>
</div>
    
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
