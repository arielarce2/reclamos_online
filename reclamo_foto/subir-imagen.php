
 <script src="../reclamo_foto/funciones.js"></script>

<?php

session_start();
$usu = $_SESSION['usuario_id'];

$idpro = $_POST['idreclamo2'];

if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../reclamo_foto/imagenes/";

    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {

     ?><div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Error, el archivo no es una imagen. 
    </div><?php

    }
    else if ($size > 5000*5000)
    {


     ?><div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Error, el tamaño máximo permitido es un 5000px x 5000px.
    </div><?php


    }
    else if ($width > 5000 || $height > 5000)
    {


     ?><div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Error, la anchura y la altura maxima permitida es 5000px.
    </div><?php


    }
    else if($width < 60 || $height < 60)
    {

     ?><div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Error, la anchura y la altura mínima permitida es 60px.
    </div><?php

    }

    else if(strlen($nombre) > 40 )
    {

     ?><div class="alert alert-warning alert-with-icon" data-notify="container" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Error, el nombre de la imagen es demaciado largo.
    </div><?php

    }
    else
    {
        include('../parametros2/conexion.php');


        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $fecha = date("Y-m-d H:i:s");

        $fecha2 = date("H-i-s");

        $nombrebase = $idpro."-".$fecha2."-".$nombre;


        $consult="INSERT INTO reclamo_foto (rfnombre, reclamo_idreclamo, rffecha, usuario_idusuario) VALUES ('$nombrebase', '$idpro', '$fecha2', '$usu')";
        if(!$result = $db->query($consult)){  
         ?>

         <div class="alert alert-danger alert-with-icon" data-notify="container" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Error, en el Reclamo.
        </div><?php

       }else{


         $src = $carpeta.$nombre;
         move_uploaded_file($ruta_provisional, $src);

        rename("../reclamo_foto/imagenes/$nombre","../reclamo_foto/imagenes/$nombrebase");

        }


    }
}

?>

<form id="formulario2" class="formulario2">
    <table border="0" width="100%">
        <input class="form-control" type="hidden" name="idreclamo2" id="idreclamo2" value="<?php echo $idpro; ?>" />
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
                  WHERE usuario_idusuario = '$usu' AND reclamo_idreclamo='$idpro'
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