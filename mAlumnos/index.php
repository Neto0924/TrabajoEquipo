<?php
include("../sesiones/verificar_sesion.php"); 
include'../conexion/conexion.php';

//////////////////////////////////////////////////
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Variables de configuración
$titulo="Catálago de Alumnos";
$opcionMenu="A";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla</title>

	<!-- Meta para compatibilidad en dispositivos mobiles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">

    <!-- fontawesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">

	<!-- DataTableButtons -->
     <link rel="stylesheet" href="../plugins/dataTableButtons/buttons.dataTables.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <!-- bootstrap-toggle-master -->
    <link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
	
	<!-- select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.css">

	<!-- Estilos propios -->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">
</head>

<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical">
			<?php 
				include('menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			   <div class="titulo borde sombra">
			        <h3><?php echo $titulo; ?></h3>
			   </div>	
			   <div class="contenido borde sombra">
				    <div class="container-fluid">
				        <section id="alta" style="display: none">
            				<form id="frmAlta">
								<div class="row">
									<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="idPersona">Nombre del Alumno:</label>
											<select name="" id="idPersona" class="form-control select2" style="width: 100%">
																	
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="noControl">Matricula:</label>
											<input type="text" id="noControl" class="form-control " required="" placeholder="Escribe la matricula de alumno">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="idCarrera">Seleccione la Carrera:</label>
											<select name="" id="idCarrera" class="form-control select2" style="width: 100%">
												
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="idSede">Seleccione la Sede:</label>
											<select name="" id="idSede" class="form-control select2" style="width: 100%">
												
											</select>
										</div>
									</div>
									<hr class="linea">
								</div>
								<div class="row">
									<div class="col-lg-12">
										<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left">Lista de Alumnos</button>
										<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información">										
									</div>
								</div>
            				</form>
				        </section>

				        <section id="lista" style="width: 100%">
            
				        </section>
				    </div>
			   </div>	

			</div>			
		</div>
	</div>
	<footer class="fondo">
		<?php 
			include('../layout/pie.php');
		 ?>			

	</footer>

	<!-- Modal -->
	<div id="modalEditar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <form id="frmActuliza">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Editar datos del Alumno</h4>
	      </div>
	      <div class="modal-body">
				<input type="hidden" id="idE">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="form-group">
							<label for="alumnoE">Nombre del Alumno:</label>
							<select id="alumnoE" class="select2 form-control" style="width: 100%" disabled>
								
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group">
							<label for="matriculaE">Matricula:</label>
							<input type="text" id="matriculaE" class="form-control " required="">
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="idCarreraE">Carrera:</label>
							<select id="idCarreraE" class="select2 form-control" style="width: 100%">
								
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="idSedeE">Sede:</label>
							<select id="idSedeE" class="select2 form-control" style="width: 100%">
								
							</select>
						</div>
					</div>

				</div>
	      </div>
	      <div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
						<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Información">	
					</div>
				</div>
	      </div>
	    </div>
		</form>
	  </div>
	</div>
	<!-- Modal -->
	<div id="modalContra" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form id="frmContra">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Actualizar Contraseña</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                                <div class="form-group">
                                    <label for="pass">Contraseña Nueva:</label>
                                    <input onkeyup="verificar_pass()" type="password" id="pass" class="form-control " autofocus="" required="" placeholder="Escribe la contraseña">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-6">
                                <div class="form-group">
                                    <label for="pass1">Confirma Contraseña:</label>
                                    <input onkeyup="verificar_pass()" type="password" id="pass1" class="form-control " required="" placeholder="Confirma la contraseña">
                                </div>
                            </div>
                            <hr class="linea">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
                                <input disabled = "disabled" id="btn_actualizar_pass" type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Contraseña" onclick="actualizar_pass()">	
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<!-- ENLACE A ARCHIVOS JS -->

	<!-- jquery -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

	<!-- Preloaders -->
    <script src="../plugins/Preloaders/jquery.preloaders.js"></script>

	<!-- bootstrap-toggle-master -->
    <script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

 	 <!-- dataTableButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <!-- <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script> -->
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
	
	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>

    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>
    <script src="../js/salir.js"></script>

    <!-- LLAMADAS A FUNCIONES E INICIALIZACION DE COMPONENTES -->

    <!-- Llamar la funcion para llenar la lista -->
	<script type="text/javascript">
	  llenar_lista();
	</script>

    <!-- Inicializador de elemento -->
     <script>
      $(function () {
        $(".select2").select2();
        
      });
    </script> 

	<script>
		var letra ='<?php echo $opcionMenu; ?>';
		$(document).ready(function() { menuActivo(letra); });
	</script>

	<script>
		function cambiar_contra(){
            $("#modalContra").modal("show");
            $("#frmContra")[0].reset();
            $('#modalContra').on('shown.bs.modal', function () {
                $('#pass').focus();            
            }); 
        }
                function actualizar_pass(){
            var pass   = $("#pass").val();
            $.ajax({
                url:"../sesiones/actualizar_pass2.php",
                type:"POST",
                dateType:"html",
                data:{
                    'pass':pass
                },
                success:function(respuesta){
                    alertify.warning(respuesta);
                if (respuesta == "ok"){
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.success('Se ha actualizado la contraseña' );
                    $("#frmContra")[0].reset();
                    $("#modalContra").modal("hide");
                }else{
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.error('La contraseña es igual a la Anterior' );
                }
                },
                error:function(xhr,status){
                    alert(xhr);
                },
            });
        }

        function verificar_pass(){
            var pass1 = $('#pass').val();
            var pass2 = $('#pass1').val();

            if(pass1.trim() != "" && pass2.trim() !=""){
                if(pass1 == pass2){
                    $('#btn_actualizar_pass').removeAttr('disabled');
                }else{
                    $('#btn_actualizar_pass').attr('disabled', 'disabled');
                }
            }else{
                $('#btn_actualizar_pass').attr('disabled', 'disabled');
            }
        }
	</script>

	<script type="text/javascript" src="../plugins/stacktable/stacktable.js"></script> 
</body>
</html>