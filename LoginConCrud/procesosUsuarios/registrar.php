<?php 
	require_once "../clases/Usuarios.php";

	$Usuarios = new Usuarios();

	$nombre = $_POST['nombre'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$respuesta = $Usuarios->agregarUsuario($nombre,$apellidoMaterno,$email,$usuario,$password);

	if ($respuesta) {
 ?>
 	<script type="text/javascript">
 		alert("Registro exitoso");
 		window.location.href = '../registro.php';
 	</script>
<?php 
	}else{
 ?>		
 	<script type="text/javascript">
 		alert("Registro no valido");
 		window.location.href = '../registro.php';
 	</script>
<?php  
	}
?>

