<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";

	$obj = new crud();
	$datos = array(
		$_POST['idgasto'],
		$_POST['conceptoGU'],
		$_POST['cantidadGU'],
		$_POST['fechaU']
	);

	echo $obj->actualizarDatos($datos);
?>