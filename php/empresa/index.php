<?php
	require_once('empresa_modelo.php');
	$empresa1 = new Empresa();
	$listado = $empresa1->lista();
?>

<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevoEmpresa"  data-toggle="tooltip" title="Nuevo Empresa"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->
<br>
<br>

<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>empresa</th>
			<th>Nit</th>
			<th>Sector</th>
			<th>Ciudad</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listado as $fila){ ?>
			<tr>
				<td><?php echo $fila['id_empresa'] ?> </td>
				<td><?php echo utf8_encode($fila['nombre_empresa']) ?> </td>
				<td><?php echo utf8_encode($fila['nit_empresa']) ?> </td>
				<td><?php echo utf8_encode($fila['sector_empresa']) ?> </td>
				<td><?php echo utf8_encode($fila['nombre_ciudad']) ?> </td> 
				<td align='center'> 
				<a class="btn btn-danger borrarEmpresa" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['id_empresa'] ?>">
  					<i class="fa fa-trash-o"  aria-hidden="true"></i>
  					<span class="sr-only">Delete</span>
				</a> </td> 
				<td align='center'>
				<a class="btn btn-primary editarEmpresa" href="#" data-toggle="tooltip" codigo="<?php echo $fila['id_empresa'] ?>">
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