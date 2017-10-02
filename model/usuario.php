<?php
require_once("modeloAbstractoDB.php");

class Usuario extends modeloAbstractoDB{

  private $usuario_id;
  private $user;
  private $password;
  private $rol_id;
  private $empleado_id;
  private $fecha_creacion;
  private $fecha_modificacion;
  private $estado;


  function __construct() {
  //$this->db_name = '';
}

public function consultar($comu_codi='') {
  if($comu_codi !=''):
    $this->query = "
    SELECT comu_codi, comu_nomb, muni_codi
    FROM tb_comuna
    WHERE comu_codi = '$comu_codi' order by comu_codi
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
  SELECT comu_codi, comu_nomb, m.muni_nomb
  FROM tb_comuna as c inner join tb_municipio as m
  ON (c.muni_codi = m.muni_codi) order by comu_codi
  ";
  /*$this->query = "
  SELECT comu_codi, comu_nomb, muni_codi
  FROM tb_comuna as c
  ";*/
  $this->obtener_resultados_query();
  return $this->rows;
}

public function nuevo($datos=array()) {
  if(array_key_exists('comu_codi', $datos)):
    foreach ($datos as $campo=>$valor):
      $$campo = $valor;
    endforeach;
    $this->query = "
      INSERT INTO tb_comuna
      (comu_codi, comu_nomb, muni_codi)
      VALUES
      (NULL, '$comu_nomb', '$muni_codi')
      ";
    $this->ejecutar_query_simple();
  endif;
}

public function editar($datos=array()) {
  foreach ($datos as $campo=>$valor):
    $$campo = $valor;
  endforeach;
  $this->query = "
  UPDATE tb_comuna
  SET comu_nomb='$comu_nomb',
  muni_codi='$muni_codi'
  WHERE comu_codi = '$comu_codi'
  ";
  $this->ejecutar_query_simple();
}

public function borrar($comu_codi='') {
  $this->query = "
  DELETE FROM tb_comuna
  WHERE comu_codi = '$comu_codi'
  ";
  $this->ejecutar_query_simple();
}

function __destruct() {
  unset($this);
}


}


?>
