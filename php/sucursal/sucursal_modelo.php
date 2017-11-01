<?php
    require_once("../modeloAbstractoDB.php");

    class Sucursal extends ModeloAbstractoDB {
		public $id_sucursal;
		public $nombre_sucursal;
		public $direccion_sucursal;
		public $telefono_sucursal;
		public $id_empresa;

		function __construct() {
			//$this->db_name = '';
		}

		public function consultar($id_sucursal='') {
			if($id_sucursal !=''):
				$this->query = "
				SELECT id_sucursal, nombre_sucursal, direccion_sucursal, telefono_sucursal, id_empresa
				FROM tb_sucursal
				WHERE id_sucursal = '$id_sucursal' order by id_sucursal
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
			SELECT id_sucursal, nombre_sucursal, direccion_sucursal, telefono_sucursal, e.nombre_empresa FROM tb_sucursal as s INNER JOIN tb_empresa as e ON (s.id_empresa = e.id_empresa) ORDER BY id_sucursal;
			";


			$this->obtener_resultados_query();
			return $this->rows;
		}


		public function listaSucursal() {
			$this->query = "
			SELECT id_sucursal, nombre_sucursal
			FROM tb_sucursal as m order by nombre_sucursal
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function nuevo($datos=array()) {
			if(array_key_exists('id_sucursal', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_sucursal
					(id_sucursal, nombre_sucursal, direccion_sucursal, telefono_sucursal, id_empresa)
					VALUES
					(NULL, '$nombre_sucursal','$direccion_sucursal', '$telefono_sucursal', '$id_empresa')
					";
				$this->ejecutar_query_simple();
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_sucursal
			SET nombre_sucursal='$nombre_sucursal',
			direccion_sucursal='$direccion_sucursal'
			telefono_sucursal='$telefono_sucursal'
			id_empresa='$id_empresa'
			WHERE id_sucursal = '$id_sucursal'
			";
			$this->ejecutar_query_simple();
		}

		public function borrar($id_sucursal='') {
			$this->query = "
			DELETE FROM tb_sucursal
			WHERE id_sucursal = '$id_sucursal'
			";
			$this->ejecutar_query_simple();
		}

	}
?>
