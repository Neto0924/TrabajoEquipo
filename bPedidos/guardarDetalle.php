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
   $medicamento = $_POST["medicamento"]; 
   $cantidad = $_POST["cantidad"];
   $ide = $_POST["ide"];
   
  


$medicamento    =trim($medicamento);
$cantidad    =trim($cantidad);



$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

// echo "INSERT INTO detalle_pedidos_farmacia 
//                         (
//                         id_pedido,
//                         cod_medicamento,
//                         cantidad_pedido,
//                         activo,
//                         id_registro
//                         )
//                      VALUES
//                         (
//                         '$ide',
//                         '$medicamento',
//                         '$cantidad',
//                         '1',
//                         '$id_usuario'
//                         )
//                      ";

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO detalle_pedidos_farmacia 
 								(
 								id_pedido,
 								cod_medicamento,
 								cantidad_pedido,
 								activo,
 								id_registro
 								)
							VALUES
								(
 								'$ide',
 								'$medicamento',
 								'$cantidad',
                        '1',
 								'$id_usuario'
								)
							",$conexion)or die(mysql_error());



 $consulta=mysql_query("SELECT
                           id_detalle_pedido,
                           id_pedido,
                           cod_medicamento,
                           cantidad_pedido,
                           activo
                        FROM
                           detalle_pedidos_farmacia
                        WHERE
                           id_pedido = '$ide'
                        ORDER BY
                           id_detalle_pedido DESC
                        LIMIT 1
                  ",$conexion) or die (mysql_error());

$row = mysql_fetch_row($consulta);

$canti = $row[3];

 $pedido=mysql_query("SELECT
                           id_pedido,
                           total_pedido,
                           activo
                        FROM
                           pedidos_farmacia
                        WHERE
                           id_pedido = '$ide'
                  ",$conexion) or die (mysql_error());

$row2 = mysql_fetch_row($pedido);

$total = $row2[1];

$suma = $canti + $total;

 $actualizar=mysql_query("UPDATE
                           pedidos_farmacia
                        SET
                           total_pedido = '$suma'
                        WHERE id_pedido = '$ide'
                  ",$conexion) or die (mysql_error());

 echo $actualizar;

?>