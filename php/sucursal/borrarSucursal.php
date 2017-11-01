<?php
	require_once('../php/sucursal_modelo.php');
	$codigo = $_POST['codigo'];
	$Sucursal = new Sucursal();
	$Sucursal->borrar($codigo);
?>