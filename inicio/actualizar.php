<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$sexo = $_POST["sexo"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$fecha_nac = $_POST["fecha_nac"];
$correo = $_POST["correo"];
$tipo = $_POST["tipo"];
$ide = $_POST["ide"];

$nombre = trim($nombre);
$paterno = trim($paterno);
$materno = trim($materno);
$sexo = trim($sexo);
$direccion = trim($direccion);
$telefono = trim($telefono);
$fecha_nac = trim($fecha_nac);
$correo = trim($correo);
$tipo = trim($tipo);

date_default_timezone_set("America/Monterrey");
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE personas SET
							nombre = '$nombre',
							ap_paterno = '$paterno',
							ap_materno = '$materno',
							sexo = '$sexo',
							direccion = '$direccion',
							telefono = '$telefono',
							fecha_nacimiento = '$fecha_nac',
							correo = '$correo',
							tipo_persona = '$tipo',
							id_registro='1',
							fecha_registro = '$fecha',
							hora_registro = '$hora'
						  WHERE id_persona='$ide'
							 ",$conexion)or die(mysql_error());

?>