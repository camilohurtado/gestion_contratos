<?php
	require_once('empresa_modelo.php');
	$codigo = $_POST['codigo'];
	$empresa = new Empresa();
	$empresa->borrar($codigo);
?>
