<?php
	require_once('../php/pais_modelo.php');
	$codigo = $_POST['codigo'];
	$Pais = new Pais();
	$Pais->borrar($codigo);
?>