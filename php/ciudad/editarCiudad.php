 <?php
	require_once('ciudad_modelo.php');
	require_once('../pais/pais_modelo.php');
	$codigo = $_POST['codigo'];
	$pais = new Pais();
	$listapais =  $pais->listaPais();
	$ciudad = new Ciudad();
	$ciudad->consultar($codigo);
?>

 <!-- quick email widget -->

	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Ciudad</i>
        
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
                           <input type="text" class="form-control" id="id_ciudad" name="id_ciudad" placeholder="Ingrese Nombre ciudad"
                            value = "<?php echo trim($ciudad->id_ciudad); ?> " readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_ciudad">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_ciudad" name="nombre_ciudad" placeholder="Ingrese Nombre Ciudad"
                            value = "<?php echo trim($ciudad->nombre_ciudad); ?>">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_pais">pais:</label>
                        <div class="col-sm-10">                            
                            <select class="form-control" id="id_pais" name="id_pais">
                                <?php foreach($listapais as $fila){ 
                                if(trim($ciudad->id_pais) == $fila['id_pais']){
                                ?>
                                <option selected value="<?php echo trim($fila['id_pais']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_pais'])); ?> </option>
                                <?php }
                                else{ ?>
                                <option value="<?php echo trim($fila['id_pais']); ?>" >
                                <?php echo utf8_encode(trim($fila['nombre_pais'])); ?> </option>
                                
                                <?php }
                                } ?>
                            </select>       

                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizarCiudad" data-toggle="tooltip" title="Actualizar ciudad" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
