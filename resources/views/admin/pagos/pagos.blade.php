@extends('layout.admin')
@section('title', 'Pagos')
@section('content')
<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUDPago.js')!!}
@endsection


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Lista de Pagos</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalPago()">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Pago</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Monto total</th>
                                <th>Tipo pago</th>
                                <th>Estado pago</th>
                                <th>Descuento</th>
                                <th>Monto con descuento</th>

                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosPago">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="myModalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Pago</h4>

            </div>
            <div class="modal-body">

                <input type="submit" value="" /> 
                <form method="POST" id="FormPagoEditGuardar">

                    <div class="form-group ">
                        <div class="hidden">
                            <input id="id2" name="id2">
                        </div>
                        <div class="row">
                            <div class="form-group  col-sm-6">
                                <label >Monto total</label>
                                <div class="input-group">
                                    <input name="monto_total2" id="monto_total2" type="number" class="form-control" placeholder="Inserte el monto total" aria-label="Amount (to the nearest dollar)">  
                                </div>
                            </div>
                            <br>
                            <a class="btn btn-primary " id="btnGenerarDescuento" >Generar descuento</a>
                        </div>

                        <div class="form-group ">
                            <label >Tipo pago</label>
                            <div class="input-group">

                                <select class="form-control" name="tipo_pago2" id="estado_pago2" >
                                    <option value="contado">Contado</option>
                                    <option value="credito">Credito</option>    
                                </select>

                            </div>
                        </div>

                        <div class="form-group ">
                            <label >Estado pago</label>
                            <div class="input-group">
                                <select class="form-control" name="estado_pago2" id="estado_pago2" >
                                    <option value="1">Cancelado</option>
                                    <option value="0">Deuda</option>    
                                </select>

                            </div>
                        </div>

                        <div class="form-group ">
                            <label >Descuento</label>
                            <div class="input-group">
                                <span class="input-group-addon">S/.</span>
                                <input name="descuento2" id="descuento2" type="number" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)" >

                            </div>
                        </div>

                        <div class="form-group ">
                            <label >Monto con descuento</label>
                            <div class="input-group">
                                <span class="input-group-addon">S/.</span>
                                <input name="monto_con_descuento2" id="monto_con_descuento2" type="number" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)" >
                            </div>
                        </div>

                    </div>
                </form>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GuardarEditPago">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="myModalGuardar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Pago</h4>
            </div>
            <div class="modal-body">

                <form method="POST" id="FormPagoGuardar">

                    <div class="form-group ">

                        @include('admin.pagos.form.formpago')

                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GuardarPago">Guardar</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endsection
