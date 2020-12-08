<?php 
	session_start();
	require_once "../clases/Usuarios.php";

	$Usuarios = new Usuarios();

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$Usuarios->login($usuario,$password);
 ?>