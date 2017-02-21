$(document).ready(function(){
	//CargarListaPersona();
	alertify.success('bien');
});


function CargarListaPersona() {

	var tablaDatos = $("#datosPersona");
	var route = "persona/create";

	tablaDatos.empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.dni+"</td><td>"+value.nombre+"</td><td>"+value.apellido_paterno+"</td><td>"+value.apellido_materno+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarPersona("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEditarPersona("+value.id+")'> Editar</button></td></tr>");
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



$("#GuardarPersona").click(function(){

	var dato = $( "#FormPersonaGuardar" ).serialize();
	var route = "/persona";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	CargarListaPersona();
		 	$('#FormPersonaGuardar')[0].reset();
		 	$('#myModalGuardar').modal('hide');
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
	$('#myModalGuardar').modal('show');
}

function CargarListaPersona() {
	$('#myModalListaPesonas').modal('show');
}


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