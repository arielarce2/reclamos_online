<?php
include('../parametros2/conexion.php');

$id = $_POST['idusuario'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$consult="SELECT uemail, unombre, uapellido, udireccion, utelefono, upass FROM usuario WHERE idusuario = '$id'";
if(!$result = $db->query($consult)){  die('Ocurrió un error: [' . $db->error . ']'); }

$valores2 = $result->fetch_array();


//CODIGO JSON PARA AGREGAR AL MYJAVA

$datos = array( 
				0 => $valores2['uemail'], 
				1 => $valores2['unombre'], 
				2 => $valores2['uapellido'],
				3 => $valores2['udireccion'], 
				4 => $valores2['utelefono'], 
				5 => $valores2['upass'],
				);

// manda todo a myjava en {success: function(valores)} en edita producto
echo json_encode($datos);
?>