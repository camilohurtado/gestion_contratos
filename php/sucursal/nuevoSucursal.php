<?php
	require_once('../empresa/empresa_modelo.php');
	$empresa = new Empresa();
	$listaempresa=$empresa->listaEmpresa();
?>	
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Sucursal</i>
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
    
                <form class="form-horizontal" role="form"  id="fsucursal">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_sucursal">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_sucursal" name="id_sucursal" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_sucursal">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_sucursal" name="nombre_sucursal" placeholder="Ingrese Nombre Sucursal"
                            value = "">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion_sucursal">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion_sucursal" name="direccion_sucursal" placeholder="Ingrese Direccion Sucursal"
                            value = "">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono_sucursal">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono_sucursal" name="telefono_sucursal" placeholder="Ingrese Telefono Sucursal"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_empresa">empresa:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_empresa" name="id_empresa">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listaempresa as $fila){ ?>
								<option value="<?php echo trim($fila['id_empresa']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_empresa'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarSucursal" class="btn btn-primary" data-toggle="tooltip" title="Grabar Sucursal">Grabar Sucursal</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrarCiudad2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
