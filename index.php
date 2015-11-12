<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php


?>
<head>
    <title>Ofertas exclusivas - Pizzeria Garrosh</title>

    <!-- META TAGS -->   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />

    <!-- CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link href="media-queries.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="animacion.css" / >
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap.css" rel="stylesheet" />
    <link href="bootstrap-theme.css" rel="stylesheet" />
    <link href="ingreso.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!--<link rel="stylesheet" type="text/css" href="css/estilo.css" /> -->

    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/telepizza.base.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/telepizza.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/override.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/override.colors.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/validationerrors.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/toxins.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/dependencies/jquery.custom_form.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/dependencies/jquery-ui-1.8.17.custom.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/autocomplete.css?v=3.37.1.0" />
    <link rel="stylesheet" type="text/css" href="http://static.telepizza.es/vol/es/css/colorbox.css?v=3.37.1.0" />    
    
    <!-- SCRIPTS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>
<script  type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script  type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="funcionesLogin.js"></script>
<script type="text/javascript" src="funcionesAjax.js"></script>  
<script type="text/javascript" src="funcionesABMPizzas.js"></script>   
<script type="text/javascript" src="funcionesABMUsuarios.js"></script>  

</head>
<body class="no-js home" stlye="height: 100px" id="fullPage" onLoad="MostrarLogin(); return false">  

                      
<div id="header" style="height:160px">   
    <div class="wrapper" > 
        <a href="/" title="Ir a la P&#225;gina Principal" > 
              <img   src="logo.png"  style="width: 150px;" alt="GarroshPizza" title="GarroshPizza"/> 
        </a> 


<ul class="mod_product_categories_nav" id="MainMenuCategoryNav" style="height=20px;margin-top: 28px;">
            <li  id="Tab_-1">               
                    <a onclick="irAOfertas();return false"  class=""  title="Ofertas"><span>Ofertas</span></a>            
            </li>
            <li  id="Tab_-2">               
                    <a onclick="irAMenu(); return false"  class=""  title="Menú"><span>Menú</span></a>            
            </li>
      
</ul>        


        <div class="nav_secondary">
            <div> 

                <div class="minicart_overlay" ></div>
                <div id="LayoutMainHeaderCarrito">

                </div>

                <div id="headerLinks">
                    <ul class="mod_link_nav">
                            <li><a href="index.php" onclick="">Inicio</a></li>
                            <li><a href="" onclick="ManejarCuenta();return false">Mi cuenta</a></li>
                            <!-- -->
                            <li><a onclick="deslogear();return false" >Salir</a></li>
                    </ul>
                    <ul class="mod_link_nav secondary">
                            <li><a href="/localizador" onclick="">Tiendas</a></li>
                            <li><a href="/tracker" onclick="">Estado del pedido</a></li>
                    </ul>
                </div>                
                    
            </div>
        </div><!-- .nav_secondary -->
    </div><!-- .wrapper -->
</div><!-- #head -->



<ul class="mod_banner_group" id="BarraLateralIzq"> 

    <li class="banner">
        <div class="wrapper">
            <div class="slides_wrapper" stlye="min-height: 450px;">
                    <ul class="slides">
                        <div class="" id="principal">
                                 <img src="index.jpg" >         
                               
                        </div>
                    </li>                                       
                                          
                                                     
                </ul>            
            </div>
            
                     <div class="home-sidebar">
                         

                     <div class="mod_login register" id="formLogin"   stlye="right: -80px !important;">
                   

                     </div>

        </div>                

    </li>        
    
     
<!-- .mod_banner_group -->

<div class="mod_social_toolbar" style="margin-top:0px;height:80px">
    <div class="wrapper row" >
        <div class="col s3of12 like">                  
            <strong style="font-weight: 700;"><h1>Garrosh Pizza</h1></strong>
        </div>
        <ul class="col s9of12 social-networks">
                    <li><a target="_blank" href="//www.facebook.com/GarroshPizza" title="Facebook"><span class="i"><img src="http://soxialmedia.com/wp-content/uploads/2010/06/badge-icon-facebook.png" alt="Facebook" title="Facebook"/></span></a></li>
        </ul>        
    </div> 
</div>



<div id="footer">
    <div class="wrapper row" stlye="margin">
        <div class="col site_links">
            <ul class="col_sls">

                                        <li>
                                            <h4 class="heading-s">Corporativo</h4>
                                        </li>
                                                <li><a href="" title = "Acerca de InserteNombre"  target="_blank"                                            >Acerca de Garrosh pizza</a></li>
                                                <li><a href="MANDAR A "EMPLEO", (hacer en nexo una inclucion de un parrafo) " title = "Trabaja con nosotros"  target="_blank"                                            >Trabaja con nosotros</a></li>
                                            <li>
                                                <br />
                                                <br />
                                            </li>
                                        <li>
                                            <h4 class="heading-s">Aviso Legal</h4>
                                        </li>    
                                                <li><a href="Privacidad" title = "Politicia de privacidad" >Pol&#237;tica de privacidad</a></li>
                                             </ul>   
            <ul class="col_sls last">
                                <li>
                                    <h4 class="heading-s">Ayuda</h4>
                                </li>
                                        <li><a href="//ayuda.telepizza.es/faqs/" title = "Preguntas frecuentes" 
 target="_blank">Preguntas frecuentes</a></li>                            
                                        <li><a href="/localizador" title = "Localizador tiendas" 
>Localizador tiendas</a></li>                            
                                        <li><a href="/info/contacto.html" title = "Contacto" 
>Contacto</a></li>                            
                                        <li><a href="/tracker" title = "Estado del pedido" 
>Estado del pedido</a></li>                            
                                        <li><a href="/#registrarse" title = "Registro" 
>Registro</a></li>                            
            </ul>
        </div>
        <div class="col site_links">
            <ul class="col_sls">
                <li>
                    <h4 class="heading-s">Productos</h4>
                </li>
                    <li>
                        <a href="/productos/ofertas">Ofertas</a>
                    </li>
                    <li>
                        <a onclick="irAMenu()" > Menú</a>
                    </li>
            </ul>
            <ul class="col_sls">                              
    </div>
</div>


    
</body>
</html>
