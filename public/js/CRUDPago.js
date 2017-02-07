$(document).ready(function () {
    CargarListaPago();
});

function CargarListaPago() {

    var tablaDatos = $("#datosPago");
    var route = "pago/create";

    $("#datosPago").empty();
    $.get(route, function (res) {

        $(res).each(function (key, value) {
            if (value.estado_pago == 1) {
                value.estado_pago = "cancelado";
            } else {
                value.estado_pago = "no cancelado";
            }
            tablaDatos.append("<tr><td>" + value.monto_total + "</td><td>" + value.tipo_pago + "</td><td>" + value.estado_pago + "</td><td>" + value.descuento + "</td><td>" + value.monto_con_descuento + "</td><td style='width: 150px'><button class='btn btn-danger btn-xs' onclick='eliminarPago(" + value.id + ")'>Eliminar</button><button class='btn btn-danger btn-xs' onclick='AbrirModalEditarPago(" + value.id + ")'>Editar</button></td></tr>");
        });
    });
}

function eliminarPago(btn) {
    var route = "/pago/" + btn;
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'DELETE',
        dataType: 'json',
        success: function () {
            CargarListaPago();
            alertify.success("Se elimino correctamente");
        },
        error: function (msj) {
            alertify.error('fallo la consulta ajax');
            //	$("#msj").html(msj.responseJSON.genre);

        }
    });
}

$("#GuardarPago").click(function () {
    
    var dato = $("#FormPagoGuardar").serialize();
    var route = "/pago";
    //var token = $("#token").val();
    alert(dato);
    
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: dato,

        success: function () {
            CargarListaPago();
            $('#FormPagoGuardar')[0].reset();
            $('#myModalGuardar').modal('hide');
            alertify.success("Se guardo correctamente");
        },
        error: function (msj) {
            alertify.error('fallo la consulta ajax');
            //	$("#msj").html(msj.responseJSON.genre);
        }
    });


});
$("#btnGenerarDescuento").click(function(){
    
    
    
    var  monto_total = $('#monto_total').val();
    var descuento = 0, monto_con_descuento,aux;
    
    var route = "descuento/create";
    $.get(route, function (res) {
        
        $(res).each(function (key, value) {
            if (monto_total >= value.nombre) {
                descuento = value.tasa_descuento;       
            }             
            });        
    });
    
    var descuento = (monto_total*descuento)/100; 
    alert(descuento); 
    monto_con_descuento = monto_total - descuento;      
    $('#descuento').val(descuento);
    $('#monto_con_descuento').val(monto_con_descuento);
      
});



function AbrirModalPago() {
    $('#myModalGuardar').modal('show');
}


function AbrirModalEditarPago(id) {
    $('#myModalEditar').modal('show');

    var route = "categoria/" + id + "/edit";
    $.get(route, function (res) {
        
        $(res).each(function (key, value) {
            $('#id2').val(value.id);
            $('#monto_total2').val(value.monto_total);
            $('#tipo_pago2').val(value.tipo_pago);
            $('#estado_pago2').val(value.estado_pago);
            $('#descuento2').val(value.descuento);
            $('#monto_con_descuento2').val(value.monto_con_descuento);

        });

    });

}


$("#GuardarEditPago").click(function () {

    var dato = $("#FormPagoEditGuardar").serialize();
    var route = "/pago/" + $('#id').val();
    ;

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: dato,

        success: function () {

            CargarListaPago();
            $('#FormPagoEditGuardar')[0].reset();
            $('#myModalEditar').modal('hide')
            alertify.success("Se editó el pago");

            //$("#msj-success").fadeIn();
        },
        error: function (msj) {
            alertify.error('fallo la consulta ajax');
            //	$("#msj").html(msj.responseJSON.genre);

        }
    });

});
