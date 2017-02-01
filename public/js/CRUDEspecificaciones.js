
$(document).ready(function(){
	CargarListaEspecificaciones();
});






function CargarListaEspecificaciones() {

	var tablaDatos = $("#datosEspecificacion");
	var route = "especificacion/create";

	$("#datosEspecificacion").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
		
			 tablaDatos.append("<tr><td>"+value.descripcion+"</td><td>"+value.created_at+"</td><td><button class='btn btn-danger btn-xs' onclick='eliminarEspecificacion("+value.id+")'>Eliminar</button></td></tr>");
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

	var dato = $( "#FormEspecificacion" ).serialize();
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
		 		$('#FormEspecificacion')[0].reset();
		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 //	$("#msj").html(msj.responseJSON.genre);
		// 	$("#msj-error").fadeIn();
		 }
	});

});







