<?php 
session_start();
	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";
$usuario = $_SESSION['usuario'];
	$obj = new crud();

	$datos = array(
		$_POST['conceptoG'],
		$_POST['cantidadG'],
		$_POST['fecha'],
		$usuario
	);

	echo $obj->agregar($datos);
?>