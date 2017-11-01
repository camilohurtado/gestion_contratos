<?php
	require_once('empleado_modelo.php');
	$empleado1 = new Empleado();
	$listado = $empleado1->lista();
?>

<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevoEmpleado"  data-toggle="tooltip" title="Nuevo Empleado"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->
<br>
<br>

<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Identificación</th>
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>No. Contrato</th>
			<th>Cargo</th>
			<th>Salario</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listado as $fila){ ?>
			<tr>
				<td><?php echo $fila['emple_id'] ?> </td>
				<td><?php echo utf8_encode($fila['emple_apl']) ?> </td>
				<td><?php echo utf8_encode($fila['emple_nom']) ?> </td>
				<td><?php echo utf8_encode($fila['emple_cont']) ?> </td>
				<td><?php echo utf8_encode($fila['emple_carg']) ?> </td> 
				<td><?php echo utf8_encode($fila['emple_sal']) ?> </td> 
				<td align='center'> 
				<a class="btn btn-danger borrarEmpleado" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['emple_id'] ?>">
  					<i class="fa fa-trash-o"  aria-hidden="true"></i>
  					<span class="sr-only">Delete</span>
				</a> </td> 
				<td align='center'>
				<a class="btn btn-primary editarEmpleado" href="#" data-toggle="tooltip" codigo="<?php echo $fila['emple_id'] ?>">
  					<i class="fa fa-pencil"  aria-hidden="false"></i>
  					<span class="sr-only">Edit</span>
				</a> </td> 
			</tr>
	<?php } ?>
	</tbody>

</table>

</div><!-- /.box-body -->  

<!-- Funciones de Lógica de neogcio -->
<script>
    $(document).ready(function(){
    	$("#tabla").DataTable();
    });
</script>