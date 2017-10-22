<?php
    require_once("../modeloAbstractoDB.php");
	
    class Empresa extends ModeloAbstractoDB {
		public $id_empresa;
		public $nombre_empresa;
		public $nit_empresa;
		public $id_ciudad;
		public $sector_empresa;
		
		function __construct() {
			//$this->db_name = '';
		}
		 
		public function consultar($id_empresa='') {
			if($id_empresa !=''):
				$this->query = "
				SELECT id_empresa, nombre_empresa, id_ciudad, nit_empresa, sector_empresa
				FROM tb_empresa
				WHERE id_empresa = '$id_empresa' order by id_empresa
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
			SELECT id_empresa, nombre_empresa, nit_empresa, sector_empresa, c.nombre_ciudad FROM `tb_empresa` as e INNER JOIN tb_ciudad as c ON (e.id_ciudad = c.id_ciudad) ORDER BY id_empresa;
			";
		
		
			$this->obtener_resultados_query();
			return $this->rows;
		}


		public function listaEmpresa() {
			$this->query = "
			SELECT id_empresa, nombre_empresa
			FROM tb_empresa as m order by nombre_empresa
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_empresa', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_empresa
					(id_empresa, nombre_empresa, nit_empresa, id_ciudad, sector_empresa )
					VALUES
					(NULL, '$nombre_empresa', '$nit_empresa', '$id_ciudad', '$sector_empresa')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_empresa
			SET nombre_empresa='$nombre_empresa',
			nit_empresa='$nit_empresa',			
			id_ciudad='$id_ciudad',
			sector_empresa='$sector_empresa'
			WHERE id_empresa = '$id_empresa'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_empresa='') {
			$this->query = "
			DELETE FROM tb_empresa
			WHERE id_empresa = '$id_empresa'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			unset($this);
		}
	}
?>