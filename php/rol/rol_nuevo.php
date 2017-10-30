<?php
    require_once('../rol/rol_modelo.php');
	$rol = new Rol();
	
?>	
<!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true"></i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
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
                        <label class="control-label col-sm-2" for="id_tipo">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_tipo" name="id_tipo" placeholder="ID de rol"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tipo">Nombre de rol:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese Nombre Rol"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarRol" class="btn btn-primary" data-toggle="tooltip" title="Grabar Rol">Grabar Rol</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
