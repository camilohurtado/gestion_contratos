<?php
		require_once('empresa_modelo.php');
  $datos = $_POST;
		$empresa = new Empresa();
		$empresa->editar($datos);
?>
