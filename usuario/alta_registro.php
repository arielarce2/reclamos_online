    <script>
     $(document).ready(function() {
         $('#tabla').DataTable( {
             responsive: true,
             searching: false,
             paging: false,
             info:false,
     
             language: {
                     "sProcessing":     "Procesando...",
                     "sLengthMenu":     "Mostrar _MENU_ registros",
                     "sZeroRecords":    "No se encontraron resultados",
                     "sEmptyTable":     "Ningun dato disponible en esta tabla",
                     "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                     "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                     "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                     "sInfoPostFix":    "",
                     "sSearch":         "Buscar:",
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
      
         } );
         $("#tabla_filter input").focus();
     } );
    </script>

<?php
$proceso = $_POST['pro'];

$idusuario = $_POST['idusuario'];
$email= $_POST['email'];
$nom = $_POST['nom'];
$ape = $_POST['ape'];
$dire = $_POST['dire'];
$tel = $_POST['tel'];
$contra = $_POST['contra'];

//VERIFICAMOS EL PROCESO
include('../parametros2/conexion.php');
session_start();
$usu = $_SESSION['usuario_id'];

    switch($proceso){
        case 'Registro':

    case 'Edicion':

$usuario_clave = md5($contra); // encriptamos la contraseña ingresada con md5

$consult2="UPDATE usuario SET uemail='$email', unombre='$nom', uapellido='$ape', upass='$usuario_clave', udireccion='$dire', 
                                   utelefono='$tel' WHERE idusuario='$idusuario'";
if(!$result2 = $db->query($consult2)){  die('Ocurrió un error: [' . $db->error . ']'); }

    break;
    
 }

    $db->close();

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
?>


                <?php                         
                require('../parametros2/conexion.php');
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



                                <div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                SE MODIFICO EL USUARIO.
                                </div> 

                                
                                
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