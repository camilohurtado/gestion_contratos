<?php
    require_once("../modeloAbstractoDB.php");
	
    class Empleado extends ModeloAbstractoDB {
		public $emple_id;
		public $emple_apl;
		public $emple_nom;
		public $emple_cont;
		public $emple_carg;
		public $emple_sal;
		
		function __construct() {
			//$this->db_name = '';
		}
		 
		public function consultar($emple_id='') {
			if($emple_id !=''):
				$this->query = "
				SELECT emple_id, emple_apl, emple_nom, emple_cont, emple_carg, emple_sal
				FROM tb_empleado
				WHERE emple_id = '$emple_id' order by emple_id";
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
			SELECT emple_id, emple_apl, emple_nom, emple_cont, emple_carg, emple_sal
			FROM tb_empleado order by emple_id
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}


		public function listaEmpleado() {
			$this->query = "
			SELECT emple_id, emple_nom
			FROM tb_empleado as m order by empl_nom
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('emple_id', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_empleado
					(emple_id, emple_apl, emple_nom, emple_cont, emple_carg, emple_sal )
					VALUES
					('$emple_id', '$emple_apl', '$emple_nom', '$emple_cont', '$emple_carg', '$emple_sal')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_empleado
			SET emple_id='$emple_id',
			emple_apl='$emple_apl',			
			emple_nom='$emple_nom',
			emple_cont='$emple_cont',
			emple_carg='$emple_carg'
			WHERE emple_id = '$emple_id'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($emple_id='') {
			$this->query = "
			DELETE FROM tb_empleado
			WHERE emple_id = '$emple_id'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			unset($this);
		}
	}
?>