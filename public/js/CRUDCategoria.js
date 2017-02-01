
$(document).ready(function(){
	CargarListaCategoria();
});






function CargarListaCategoria() {

	var tablaDatos = $("#datosCategoria");
	var route = "categoria/create";

	$("#datosCategoria").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
		
			 tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.descripcion+"</td><td>"+value.created_at+"</td><td><button class='btn btn-danger btn-xs' onclick='eliminarCategoria("+value.id+")'>Eliminar</button></td></tr>");
		});
});
}



function eliminarCategoria(btn){
	var route = "/categoria/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaCategoria();
			$("#msj-success").fadeIn();
	 	}
	 });
}



$("#GuardarCategoria").click(function(){
	var dato = $( "#FormCategoria" ).serialize();
	var route = "/categoria";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	CargarListaCategoria();
		 		$('#FormCategoria')[0].reset();
		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 //	$("#msj").html(msj.responseJSON.genre);
		// 	$("#msj-error").fadeIn();
		 }
	});


});







