<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$estatus    = $_POST["estatus"];
$ide       = $_POST["ide"];

$estatus    =trim($estatus);



// $fecha=date("Y-m-d"); 
// $hora=date ("H:i:s");


// echo "UPDATE pedidos_farmacia SET
// 							status='$estatus'
// 						WHERE id_pedido='$ide'
// 							 ";

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE pedidos_farmacia SET
							status='$estatus'
						WHERE id_pedido='$ide'
							 ",$conexion)or die(mysql_error());

?>