$(document).ready(function(){
	// $('#btn-guardar').html('<button type="button" id="GuardarProducto" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>')
	// $('#btn-editar').html('');

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
			 tablaDatos.append("<tr><td>"+value.codigo+"</td><td>"+value.p_nombre+"</td><td>"+value.presentacion+"</td><td>"+value.c_nombre+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarProducto("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirEdiarProducto("+value.id+")'>Editar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalMasDetalle("+value.id+")'>Ver</button></td></tr>");
		});
});
}

function AbrirModalMasDetalle(id) {
	var tablaDatos = $("#datosProductos");
	var route = "producto/"+id;
	//alert(route);
		//$("#datosProductos").empty();
		$.get(route, function(res){
			$(res).each(function(key,value){
				
		$('#more_codigo').html(value.codigo);
		$('#more_nombre').html(value.p_nombre);
		$('#more_categoria').html(value.c_nombre);
		$('#more_peso_neto').html(value.peso_neto);
		$('#more_peso_caja').html(value.peso_caja);
		$('#more_especificacion').html(value.e_nombre);
		$('#more_presentacion').html(value.presentacion);
		$('#more_descripcion').html(value.descripcion);
		
		$('#more_img').html('<img class="thumb img-thumbnail img-responsive"  src="/fotosproductos/PRODUCTO'+value.codigo+'.jpg"/>');
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




function eliminarProducto(btn){

	var route = "/producto/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaProductos();
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
		 	
	 	 	CargarListaProductos();
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



function AbrirEdiarProducto(id) {
	//$('#myModalEditar').modal('show');

	var route = "producto/"+id+"/edit";
	$.get(route, function(res){
		$(res).each(function(key,value){

			$('#btn-guardar').html('');
			$('#btn-editar').html('<button type="button" id="GuardarEditProducto" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk" ></span> Actualizar</button><button type="button" id="CancelarProducto" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-disk" ></span> Cancelar</button>');
			

			$('#codigo').val(value.codigo);
			$('#nombre').val(value.p_nombre);
			$('#peso_neto').val(value.peso_neto);
			$('#peso_caja').val(value.peso_caja);
			$('#presentacion').val(value.presentacion);

			$('#especificacion_id').val(value.especificacion_id);
			$('#especificacion_nombre').val(value.e_nombre);

			$('#categoria_id').val(value.categoria_id);
			$('#nombre_categoria').val(value.c_nombre);

			$('#descripcion').val(value.descripcion);
			$('#list').html('<img class="thumb img-thumbnail img-responsive" height="100" width="230" src="/fotosproductos/PRODUCTO'+value.codigo+'.jpg"/>');
		


			 
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







