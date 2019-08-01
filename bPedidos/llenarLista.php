<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT
							id_pedido,
							fecha_pedido,
							hora_pedido,
							id_almacen,
							id_registro,
							status,
							total_pedido,
							total_recibido,
							diferencia,
							activo 
						FROM
							pedidos_farmacia
						",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Fecha de pedido</th>
				                        <th>Hora de pedido</th>
				                        <th>Almacen</th>
				                        <th>Estatus de Pedido</th>
				                        <th>Total pedido</th>
				                        <th>Total recibido</th>
				                        <th>Diferencia</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
										$idPedido  = $row[0];
										$fecha   = $row[1];
										$hora   = $row[2];
										$almacen = $row[3];
										$idRegistro     = $row[4];
										$status    = $row[5];
										$total_pedido    = $row[6];
										$total_recibido        = $row[7];
										$diferencia = $row[8];
										$activo      = $row[9];
										$checado=($activo==1)?'checked':'';		
										$desabilitar=($activo==0)?'disabled':'';
										$claseDesabilita=($activo==0)?'desabilita':'';
															?>
				                      <tr>
				                        <td>
				                          <p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tPersona".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $fecha; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tCorreo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $hora; ?>
				                          </p>
				                        </td>
				                        <td>
											<?php echo $almacen; ?>
				                        </td>
				                        <td>
											<input type="button" value="<?php echo $status; ?>" class="btn btn-login btn-md" onclick="Cambiar( '<?php echo $idPedido ?>' );">
										</td>
										<td> <?php echo $total_pedido; ?> </td>
										<td> <?php echo $total_recibido; ?> </td>
										<td> <?php echo $diferencia; ?> </td>
				                        <td>
				                          <button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar ?>  type="button" class="btn btn-login btn-sm" 
				                          onclick="abrirModalEditar(
				                          							'<?php echo $idPedido ?>'
				                          							);">
				                          	<i class="far fa-edit"></i>
				                          </button>
				                        </td>
				                        <td>
											<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idPedido; ?>);">
											
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
				                        <th>Fecha de pedido</th>
				                        <th>Hora de pedido</th>
				                        <th>Almacen</th>
				                        <th>Estatus de Pedido</th>
				                        <th>Total pedido</th>
				                        <th>Total recibido</th>
				                        <th>Diferencia</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
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
                            // {
                            //     extend: 'pageLength',
                            //     text: 'Registros',
                            //     className: 'btn btn-default'
                            // },
                          {
                              extend: 'excel',
                              text: 'Exportar a Excel',
                              className: 'btn btn-login',
                              title:'Bajas-Estaditicas',
                              exportOptions: {
                                  columns: ':visible'
                              }
                          },
                         {
                              text: 'Iniciar pedido',
                              action: function () {
                                      IniciarPedido();
                                      Refresh();
                              },
							  className: 'btn btn-login',
                              counter: 1
                          },
                  ]
              } );
          } );

      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>
    
    
