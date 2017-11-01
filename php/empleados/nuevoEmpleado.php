
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Empleado</i>
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
    
                <form class="form-horizontal" role="form"  id="fempleado">


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_id">Identificación:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="emple_id" name="emple_id" placeholder="Ingrese Identificación Empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_apl">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emple_apl" name="emple_apl" placeholder="Ingrese Apellidos Empleados"
                            value = "">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_nom">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emple_nom" name="emple_nom" placeholder="Ingrese Nombre de empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_cont">Contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emple_cont" name="emple_cont" placeholder="Ingrese No. contrato del empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_carg">Cargo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emple_carg" name="emple_carg" placeholder="Ingrese cargo del empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emple_sal">Salario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emple_sal" name="emple_sal" placeholder="Ingrese Salario del empleado"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarEmpleado" class="btn btn-primary" data-toggle="tooltip" title="Grabar Empleado">Grabar Empleado</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
