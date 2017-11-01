<?php
 
require_once 'sucursal_modelo.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $sucursal = new Sucursal();
		$sucursal->editar($datos);
        break;
    case 'nuevo':
        $sucursal = new Sucursal();
		$sucursal->nuevo($datos);
        break;
    case 'borrar':
		$sucursal = new Sucursal();
		$sucursal->borrar($datos['codigo']);
        break;
}
?>
