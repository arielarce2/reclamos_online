 <?php
session_start();
// comprobamos que se haya iniciado la sesión
if(isset($_SESSION['usuario_id']) == true){
    header('Location: inicio.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="parametros/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Reclamos Online</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="parametros/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="parametros/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="parametros/assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="parametros/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="parametros/fontsgoogleapis.css" rel="stylesheet" type="text/css">

    <link href="parametros/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body> 

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Reclamos Online</a>
        </div>
        <div class="collapse navbar-collapse">       
            <ul class="nav navbar-nav navbar-right">
                <li>
                   <a href="registro.php">Regístrate</a>
                </li>
                <li>
                   <a href="recuperar_contrasena.php">Recuperar contraseña</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="grey" data-image="parametros/assets/img/full-screen-image-1.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form action="comprobar.php" method="post">
                            
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Iniciar sesión</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" class="form-control" name="usuario_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" placeholder="Contraseña" class="form-control" name="usuario_clave">
                                    </div>
                                    <div id="mensaje"></div>
                                </div>
                                <div class="footer text-center">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill btn-primary btn-wd" name="enviar" >Ingresar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        
                        </form>
                                
                    </div>                    
                </div>
            </div>
        </div>
    	
        <footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright text-center">
                    &copy; 2017 <a href="#">ADA Systemas</a>, Todos los Derechos Reservados.
                </p>
            </div>
        </footer>

    </div>                             
       
</div>


</body>
    
    <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
    <script src="parametros/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="parametros/assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="parametros/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Forms Validations Plugin -->
    <script src="parametros/assets/js/jquery.validate.min.js"></script>

    <!--  Select Picker Plugin -->
    <script src="parametros/assets/js/bootstrap-selectpicker.js"></script>

    <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
    <script src="parametros/assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

    <!--  Notifications Plugin    -->
    <script src="parametros/assets/js/bootstrap-notify.js"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="parametros/assets/js/sweetalert2.js"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
    <script src="parametros/assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="parametros/assets/js/demo.js"></script>
	    
    <script type="text/javascript">
        $().ready(function(){
            lbd.checkFullPageBackgroundImage();
            
            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
    
</html>