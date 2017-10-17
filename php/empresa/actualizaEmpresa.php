<?php
	require_once('../php/empresa_modelo.php');
		
	
    $datos = $_POST;        
	$empresa = new Empresa();
	$empresa->editar($datos);
	
?>