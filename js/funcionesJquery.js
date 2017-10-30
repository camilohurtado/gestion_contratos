﻿function Inicio(){

	/*
	Botones de Inicio en el index.html


	*/
	//se debe de modificar esta para que haga lo mismo pero con pais
	$("#opciones a.pais").click(function(e){
     	e.preventDefault(); //evita el evento nativo que es clic normal
        url = $(this).attr("href"); //de este hipervinculo saque el atributo href

        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado Pais");
                	$("#contenido" ).html(data); //carga en contenido
        });
     });



	$("#opciones a.ciudad").click(function(e){
     	e.preventDefault(); //evita el evento nativo que es clic normal
        url = $(this).attr("href"); //de este hipervinculo saque el atributo href

        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado Ciudades");
                	$("#contenido" ).html(data); //carga en contenido
        });
     });




	$("#opciones a.empresa").click(function(e){
     	e.preventDefault(); //evita el evento nativo que es clic normal
        url = $(this).attr("href"); //de este hipervinculo saque el atributo href

        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado Empresas");
                	$("#contenido" ).html(data); //carga en contenido
        });
     });




	$("#opciones a.sucursal").click(function(e){
     	e.preventDefault(); //evita el evento nativo que es clic normal
        url = $(this).attr("href"); //de este hipervinculo saque el atributo href

        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado Sucursal");
                	$("#contenido" ).html(data); //carga en contenido
        });
     });


	$("#opciones a.empleado").click(function(e){
     	e.preventDefault(); //evita el evento nativo que es clic normal
        url = $(this).attr("href"); //de este hipervinculo saque el atributo href

        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado Empleados");
                	$("#contenido" ).html(data); //carga en contenido
        });
	 });
	 
	 //Gestion de roles
	 $("#opciones a.rol").click(function(e){
		e.preventDefault(); //evita el evento nativo que es clic normal
	   url = $(this).attr("href"); //de este hipervinculo saque el atributo href

	   $.post( url, function(data) {
			   if(url!="#")
				   $("#contenedor").removeClass("hide");
				   $("#contenedor").addClass("show");
				   $("#titulo").html("Listado de roles de usuario");
				   $("#contenido" ).html(data); //carga en contenido
				   
	   });
	});



/*
Fin de Botones de inicio del index html

*/





/*
btones para cerrar las ventanas
*/


	$("#contenido").on("click","button.btncerrar",function(){

		
		$("#contenedor").removeClass("show");
		   $("#contenedor").addClass("hide");
		
	})

	$("#contenido").on("click","button.btncerrarRol",function(){
					
			//$("#contenedor").removeClass("show");
			//$("#contenedor").addClass("hide");
			$("#titulo").html("Listado de Roles");
			$( "#contenido" ).load("./php/rol/index.php");		
	})

	$("#contenido").on("click","button.btncerrar2",function(){
		$("#titulo").html("Listado Pais");
		$( "#contenido" ).load("./php/pais/index.php");	
	})





/*
Botones de Borrar icono basurero 
*/



	$("#contenido").on("click","a.borrarPais",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/pais/controladorPais.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Pais");
        		$( "#contenido" ).load("./php/pais/index.php");
        	});

		}
	});



	$("#contenido").on("click","a.borrarCiudad",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/ciudad/controladorCiudad.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Ciudad");
        		$( "#contenido" ).load("./php/ciudad/index.php");
        	});

		}
	});



	$("#contenido").on("click","a.borrarEmpresa",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/empresa/controladorEmpresa.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Empresa");
        		$( "#contenido" ).load("./php/empresa/index.php");
        	});

		}
	});

	$("#contenido").on("click","a.borrarSucursal",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/sucursal/controladorSucursal.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Sucursal");
        		$( "#contenido" ).load("./php/sucursal/index.php");
        	});

		}
	});

	$("#contenido").on("click","a.borrarEmpleado",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/empleados/controladorEmpleado.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Empleado");
        		$( "#contenido" ).load("./php/empleados/index.php");
        	});

		}
	});

	
	// Inactivar  rol
	$("#contenido").on("click","a.inactivarRol",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea inactivar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/rol/rol_controlador.php",
            	data: {codigo: codigo, accion:'borrar', estado : 0},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado de roles de usuario");
				$( "#contenido" ).load("./php/rol/index.php");
				
        	});

		}
	});

	//Activacion de rol
	$("#contenido").on("click","a.activarRol",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea activar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/rol/rol_controlador.php",
            	data: {codigo: codigo, accion:'borrar', estado : 1},
            	dataType: "html"
        	})  .done(function( result ) {
				$("#titulo").html("Listado de roles de usuario");
				$( "#contenido" ).load("./php/rol/index.php");
				
        	});

		}
	});


/*
Final de botones Borrar
*/




/*
Botones editar icono lapiz
*/



		$("#contenido").on("click","a.editarPais",function(){
		$("#titulo").html("Editar pais");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/pais/editarPais.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});
	



		$("#contenido").on("click","a.editarCiudad",function(){
		$("#titulo").html("Editar Ciudad");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/ciudad/editarCiudad.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});	



		$("#contenido").on("click","a.editarEmpresa",function(){
		$("#titulo").html("Editar Empresa");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/empresa/editarEmpresa.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});	



		$("#contenido").on("click","a.editarSucursal",function(){
		$("#titulo").html("Editar Sucursal");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/sucursal/editarSucursal.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});	

        $("#contenido").on("click","a.editarEmpleado",function(){
		$("#titulo").html("Editar Sucursal");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/empleados/editarEmpleado.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});	


	$("#contenido").on("click","a.editarRol",function(){
		$("#titulo").html("Editar Rol");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/rol/rol_editar.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});	




