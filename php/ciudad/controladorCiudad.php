<?php
 
require_once 'ciudad_modelo.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $ciudad = new Ciudad();
		$ciudad->editar($datos);
        break;
    case 'nuevo':
        $ciudad = new Ciudad();
		$ciudad->nuevo($datos);
        break;
    case 'borrar':
		$ciudad = new Ciudad();
		$ciudad->borrar($datos['codigo']);
        break;
}
?>
