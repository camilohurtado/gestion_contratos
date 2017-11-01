 <?php
	require_once('pais_modelo.php');
	
	$codigo = $_POST['codigo'];
		
	$pais = new Pais();
	$pais->consultar($codigo);
?>

 <!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Pais</i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
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
    
                <form class="form-horizontal" role="form"  id="fpais">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_pais">ID:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="id_pais" name="id_pais" placeholder="Ingrese Nombre Pais"
                            value = "<?php echo trim($pais->id_pais); ?> " readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_pais">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_pais" name="nombre_pais" placeholder="Ingrese Nombre Pais"
                            value = "<?php echo trim($pais->nombre_pais); ?>">
                        </div>
                    </div>
					
					

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizarPais" data-toggle="tooltip" title="Actualizar Pais" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
