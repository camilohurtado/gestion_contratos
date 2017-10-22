<?php
	require_once('modelo_gestion_contratos.php');
	$codigo = $_POST['codigo'];
	$contrato = new Contratos();
	$contrato->borrar($codigo);
?>