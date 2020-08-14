    <script type="text/javascript">

    $(document).ready(function() {

        $('#tabla1').DataTable({

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

$proceso = $_POST['pro'];



$rconsorcio = $_POST['rconsorcio'];

$ruf = $_POST['ruf'];

$rpiso= $_POST['rpiso'];

$rdepto = $_POST['rdepto'];

$rtitular = $_POST['rtitular'];

$rtelefono = $_POST['rtelefono'];

$remail = $_POST['remail'];

$rllave = $_POST['rllave'];

$rfecha = $_POST['rfecha'];

$rproveedor = $_POST['rproveedor'];

$rfactura = $_POST['rfactura'];

$rfechapago = $_POST['rfechapago'];

$rcheque = $_POST['rcheque'];

$rreclamo = $_POST['rreclamo'];

$robservaciones = $_POST['robservaciones'];

$rreclamo_estado = $_POST['rreclamo_estado'];





date_default_timezone_set("America/Argentina/Buenos_Aires");

$fecha = date("Y-m-d H:i:s");











//VERIFICAMOS EL PROCESO

include('../parametros2/conexion.php');



session_start();

$usu = $_SESSION['usuario_id'];







switch($proceso){

    case 'Registro':





    $consult="INSERT INTO reclamo (rconsorcio, ruf, rpiso, rdepto, rtitular, rtelefono, remail, rllave, rfecha, rproveedor, rfactura, rfechapago, rcheque, rreclamo, robservaciones, usuario_idusuario, restado, rfechaalta, rreclamo_estado) 

    VALUES ('$rconsorcio', '$ruf', '$rpiso', '$rdepto', '$rtitular', '$rtelefono', '$remail', '$rllave', '$rfecha', '$rproveedor','$rfactura','$rfechapago','$rcheque','$rreclamo','$robservaciones','$usu','1','$fecha','$rreclamo_estado')";

    if(!$result = $db->query($consult)){    die('Ocurrió un error1: [' . $db->error . ']'); }





    $consult1 = "SELECT idreclamo FROM reclamo WHERE usuario_idusuario = '$usu' ORDER BY idreclamo DESC LIMIT 1";

    if(!$result1 = $db->query($consult1)){  die('Ocurrió un error2: [' . $db->error . ']'); }

    $consu1 = $result1->fetch_array();

    $idreclamo = $consu1['idreclamo'];







    $ndetalle = 'SE GENERO EL PEDIDO';

    $consult2="INSERT INTO notificaciones ( ndetalle, reclamo_idreclamo, nusuario_idusuario, ntipo ) VALUES ('$ndetalle', '$idreclamo', '$usu', '1')";

    if(!$result2 = $db->query($consult2)){  die('Ocurrió un error3: [' . $db->error . ']'); }







    $consult4 = "SELECT uemail FROM usuario WHERE idusuario = '$usu'";

    if(!$result4 = $db->query($consult4)){  die('Ocurrió un error4: [' . $db->error . ']'); }

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

    <div class="alert alert-info alert-with-icon" data-notify="container" role="alert">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    SE GENERO UN NUEVO RECLAMO. 

    </div>

    <?php





    break;

    case 'Edicion':



  

    $idreclamo = $_POST['idreclamo'];





    $ndetalle = 'SE MODIFICO EL PEDIDO';

    $consult3="INSERT INTO notificaciones ( ndetalle, reclamo_idreclamo, nusuario_idusuario, ntipo ) VALUES ('$ndetalle', '$idreclamo', '$usu', '2')";

    if(!$result3 = $db->query($consult3)){  die('Ocurrió un error1: [' . $db->error . ']'); }





    $consult2="UPDATE reclamo SET      

    rconsorcio='$rconsorcio', ruf='$ruf', rpiso='$rpiso', rdepto='$rdepto', rtitular='$rtitular', rtelefono='$rtelefono', 

    remail='$remail', rllave='$rllave', rfecha='$rfecha' , rproveedor='$rproveedor', rfactura='$rfactura', rfechapago='$rfechapago', 

    rcheque='$rcheque', rfechamod='$fecha', rreclamo_estado='$rreclamo_estado', rreclamo='$rreclamo', robservaciones='$robservaciones' 

    WHERE  usuario_idusuario = '$usu' AND idreclamo ='$idreclamo'";

    if(!$result2 = $db->query($consult2)){  die('Ocurrió un error2: [' . $db->error . ']'); }







    $consult4 = "SELECT uemail FROM usuario WHERE idusuario = '$usu'";

    if(!$result4 = $db->query($consult4)){  die('Ocurrió un error4: [' . $db->error . ']'); }

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

    SE MODIFICO UN RECLAMO

    </div>

    <?php











    break;

 }

$db->close();







//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

?>





<table id="tabla1" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">

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

                      WHERE usuario_idusuario = '$usu' AND restado = '1'

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

                        <a rel="tooltip" title="Editar" class="btn btn-warning btn-simple btn" href="javascript:editarProducto('.$fila['idreclamo'].');">

                            <i class="fa fa-pencil"></i>

                        </a>

                        <a rel="tooltip" title="Finalizar" class="btn btn-success btn-simple btn" href="javascript:finalizarProducto('.$fila['idreclamo'].');">

                            <i class="fa fa-check"></i>

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