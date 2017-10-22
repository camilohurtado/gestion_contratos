<?php
	require_once('../php/empresa_modelo.php');
		
	$datos = array(
	'id_empresa'=>$_POST['id_empresa'],
	'nombre_empresa'=>$_POST['nombre_empresa'],
	'nit_empresa'=>$_POST['nit_empresa'],
	'id_ciudad'=>$_POST['id_ciudad'],
	'sector_empresa'=>$_POST['sector_empresa']
	);
	
	$empresa = new Empresa();
	$empresa->nuevo($datos);
	
?>