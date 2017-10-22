<?php
	require_once('../ciudad/ciudad_modelo.php');
	$ciudad = new Ciudad();
	$listaciudad=$ciudad->listaCiudad();
?>	
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Empresa</i>
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
    
                <form class="form-horizontal" role="form"  id="fempresa">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_empresa">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_empresa" name="id_empresa" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_empresa">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese Nombre Empresa"
                            value = "">
                        </div>
                    </div>
					

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nit_empresa">NIT:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nit_empresa" name="nit_empresa" placeholder="Ingrese NIT"
                            value = "">
                        </div>
                    </div>
					

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sector_empresa">Sector:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sector_empresa" name="sector_empresa" placeholder="Ingrese Sector"
                            value = "">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_ciudad">ciudad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_ciudad" name="id_ciudad">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listaciudad as $fila){ ?>
								<option value="<?php echo trim($fila['id_ciudad']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_ciudad'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarEmpresa" class="btn btn-primary" data-toggle="tooltip" title="Grabar Empresa">Grabar Empresa</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
