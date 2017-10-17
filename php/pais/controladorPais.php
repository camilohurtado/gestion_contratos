<?php
 
require_once 'pais_modelo.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $pais = new Pais();
		$pais->editar($datos);
        break;
    case 'nuevo':
        $pais = new Pais();
		$pais->nuevo($datos);
        break;
    case 'borrar':
		$pais = new Pais();
		$pais->borrar($datos['codigo']);
        break;
}
?>
