$(document).ready(function(){
	CargarListaPersonaJuridicas();
	alertify.success('bien');
});



function CargarListaPersonaJuridicas(argument) {
	var tablaDatos = $("#datosPersonaJuridicas");
	var route = "persona-juridica/create";

	tablaDatos.empty();
	$.get(route, function(res){
		
	$(res).each(function(key,value){
		tablaDatos.append("<tr><td>"+value.dni+"</td><td>"+value.apellido_paterno+" "+value.apellido_materno+", "+value.nombre+"</td><td>"+value.razon_social+"</td><td>"+value.ruc+"</td><td>"+value.direccion+"</td><td>"+value.email+"</td><td>"+value.tipo+"</td> <td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='AbrirModalEditarPersonaJuridica("+value.PersonaJuridica_id+")'>Editar</button><button class='btn btn-danger btn-xs' onclick='eliminarPersonaJuridica("+value.PersonaJuridica_id+")'>Eliminar</button></td></tr>");
		});
});
}



function CargarListaPersona() {

	var tablaDatos = $("#datosPersona");
	var route = "persona/create";

	tablaDatos.empty();
	$.get(route, function(res){
		
		$(res).each(function(key,value){

			$('#ModalListaPersonas').modal('show');
			 tablaDatos.append("<tr><td>"+value.dni+"</td><td>"+value.apellido_paterno+" "+value.apellido_materno+","+value.nombre+"</td><td style='width: 100px'><button class='btn btn-danger btn-xs' onclick='agregarPersona("+value.id+",`"+value.apellido_paterno+" "+value.apellido_materno+","+value.nombre+"`)'> Agregar</button></td></tr>");
		});
});
}



function eliminarPersonaJuridica(btn){
	var route = "/persona-juridica/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaPersonaJuridicas();
			alertify.success("Se elimino correctamente");
	 	},
	 	error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		 }
	 });
}



$("#GuardarPesonaJuridica").click(function(){

	var dato = $( "#FromNewPersonaJuridicas" ).serialize();
	var route = "/persona-juridica";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,
		success:function(msj){
		 	CargarListaPersonaJuridicas();
		 	$('#FromNewPersonaJuridicas')[0].reset();
		 	$('#myModalGuardarPesonaJuridica').modal('hide');
		 	alertify.success("Se guardo correctamente");
		 },
		error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});


});


function AbrirModalPersonaJuridica() {
	//CargarListaPersona();
	$('#myModalGuardarPesonaJuridica').modal('show');
}

// function CargarListaPersona() {
// 	$('#myModalListaPesonas').modal('show');
// }


function AbrirModalEditarPersonaJuridica(id) {

	$('#myModalEditarPesonaJuridica').modal('show');

 	var route = "persona-juridica/"+id+"/edit";
 	
 	//alertify.error(route);
 	$.get(route, function(res){
 		$(res).each(function(key,value){
            $('#id').val(value.PersonaJuridica_id);
          
 			$('#personas_id1').val(value.persona_id);
 			$('#personas_nombre1').val(value.apellido_paterno+" "+value.apellido_materno+", "+value.nombre);
			$('#ruc').val(value.ruc);
    	    $('#razon_social').val(value.razon_social);
			$('#direccion').val(value.direccion);
			$('#email').val(value.email);

			//alert(value.tipo);
			if (value.tipo=='cliente') {
				$("#tipo").val(1);
			}
			if (value.tipo=='proveedor') {
				$("#tipo").val(2);
			}	
			//alert($("#tipo").val());
		});
	});
}




$("#GuardarEditPesonaJuridica").click(function(){

	//alertify.error($('#id').val());

	var dato = $( "#FromEditPersonaJuridicas" ).serialize();
	var route = "/persona-juridica/"+$('#id').val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'PUT',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaPersonaJuridicas();
		 		$('#FromEditPersonaJuridicas')[0].reset();
		 		//$('#myModalEditar').modal('hide')
		 		alertify.success("Se editó la categoria");

		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 	alertify.error('fallo la consulta ajax :(');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});

});


function agregarPersona(id,nombre) {
	$("#personas_id1").val(id);
	$("#personas_id2").val(id);
	$("#personas_nombre1").val(nombre);
	$("#personas_nombre2").val(nombre);

	$('#ModalListaPersonas').modal('hide');
}