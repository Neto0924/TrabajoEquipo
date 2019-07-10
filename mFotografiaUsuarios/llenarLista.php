<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$consulta=mysql_query("SELECT
												id_usuario,
												id_persona,
												usuario,
												activo,
												(SELECT personas.nombre FROM personas WHERE personas.id_persona=usuarios.id_persona) AS nUsuario,
												(SELECT personas.ap_paterno FROM personas WHERE personas.id_persona=usuarios.id_persona) AS pUsuario,
												(SELECT personas.ap_materno FROM personas WHERE personas.id_persona=usuarios.id_persona) AS mUsuario,
												fecha_registro,
												(SELECT personas.sexo FROM personas WHERE personas.id_persona = usuarios.id_persona)AS Sexo,
												contra
												FROM
												usuarios",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Usuario</th>
				                        <th>Nombre</th>
				                       <!--  <th>Carrera</th> -->
				                        <th>Verificación</th>
				                        <th>Subir/Acualizar</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
															$idUsuario          = $row[0];
															// $nomCarrera        = $row[8];
															$activo            = $row[3];
															$nomAlumnoCompleto = $row[4].' '.$row[5].' '.$row[6];
															$idPersona         = $row[1];
															$Usuario         = $row[2]; 
															// $noControl         = $row[3];
															$registro          = $row[7];
															$checado           = ($activo == 1)?'checked'   : '';		
															$desabilitar       = ($activo == 0)?'disabled'  : '';
															$claseDesabilita   = ($activo == 0)?'desabilita': '';
															// $matricula         = $row[10];
															$sexo              = $row[8];

															$foto ='../images/'.$matricula.'.jpg';
															if (file_exists($foto)){
																$Icono="<i class='fas fa-check-circle fa-lg'></i>";
																$imagen=$foto;
														 }else{
																$Icono="<i class='fas fa-times-circle fa-lg'></i>";
																if ($sexo=='M') {
																	$imagen='../images/hombre.jpg';
																}else{
																	$imagen='../images/mujer.jpg';
																}
														 }
														?>

				                      <tr>
				                        <td >
				                          <p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
										   <p id="<?php echo "tNoControl".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $Usuario; ?>
				                          </p>
				                        </td>
				                        <td>
										   <p id="<?php echo "tnomAlumnoCompleto".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $nomAlumnoCompleto; ?>
				                          </p>
				                        </td>
				                        <!-- <td>
										   <p id="<?php echo "tnomCarrera".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $nomCarrera; ?>
				                          </p>
				                        </td> -->	
				                        <td>
																<a class="sb btn btn-login btn-sm" href="<?php echo $imagen ?>" title="<?php echo $nomAlumnoCompleto ?>"><?php echo $Icono ?></a>

				                        </td>
				                        <td>
													<button class="btn btn-login btn-sm" onclick="abrirModalSubir('<?php echo $matricula ?> ')">
														<i class="fas fa-upload"></i>
													</button>
				                        </td>
				                      </tr>
				                      <?php
				                      $n++;
				                    }
				                     ?>

				                    </tbody>

				                    <tfoot align="center">
				                      <tr class="info">
										<th>#</th>
				                        <th>Usuario</th>
				                        <th>Nombre</th>
				                        <!-- <th>Carrera</th> -->
				                        <th>Verificación</th>
				                        <th>Subir/Acualizar</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example1').DataTable( {
                 "language": {
                         // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                          "url": "../plugins/datatables/langauge/Spanish.json"
                      },
                 "order": [[ 0, "asc" ]],
                 "paging":   true,
                 "ordering": true,
                 "info":     true,
                 "responsive": true,
                 "searching": true,
                 stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
                  ],
                 columnDefs: [ {
                      // targets: 0,
                      // visible: false
                  }],
                  buttons: [

                  ]
              } );
          } );
      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>

<script>

$("#image").fileinput({
		theme: 'fas',
		language: 'es',
		showUpload: false,
		showCaption: true,
		showCancel: false,
		showRemove: true,
		browseClass: "btn btn-login",
		fileType: "jpg",
		allowedFileExtensions: ['jpg'],
		overwriteInitial: false,
		maxFileSize: 1000,
		maxFilesNum: 10
});

</script>

<script type="text/javascript" src="../plugins/Smoothbox-master/js/smoothbox.min.js"></script>