<?php
include('../parametros2/conexion.php');

$id = $_POST['idreclamo'];
session_start();
$usu = $_SESSION['usuario_id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$consult="SELECT rconsorcio, ruf, rpiso, rdepto, rtitular, rtelefono, remail, rllave, rfecha, rproveedor, rfactura, rfechapago, rcheque, rreclamo, robservaciones,rreclamo_estado FROM reclamo WHERE usuario_idusuario = '$usu' AND idreclamo='$id'";
if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }

$valores2 = $result->fetch_array();


//CODIGO JSON PARA AGREGAR AL MYJAVA

$datos = array( 
				0 => $valores2['rconsorcio'], 
				1 => $valores2['ruf'],
				2 => $valores2['rpiso'], 
				3 => $valores2['rdepto'], 
				4 => $valores2['rtitular'],
				5 => $valores2['rtelefono'],
				6 => $valores2['remail'],
				7 => $valores2['rllave'],
				8 => $valores2['rfecha'],
				9 => $valores2['rproveedor'],
				10=> $valores2['rfactura'],
				11=> $valores2['rfechapago'],
				12=> $valores2['rcheque'],
				13=> $valores2['rreclamo'],
				14=> $valores2['robservaciones'],
				15=> $valores2['rreclamo_estado'],
				);

// manda todo a myjava en {success: function(valores)} en edita producto
echo json_encode($datos);
?>