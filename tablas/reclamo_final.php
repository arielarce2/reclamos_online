<?php

include('../parametros2/conexion.php');

session_start();



if(isset($_SESSION['usuario_id']) == false){

  header('Location: ../index.php');

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

	<link rel="icon" type="image/png" href="../parametros/assets/img/favicon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



	<title>Reclamos Online</title>



	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />



    <!-- Bootstrap core CSS     -->

    <link href="../parametros/assets/css/bootstrap.min.css" rel="stylesheet" />



    <!--  Light Bootstrap Dashboard core CSS    -->

    <link href="../parametros/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>



    <!--  CSS for Demo Purpose, don't include it in your project     -->

    <link href="../parametros/assets/css/demo.css" rel="stylesheet" />



    <!--     Fonts and icons     -->

    <link href="../parametros/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="../parametros/fontsgoogleapis.css" rel="stylesheet" type="text/css">



    <link href="../parametros/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>

<body>



<div class="wrapper">

    <div class="sidebar" data-color="grey" data-image="../parametros/assets/img/full-screen-image-1.jpg">

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

                    <img src="../parametros/assets/img/default-avatar.jpg" />

                </div>

                <div class="info">

                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">

                        Usuario: <?php echo $nombre2['unombre'];?>

                        <b class="caret"></b>

                    </a>

                    <div class="collapse" id="collapseExample">

                        <ul class="nav">

                            <li><a href="../usuario.php">Perfil</a></li>

                        </ul>

                    </div>

                </div>

            </div>



            <ul class="nav">

                <li>

                    <a href="../inicio.php">

                        <i class="pe-7s-note2"></i>

                        <p>Inicio</p>

                    </a>

                </li>

                <li>

                    <a href="reclamo.php">

                        <i class="pe-7s-notebook"></i>

                        <p>Reclamos</p>

                    </a>

                </li>

                <li class="active">

                    <a href="reclamo_final.php">

                        <i class="pe-7s-ribbon"></i>

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

                    <a class="navbar-brand">Reclamos Finalizados</a>

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

                                    <a href="../usuario.php">

                                        <i class="pe-7s-tools"></i> Perfil

                                    </a>

                                </li>

                                <li class="divider"></li>

                                <li>

                                    <a href="../logout.php" class="text-danger">

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







                <div class="row">

                    <div class="col-md-12">

                        <div class="card">

                            <div class="content">

                                <div class="fresh-datatables">

                                <div class="registros" id="agrega-registros">

                                <table id="tabla2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Estado</th>

                                            <th>Consorcio</th>

                                            <th>Propietario</th>

                                            <th>Proveedor</th>

                                            <th>Fecha</th>

                                            <th>Acciones</th>

                                        </tr>

                                    </thead>

                                    <tfoot>

                                        <tr>

                                            <th>ID</th>

                                            <th>Estado</th>

                                            <th>Consorcio</th>

                                            <th>Propietario</th>

                                            <th>Proveedor</th>

                                            <th>Fecha</th>

                                            <th>Acciones</th>

                                        </tr>

                                    </tfoot>

                                     <tbody>

                                        <?php

                                            require('../parametros2/conexion.php');

                                            $usu = $_SESSION['usuario_id'];

                                            $consult="SELECT idreclamo, rconsorcio, rtitular, rproveedor, rfecha, rreclamo_estado

                                                      FROM reclamo 

                                                      WHERE usuario_idusuario = '$usu' AND restado = '0'

                                                      ORDER BY idreclamo ASC ";



                                            if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }





                                            while($fila=$result->fetch_assoc()){

                                                echo '<tr>

                                                        <td> #'.$fila['idreclamo'].'</td>';



                                            switch($fila['rreclamo_estado']){

                                                case '0':

                                                echo '<td><span class="label label-info">SIN ASIGNAR</span></td>';

                                                    break;

                                                case '1':

                                                echo '<td><span class="label label-danger">PASADO A CONTRATISTA</span></td>';

                                                    break;

                                                    

                                                case '2':

                                                echo '<td><span class="label label-warning">EN EJECUCION</span></td>' ;

                                                    break;



                                                case '3':

                                                echo '<td><span class="label label-success">TERMINADO</span></td>' ;

                                                    break;

                                                }

                                                 echo ' <td>'.$fila['rconsorcio'].'</td>

                                                        <td>'.$fila['rtitular'].'</td>

                                                        <td>'.$fila['rproveedor'].'</td>

                                                      <td>';

                                                $date = new DateTime($fila['rfecha']);

                                                echo $date->format('d/m/Y');



                                                echo '</td>

                                                        <td>

                                                        <a rel="tooltip" title="Imagenes" class="btn btn-info btn-simple btn" href="javascript:editarimg('.$fila['idreclamo'].');">

                                                            <i class="fa fa-picture-o"></i>

                                                        </a>   

                                                        <a rel="tooltip" title="Retaurar" class="btn btn-warning btn-simple btn" href="javascript:restaurarProducto('.$fila['idreclamo'].');">

                                                            <i class="fa fa-arrow-circle-up"></i>

                                                        </a>

                                                        <a rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn" href="javascript:eliminarProducto('.$fila['idreclamo'].');">

                                                            <i class="fa fa-times"></i>

                                                        </a>

                                                        <a rel="tooltip" title="Info" class="btn btn-primary btn-simple btn" href="javascript:infoProducto('.$fila['idreclamo'].');">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        </td>

                                                    </tr>';       

                                            } 



                                            $result->free(); 

                                            $db->close();

                                        ?>

                                    </tbody>

                                </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>







