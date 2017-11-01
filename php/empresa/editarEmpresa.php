 <?php
	require_once('empresa_modelo.php');
	require_once('../ciudad/ciudad_modelo.php');
	$codigo = $_POST['codigo'];
	$ciudad = new Ciudad();
	$listaciudad =  $ciudad->listaCiudad();
	$empresa = new Empresa();
	$empresa->consultar($codigo);
?>

 <!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Empresa</i>

        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrarEmpresa2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
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
                           <input type="text" class="form-control" id="id_empresa" name="id_empresa" placeholder="Ingrese Nombre Empresa"
                            value = "<?php echo trim($empresa->id_empresa); ?> " readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_empresa">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese Nombre empresa"
                            value = "<?php echo trim($empresa->nombre_empresa); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nit_empresa">NIT:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nit_empresa" name="nit_empresa" placeholder="Ingrese NIT"
                            value = "<?php echo trim($empresa->nit_empresa); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sector_empresa">Sector:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sector_empresa" name="sector_empresa" placeholder="Ingrese Sector"
                            value = "<?php echo trim($empresa->sector_empresa); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_ciudad">ciudad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_ciudad" name="id_ciudad">
                                <?php foreach($listaciudad as $fila){
                                if(trim($empresa->id_ciudad) == $fila['id_ciudad']){
                                ?>
                                <option selected value="<?php echo trim($fila['id_ciudad']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_ciudad'])); ?> </option>
                                <?php }
                                else{ ?>
                                <option value="<?php echo trim($fila['id_ciudad']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_ciudad'])); ?> </option>
                                <?php }
                                } ?>
                            </select>

                        </div>
                    </div>

					 <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizarEmpresa" data-toggle="tooltip" title="Actualizar empresa" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrarEmpresa2"> Cancelar </button>
                        </div>

                    </div>

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
