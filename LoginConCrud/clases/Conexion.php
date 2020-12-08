<?php 
	class Conexion{
		public function conectar(){
			$conexion = mysqli_connect('localhost','root','','gastos_usuarios');
			return $conexion;
		}
	}
 ?>