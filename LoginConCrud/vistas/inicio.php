<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	require_once "dependencias.php";
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inicio| Gastos</title>
	</head>
	<body style="background-color: #f6fced">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="crad-text-left">
							<nav class="navbar navbar-dark bg-dark">
								<div class="container-fluid">
									<a class="navbar-brand">Tabla de gastos</a>
									<a class="navbar-brand" href="../procesosUsuarios/salir.php">Salir <span class="fas fa-sign-out-alt" ></span></a>
								</div>
							</nav>
						
						<div>
							<span class="btn btn-primary" data-toggle="modal" data-target="#agregarNuevosDatosModal">Agregar nuevo gasto <span class="fas fa-plus-circle"></span></span>
							<hr>
							<div id="tablaDatatable"></div>
						</div>
						<div class="card-footer text-muted text-center">
							Casanova Rosas Raziel
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>

	<!-- Modal -->
	<div class="modal fade" id="agregarNuevosDatosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo gasto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" id="frmnuevo">
						<lable>Concepto de gasto</lable>
						<input type="text" class="form-control input-sm" id="conceptoG" name="conceptoG" required="">
						<lable>Cantidad de gasto</lable>
						<input type="text" class="form-control input-sm" id="cantidadG" name="cantidadG" required="">
						<lable>Fecha</lable>
						<input type="text" class="form-control input-sm" id="fecha" name="fecha" required="">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnAgregarNuevo">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="editarDatosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar gasto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" id="frmactualizar">
						<input type="text" hidden="" id="idgasto" name="idgasto">
						<lable>Concepto de gasto</lable>
						<input type="text" class="form-control input-sm" id="conceptoGU" name="conceptoGU">
						<lable>Cantidad de gasto</lable>
						<input type="text" class="form-control input-sm" id="cantidadGU" name="cantidadGU">
						<lable>Fecha</lable>
						<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning text-white" id="btnActualizar">Actualizar datos</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
}else{
	header("location:../index.php");
}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarNuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesosGastos/agregar.php",
				success:function(r){
					if (r==1) {
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Agregado con exito");
					}else{
						alertify.error("Fallo al agregar");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmactualizar').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesosGastos/actualizar.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito");
					}else{
						alertify.error("Fallo al actualizar");
					}
				}
			});
		});
	});	
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto="+ idgasto,
			url:"../procesosGastos/obtenerDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#conceptoGU').val(datos['concepto_gastos']);
				$('#cantidadGU').val(datos['cantidad_gastos']);
				$('#fechaU').val(datos['fecha']);
				$('#usuario').val(datos['usuario']);
			}
		});
	}

	function eliminarDatos(idgasto){
		alertify.confirm('Eliminar gasto', '¿Esta seguro de eliminar este gasto?', function(){ 
			$.ajax({
				type:"POST",
				data:"idgasto=" + idgasto,
				url:"../procesosGastos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("Fallo al eliminar");
					}
				}
			});
		}
		, function(){ alertify.error('Se cancelo la eliminacion')});
	}
</script>
