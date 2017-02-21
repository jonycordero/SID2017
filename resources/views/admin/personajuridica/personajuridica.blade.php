
@extends('layout.admin')
@section('title', 'Registro de pesonas juridicas')

@section('content')
<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUDPersonaJuridica.js')!!}
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               
               <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Registro de pesonas juridicas</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalPersonaJuridica()">
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
                                <th>Nombre y Apellidos</th>
                                <th>Razon social</th>
                                <th>Ruc</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datos******">

                            {{-- 
                     @foreach($categorias as $categoria)
                            <tr>
                            <td>{{ $categoria-                                >nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->created_at }}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="{!! URL::to('categoria/delete') !!}/{{ $categoria->id }}" >Eliminar</a>
                                </td>

                            </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@section('id-modal','myModalGuardar')
@section('title-modal','Agregar persona juridica')
@section('body-modal')
    <form role="form" id="FromPersonaJuridicas">
                        
                        <div class="form-group col-md-6">
                            <input type="hidden" name="personas_id" id="personas_id">
                            <label>Persona: <a href="#!" onclick="CargarListaPersona()">Buscar</a></label>
                            <input type="text" readonly class="form-control" id="personas_nombre" name="personas_nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Ruc:</label>
                            <input type="text" class="form-control" id="ruc" name="ruc">
                        </div>
                         
                        <div class="form-group col-md-6">
                            <label>Razon social:</label>
                            <input type="text" class="form-control" id="razon_social" name="razon_social">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Direccion: </label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        

                      
                        <div class="form-group col-md-6">
                              <label>Tipo:</label>
                              <input type="text" class="form-control" id="tipo" name="tipo">
                        </div>
                                                
                        <div class="form-group col-md-12">
                            <strong id="btn-guardar">
                                <button type="button" id="GuardarProducto" class="btn btn-primary">
                            <span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
                            </strong>
                            {{-- <strong id="btn-editar">
                                <button type="button" id="GuardarEditProducto" class="btn btn-info">
                            <span class="glyphicon glyphicon-floppy-disk" ></span> Actualizar</button>
                            <button type="button" id="CancelarProducto" class="btn btn-danger">
                            <span class="glyphicon glyphicon-floppy-disk" ></span> Cancelar</button>
                            </strong>  --}}
                        </div>
                          
                    </form>
@endsection
@include('admin.alertas.modal')


@section('id-modal','myModalListaPesonas')
@section('title-modal','Lista de personas')
@section('body-modal')
<h1>jjjjjjjjjjjjjjj</h1>
@endsection




@endsection
