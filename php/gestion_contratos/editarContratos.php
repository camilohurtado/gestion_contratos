<?php
	require_once('modelo_gestion_contratos.php');
	$codigo = $_POST['codigo'];
	$contratos1 = new Contratos();
    $listaProveedores=$contratos1->listaProveedores();

    $contratos = new Contratos();
	$contratos->consultar($codigo);

    
?>
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Contratos</i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar_nuevo_contrato" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
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
    
                <form class="form-horizontal" role="form"  id="fcontratos">

                
 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_contrato">No Contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_contrato" name="id_contrato" placeholder="Ingrese Codigo"
                            value = "<?php echo trim($contratos->id_contrato); ?>"  readonly="true" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_contrato">Nombre Contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="Nombre contrato"
                            value = "<?php echo trim($contratos->nombre_contrato); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_inicio_contrato">Fecha Inicio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_inicio_contrato" name="fecha_inicio_contrato" placeholder="Ingrese fecha de inicio contrato"
                            value = "<?php echo trim($contratos->fecha_inicio_contrato); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_fin_contrato">Fecha fin:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_fin_contrato" name="fecha_fin_contrato" placeholder="Ingrese fecha fin del contrato"
                            value = "<?php echo trim($contratos->fecha_fin_contrato); ?>"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion_contrato">Descripción :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion_contrato" name="descripcion_contrato" placeholder="Ingrese una descripcion "
                            value = "<?php echo trim($contratos->descripcion_contrato); ?>">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="id_proveedor">Proveedores:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_proveedor" name="id_proveedor">
                                <?php foreach($listaProveedores as $fila){ 
                                if(trim($contratos1->id_proveedor) == $fila['id_proveedor']){
                                ?>
                                <option selected value="<?php echo trim($fila['id_proveedor']); ?>" >
                                <?php echo utf8_encode(trim($fila['id_proveedor'])); ?> </option>
                                <?php }
                                else{ ?>
                                <option value="<?php echo trim($fila['id_proveedor']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_proveedor'])); ?> </option>
                                
                                <?php }
                                } ?>
                            </select>   
                        </div>
                    </div>


					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar_contrato" data-toggle="tooltip" title="Actualizar Contrato" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar_nuevo_contrato"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
