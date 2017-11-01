<?php
	require_once('modelo_gestion_contratos.php');
		
    $datos = $_POST;        
	$contrato = new Contratos();
	$contrato->editar($datos);
	
?>