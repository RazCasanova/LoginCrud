<?php 
	require_once "Conexion.php"; 

	class Usuarios extends Conexion{
		
		public function agregarUsuario($nombre,$apellidoMaterno,$email,$usuario,$password){
			$conexion = Conexion::conectar();
			$password = sha1($password);
			$sql = "INSERT INTO t_usuarios(nombre,apellido_materno,email,usuario,contraseña) 
					VALUES('$nombre','$apellidoMaterno','$email','$usuario','$password')";
			$result = mysqli_query($conexion,$sql);
			return $result;
		}

		public function login($usuario,$password){
			$conexion = Conexion::conectar();
			$password = sha1($password);
			$sql = "SELECT count(*) AS total FROM t_usuarios 
					WHERE usuario = '$usuario' AND contraseña = '$password'";
			$result = mysqli_query($conexion,$sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['total']>0) {
				$_SESSION['usuario'] = $usuario;
				header("location:../vistas/inicio.php");
			}else{
				header("location:../index.php");
			}
		}
	}

 ?>