<!-- modal-->

<div class="modal fade bs-modal-sm" id="registra-producto3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog" id="mdialTamanio">

<div class="modal-content">

    

        <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              <h4 class="modal-title" id="myModalLabel"><b><center>Imagenes</center></b></h4>

        </div>



        <div class="modal-body">

            <div style="height:400px; overflow:auto;">

                <div id="resultado"></div>

            </div>



            <div class="modal-footer">

                <input type="submit" value="Finalizar" class="btn btn-info btn-fill btn-wd" id="cerrar"/>

            </div>

        </div>



      </div>

    </div>

</div>

<!-- modal-->







<!-- modal-->

<div class="modal fade bs-example-modal-lg" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

       <div class="card">



            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              <h4 class="modal-title" id="myModalLabel"><b><center>Registrar o Editar</center></b></h4>

            </div>

            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">

                

            <div class="modal-body">

                <table border="0" width="100%">

                     

                    <div class="row">

                        <div class="col-md-12">

                            <input class="form-control" type="hidden" readonly="readonly" id="idreclamo" name="idreclamo"/>

                            <input class="form-control" type="text" readonly="readonly" id="pro" name="pro"/>

                        </div>

                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-3">

                            <label>Consorcio:</label>

                            <input class="form-control" type="text" name="rconsorcio" id="rconsorcio" placeholder="Consorcio"/>

                        </div>



                        <div class="col-md-3">

                            <label>UF:</label>

                            <input class="form-control" type="text" name="ruf" id="ruf" placeholder="UF" />

                        </div>

                        <div class="col-md-3">

                            <label>Piso:</label>

                            <input class="form-control" type="text" name="rpiso" id="rpiso" placeholder="Piso" />

                        </div>

                        <div class="col-md-3">

                            <label>Depto:</label>

                            <input class="form-control" type="text" name="rdepto" id="rdepto" placeholder="Departamento" />

                        </div>

                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-3">

                            <label>Propietario:</label>

                            <input class="form-control" type="text" name="rtitular" id="rtitular" placeholder="Propietario" />

                        </div>

                        <div class="col-md-3">

                            <label>Telefono:</label>

                            <input class="form-control" type="text" name="rtelefono" id="rtelefono" placeholder="Telefono" />

                        </div>

                        <div class="col-md-3">

                            <label>Email:</label>

                            <input class="form-control" type="text" name="remail" id="remail" placeholder="Email" />

                        </div>

                        <div class="col-md-3">

                            <label>Llave:</label>

                            <input class="form-control" type="text" name="rllave" id="rllave" placeholder="Llave" />

                        </div>

                     </div>

                     <br>

                    <div class="row">

                        <div class="col-md-6">

                            <label>Proveedor:</label>

                            <input class="form-control" type="text" name="rproveedor" id="rproveedor" placeholder="Proveedor" />

                        </div>

                        <div class="col-md-6">

                            <label>Fecha:</label>

                            <input class="form-control" type="date" name="rfecha" id="rfecha" placeholder="Fecha" />

                        </div>

                     </div>

                     <br>

                    <div class="row">

                        <div class="col-md-4">

                            <label>Factura:</label>

                            <input class="form-control" type="text" name="rfactura" id="rfactura" placeholder="Factura" />

                        </div>

                        <div class="col-md-4">

                            <label>Cheque:</label>

                            <input class="form-control" type="text" name="rcheque" id="rcheque" placeholder="Cheque" />

                        </div>

                        <div class="col-md-4">

                            <label>Fecha de Pago:</label>

                            <input class="form-control" type="date" name="rfechapago" id="rfechapago" placeholder="Fecha de Pago" />

                        </div>

                     </div>

                     <br>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Estado de Reclamo:</label>

                            <select class="form-control" name="rreclamo_estado" id="rreclamo_estado" required onblur="compruebaValidoEntero()">

                                <option  value="">Opcion:</option>

                                <option  value="1">Pasado a Contratista</option>

                                <option  value="2">En Ejecucion</option>

                                <option  value="3">Terminado</option>

                            </select>

                        </div>

                     </div>

                     <br>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Reclamo:</label>

                            <textarea class="form-control" rows="3" name="rreclamo" id="rreclamo" placeholder="Reclamo" ></textarea>

                        </div>

                     </div>

                     <br>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Observaciones:</label>

                            <textarea class="form-control" rows="3" name="robservaciones" id="robservaciones" placeholder="Observaciones"></textarea>

                        </div>

                     </div>

                     <br>

                        <div class="row">

                            <div class="col-md-12">

                               <div id="mensaje"></div>

                            </div>

                         </div>



                </table>

            </div>

            

            <div class="modal-footer">

                <input type="submit" value="Ingresar" class="btn btn-info btn-fill btn-wd" id="reg"/>



                <input type="submit" value="Ingresar" class="btn btn-warning btn-fill btn-wd"  id="edi"/>

            </div>

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

    <script src="../parametros/assets/js/jquery.min.js" type="text/javascript"></script>

    <script src="../parametros/assets/js/jquery-ui.min.js" type="text/javascript"></script>

	<script src="../parametros/assets/js/bootstrap.min.js" type="text/javascript"></script>



	<!--  Forms Validations Plugin -->

	<script src="../parametros/assets/js/jquery.validate.min.js"></script>



    <!--  Select Picker Plugin -->

    <script src="../parametros/assets/js/bootstrap-selectpicker.js"></script>



	<!--  Checkbox, Radio, Switch and Tags Input Plugins -->

	<script src="../parametros/assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>



    <!--  Notifications Plugin    -->

    <script src="../parametros/assets/js/bootstrap-notify.js"></script>



    <!-- Sweet Alert 2 plugin -->

	<script src="../parametros/assets/js/sweetalert2.js"></script>



    <!-- Light Bootstrap Dashboard Core javascript and methods -->

	<script src="../parametros/assets/js/light-bootstrap-dashboard.js"></script>



	<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->

	<script src="../parametros/assets/js/demo.js"></script>



    <!--  Plugin for DataTables.net  -->

    <script src="../parametros/assets/js/jquery.datatables.js"></script>









    <script type="text/javascript">

    $(document).ready(function() {

        $('#tabla2').DataTable({

            info:false,

            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

            responsive: true,



                 language: {

                         "sProcessing":     "Procesando...",

                         "sLengthMenu":     "Mostrar _MENU_ registros",

                         "sZeroRecords":    "No se encontraron resultados",

                         "sEmptyTable":     "Ningun dato disponible en esta tabla",

                         "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

                         "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

                         "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

                         "sInfoPostFix":    "",

                         "search": "_INPUT_",

                         "searchPlaceholder": "Buscar",

                         "sUrl":            "",

                         "sInfoThousands":  ",",

                         "sLoadingRecords": "Cargando...",

                         "oPaginate": {

                             "sFirst":    "Primero",

                             "sLast":     "Ultimo",

                             "sNext":     "Siguiente",

                             "sPrevious": "Anterior"

                         },

                         "oAria": {

                             "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

                             "sSortDescending": ": Activar para ordenar la columna de manera descendente"

                         }

                       },



        });

        

        $("#tabla_filter input").focus();



    });

    

    </script>



    <script src="../reclamo/funciones.js"></script>



    <script src="../reclamo_foto/funciones.js"></script>



</html>

