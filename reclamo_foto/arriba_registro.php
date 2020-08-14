 <script src="../reclamo_foto/funciones.js"></script>

<?php
include('../parametros2/conexion.php');

$id = $_POST['idreclamo_foto'];
session_start();
$usu = $_SESSION['usuario_id'];

//ELIMINAMOS EL PRODUCTO

$consult0="SELECT reclamo_idreclamo FROM reclamo_foto WHERE usuario_idusuario = '$usu' AND idreclamo_foto = '$id'";
if(!$result0 = $db->query($consult0)){  die('Ocurrió un error: [' . $db->error . ']'); }

$valores0 = $result0->fetch_array();
$reclamo_idreclamo = $valores0['reclamo_idreclamo'];


$consult1="SELECT idreclamo_foto, rfnombre, reclamo_idreclamo FROM reclamo_foto WHERE usuario_idusuario = '$usu' AND idreclamo_foto < '$id' AND reclamo_idreclamo = '$reclamo_idreclamo' ORDER BY idreclamo_foto DESC LIMIT 1";
if(!$result1 = $db->query($consult1)){  die('Ocurrió un error: [' . $db->error . ']'); }

$valores1 = $result1->fetch_array();
$idimagen_nueva = $valores1['idreclamo_foto'];
$nombre_nueva = $valores1['rfnombre'];
$propiedad_nueva = $valores1['reclamo_idreclamo'];


$consult2="SELECT idreclamo_foto, rfnombre, reclamo_idreclamo FROM reclamo_foto WHERE usuario_idusuario = '$usu' AND idreclamo_foto = '$id' AND reclamo_idreclamo = '$reclamo_idreclamo'";
if(!$result2 = $db->query($consult2)){  die('Ocurrió un error: [' . $db->error . ']'); }

$valores2 = $result2->fetch_array();
$idimagen = $valores2['idreclamo_foto'];
$nombre = $valores2['rfnombre'];
$propiedad = $valores2['reclamo_idreclamo'];

if ($propiedad_nueva != $propiedad) {

}  else{
$consult4="UPDATE reclamo_foto SET rfnombre = '$nombre_nueva' WHERE  usuario_idusuario = '$usu' AND idreclamo_foto = '$idimagen' AND reclamo_idreclamo = '$reclamo_idreclamo'";
if(!$result4 = $db->query($consult4)){  die('Ocurrió un error_si: [' . $db->error . ']'); }


$consult4="UPDATE reclamo_foto SET rfnombre = '$nombre' WHERE  usuario_idusuario = '$usu' AND idreclamo_foto = '$idimagen_nueva' AND reclamo_idreclamo = '$reclamo_idreclamo'";
if(!$result4 = $db->query($consult4)){  die('Ocurrió un error_si: [' . $db->error . ']'); }

}









//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

?>

    <form id="formulario2" class="formulario2">
        <table border="0" width="100%">
            <input class="form-control" type="hidden" name="idreclamo2" id="idreclamo2" value="<?php echo $propiedad; ?>" />
            <div class="row">
                <div class="col-md-12">
                    <label>Imagen:</label>
                    <input class="form-control"  type="file" name="file" />
                </div>
             </div>
             <br>
            <div class="content">
               <div class="row">
                  <div class="col-md-12">
                     <div id="mensaje3"></div>
                  </div>
               </div>
            </div>
        </table>
    <div id="resultado"></div>
</form>


 <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
<thead>
    <tr>
        <th>Imagen</th>
        <th>Accion</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Imagen</th>
        <th>Accion</th>
    </tr>
</tfoot>
 <tbody>
    <?php
        require('../parametros2/conexion.php');
        $consult="SELECT idreclamo_foto, rfnombre, rffecha, reclamo_idreclamo
                  FROM reclamo_foto
                  WHERE usuario_idusuario = '$usu' AND reclamo_idreclamo='$propiedad'
                  ORDER BY idreclamo_foto ASC ";

        if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }


        while($fila=$result->fetch_assoc()){

            $var = $fila['rfnombre'];

            echo '<tr>';

                    ?><td><img src="../reclamo_foto/imagenes/<?php echo $var; ?>" border="0" height="150" width="220"/></td><?php

            echo '<td>
                    <a rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn" href="javascript:eliminarProductoimg('.$fila['idreclamo_foto'].');">
                        <i class="fa fa-times"></i>
                    </a>
                    <a rel="tooltip" title="Arriba" class="btn btn-danger btn-simple btn" href="javascript:arribaProductoimg('.$fila['idreclamo_foto'].');">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a rel="tooltip" title="abajo" class="btn btn-danger btn-simple btn" href="javascript:abajoProductoimg('.$fila['idreclamo_foto'].');">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    </td>
                </tr>';      
        } 

        $result->free(); 
        $db->close();
    ?>
</tbody>
</table>