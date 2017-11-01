<?php
	require_once('../php/empleado_modelo.php');
		
	$datos = array(
	'emple_id'=>$_POST['emple_id'],
	'emple_apl'=>$_POST['emple_apl'],
	'emple_nom'=>$_POST['emple_nom'],
	'emple_cont'=>$_POST['emple_cont'],
	'emple_carg'=>$_POST['emple_carg'],
	'emple_sal'=>$_POST['emple_sal']
	);
	
	$empleado = new Empleado();
	$empleado->nuevo($datos);
	
?>