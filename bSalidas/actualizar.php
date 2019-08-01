<?php
//se manda llamar la conexion.
include("../conexion/conexion.php");

$medicamento    = $_POST["medicamento"];
$proveedor  = $_POST["proveedor"];
$tmedicamento= $_POST["tmedicamento"];
$ide       = $_POST["ide"];

$id_usuario =  $_SESSION["idUsuario"];

$medicamento    =trim($medicamento);
$proveedor   =trim($proveedor);


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE entradas SET
							id_medicamento='$medicamento',
							proveedor='$proveedor',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='1'
						WHERE id_entrada='$ide'
							 ",$conexion)or die(mysql_error());

?>