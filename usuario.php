<?php
include('parametros2/conexion.php');
session_start();

if(isset($_SESSION['usuario_id']) == false){
  header('Location: index.php');
}else{
    $nombre = "SELECT unombre FROM usuario WHERE idusuario = '".$_SESSION['usuario_id']."'";
        if(!$result3 = $db->query($nombre)){  die('Ocurrió un error: [' . $db->error . ']'); }
    $nombre2 = $result3->fetch_array();
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

<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="parametros/assets/img/full-screen-image-1.jpg">
        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="logo">
            <a href="inicio.php" class="logo-text">
                Reclamos Online
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="inicio.php" class="logo-text">
                REC
            </a>
        </div>

        <div class="sidebar-wrapper">

            <div class="user">
                <div class="photo">
                    <img src="parametros/assets/img/default-avatar.jpg" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        Usuario: <?php echo $nombre2['unombre'];?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="usuario.php">Perfil</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="inicio.php">
                        <i class="pe-7s-compass"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="tablas/reclamo.php">
                        <i class="pe-7s-compass"></i>
                        <p>Reclamos</p>
                    </a>
                </li>
                <li>
                    <a href="tablas/reclamo_baja.php">
                        <i class="pe-7s-compass"></i>
                        <p>Reclamos Finalizados</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
				<div class="navbar-minimize">
					<button id="minimizeSidebar" class="btn btn-secondary btn-fill btn-round btn-icon">
						<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
						<i class="fa fa-navicon visible-on-sidebar-mini"></i>
					</button>
				</div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicio.php">Inicio</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown dropdown-with-icons">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-list"></i>
                                <p>Opciones
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <a href="usuario.php">
                                        <i class="pe-7s-tools"></i> Perfil
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="logout.php" class="text-danger">
                                        <i class="pe-7s-close-circle"></i>
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                    <!--      here you can write your content for the main area                     -->
                    <!--      CONTENIDO DEL SISTEMA                     -->
                <div class="registros" id="agrega-registros">

                <?php                         
                require('parametros2/conexion.php');
                $usu = $_SESSION['usuario_id'];

                $consult="SELECT *
                          FROM usuario
                          WHERE idusuario = '$usu'
                          ORDER BY idusuario ASC ";
                if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }
                $row = $result->fetch_assoc(); 
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
                            </div>

                            <div class="content">
                                
                                <form>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input readonly="readonly" type="email" class="form-control" placeholder="Email" value="<?php echo $row['uemail']; ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input readonly="readonly" type="text" class="form-control" placeholder="Nombre" value="<?php echo $row['unombre']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input readonly="readonly" type="text" class="form-control" placeholder="Apellido" value="<?php echo $row['uapellido']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input readonly="readonly" type="password" class="form-control" placeholder="Contraseña" value="<?php echo $row['upass']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input readonly="readonly" type="text" class="form-control" placeholder="Telefono" value="<?php echo $row['utelefono']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input readonly="readonly" type="text" class="form-control" placeholder="Direccion" value="<?php echo $row['udireccion']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo '<a type="submit" class="btn btn-warning btn-fill pull-right" href="javascript:editarProducto('.$row['idusuario'].');"> Editar</a>';?>
                                    <div class="clearfix"></div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





<!-- modal-->
<div class="modal fade bs-example-modal-lg" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b><center>Registrar o editar</center></b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="100%">
                     
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="hidden" readonly="readonly" id="idusuario" name="idusuario"/>
                            <input class="form-control" type="text" readonly="readonly" id="pro" name="pro"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Email:</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre:</label>
                            <input class="form-control" type="text" name="nom" id="nom" placeholder="Nombre" />
                        </div>
                        <div class="col-md-6">
                            <label>Apellido:</label>
                            <input class="form-control" type="text" name="ape" id="ape" placeholder="Apellido" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Contraseña:</label>
                            <input class="form-control" type="password" name="contra" id="contra" placeholder="Contraseña" />
                        </div>
                        <div class="col-md-4">
                            <label>Direccion:</label>
                            <input class="form-control" type="text" name="dire" id="dire" placeholder="Direccion" />
                        </div>
                        <div class="col-md-4">
                            <label>Telefono:</label>
                            <input class="form-control" type="text" name="tel" id="tel" placeholder="Telefono" />
                        </div>
                    </div>
                    <br>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                               <div id="mensaje"></div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
            
            <div class="modal-footer">
                <input type="submit" value="Ingresar" class="btn btn-info btn-fill btn-wd" id="reg"/>

                <input type="submit" value="Editar" class="btn btn-warning btn-fill btn-wd"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
    </div>
    <!-- modal-->



            <!--      CONTENIDO DEL SISTEMA                     -->
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Arriba
                            </a>
                        </li>
                        <!--        here you can add more links for the footer                       -->
                    </ul>
                </nav>
                <p class="copyright pull-right">
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

    <script src="usuario/funciones.js"></script>


</html>
