<?php
	require_once('../php/pais_modelo.php');
		
	$datos = array(
	'id_pais'=>$_POST['id_pais'],
	'nombre_pais'=>$_POST['nombre_pais']
	);
	
	$pais = new Pais();
	$pais->nuevo($datos);
	
?>