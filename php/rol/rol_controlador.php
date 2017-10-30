<?php
 
require_once 'rol_modelo.php';
$datos = $_POST;
switch ($_POST['accion']){
    case 'editar':
        $rol = new Rol();
		$rol->editar($datos);
        break;
    case 'nuevo':
        $rol = new Rol();
		$rol->nuevo($datos);
        break;
    case 'borrar':
        $id_tipo = $_POST['codigo'];
        $estado = $_POST['estado'];
        $rol = new Rol();
        $rol->borrar($id_tipo, $estado);
        break;
}
?>


<html>
<head>
</head>

<body>

<?php 

print_r($datos);

?>

</body>


</html>
