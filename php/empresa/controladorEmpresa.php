<?php

require_once 'empresa_modelo.php';
$datos = $_POST;

switch ($_POST['accion']){
    case 'editar':
    $empresa = new Empresa();
		$empresa->editar($datos);
        break;
    case 'nuevo':
    $empresa = new Empresa();
		$empresa->nuevo($datos);
        break;
    case 'borrar':
		$empresa = new Empresa();
		$empresa->borrar($datos['codigo']);
        break;
}
?>
