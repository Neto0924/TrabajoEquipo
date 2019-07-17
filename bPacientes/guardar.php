<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include "../sesiones/verificar_sesion.php";

// $nombre    = $_POST["nombre"];
// $paterno   = $_POST["paterno"];
// $materno   = $_POST["materno"];
// $direccion = $_POST["direccion"];
// $telefono  = $_POST["telefono"];
// $correo    = $_POST["correo"];
// $tipo      = $_POST["tipo"];
// $sexo      = $_POST["sexo"];

   $id_usuario =  $_SESSION["idUsuario"];
   $paciente = $_POST["persona"]; 
   $numSeguro = $_POST["numSeguro"];
   $sangre = $_POST["tipoSangre"];
   $estatura = $_POST["estatura"];
   $peso = $_POST["peso"];
   $detalle = $_POST["detalle"];


$paciente    =trim($paciente);
$numSeguro   =trim($numSeguro);
$sangre   =trim($sangre);
$estatura =trim($estatura);
$peso  =trim($peso);
$detalle    =trim($detalle);


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");


mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO pacientes 
 								(
 								id_persona,
 								numero_seguro,
 								tipo_sangre,
 								estatura,
 								peso,
 								id_detalle_paciente,
 								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$paciente',
 								'$numSeguro',
 								'$sangre',
 								'$estatura',
 								'$peso',
 								'$detalle',
 								'$id_usuario',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>