<?php
	require_once('../php/empleado_modelo.php');
    $datos = $_POST;        
	$empleado = new Empleado();
	$empleado->editar($datos);
	
?>