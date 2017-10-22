<?php
 
require_once 'modelo_gestion_contratos.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $contratos = new Contratos();
		$contratos->editar($datos);
        break;
    case 'nuevo':
        $contratos = new Contratos();
		$contratos->nuevo($datos);
        break;
    case 'borrar':
		$contratos = new Contratos();
		$contratos->borrar($datos['codigo']);
        break;
}
?>
