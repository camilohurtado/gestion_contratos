<?php
	require_once('modelo_gestion_contratos.php');

	$contratos1 = new Contratos();
	$listaProveedores=$contratos1->listaProveedores();

?>	

<!--- PRUEBA-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../js/jquery.js">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Contrato</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar_nuevo_contrato" data-toggle="tooltip" title="Cerrar nuevo contrato"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>

   <div class="box-body">

        <div align ="center">
                <div id="actual"> 
                </div>
        </div>


        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos del contrato</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fcontratos">

      <div class="form-group">
                        <label class="control-label col-sm-2" for="id_contrato">No Contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_contrato" name="id_contrato" placeholder="Ingrese Codigo"
                            value = ""  readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_contrato">Nombre del Contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="Ingrese el Nombre del Contrato"
                            value = "">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_inicio_contrato">Fecha Inicio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_inicio_contrato" name="fecha_inicio_contrato" placeholder="Ingrese fecha de inicio contrato"
                            value = "">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_fin_contrato">Fecha fin:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_fin_contrato" name="fecha_fin_contrato" placeholder="Ingrese fecha fin del contrato"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion_contrato">Descripción :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion_contrato" name="descripcion_contrato" placeholder="Ingrese la descripcion "
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_proveedor">Proveedores:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_proveedor" name="id_proveedor">
                            <option value="" selected>Seleccione ...</option>
                                <?php foreach($listaProveedores as $fila){ ?>
                                <option value="<?php echo trim($fila['id_proveedor']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_proveedor'])); ?> </option>

                                <?php } ?>
                            </select>   
                        </div>
                    </div>
                    

					<div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="guardar_nuevo_contrato" class="btn btn-primary" data-toggle="tooltip" title="Guardar">Guardar</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar_nuevo_contrato" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>
            
					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			 </fieldset>
		</form>
</div>

