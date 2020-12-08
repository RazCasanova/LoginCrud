<?php 
	class crud{
		public function agregar($datos){
			$obj = new Conexion();
			$conexion = $obj->conectar();

			$sql="INSERT INTO t_gastos (concepto_gastos, cantidad_gastos, fecha, usuario) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

			return mysqli_query($conexion,$sql);
		}

		public function obtenerDatos($idgasto){
			$obj = new Conexion();
			$conexion = $obj->conectar();

			$sql="SELECT * FROM t_gastos WHERE id_gasto='$idgasto'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			$datos= array('id_gasto' =>$ver[0],
						  'concepto_gastos' =>$ver[1],
						  'cantidad_gastos' =>$ver[2],
						  'fecha' =>$ver[3],
						'usuario' =>$ver[4]);
			return $datos;
		}

		public function actualizarDatos($datos){
			$obj = new Conexion();
			$conexion = $obj->conectar();

			$sql ="UPDATE t_gastos SET 
			concepto_gastos='$datos[1]',
			cantidad_gastos='$datos[2]',
			fecha='$datos[3]'
			WHERE id_gasto = '$datos[0]'";

			return mysqli_query($conexion,$sql);
		}

		public function eliminarDatos($idgasto){
			$obj = new Conexion();
			$conexion = $obj->conectar();
			
			$sql = "DELETE FROM t_gastos WHERE id_gasto = '$idgasto'";
			return mysqli_query($conexion,$sql);	
		}
	}
?>