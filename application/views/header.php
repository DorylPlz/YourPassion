<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>YourPassion</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="YourPassion Show Your Talent">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/settings.css'); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/style.css'); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.css'); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/flexslider/flexslider.css'); ?>" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="<?php echo base_url('assets/css/style-light-yellow.css'); ?>">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/updates.css'); ?>">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">
    
                <!-- Javascript -->
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js'); ?>"></script>
                
                 <script type="text/javascript" >
                        
                        var checkheader = function() {
                          if (document.getElementById('pass1').value ==
                              document.getElementById('pass2').value) {
                              document.getElementById('messageheader').style.color = 'green';
                              document.getElementById('messageheader').innerHTML = 'Las contraseñas coinciden';
                          } else {
                                document.getElementById('messageheader').style.color = 'red';
                              document.getElementById('messageheader').innerHTML = 'Las contraseñas no coinciden';
                          }
                      }
                </script>
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ie.css'); ?>" />
    <![endif]-->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
    
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <?php if($this->session->userdata('login')){ ?>
                    <div class="container">
                        <ul class="quick-menu pull-left">
                            
                               <li><a href="<?=site_url("profile/perfil_usuario?up=")?><?php echo $this->session->userdata('email'); ?>">Mi cuenta</a></li>

                        </ul>
                        <ul class="quick-menu pull-right">
                            <li><a href="<?=site_url("usr/logOut")?>">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div class="container">
                        
                        <ul class="quick-menu pull-right">
                            <li><a href="#login" class="soap-popupbox">Inicio de Sesión</a></li>
                            <li><a href="#signup" class="soap-popupbox">Registro</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            
            <div class="main-header">
                
                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="navbar-brand">
                        <a href="<?php echo site_url('main/index'); ?>" title="YourPassion">
                            <img height="40" width="150" src="<?php echo base_url('assets/images/YP-logo_full-black.png'); ?>" />
                        </a>
                    </h1>
                    
                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/index'); ?>">Inicio</a>
                                
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/eventos'); ?>">Eventos</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/grupos'); ?>">Grupos</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/locales'); ?>">Locales</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/contactus'); ?>">Contacto</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a>Sobre Nosotros</a>
                                <ul>
                                    <li><a href="<?php echo site_url('main/politicas'); ?>">Terminos y Condiciones</a></li>
                                    <li><a href="<?php echo site_url('main/faq'); ?>">FAQ</a></li>
                                    <li><a href="<?php echo site_url('main/aboutus'); ?>">Sobre nosotros</a></li>
                                </ul>
                            </li>
                            
                            
                            
                        </ul>
                    </nav>
                </div>
                
                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item">
                                <a href="<?php echo site_url('main/index'); ?>">Inicio</a>
                                
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/eventos'); ?>">Eventos</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/grupos'); ?>">Grupos</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/locales'); ?>">Locales</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('main/contactus'); ?>">Contacto</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a>Sobre Nosotros</a>
                                <ul>
                                    <li><a href="<?php echo site_url('main/politicas'); ?>">Terminos y Condiciones</a></li>
                                    <li><a href="<?php echo site_url('main/faq'); ?>">FAQ</a></li>
                                    <li><a href="<?php echo site_url('main/aboutus'); ?>">Sobre nosotros</a></li>
                                </ul>
                            </li>
                    </ul>
                    <?php if($this->session->userdata('login')){ ?>
                    <ul class="mobile-topnav container">
                        <li><a href="<?=site_url("profile/perfil_usuario?up=")?><?php echo $this->session->userdata('email'); ?>">Mi cuenta</a></li>
                        <li><a href="<?=site_url("usr/logOut")?>">Cerrar sesión</a></li>
                    </ul>
                    </div>
                <?php }else{ ?>
                    <ul class="mobile-topnav container">
                        
                        <li><a href="#login" class="soap-popupbox">Inicio de Sesión</a></li>
                        <li><a href="#signup" class="soap-popupbox">Registrarme</a></li>
                        
                    </ul>
                <?php } ?>




                    
                    
                </nav>
            </div>
            <div id="signup" class="travelo-signup-box travelo-box">
                
               
                <div class="simple-signup">
                    <div class="text-center signup-email-section">
                        <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Registro</a>
                    </div>
                    <p class="description">Al registrarme acepto las politicas y terminos de servicio de YourPassion.</p>
                </div>
                <div class="email-signup">
                    <form action="<?php echo site_url('usr/sign_up'); ?>" name="registro" method="post">
                        <div class="form-group">
                            <label>Nombre completo:</label>
                            <input type="text" name="nombre" class="input-text full-width form-control" placeholder="Nombre Completo" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <input type="date" name="nacimiento" class="input-text full-width form-control" placeholder="Día-Mes-Año" required/>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="input-text full-width form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono: +56</label>
                            <input type="number" name="telefono" class="input-text form-control" placeholder="Telefono" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" name="pass1" id="pass1" class="input-text full-width form-control" placeholder="Contraseña" onkeyup='check();' required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña:</label>
                            <input type="password" name="pass2" id="pass2" class="input-text full-width form-control" placeholder="Confirmar contraseña" onkeyup='check();' required>
                            <span id="messageheader"></span>
                        </div>
                        
                        <div class="form-group">
                            <p class="description">Al registrarme acepto las politicas y terminos de servicio de YourPassion.</p>
                        </div>
                        <button type="submit" class="full-width btn-medium">Registrarme</button>
                    </form>
                </div>
                <div class="seperator"></div>
                <p>¿Ya eres miembro de YourPassion? <a href="#login" class="goto-login soap-popupbox">Inicia Sesión</a></p>
            </div>
            <div id="login" class="travelo-login-box travelo-box">
                
                <form action="<?php echo site_url('usr/login'); ?>" method="post">
                    <div class="form-group">
                        <label>Inicio de sesión:</label>
                        <input type="text" name="email" class="input-text full-width" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="input-text full-width" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <a href="<?php echo site_url('main/reccon'); ?>" class="forgot-password pull-right">¿Olvidaste tu contraseña?</a>
                        <div class="checkbox checkbox-inline">
                            <label>
                                <input type="checkbox"> Recordarme
                            </label>
                        </div>
                        <hr/>
                        <button type="submit" class="full-width btn-medium">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="seperator"></div>
                <p>¿No tienes cuenta? <a href="#signup" class="goto-signup soap-popupbox">Registro</a></p>
            </div>



        </header>
