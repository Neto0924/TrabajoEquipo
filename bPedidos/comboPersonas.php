<?php
include "../conexion/conexion.php";

mysql_query("SET NAMES utf8");

$consulta = mysql_query("SELECT
							id_medicamento,
							nombre,
							codigo,
							activo
							FROM
							catalogo_medicamento
							WHERE activo = 1",$conexion)or die(mysql_error());
?>
    <option value="0">Seleccione...</option>
<?php

while($row = mysql_fetch_row($consulta))
{  
	?>
    	<option value="<?php echo $row[2];?>"><?php echo $row[1];?></option>
	<?php
}

?>
<script>
 $("#idMedicamento").select2();
</script>