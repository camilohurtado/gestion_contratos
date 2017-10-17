<?php
	require_once('../php/ciudad_modelo.php');
		
	$datos = array(
	'id_ciudad'=>$_POST['id_ciudad'],
	'nombre_ciudad'=>$_POST['nombre_ciudad'],
	'id_pais'=>$_POST['id_pais']
	);
	
	$ciudad = new Ciudad();
	$ciudad->nuevo($datos);
	
?>