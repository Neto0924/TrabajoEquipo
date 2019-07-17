<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$seguro    = $_POST["seguro"];
$sangre   = $_POST["sangre"];
$estatura   = $_POST["estatura"];
$peso = $_POST["peso"];
$ide       = $_POST["ide"];

$seguro    =trim($seguro);
$sangre   =trim($sangre);
$estatura   =trim($estatura);
$peso =trim($peso);


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE pacientes SET
							numero_seguro='$seguro',
							tipo_sangre='$sangre',
							estatura='$estatura',
							peso='$peso',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='1'
						WHERE id_paciente='$ide'
							 ",$conexion)or die(mysql_error());

?>