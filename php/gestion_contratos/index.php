<?php
	require_once('modelo_gestion_contratos.php');
	$contratos1 = new Contratos();
	$listado = $contratos1->lista();
?>
	
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo_contrato"  data-toggle="tooltip" title="Nuevo Contrato"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<!--<a class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nuevo Contrato" href="nuevoContrato.php"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
    	<button class="btn btn-info btn-sm btncerrar_modelo_contratos"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->
<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No.contrato</th>
			<th>contrato</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Descripcion</th>
			<th>Identificación</th>
			<th>Proveedor</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listado as $fila){ ?>
			<tr>
				<td><?php echo $fila['id_contrato'] ?> </td>
				<td><?php echo utf8_encode($fila['nombre_contrato']) ?> </td> 
				<td><?php echo utf8_encode($fila['fecha_inicio_contrato']) ?> </td> 
				<td><?php echo utf8_encode($fila['fecha_fin_contrato']) ?> </td>
				<td><?php echo utf8_encode($fila['descripcion_contrato']) ?> </td>
				<td><?php echo utf8_encode($fila['identificador_proveedor']) ?> </td> 
				<td><?php echo utf8_encode($fila['nombre_proveedor']) ?> </td>
				<td align='center'> 
				<a class="btn btn-danger borrar" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['id_contrato'] ?>">
  					<i class="fa fa-trash-o"  aria-hidden="true"></i>
  					<span class="sr-only">Delete</span>
				</a> </td> 
				<td align='center'>
				<a class="btn btn-primary editar_contratos" href="#" data-toggle="tooltip" codigo="<?php echo $fila['id_contrato'] ?>">
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