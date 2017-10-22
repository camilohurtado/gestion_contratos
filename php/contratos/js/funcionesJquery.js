function Inicio(){
	
	$("#opciones a").click(function(e){
     	e.preventDefault();
        url = $(this).attr("href");
        $.post( url, function(data) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
        			$("#titulo").html("Listado de Contratos");
                	$("#contenido" ).html(data);
        });
     });


	$("#contenido").on("click","button.btncerrar_modelo_contratos",function(){
		$("#contenedor").removeClass("show");
       	$("#contenedor").addClass("hide");
	})

	$("#contenido").on("click","button.btncerrar_nuevo_contrato",function(){
		$("#titulo").html("Listado Contratos");
		$( "#contenido" ).load("./php/gestion_contratos/index.php");	
	})



	$("#contenido").on("click","a.borrar",function(){
		//Recupera datos del formulario
		var codigo = $(this).attr("codigo");
		if ( confirm("¿Realmente desea borrar el registro?")){		
			$.ajax({
        		method: "post",
            	url: "./php/gestion_contratos/controladorContratos.php",
            	data: {codigo: codigo, accion:'borrar'},
            	dataType: "html"
        	})  .done(function( result ) {
        		$("#titulo").html("Listado Contratos");
        		$( "#contenido" ).load("./php/gestion_contratos/index.php");
        	});

		}
	});
	
	$("#contenido").on("click","a.editar_contratos",function(){
		$("#titulo").html("Editar el Contrato");
		//Recupera datos del fromulario
		var codigo = $(this).attr("codigo");
		$.ajax({
			type:"post",
			url:"./php/gestion_contratos/editarContratos.php",
			data:"codigo=" + codigo,
			dataType:"html"
        	}) .done(function( result ) {
        		$("#contenido").html(result);
        	});
	});
	
	$("#contenido").on("click","button#actualizar_contrato",function(){
		
		$("#titulo").html("Listado Contratos");
        var datos=$("#fcontratos").serialize();
            $.ajax({
			type:"post",
			url:"./php/gestion_contratos/controladorContratos.php",
			data: datos,
			dataType:"html"
        	}) .done(function( result ) {
        		$( "#contenido" ).load("./php/gestion_contratos/index.php");
        	});
	});
	
	$("#contenido").on("click","button#nuevo_contrato",function(){
		$("#titulo").html("Nuevo Contrato");
		$( "#contenido" ).load("./php/gestion_contratos/nuevoContrato.php");	
	})
	
	$("#contenido").on("click","button#guardar_nuevo_contrato",function(){	
		var datos=$("#fcontratos").serialize();
	
		$.ajax({
			type:"post",
			url:"./php/gestion_contratos/controladorContratos.php",
			data:datos,
			dataType:"html",
			success:function(result){
				$("#titulo").html("Listado contratos");
				$("#contenido" ).load("./php/gestion_contratos/index.php");
			}
		})
	});	


}