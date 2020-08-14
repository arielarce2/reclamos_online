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

    

<?php

include('../parametros2/conexion.php');



$idreclamo = $_POST['idreclamo'];

session_start();

$usu = $_SESSION['usuario_id'];



//ELIMINAMOS EL PRODUCTO





$consult2="UPDATE reclamo SET restado ='1' WHERE  usuario_idusuario = '$usu' AND idreclamo='$idreclamo'";

if(!$result2 = $db->query($consult2)){  die('<div class="alert alert-info" role="alert">El elemento que se intenta borrar se encuentra en uso en el sistema</div>'); } 





$ndetalle = 'SE RESTAURO EL PEDIDO FINALIZADO';

$consult3="INSERT INTO notificaciones ( ndetalle, reclamo_idreclamo, nusuario_idusuario, ntipo ) VALUES ('$ndetalle', '$idreclamo', '$usu', '2')";

if(!$result3 = $db->query($consult3)){  die('Ocurrió un error1: [' . $db->error . ']'); }





$consult4 = "SELECT uemail FROM usuario WHERE idusuario = '$usu'";

if(!$result4 = $db->query($consult4)){  die('Ocurrió un error2: [' . $db->error . ']'); }

$consu4 = $result4->fetch_array();

$uemail = $consu4['uemail'];   



require('../parametros2/PHPMailer/class.phpmailer.php');

require('../parametros2/PHPMailer/class.smtp.php');

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

$mail->AddAddress($uemail, 'Notificaciones'); // Mail: 

$mail->Subject = 'Notificaciones';

$mail->Body    = "<strong> RECLAMO N° # ".$idreclamo."</strong> - ".$ndetalle."";

$mail->Send();



?>









<div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">

<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

SE RESTAURO UN NUEVO RECLAMO. 

</div>







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