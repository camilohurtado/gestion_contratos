<?php
	require_once('../php/empleado_modelo.php');
	$codigo = $_POST['codigo'];
	$empleado = new Empleado();
	$empleado->borrar($codigo);
?>