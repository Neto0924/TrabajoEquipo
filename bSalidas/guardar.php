<?php
//se manda llamar la conexion.
include '../sesiones/verificar_sesion.php';
include("../conexion/conexion.php");

$id_usuario =  $_SESSION["idUsuario"];
$medicamento    = $_POST["medicamento"];
$cantidad= $_POST["cantidad"];
$proveedor  = $_POST["proveedor"];


$medicamento    =trim($medicamento);
$cantidad   =trim($cantidad);
$proveedor    =trim($proveedor);

date_default_timezone_set("America/Monterrey");
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");



mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO entradas 
 								(
 								id_medicamento,
 								cantidad,
								proveedor,
 								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$medicamento',
 								'$cantidad',
								 '$proveedor',
 								'$id_usuario',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());




?>