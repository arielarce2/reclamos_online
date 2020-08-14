
<?php
include('../parametros2/conexion.php');

$idnotificaciones = $_POST['idnotificaciones'];

session_start();
$usu = $_SESSION['usuario_id'];

date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha = date("Y-m-d H:i:s");

//ELIMINAMOS EL PRODUCTO

$consult2="DELETE FROM notificaciones WHERE nusuario_idusuario = '$usu' AND idnotificaciones ='$idnotificaciones'";
if(!$result2 = $db->query($consult2)){  die('<div class="alert alert-info" role="alert">El elemento que se intenta borrar se encuentra en uso en el sistema</div>'); }


//detalle
?>


                              <?php
                                  $usu = $_SESSION['usuario_id'];
                                  $consult="SELECT idnotificaciones, ndetalle, idreclamo, ntipo
                                            FROM notificaciones
                                            INNER JOIN reclamo ON reclamo.idreclamo = notificaciones.reclamo_idreclamo
                                            WHERE nusuario_idusuario = '$usu' 
                                            ORDER BY idnotificaciones ASC";
                                  if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }
                                  $preciototal = 0;
                                  while($fila=$result->fetch_assoc()){


                                       $ndetalle = $fila['ndetalle'];
                                       $idreclamo = $fila['idreclamo'];
                                        switch($fila['ntipo']){
                                                case '0':
                                                echo '<div class="alert alert-info alert-with-icon" data-notify="container">';
                                                    break;
                                                case '1':
                                                echo '<div class="alert alert-info alert-with-icon" data-notify="container">';
                                                    break;
                                                    
                                                case '2':
                                                echo '<div class="alert alert-warning alert-with-icon" data-notify="container">' ;
                                                    break;

                                                case '3':
                                                echo '<div class="alert alert-success alert-with-icon" data-notify="container">' ;
                                                    break;

                                                case '4':
                                                echo '<div class="alert alert-danger alert-with-icon" data-notify="container">' ;
                                                    break;
                                                }

                                    echo '<a href="javascript:baja_noti('.$fila['idnotificaciones'].');" type="button" aria-hidden="true" class="close"><i class="fa fa-times"></i></a>';

                                        ?>
                                            <span data-notify="icon" class="pe-7s-bell"></span>
                                            <span><b><?php echo 'RECLAMO N° #',$idreclamo; ?></b> <?php echo ' - ',$ndetalle; ?></span>
                                        </div>
                                        <?php
                                     }
                                ?>