/*
Final Botones editar icono lapiz
*/






/*
Botones actualizar
*/



		$("#contenido").on("click","button#actualizarPais",function(){
		
		$("#titulo").html("Listado Pais");
        var datos=$("#fpais").serialize();
            $.ajax({
			type:"post",
			url:"./php/pais/controladorPais.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/pais/index.php");
        	});
	});


	$("#contenido").on("click","button#actualizarRol",function(){
		
		$("#titulo").html("Listado de Roles");
        var datos=$("#frol").serialize();
            $.ajax({
			type:"post",
			url:"./php/rol/rol_controlador.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
				//$( "#contenido" ).load("./php/rol/index.php");
				$( "#contenido" ).load("./php/rol/rol_controlador.php");
        	});
	});





		$("#contenido").on("click","button#actualizarCiudad",function(){
		
		$("#titulo").html("Listado Ciudad");
        var datos=$("#fciudad").serialize();
            $.ajax({
			type:"post",
			url:"./php/ciudad/controladorCiudad.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/ciudad/index.php");
        	});
	});




		$("#contenido").on("click","button#actualizarEmpresa",function(){
		
		$("#titulo").html("Listado Empresa");
        var datos=$("#fempresa").serialize();
            $.ajax({
			type:"post",
			url:"./php/empresa/controladorEmpresa.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/empresa/index.php");
        	});
	});


		$("#contenido").on("click","button#actualizarSucursal",function(){
		
		$("#titulo").html("Listado Sucursal");
        var datos=$("#fsucursal").serialize();
            $.ajax({
			type:"post",
			url:"./php/sucursal/controladorSucursal.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/sucursal/index.php");
        	});
	});

		$("#contenido").on("click","button#actualizarEmpleado",function(){
		
		$("#titulo").html("Listado Empleados");
        var datos=$("#fempleado").serialize();
            $.ajax({
			type:"post",
			url:"./php/empleados/controladorEmpleado.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/empleados/index.php");
        	});
	});



/*
Final Botones actualizar
*/







/*
Botones nuevos
*/

	
	$("#contenido").on("click","button#nuevoPais",function(){
		$("#titulo").html("Nueva Pais");
		$( "#contenido" ).load("./php/pais/nuevoPais.php");	
	})


	
	$("#contenido").on("click","button#nuevoCiudad",function(){
		$("#titulo").html("Nueva Ciudad");
		$( "#contenido" ).load("./php/ciudad/nuevoCiudad.php");	
	})



	$("#contenido").on("click","button#nuevoEmpresa",function(){
		$("#titulo").html("Nueva Empresa");
		$( "#contenido" ).load("./php/empresa/nuevoEmpresa.php");	
	})



	$("#contenido").on("click","button#nuevoSucursal",function(){
		$("#titulo").html("Nueva Sucursal");
		$( "#contenido" ).load("./php/sucursal/nuevoSucursal.php");	
	})


	$("#contenido").on("click","button#nuevoEmpleado",function(){
		$("#titulo").html("Nueva Sucursal");
		$( "#contenido" ).load("./php/empleados/nuevoEmpleado.php");	
	})


	$("#contenido").on("click","button#nuevoRol",function(){
		$("#titulo").html("Nuevo rol");
		$( "#contenido" ).load("./php/rol/rol_nuevo.php");	
	})


/*
Final Botones nuevos
*/






/*
Botones grabar
*/


		$("#contenido").on("click","button#grabarPais",function(){
		
		var datos=$("#fpais").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/pais/controladorPais.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado Pais");
				$("#contenido" ).load("./php/pais/index.php");
			}
		})
	});	




		$("#contenido").on("click","button#grabarCiudad",function(){
		
		var datos=$("#fciudad").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/ciudad/controladorCiudad.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado Ciudad");
				$("#contenido" ).load("./php/ciudad/index.php");
			}
		})
	});





		$("#contenido").on("click","button#grabarEmpresa",function(){
		
		var datos=$("#fempresa").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/empresa/controladorEmpresa.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado Empresas");
				$("#contenido" ).load("./php/empresa/index.php");
			}
		})
	});





		$("#contenido").on("click","button#grabarSucursal",function(){
		
		var datos=$("#fsucursal").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/sucursal/controladorSucursal.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado Sucursal");
				$("#contenido" ).load("./php/sucursal/index.php");
			}
		})
	});



		$("#contenido").on("click","button#grabarEmpleado",function(){
		
		var datos=$("#fempleado").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/empleados/controladorEmpleado.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado empleados");
				$("#contenido" ).load("./php/empleados/index.php");
			}
		})
	});


	
	$("#contenido").on("click","button#grabarRol",function(){
		
		var datos=$("#frol").serialize();//sobre el formulario mete todos los controles en una variable
	
		$.ajax({
			type:"post",
			url:"./php/rol/rol_controlador.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado de roles");
				$("#contenido" ).load("./php/rol/index.php");
			}
		})
	});


/*
Final Botones grabar
*/

}