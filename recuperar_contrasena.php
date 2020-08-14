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
            <a class="navbar-brand" href="inicio.php">Reclamos Online</a>
        </div>
        <div class="collapse navbar-collapse">       
            
            <ul class="nav navbar-nav navbar-right">
                <li>
                   <a href="index.php">
                        Iniciar sesión
                    </a>
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
















    <?php
    include('parametros2/conexion.php');
        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
            if(empty($_POST['usuario_email'])) {

             ?>
             <div class="card card-hidden">
                <div class="header text-center">No ha ingresado el Email.</div>
                <div class="footer text-center">
                    <a type="submit" class="btn btn-fill btn-warning btn-wd" href='javascript:history.back();'>Reintentar</a>
                </div>
             </div>
            <?php

            }else {
                $usuario_email = $db->real_escape_string($_POST['usuario_email']);
                $usuario_email = trim($usuario_email);

                $consulta1="SELECT unombre, upass, uemail FROM usuario WHERE uemail = '".$usuario_email."'";
                if(!$resultado1 = $db->query($consulta1)){  die('Ocurrió un error resultado 1: [' . $db->error . ']'); }



                if(($row_cnt = $resultado1->num_rows) > 0) {


                    $row = $resultado1->fetch_assoc();

                    $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                    $usuario_nombre = $row['unombre'];
                    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                    $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD
                    $usuario_email = $row['uemail'];
                    // actualizamos los datos (contraseña) del usuario que solicitó su contraseña

                    $consulta2="UPDATE usuario SET upass ='".$usuario_clave2."' WHERE uemail ='".$usuario_email."'";
                    if(!$resultado2 = $db->query($consulta2)){  die('Ocurrió un error resultado 2: [' . $db->error . ']'); }
      

                                require('parametros2/PHPMailer/class.phpmailer.php');
                                require('parametros2/PHPMailer/class.smtp.php');
                                $mail = new PHPMailer();
                                $mail->IsSMTP();                                         // Establecer envío SMTP
                                $mail->Host = 'wo25.wiroos.host';                        // Especificar el servidor principal y de respaldo
                                $mail->SMTPAuth = true;                                  // Activar la autenticación SMTP
                                $mail->Username = 'reclamos@adasystemas.com.ar';     // SMTP nombre de usuario
                                $mail->Password = 'f-07uKXS$y[m';                   // SMTP contraseña
                                $mail->WordWrap = 50;
                                $mail->IsHTML(true);
                                $mail->From = 'reclamos@adasystemas.com.ar';
                                $mail->FromName = 'Reclamos Online';
                                $mail->AddAddress($usuario_email, 'Recuperar Contrasena'); // Mail: 
                                $mail->Subject = 'Recuperar Contrasena';

                                $mail->Body = "SE GENERO UNA CONTRASEÑA NUEVA PARA EL USUARIO:
                                             <strong>".$usuario_nombre."</strong>. LA CONTRASENA ES:  
                                             <strong>".$usuario_clave."</strong>.";
                                           
                                if(!$mail->Send())
                                {     
                                 ?>
                                 <div class="card card-hidden">
                                    <div class="header text-center">El mensaje no se ha podido enviar.</div>
                                    <div class="footer text-center">
                                        <a type="submit" class="btn btn-fill btn-warning btn-wd" href='index.php'>Volver</a>
                                    </div>
                                 </div>
                                <?php

                                }
                                else
                                {
                                 ?>
                                 <div class="card card-hidden">
                                    <div class="header text-center">Se envio la nueva contraseña a su correo electronico.</div>
                                    <div class="footer text-center">
                                        <a type="submit" class="btn btn-fill btn-warning btn-wd" href='index.php'>Volver</a>
                                    </div>
                                 </div>
                                <?php
                                }

                        

                }else {
                    echo "El Email <strong>".$usuario_email."</strong> no está registrado. <a href='javascript:history.back();'>Reintentar</a>";
                }
            }
        }else {
    ?>
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <div class="card card-hidden">
                                <div class="header text-center">Recuperar Contraseña</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" class="form-control" name="usuario_email">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-warning btn-fill btn-wd" name="enviar">Recuperar</button>
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