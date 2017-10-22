<?php
	require_once('../php/sucursal_modelo.php');
		
	
    $datos = $_POST;        
	$sucursal = new Sucursal();
	$sucursal->editar($datos);
	
?>