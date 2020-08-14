<?php
session_start();
include('parametros2/conexion.php');
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
                   <a href="index.php">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" data-color="grey" data-image="parametros/assets/img/full-screen-image-1.jpg"> 

    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="header-text">
                            <h2>Regístrate</h2>
                            <h4>Crea tu cuenta</h4>
                            <hr />
                        </div>
                    </div>














  <div class="col-md-6 col-md-offset-3">
     <?php
     include('parametros2/conexion.php');

        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario
            // creamos una función que nos parmita validar el email
            function valida_email($correo) {
                if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $correo)) return true;
                else return false;
            }
            // Procedemos a comprobar que los campos del formulario no estén vacíos
            $sin_espacios = count_chars($_POST['usuario_nombre'], 1);
            if(!empty($sin_espacios[32])) { // comprobamos que el campo usuario_nombre no tenga espacios en blanco


                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>El campo <em>Nombre</em> no debe contener espacios en blanco.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php

            }elseif(empty($_POST['usuario_nombre'])) { // comprobamos que el campo usuario_nombre no esté vacío


                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>No haz ingresado tu usuario.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php

            }elseif(empty($_POST['usuario_clave'])) { // comprobamos que el campo usuario_clave no esté vacío

                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>No haz ingresado contraseña.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php


            }elseif($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { // comprobamos que las contraseñas ingresadas coincidan

                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>Las contraseñas ingresadas no coinciden.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php

            }elseif(!valida_email($_POST['usuario_email'])) { // validamos que el email ingresado sea correcto
                
                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>El email ingresado no es válido.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php
            }else {
                // "limpiamos" los campos del formulario de posibles códigos maliciosos
                $usuario_nombre = $db->real_escape_string($_POST['usuario_nombre']);
                $usuario_clave = $db->real_escape_string($_POST['usuario_clave']);
                $usuario_email = $db->real_escape_string($_POST['usuario_email']);

                // comprobamos que el email ingresado no haya sido registrado antes
                $consulta1="SELECT uemail FROM usuario WHERE uemail='".$usuario_email."'";
                if(!$resultado1 = $db->query($consulta1)){  die('Ocurrió un error resultado 1: [' . $db->error . ']'); }

            if(($row_cnt = $resultado1->num_rows) > 0) {


                ?>        
                    <div class="col-md-12 col-md-offset-0">
                        <div class="header-text">
                            <h4>El Email elegido ya ha sido registrado anteriormente.</h4>
                            <a class="btn btn-fill btn-neutral btn-wd" href='javascript:history.back();'>Reintentar</a>
                        </div>
                    </div>          
                <?php



                }else {
                    $usuario_clave = md5($usuario_clave); // encriptamos la contraseña ingresada con md5
                    // ingresamos los datos a la BD

                $consulta2="INSERT INTO usuario (unombre, upass, uemail, ufecha) VALUES ('".$usuario_nombre."', '".$usuario_clave."', '".$usuario_email."', NOW())";

                if(!$resultado2 = $db->query($consulta2)){ 

                        die('ha ocurrido un error y no se registraron los datos 2: [' . $db->error . ']'); 

                    }else {

                        ?>        
                            <div class="col-md-12 col-md-offset-0">
                                <div class="header-text">
                                    <h4>El Usuario se registro con exito.</h4>
                                    <a class="btn btn-fill btn-primary btn-wd" href='index.php'>Iniciar sesión</a>
                                </div>
                            </div>
                        <?php

                    }
                }
            }
        }else {
    ?>
                  
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <div class="card card-plain">
                                <div class="content">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" name="usuario_email" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nombre" name="usuario_nombre" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Contraseña" name="usuario_clave" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Repetir Contraseña" name="usuario_clave_conf" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-fill btn-primary btn-wd" name="enviar" value="Registrar">
                                    <input type="reset"  class="btn btn-warning btn-fill btn-wd" value="Borrar" />
                                </div>
                            </div>
                        </form>
                  
    <?php
        }
    ?> 

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
