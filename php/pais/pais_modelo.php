<?php
    require_once("../modeloAbstractoDB.php");

    class Pais extends ModeloAbstractoDB {
		public $id_pais;
		public $nombre_pais;

		function __construct() {

		}

		public function consultar($id_pais='') {
			if($id_pais !=''):
				$this->query = "
				SELECT id_pais, nombre_pais
				FROM tb_pais
				WHERE id_pais = '$id_pais' order by id_pais
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function lista() {
			$this->query = "
			SELECT id_pais, nombre_pais
			FROM tb_pais order by id_pais
			";


			$this->obtener_resultados_query();
			return $this->rows;
		}


		public function listaPais() {
			$this->query = "
			SELECT id_pais, nombre_pais
			FROM tb_pais order by nombre_pais
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}




		public function nuevo($datos=array()) {
			if(array_key_exists('id_pais', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_pais
					(id_pais, nombre_pais)
					VALUES
					(NULL, '$nombre_pais')
					";
				$this->ejecutar_query_simple();
			endif;
		}



		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_pais
			SET nombre_pais='$nombre_pais',
			id_pais='$id_pais'
			WHERE id_pais = '$id_pais'
			";
			$this->ejecutar_query_simple();
		}

		public function borrar($id_pais='') {
			$this->query = "
			DELETE FROM tb_pais
			WHERE id_pais = '$id_pais'
			";
			$this->ejecutar_query_simple();
		}
		
	}
?>
