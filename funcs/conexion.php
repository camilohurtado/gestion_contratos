<?php

	$mysqli=new mysqli("50.62.176.74","root_cecep","Fcecep2018","contratos_taller"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
