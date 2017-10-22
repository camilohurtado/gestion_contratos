<?php
	require_once('../php/sucursal_modelo.php');
		
	$datos = array(
	'id_sucursal'=>$_POST['id_sucursal'],
	'nombre_sucursal'=>$_POST['nombre_sucursal'],	
	'direccion_sucursal'=>$_POST['direccion_sucursal'],
	'telefono_sucursal'=>$_POST['telefono_sucursal'],
	'id_empresa'=>$_POST['id_empresa']
	);
	
	$sucursal = new Sucursal();
	$sucursal->nuevo($datos);
	
?>