<?php
	require_once('../php/ciudad_modelo.php');
		
	
    $datos = $_POST;        
	$ciudad = new Ciudad();
	$ciudad->editar($datos);
	
?>