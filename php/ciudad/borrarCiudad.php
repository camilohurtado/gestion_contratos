<?php
	require_once('../php/ciudad_modelo.php');
	$codigo = $_POST['codigo'];
	$ciudad = new Ciudad();
	$ciudad->borrar($codigo);
?>