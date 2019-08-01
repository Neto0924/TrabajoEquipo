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
   $totalP = $_POST["totalP"]; 
   $totalR = $_POST["totalR"];
   $diferencia = $_POST["diferencia"];
   $estatus = $_POST["estatus"];
  


$estatus    =trim($estatus);



$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");


mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO pedidos_farmacia 
 								(
 								fecha_pedido,
 								hora_pedido,
 								id_almacen,
 								id_registro,
 								status,
 								activo
 								)
							VALUES
								(
 								'$fecha',
 								'$hora',
 								'1',
 								'$id_usuario',
 								'En Proceso',
                        '1'
								)
							",$conexion)or die(mysql_error());

?>