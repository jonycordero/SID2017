@extends('layout.admin')
@section('title', 'persona')
@section('content')

<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUDPersona.js')!!}
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Lista de Personas</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalPersona()">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Persona</button>
                    </div>
                </div> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosPersona">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>




<div id="myModalEditarPersona" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Persona</h4>

            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','id'=>'FormPersonaEditar']) !!}

                <input type="hidden" id="id"> 

                <div class="form-group">
                    {!!Form::label('Dni',null,['class' => 'control-label'])!!}
                    {!!Form::text('dni',null,['id'=>'dni','class'=>'form-control','placeholder'=>'Ingresa el dni'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Nombre',null,['class' => 'control-label'])!!}
                    {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Apellido paterno',null,['class' => 'control-label'])!!}
                    {!!Form::text('apellido_paterno',null,['id'=>'apellido_paterno','class'=>'form-control','placeholder'=>'Ingresa el apellido paterno'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Apellido materno',null,['class' => 'control-label'])!!}
                    {!!Form::text('apellido_materno',null,['id'=>'apellido_materno','class'=>'form-control','placeholder'=>'Ingresa el apellido materno'])!!}
                </div>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="GuardarEditPersona">Guardar</button>
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
                <h4 class="modal-title">Crear Persona</h4>

            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST','id'=>'FormPersonaGuardar']) !!}


                <div class="form-group ">
                    @include('admin.persona.form.persona')             
                </div>
                {!! Form::close() !!} 
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="GuardarPersona">Guardar</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    @endsection
