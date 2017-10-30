<?php
	require_once('rol_modelo.php');
	
	$codigo = $_POST['codigo'];
		
	$rol = new Rol();
	$rol->consultar($codigo);
?>

 <!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true"></i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrarRol" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>


        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="frol">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="tipo">Nombre rol:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese nombre de rol"
                            value = "<?php echo trim($rol->tipo); ?> ">
                        </div>
                    </div>
                    <input type="hidden" id="id_tipo" value="<?php echo trim($rol->id_tipo); ?>" name="id_tipo"/>
                    
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizarRol" data-toggle="tooltip" title="Actualizar Rol" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrarRol"> Cancelar </button>
                        </div>

                    </div>  

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
