<?php
	require_once('../php/pais_modelo.php');
		
	
    $datos = $_POST;        
	$pais = new Pais();
	$pais->editar($datos);
	
?>