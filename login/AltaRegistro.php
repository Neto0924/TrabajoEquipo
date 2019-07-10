<?php 
include '../conexion/conexion.php';
$noControl = $_POST['noControl'];
$ide = $_POST['ide'];

date_default_timezone_set('America/Monterrey');
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");
	
		mysql_query('SET NAMES utf8');


			$consulta=mysql_query("SELECT 
								id_registro, 
								matricula,
								fecha_ingreso,
								hora_ingreso,
								fecha_salida,
								hora_salida,
								fecha_actualiza,
								hora_actualiza,
								activo
								FROM registros
								WHERE fecha_ingreso = '$fecha' AND id_alumno = '$ide' AND activo = '1' ",$conexion) or die (mysql_error());

		$row = mysql_fetch_array($consulta);
		$validar = mysql_num_rows($consulta);
		

		if ($validar == 0) {
			
			
				  $cadena = mysql_query("INSERT INTO registros (id_alumno, matricula, fecha_ingreso, hora_ingreso,fecha_salida,hora_salida,fecha_actualiza,hora_actualiza, activo)
		         VALUES ('$ide', '$noControl', '$fecha', '$hora','','','$fecha', '$hora', '1')",$conexion)or die(mysql_error());
				// echo $cadena;
				echo "Registro nueva entrada";
				
			
		}
		else{

			 $cadena_actualizar = mysql_query("UPDATE registros SET 
			 						fecha_salida = '$fecha', 
									hora_salida = '$hora', 
			 						fecha_actualiza = '$fecha', 
			 						hora_actualiza = '$hora',
			 						activo = '0'
			 				WHERE id_registro = '$row[0]'",$conexion)or die(mysql_error());
				echo "Salida actualizada";
				
		}//validar

	
	
?>