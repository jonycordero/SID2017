
$(document).ready(function(){
	CargarListaCategoria();
});






function CargarListaCategoria() {

	var tablaDatos = $("#datosCategoria");
	var route = "categoria/create";

	$("#datosCategoria").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.descripcion+"</td><td>"+value.created_at+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarCategoria("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEdiarCategoria("+value.id+")'> Editar</button></td></tr>");
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
			alertify.success("Se elimino correctamente");
	 	},
	 	error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	 });
}



$("#GuardarCategoria").click(function(){

	var dato = $( "#FormCategoriaGuardar" ).serialize();
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
		 	$('#FormCategoriaGuardar')[0].reset();
		 	$('#myModalGuardar').modal('hide');
		 	alertify.success("Se guardo correctamente");
		 },
		 error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});


});


function AbrirModalCategoria() {
	$('#myModalGuardar').modal('show');
}


function AbrirModalEdiarCategoria(id) {
	$('#myModalEditar').modal('show');

	var route = "categoria/"+id+"/edit";
	$.get(route, function(res){
		$(res).each(function(key,value){
			$('#id').val(value.id);
			$('#nombre').val(value.nombre);
			$('#descripcion').val(value.descripcion);
			 
	});

});

}


$("#GuardarEditCategoria").click(function(){

	var dato = $( "#FormCategoriaEditar" ).serialize();
	var route = "/categoria/"+$('#id').val();;

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaCategoria();
		 		$('#FormCategoriaEditar')[0].reset();
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



  

