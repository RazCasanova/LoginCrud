<?php 
	session_start();
	require_once "../clases/Conexion.php";
	$obj = new Conexion();
	$conexion=$obj->conectar();
	$usuario = $_SESSION['usuario'];
	$sql = "SELECT * FROM t_gastos WHERE usuario = '$usuario'";
	$result = mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color:#0B3861;color:white;font-weight: bold;">
			<tr>
				<td>Concepto de gastos</td>
				<td>Cantidad de gastos</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color:#000000 ;color: white; font-weight: bold;">
			<tr>
				<td>Concepto de gastos</td>
				<td>Cantidad de gastos</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody style="background-color: white;">
			<?php 
				while ($mostrar=mysqli_fetch_row($result)){		
			 ?>
			<tr>
				<td> <?php echo $mostrar[1]?> </td>
				<td style="text-align: center;"> <?php echo $mostrar[2]?> </td>
				<td style="text-align: center;"> <?php echo $mostrar[3]?> </td>
				<td style="text-align: center;">
					<span class="btn btn-warning text-white btn-xs" data-toggle="modal" data-target="#editarDatosModal" onclick="agregaFrmActualizar('<?php echo$mostrar[0] ?>')">
						<span class="far fa-edit"></span>
					</span>
					
				</td>
				<td style="text-align: center;">
					<span class="btn btn-danger btn-xs" onclick="eliminarDatos('<?php echo$mostrar[0] ?>')">
						<span class="fas fa-minus-circle"></span>
					</span>
					
				</td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#iddatatable').DataTable();	
	});
</script>