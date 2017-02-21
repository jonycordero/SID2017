@extends('layout.admin')
@section('title', 'Categoria')

@section('content')
<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUDCategoria.js')!!}
@endsection


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Lista de Categoria</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalCategoria()">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Categoria</button>
                    </div>
                </div> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Nombre de la categoria</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>

                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosCategoria">
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
                <h4 class="modal-title">Editar Categoria</h4>

            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','id'=>'FormCategoriaEditar']) !!}

                <input type="hidden" id="id"> {{-- hidden --}}


                @include('admin.Categoria.form.Categoria')

                



                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GuardarEditCategoria">Guardar</button>
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
                <h4 class="modal-title">Crear Categoria</h4>

            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST','id'=>'FormCategoriaGuardar']) !!}


                <div class="form-group ">



                    @include('admin.Categoria.form.Categoria')

                    {{--   {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!} --}}


                    {!! Form::close() !!} 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="GuardarCategoria">Guardar</button>
                    <button id="alertaError">aki</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>






    @endsection
