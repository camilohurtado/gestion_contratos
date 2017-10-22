<?php
	abstract class ModeloAbstractoDB {
		private static $db_host ="localhost"; //pivate static no la puede modificar ninguna clase hija
		private static $db_user = "root";
		private static $db_pass = "";
		protected $db_name = "contratos"; //las puede modificar las clase hija
		protected $query;
		protected $rows = array();
		private $conexion;
		
		# m�todos abstractos para Gesti�n de clases que hereden
		abstract protected function consultar(); //metodos abstractos por que no se constullen es esta clase sino en las clase hija
		abstract protected function nuevo();
		abstract protected function editar();
		abstract protected function borrar();
		abstract protected function lista();
		
		
		# los siguientes m�todos pueden definirse con exactitud y no son abstractos
		# Conectar a la base de datos
		private function abrir_conexion() {
			$this->conexion = 
			new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name); //los :: son para las protegidas y el -> son para privada
		}

		# Desconectar la base de datos
		private function cerrar_conexion() {
			$this->conexion->close();
		}
		
		# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
		protected function ejecutar_query_simple() {
			$this->abrir_conexion();
			$this->conexion->query($this->query) //ejecuta el query que se encuentre creado en la clase hija
				or die(mysqli_errno($this->conexion)." : " 
				.mysqli_error($this->conexion)."  | Query=".$this->query);
			$this->cerrar_conexion();
		}
		
		# Traer resultados de una consulta en un Array
		protected function obtener_resultados_query() {
			$this->abrir_conexion();
			$result = $this->conexion->query($this->query) 
				or die(mysqli_errno($this->conexion)." : " 
				.mysqli_error($this->conexion)." | Query=".$this->query);
			while ($this->rows[] = $result->fetch_assoc());
			$result->close();
			$this->cerrar_conexion();
			array_pop($this->rows);//quita la primera fila del arreglo
		}
	}
?>