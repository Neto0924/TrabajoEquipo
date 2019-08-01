<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$cantidadRD    = $_POST["cantidadRD"];
$ide       = $_POST["ide"];
$idDetalle = $_POST["idDetalle"];




mysql_query("SET NAMES utf8");
 $consulta = mysql_query("SELECT cantidad_pedido
 							FROM detalle_pedidos_farmacia
 							WHERE id_pedido = '$ide'
							 ",$conexion)or die(mysql_error());

 $row = mysql_fetch_array($consulta);
 $row2 = mysql_fetch_row($consulta);
 $pedido = $row[0];

echo $row[0];
foreach ($consulta as $cantidad => $value) {
	echo $cantidad."Esto que".$value;
}
 // $diferencia = $pedido - $cantidadRD;
// $fecha=date("Y-m-d"); 
// $hora=date ("H:i:s");



// if ($diferencia < 0) {
// 	echo "alert('No puedes recibir mas de lo pedido')";
// }
// else{

// }

// mysql_query("SET NAMES utf8");
//  $insertar = mysql_query("UPDATE detalle_pedidos_farmacia SET
// 							cantidad_recibida='$cantidadRD',
// 							diferencia = '$diferencia'
// 						WHERE id_detalle_pedido='$idDetalle'
// 							 ",$conexion)or die(mysql_error());

?>