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
		tablaDatos.append("<tr><td>DNI</td><td>"+value.dni+"</td><td>"+value.razon_social+"</td><td>"+value.ruc+"</td><td>"+value.direccion+"</td><td>"+value.email+"</td><td>"+value.tipo+"</td> <td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='agregarPersona("+value.id+")'>Editar</button><button class='btn btn-danger btn-xs' onclick='agregarPersona("+value.id+")'>Eliminar</button></td></tr>");
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



function eliminarPersona(btn){
	var route = "/persona/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaPersona();
			alertify.success("Se elimino correctamente");
	 	},
	 	error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	 });
}



$("#GuardarPesonaJuridica").click(function(){

	var dato = $( "#FromPersonaJuridicas" ).serialize();
	var route = "/persona-juridica";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,
		success:function(msj){
		 	//CargarListaPersona();
		 	$('#FromPersonaJuridicas')[0].reset();
		 	//$('#myModalGuardar').modal('hide');
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


function AbrirModalEditarPersona(id) {
	$('#myModalEditarPersona').modal('show');

	var route = "persona/"+id+"/edit";
	$.get(route, function(res){
		$(res).each(function(key,value){
                        $('#id').val(value.id);
			$('#dni').val(value.dni);
			$('#nombre').val(value.nombre);
			$('#apellido_paterno').val(value.apellido_paterno);
                        $('#apellido_materno').val(value.apellido_materno);
			 
	});

});

}


$("#GuardarEditPersona").click(function(){

	var dato = $( "#FormPersonaEditar" ).serialize();
	var route = "/persona/"+$('#id').val();;

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaPersona();
		 		$('#FormPersonaEditar')[0].reset();
		 		$('#myModalEditar').modal('hide')
		 		alertify.success("Se editó la categoria");

		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});

});


function agregarPersona(id,nombre) {
	$("#personas_id").val(id);
	$("#personas_nombre").val(nombre);
}