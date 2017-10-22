<?php 
/**
* Gestión de contratos
* Realizado por : ING JUAN DAVID MUÑOZ CAVANZO
*/
	require_once("../modeloAbstractoDB.php");
class Contratos extends ModeloAbstractoDB {
	public $id_contrato;
	public $nombre_contrato;
	public $fecha_inicio_contrato;
	public $fecha_fin_contrato;
	public $descripcion_contrato;
	public $id_proveedor;
	public $nombre_proveedor;
	
	function __construct()
	{
		# code...
	}

	public function consultar($id_contrato='') {
		
			if($id_contrato !=''):
				$this->query = "
				SELECT id_contrato, nombre_contrato, fecha_inicio_contrato, fecha_fin_contrato , descripcion_contrato, id_proveedor, nombre_proveedor 
				FROM tb_contrato 
				WHERE  id_contrato = '$id_contrato' order by fecha_inicio_contrato";
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
			SELECT C.id_contrato, C.nombre_contrato,C.fecha_inicio_contrato, C.fecha_fin_contrato, C.descripcion_contrato, P.identificador_proveedor, P.nombre_proveedor
			FROM tb_contrato AS C INNER JOIN tb_proveedor AS P ON(C.id_proveedor = P.id_proveedor) ORDER BY id_contrato";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function listaProveedores() {
			$this->query = "
			SELECT id_proveedor, identificador_proveedor, nombre_proveedor
			FROM tb_proveedor order by id_proveedor
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			
			if(array_key_exists('id_contrato', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO tb_contrato
					(id_contrato, nombre_contrato ,fecha_inicio_contrato, fecha_fin_contrato, descripcion_contrato, id_proveedor, nombre_proveedor)
					VALUES
					(NULL, '$nombre_contrato', '$fecha_inicio_contrato', '$fecha_fin_contrato', '$descripcion_contrato', '$id_proveedor', '$nombre_proveedor')";
				$this->ejecutar_query_simple();
			endif;

		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_contrato
			SET nombre_contrato='$nombre_contrato', 
			fecha_inicio_contrato ='$fecha_inicio_contrato',
			fecha_fin_contrato ='$fecha_fin_contrato',
			descripcion_contrato ='$descripcion_contrato',
			id_proveedor ='$id_proveedor',
			nombre_proveedor ='$nombre_proveedor'

			WHERE id_contrato = '$id_contrato'";

			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_contrato='') {
			$this->query = "
			DELETE FROM tb_contrato
			WHERE id_contrato = '$id_contrato'
			";
			$this->ejecutar_query_simple();
		}
		
		
	}


 ?>