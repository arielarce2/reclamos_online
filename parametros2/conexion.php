<?php  

$db = new mysqli("localhost","root","", "sistema_reclamo");

if($db->connect_errno > 0)
	{ 
		die('Ocurrió un error conexion.php: [' . $db->connect_error . ']'); 
    }

?>