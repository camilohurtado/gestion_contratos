<?php
	require_once('pais_modelo.php');
	$pais1 = new Pais();
	$listado = $pais1->lista();
?>

<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevoPais"  data-toggle="tooltip" title="Nuevo Pais"><i class="fa fa-plus" aria-hidden="true"></i></button>
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->

</div><!-- /.box-header -->
<div class="box-body">

<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Pais</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listado as $fila){ ?>
			<tr>
				<td><?php echo $fila['id_pais'] ?> </td>
				<td><?php echo utf8_encode($fila['nombre_pais']) ?> </td>
				<td align='center'>
				<a class="btn btn-danger borrarPais" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['id_pais'] ?>">
  					<i class="fa fa-trash-o"  aria-hidden="true"></i>
  					<span class="sr-only">Delete</span>
				</a> </td>
				<td align='center'>
				<a class="btn btn-primary editarPais" href="#" data-toggle="tooltip" codigo="<?php echo $fila['id_pais'] ?>">
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
