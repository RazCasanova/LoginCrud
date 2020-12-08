<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<?php require_once "dependencias.php"; ?>
</head>

<body>
	<section>
		<div class="row g-0">
			<div class="col-lg-5">
				<div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
					<h1 style="text-align: center;">Registrar usuario</h1>
					<hr>
					<form action="procesosUsuarios/registrar.php" method="POST">
						<div class="mb-3">
							<label for="nombre" class="form-label">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" required="">
						</div>
						<div class="mb-3">
							<label for="apellidoMaterno" class="form-label">Apellido Materno</label>
							<input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" required="">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" id="email" required="">
						</div>
						<div class="mb-3">
							<label for="usuario" class="form-label">Usuario</label>
							<input type="text" class="form-control" name="usuario" id="usuario" required="">
						</div>
						<div class="mb-3">
							<label for="contraseña" class="form-label">Contraseña</label>
							<input type="password" class="form-control" name="password" id="password" required="">
						</div>
						<button class="btn btn-outline-success">Registrase</button>
						<a href="index.php" class="btn btn-outline-primary">Inicio de sesion</a>
					</form>
				</div>
			</div>
			<div class="col-lg-5" style="margin-top: 200px">
			<img src="img/agregar-usuario.png" alt="" width="200px">
		</div>
		</div>
	</section>
</body>
</html>