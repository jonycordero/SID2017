
$(document).ready(function(){
	CargarListaEspecificaciones();
});

function CargarListaEspecificaciones() {

	var tablaDatos = $("#datosEspecificacion");
	var route = "especificacion/create";

	$("#datosEspecificacion").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.descripcion+"</td><td>"+value.created_at+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarEspecificacion("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEdiarEspecificacion("+value.id+")'>Editar</button></td></tr>");
		});
});
}



function eliminarEspecificacion(btn){
	var route = "/especificacion/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaEspecificaciones();
			$("#msj-success").fadeIn();
	 	}
	 });
}



$("#GuardarEspecificacion").click(function(){

	var dato = $( "#FormEspecificacionGuardar" ).serialize();
	var route = "/especificacion";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaEspecificaciones();
		 	$('#FormEspecificacionGuardar')[0].reset();
		 	$('#myModalGuardar').modal('hide');
		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 //	$("#msj").html(msj.responseJSON.genre);
		// 	$("#msj-error").fadeIn();
		 }
	});

});




function AbrirModalEspecificacion() {
	$('#myModalGuardar').modal('show');
}

function AbrirModalEdiarEspecificacion(id) {
	$('#myModalEditar').modal('show');

	var route = "especificacion/"+id+"/edit";
	$.get(route, function(res){
		$(res).each(function(key,value){
			$('#id').val(value.id);
			$('#descripcion').val(value.descripcion);
			 
});
});

}

$("#GuardarEditEspecificacion").click(function(){

	var dato = $( "#FormEspecificacionEditar" ).serialize();
	var route = "/especificacion/"+$('#id').val();;

	


	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaEspecificaciones();
		 		$('#FormEspecificacionEditar')[0].reset();
		 		$('#myModalEditar').modal('hide')

		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 	alert('fallo: '+msj);
		 //	$("#msj").html(msj.responseJSON.genre);
		// 	$("#msj-error").fadeIn();
		 }
	});

});







