<?php
	require_once('../php/rol/rol_modelo.php');
    $id_tipo = $_POST['codigo'];
    $estado = $_POST['estado'];
	$rol = new Rol();
	$rol->borrar($id_tipo);
?>