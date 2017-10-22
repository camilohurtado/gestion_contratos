<?php
	require_once('../pais/pais_modelo.php');
	$pais = new Pais();
	$listapais=$pais->listaPais();
?>	
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Municipio</i>
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
    
                <form class="form-horizontal" role="form"  id="fciudad">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_ciudad">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_ciudad" name="id_ciudad" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_ciudad">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_ciudad" name="nombre_ciudad" placeholder="Ingrese Nombre Ciudad"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_pais">pais:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_pais" name="id_pais">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listapais as $fila){ ?>
								<option value="<?php echo trim($fila['id_pais']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_pais'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarCiudad" class="btn btn-primary" data-toggle="tooltip" title="Grabar Ciudad">Grabar Ciudad</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrarCiudad2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
