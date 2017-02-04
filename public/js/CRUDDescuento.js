
$(document).ready(function(){
	CargarListaDescuento();
});

function CargarListaDescuento() {

	var tablaDatos = $("#datosDescuento");
	var route = "descuento/create";

	$("#datosDescuento").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			 tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.tasa_descuento+"</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarDescuento("+value.id+")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEditarDescuento("+value.id+")'> Editar</button></td></tr>");
		});
});
}



function eliminarDescuento(btn){
	var route = "/descuento/"+btn;
	 $.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	 	type: 'DELETE',
		dataType: 'json',
	 	success: function(){
			CargarListaDescuento();
			alertify.success("Se elimino correctamente");
	 	},
	 	error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	 });
}



$("#GuardarDescuento").click(function(){

	var dato = $( "#FormDescuentoGuardar" ).serialize();
	var route = "/descuento";
	//var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	CargarListaDescuento();
		 	$('#FormDescuentoGuardar')[0].reset();
		 	$('#myModalGuardar').modal('hide');
		 	alertify.success("Se guardo correctamente");
		 },
		 error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});


});


function AbrirModalDescuento() {
	$('#myModalGuardar').modal('show');
}


function AbrirModalEditarDescuento(id) {
	$('#myModalEditarDescuento').modal('show');

	var route = "descuento/"+id+"/edit";
	$.get(route, function(res){
		$(res).each(function(key,value){
			$('#id').val(value.id);
			$('#nombre').val(value.nombre);
			$('#tasa_descuento').val(value.tasa_descuento);
			 
	});

});

}


$("#GuardarEditDescuento").click(function(){

	var dato = $( "#FormDescuentoEdit" ).serialize();
	var route = "/descuento/"+$('#id').val();;

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'PUT',
		dataType: 'json',
		data:dato,

		 success:function(){
		 	
		 	CargarListaDescuento();
		 		$('#FormDescuentoEdit')[0].reset();
		 		$('#myModalEditarDescuento').modal('hide');
		 		alertify.success("Se editó el descuento");

		 	//$("#msj-success").fadeIn();
		 },
		 error:function(msj){
		 	alertify.error('fallo la consulta ajax');
		 //	$("#msj").html(msj.responseJSON.genre);
		
		 }
	});

});




