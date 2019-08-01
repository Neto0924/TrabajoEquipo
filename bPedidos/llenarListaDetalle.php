<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT
							id_detalle_pedido,
							id_pedido,
							cod_medicamento,
							cantidad_pedido,
							cantidad_recibida,
							diferencia,
							activo
						FROM
							detalle_pedidos_farmacia
						",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example2" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Pedido</th>
				                        <th>Cod. Medicamento</th>
				                        <th>Cantidad Pedido</th>
				                        <th>Cantidad Recibida</th>
				                        <th>Diferencia</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                        <th>Cancelar</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
										$idDPedido  = $row[0];
										$idpedido   = $row[1];
										$codigo   = $row[2];
										$cantidadP = $row[3];
										$cantidadR     = $row[4];
										$diferencia    = $row[5];
										$activo      = $row[6];
										
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
				                          	<?php echo $idpedido; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tCorreo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $codigo; ?>
				                          </p>
				                        </td>
				                        <td>
											<?php echo $cantidadP; ?>
				                        </td>
				                        <!-- <td>
											<input type="button" value="<?php echo $status; ?>" class="btn btn-login btn-md" onclick="Cambiar( '<?php echo $idPedido ?>' );">
										</td> -->
										<td> <?php echo $cantidadR; ?> </td>
										<!-- <td> <?php echo $total_recibido; ?> </td> -->
										<td> <?php echo $diferencia; ?> </td>
				                        <td>
				                          <button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar ?>  type="button" class="btn btn-login btn-sm" 
				                          onclick="abrirModalDetalle(
				                          							'<?php echo $idDPedido ?>',
				                          							'<?php echo $idpedido ?>',
				                          							'<?php echo $codigo ?>',
				                          							'<?php echo $cantidadP ?>'
				                          							);">
				                          	<i class="far fa-edit"></i>
				                          </button>
				                        </td>
				                        <td>
											<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idDPedido; ?>);">
											
				                        </td>
				                        <td>
				                        	<input type="button" class="btn btn-warning" value="Cancelar" name="">
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
				                        <th>Pedido</th>
				                        <th>Cod. Medicamento</th>
				                        <th>Cantidad Pedido</th>
				                        <th>Cantidad Recibida</th>
				                        <th>Diferencia</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                        <th>Cancelar</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example2').DataTable( {
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
                              text: 'Regresar Lista Pedidos',
                              action: function () {
                                     $("#example2").slideUp('low');
                                     $("#example1").slideDown('low');
                                     llenar_lista();
                                      
                              },
							  className: 'btn btn-login',
                              counter: 1
                          },
                         {
                              text: 'Iniciar Detalle pedido',
                              action: function () {
                                      ver_alta();
                                      llenar_persona();
                                      
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