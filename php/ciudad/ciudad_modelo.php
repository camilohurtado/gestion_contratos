<?php
    require_once("../modeloAbstractoDB.php");

    class Ciudad extends ModeloAbstractoDB {
		public $id_ciudad;
		public $nombre_ciudad;
		public $id_pais;

		function __construct() {
			//$this->db_name = '';
		}

		public function consultar($id_ciudad='') {
			if($id_ciudad !=''):
				$this->query = "
				SELECT id_ciudad, nombre_ciudad, id_pais
				FROM tb_ciudad
				WHERE id_ciudad = '$id_ciudad' order by id_ciudad
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
			SELECT id_ciudad, nombre_ciudad, d.nombre_pais
			FROM tb_ciudad as m inner join tb_pais as d
			ON (m.id_pais = d.id_pais) order by id_ciudad
			";


			$this->obtener_resultados_query();
			return $this->rows;
		}


		public function listaCiudad() {
			$this->query = "
			SELECT id_ciudad, nombre_ciudad
			FROM tb_ciudad as m order by nombre_ciudad
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function nuevo($datos=array()) {
			if(array_key_exists('id_ciudad', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_ciudad
					(id_ciudad, nombre_ciudad, id_pais)
					VALUES
					(NULL, '$nombre_ciudad', '$id_pais')
					";
				$this->ejecutar_query_simple();
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_ciudad
			SET nombre_ciudad='$nombre_ciudad',
			id_pais='$id_pais'
			WHERE id_ciudad = '$id_ciudad'
			";
			$this->ejecutar_query_simple();
		}

		public function borrar($id_ciudad='') {
			$this->query = "
			DELETE FROM tb_ciudad
			WHERE id_ciudad = '$id_ciudad'
			";
			$this->ejecutar_query_simple();
		}
		
	}
?>
