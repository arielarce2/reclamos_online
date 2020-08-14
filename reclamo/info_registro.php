<?php
  include('../parametros2/conexion.php');
  
  $idreclamo = $_POST['idreclamo'];
  
  
  date_default_timezone_set("America/Argentina/Buenos_Aires");
  $fecha = date("Y-m-d H:i:s");




  require('../parametros2/conexion.php');
  session_start();
  $usu = $_SESSION['usuario_id'];
  
  $consult="SELECT idreclamo, rtitular, rproveedor, rfecha, rreclamo_estado, rconsorcio, ruf, rpiso, rdepto, rtelefono, remail, rllave, rfecha, rfactura, rcheque, rfechapago, rreclamo, robservaciones
            FROM reclamo 
            WHERE idreclamo = '$idreclamo' AND usuario_idusuario = '$usu' ";
  
  if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }
  
  $resu = $result->fetch_array();
  
  $idre = $resu['idreclamo'];
  
  ?>
<div class="content">
  <div align="center">
    <a class="btn btn-primary btn-fill btn-wd" href="javascript:imprimirdocu('imprimir')">Imprimir Reclamo</a>                   
  </div>
  <br> 
  <SCRIPT Language="Javascript">
    function imprimirdocu(imprimir){
      var ficha=document.getElementById(imprimir);
      var ventimp=window.open(' ','popimpr');
      ventimp.document.write(ficha.innerHTML);
      ventimp.document.close();
      ventimp.print();
      ventimp.close();
    }
  </script>
  <div id="imprimir">
    <div style="overflow:auto;">
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="909090" align="center" width="800">
        <TR align="center" height="10" width="800">
          <TD colspan="6" width="800">
            <font face="verdana">
            <br>
            &ensp;&ensp;&ensp;&ensp; ID #<?php echo $idre; ?> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Estado del reclamo:
            <?php 
              switch($resu['rreclamo_estado']){
                  case '0':
                  echo '<span class="label label-info">SIN ASIGNAR</span>';
                      break;
                  case '1':
                  echo '<span class="label label-danger">PASADO A CONTRATISTA</span>';
                      break;
                      
                  case '2':
                  echo '<span class="label label-warning">EN EJECUCION</span>' ;
                      break;
              
                  case '3':
                  echo '<span class="label label-success">TERMINADO</span>' ;
                      break;
                  }
                   ?>
            <br><br>
            </font>
          </TD>
        </TR>
        <TR align="center" height="10" width="800">
          <TD colspan="2" width="250">
            <font face="verdana">
            <br>
            Consorcio: <?php echo $resu['rconsorcio']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="1" width="250">
            <font face="verdana">
            <br>
            UF: <?php echo $resu['ruf']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="1" width="250">
            <font face="verdana">
            <br>
            Piso: <?php echo $resu['rpiso']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="2" width="250">
            <font face="verdana">
            <br>
            Depto: <?php echo $resu['rdepto']; ?>
            <br><br>
            </font>
          </TD>
        </TR>
        <TR align="center" height="10" width="800">
          <TD colspan="2" width="250">
            <font face="verdana">
            <br>
            Propietario: <?php echo $resu['rtitular']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="1" width="250">
            <font face="verdana">
            <br>
            Telefono: <?php echo $resu['rtelefono']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="1" width="250">
            <font face="verdana">
            <br>
            Email: <?php echo $resu['remail']; ?>
            <br><br>
            </font> 
          </TD>
          <TD colspan="2" width="250">
            <font face="verdana">
            <br>
            Llave: <?php echo $resu['rllave']; ?>
            <br><br>
            </font>
          </TD>
        </TR>
        <TR align="center" height="10" width="800">
          <TD colspan="3" width="500">
            <font face="verdana">
            <br>
            Proveedor: <?php echo $resu['rproveedor']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="3" width="500">
            <font face="verdana">
            <br>
            Fecha: <?php echo $resu['rfecha']; ?>
            <br><br>
            </font>
          </TD>
        </TR>
        <TR align="center" height="10" width="800">
          <TD colspan="2" width="330">
            <font face="verdana">
            <br>
            Factura: <?php echo $resu['rfactura']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="2" width="330">
            <font face="verdana">
            <br>
            Cheque: <?php echo $resu['rcheque']; ?>
            <br><br>
            </font>
          </TD>
          <TD colspan="2" width="330">
            <font face="verdana">
            <br>
            Fecha_Pago: <?php echo $resu['rfechapago']; ?>
            <br><br>
            </font>
          </TD>
        </TR>
        <TR height="50" width="800">
          <TD colspan="6">
            <font face="verdana">
              &ensp;&ensp;&ensp;&ensp; 
              <P ALIGN="left"> Reclamo: <br><?php echo $resu['rreclamo']; ?> </p>
              &ensp;&ensp;&ensp;&ensp;
            </font>
          </TD>
        </TR>
        <TR height="50" width="800">
          <TD colspan="6">
            <font face="verdana">
              &ensp;&ensp;&ensp;&ensp; 
              <P ALIGN="left"> Observaciones: <br><?php echo $resu['robservaciones']; ?> </p>
              &ensp;&ensp;&ensp;&ensp;
            </font>
          </TD>
        </TR>
      </table>
    </div>
  </div>
</div>