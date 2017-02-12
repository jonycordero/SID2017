$(document).ready(function(){

	CargarListaProductos();
	CargarListaCategoria();
	CargarListaEspecificaciones();
});

function CargarListaProductos() {

	var tablaDatos = $("#datosProductos");
	var route = "producto/create";

	$("#datosProductos").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.codigo+"</td><td>"+value.p_nombre+"</td><td>"+value.presentacion+"</td><td>"+value.c_nombre+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarEspecificacion("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEdiarEspecificacion("+value.id+")'>Editar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalMasDetalle("+value.id+")'>Ver</button></td></tr>");
		});
});
}

function AbrirModalMasDetalle(id) {
	var tablaDatos = $("#datosProductos");
	var route = "producto/"+id;
alert(route);
	$("#datosProductos").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			
	$('#more_codigo').html(value.codigo);
	$('#more_nombre').html(value.p_nombre);
	$('#more_categoria').html(value.c_nombre);
	$('#more_peso_neto').html(value.more_peso_neto);
	$('#more_peso_caja').html(value.more_peso_caja);
	$('#more_especificacion').html(value.e_nombre);
	$('#more_presentacion').html(value.presentacion);
	$('#more_descripcion').html(value.descripcion);
	$('#myModalMasDetalle').modal('show');


		});
});


}



function CargarListaCategoria() {

	var tablaDatos = $("#datosCategoria");
	var route = "categoria/create";

	$("#datosCategoria").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.descripcion+"</td><td><button class='btn btn-danger btn-xs' onclick='agregarCategoria("+value.id+",`"+value.nombre+"`)'>Agregar</button></td></tr>");
		});
});
}

function CargarListaEspecificaciones() {

	var tablaDatos = $("#datosEspecificacion");
	var route = "especificacion/create";

	$("#datosEspecificacion").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.descripcion+"</td><td>"+value.created_at+"</td><td><button class='btn btn-danger btn-xs' onclick='agregarEspecificacion("+value.id+",`"+value.descripcion+"`)'>Agregar</button></td></tr>");
		});
});
}








function agregarCategoria(id,nombre) {
	$('#categoria_id').val(id);
	$('#nombre_categoria').val(nombre);
	$('#myModalCategoria').modal('hide');
}
function agregarEspecificacion(id,nombre) {
	$('#especificacion_id').val(id);
	$('#especificacion_nombre').val(nombre);
	$('#myModalEspecificacion').modal('hide');
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
			alertify.success("Se elimino correctamente");
	 	}
	 });
}



$("#GuardarProducto").click(function(){


	
	//var dato = $( "#FromProducto" ).serialize();
	var dato = new FormData($('#FromProducto')[0]);
	var route = "/producto";
	

	 $.ajax({
	 	url: route,
	 	headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'POST',
	 	dataType: 'json',
	 	data:dato,
	 	contentType:false,
	 	processData:false,

	 	 success:function(){
		 	
	 	 	//CargarListaEspecificaciones();
	 	 	$('#FromProducto')[0].reset();
	 	 	$('#list').html('<h1>Foto Producto</h1>');
	 	 	alertify.success("Se guardo correctamente");
	 	 },
	 	 error:function(msj){
	 	 	alertify.error("fallo la consulta Ajax");
	 	 	//$("#msj").html(msj.responseJSON.genre);
	 	 	//$("#msj-error").fadeIn();
	 	 }
	 });

});


function AbrirModalCategoria() {
	$('#myModalCategoria').modal('show');
}
function AbrirModalEspecificacion() {
	$('#myModalEspecificacion').modal('show');
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

		 	alertify.success("Se edito correctamente");
		 },
		 error:function(msj){
		 	alertify.error("fallo la consulta Ajax");
		 //	$("#msj").html(msj.responseJSON.genre);
		// 	$("#msj-error").fadeIn();
		 }
	});

});







