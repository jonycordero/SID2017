@extends('layout.admin')
@section('title', 'Descuento')

@section('content')
<br>

@section('CRUD')
{!!Html::script('js/CRUDDescuento.js')!!}
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Lista de Descuentos</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalDescuento()">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Descuento</button>
                    </div>
                </div> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Monto acumulado (S/.)</th>
                                <th>tasa de descuento (%)</th>

                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosDescuento">



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="myModalEditarDescuento" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Descuento</h4>

            </div>
            <div class="modal-body">
                <form method="PUT" id="FormDescuentoEdit">

                    <input type="hidden" id="id">

                    <div class="form-group ">
                        <label >Monto acumulativo:</label>
                        <div class="input-group">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Inserte el monto acumulado" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label >Tasa de descuento:</label>
                        <div class="input-group">
                            <input type="text" name="tasa_descuento" id="tasa_descuento" class="form-control" placeholder="Inserte la tasa" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GuardarEditDescuento">Guardar</button>
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
                <h4 class="modal-title">Crear Descuento</h4>
            </div>
            <div class="modal-body">
                
                <form method="POST" id="FormDescuentoGuardar">

                <div class="form-group ">



                    @include('admin.descuento.form.descuento')

                     
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="GuardarDescuento">Guardar</button>                   
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    @endsection
