<?php
 
require_once 'empleado_modelo.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $empleado = new Empleado();
		$empleado->editar($datos);
        break;
    case 'nuevo':
        $empleado = new Empleado();
		$empleado->nuevo($datos);
        break;
    case 'borrar':
		$empleado = new Empleado();
		$empleado->borrar($datos['codigo']);
        break;
}
?>
