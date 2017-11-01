<?php
	require_once('modelo_gestion_contratos.php');
		
	$datos = array(
	'id_contrato'=>$_POST['id_contrato'],
	'nombre_contrato'=>$_POST['nombre_contrato'],
	'fecha_inicio_contrato'=>$_POST['fecha_inicio_contrato'],
	'fecha_fin_contrato'=>$_POST['fecha_fin_contrato'],
	'descripcion_contrato'=>$_POST['descripcion_contrato'],
	'id_proveedor'=>$_POST['id_proveedor'],
	'nombre_proveedor'=>$_POST['nombre_proveedor']

	);
	
	$contrato = new Contratos();
	$contrato->nuevo($datos);
	
?>