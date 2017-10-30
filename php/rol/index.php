<?php
	require_once('rol_modelo.php');
	$rol = new Rol();
    $listado = $rol->lista();
    $boton_estado = '';


?>

<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevoRol"  data-toggle="tooltip" title="Nuevo rol"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->
<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Tipo de usuario</th>
			<th>Fecha de creación</th>
			<th>Fecha de modificación</th>
			<th>Usuario de creación</th>
			<th>Usuario de modificación</th>
			<th>Estado</th>
			<th>&nbsp;</th>
            <th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listado as $fila){ ?>
			<tr>
				<td><?php echo $fila['tipo'] ?> </td>
				<td><?php echo utf8_encode($fila['fecha_creacion']) ?> </td>
				<td><?php echo utf8_encode($fila['fecha_modificacion']) ?> </td>
				<td><?php echo utf8_encode($fila['usuario_creacion']) ?> </td>
				<td><?php echo utf8_encode($fila['usuario_modificacion']) ?> </td> 
                
                <td><?php 
                    
                    $id = $fila['id_tipo'];

                    $html_activar = "<a class='btn btn-primary activarRol' href='#' data-toggle='tooltip' codigo= '$id' >
                    <i class='fa fa-plus-square'  aria-hidden='true'></i>
                    <span class='sr-only'>Activate</span>
                    </a>";
                
                    $html_desactivar = "<a class='btn btn-danger inactivarRol' href='#' data-toggle='tooltip' codigo= '$id' >
                    <i class='fa fa-trash-o'  aria-hidden='true'></i>
                    <span class='sr-only'>Inactivate</span>
                    </a> ";
                
                
                
                if ($fila['estado'] == 0):
                            echo 'Inactivo';
                            $boton_estado = $html_activar;
                          else:   
                            echo  'Activo';
                            $boton_estado = $html_desactivar;
                          endif?> 
                          
                </td> 


				<td align='center'> 
                <!-- Si se activa/inactiva el registro, debe aparecer el boton contrario al estado actual. -->
                <?php echo $boton_estado?>
                </td> 


				<td align='center'>
                    <a class="btn btn-primary editarRol" href="#" data-toggle="tooltip" codigo="<?php echo $fila['id_tipo'] ?>">
                        <i class="fa fa-pencil"  aria-hidden="false"></i>
                        <span class="sr-only">Edit</span>
                    </a> 
                </td> 
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