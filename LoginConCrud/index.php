<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión</title>
	<?php require_once "dependencias.php";
	session_start();
	if (isset($_SESSION['usuario'])) {
		header("location:vistas/inicio.php");
	}
	?>
</head>
<body>
	<div style="position:relative; left: 30%; width: 100%">
		<div class="row">
			<div class="col-lg-5">
				<div>
					<h1 style="text-align: center;">Iniciar sesión</h1>
					<hr>
					<img src="img/users.png" alt="" width="150px" style="position: relative; left: 35%">
					<form action="procesosUsuarios/login.php" method="POST">
						<div class="mb-3">
							<label for="usuario" class="form-label">Usuario</label>
							<input type="text" class="form-control bg-dark-x" name="usuario" id="usuario" required="">
						</div>
						<div class="mb-3">
							<label for="contraseña" class="form-label">Contraseña</label>
							<input type="password" class="form-control bg-dark-x" name="password" id="password" required="">
						</div>
						<button class="btn btn-outline-success">Iniciar sesion</button>
						<a href="registro.php" class="btn btn-outline-primary">Registrar</a>
					</form>
				</div>
			</div>
		</div>
	</div>