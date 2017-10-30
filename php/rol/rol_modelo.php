<?php
    require_once("../modeloAbstractoDB.php");
    session_start();
	
    class Rol extends ModeloAbstractoDB {
		public $id_tipo;
		public $tipo;
		public $fecha_creacion;
		public $fecha_modificacion;
        public $usuario_creacion;
        public $usuario_modificacion;
        public $estado;
		
		function __construct() {
			//$this->db_name = '';
		}
		 
		public function consultar($id_tipo='') {
			if($id_tipo !=''):
				$this->query = "
                SELECT id_tipo, tipo, fecha_creacion, fecha_modificacion, usuario_creacion,
                usuario_modificacion, estado
				FROM tipo_usuario
				WHERE id_tipo = '$id_tipo' order by fecha_creacion desc
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
            SELECT tp.id_tipo, 
                   tp.tipo, 
                   tp.fecha_creacion, 
                   tp.fecha_modificacion, 
                   usr.nombre usuario_creacion, 
                   usr.nombre usuario_modificacion, 
                   tp.estado 
            FROM tipo_usuario tp 
            LEFT JOIN usuarios usr ON (usr.id = tp.usuario_creacion OR usr.id = tp.usuario_modificacion) 
            order by tp.fecha_creacion desc 
			";
		
		
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('tipo', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
                endforeach;

                $fecha_creacion = date('Ymd');
                $fecha_modificacion = date('Ymd');
                $usuario_creacion = $_SESSION['id_usuario'];
                $usuario_modificacion = $_SESSION['id_usuario'];

				$this->query = "
					INSERT INTO tipo_usuario
					(id_tipo, tipo, fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacion, estado)
					VALUES
					(DEFAULT, '$tipo', '$fecha_creacion','$fecha_modificacion', '$usuario_creacion', '$usuario_modificacion', 1)
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;

			$fecha_modificacion = date('Ymd');
			$usuario_modificacion = $_SESSION['id_usuario'];

			$this->query = "
			UPDATE tipo_usuario
			SET tipo='$tipo',
                fecha_creacion='$fecha_creacion'
			    fecha_modificacion='$fecha_modificacion'
                usuario_creacion='$usuario_creacion'
                usuario_modificacion='$usuario_modificacion'
			WHERE id_tipo = '$id_tipo'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_tipo='', $estado= '') {
            
            if($id_tipo != '' && $estado != ''):
                $this->query = "
                UPDATE tipo_usuario
                SET estado='$estado'
                WHERE id_tipo = '$id_tipo'
                ";
                $this->ejecutar_query_simple();
            endif;
		}
		
		function __destruct() {
			unset($this);
		}
	}
?>