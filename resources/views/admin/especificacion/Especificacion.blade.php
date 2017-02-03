@extends('layout.admin')
@section('title', 'Categoria')

@section('content')

<br>
@include('admin.alertas.alertas')

 <div class="row">
 
@section('CRUD')
      {!!Html::script('js/CRUDEspecificaciones.js')!!}
  @endsection
 	<div class="col-md-12">
 		<div class="panel panel-default">

  			<div class="panel-heading">
          <div class="row">
            <dir class="col-md-6">
            <h3 class="panel-title">Lista de Especificacion</h3>
          </dir>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalEspecificacion()">
            <span class="glyphicon glyphicon-plus"></span>
            Agregar especificacion</button>
          </div>
          </div>  			

  			</div>
	  		<div class="panel-body">
	  		<div class="table-responsive">
	  			<table class="table table-hover ">
				    <thead>
				      <tr>
				        <th>Descripcion de la especificacion</th>
				        
                		<th>Fecha</th>
				        
				        <th style="width: 100px;">Accion</th>
				      </tr>
				    </thead>
				    <tbody id="datosEspecificacion" >


				    {{--  @foreach($especificacions as $especificacion)
              <tr>
          
                <td>{{ $especificacion->descripcion }}</td>
              <td>{{ $especificacion->created_at }}</td>
                <td>
                  <a class="btn btn-danger btn-xs" href="{!! URL::to('especificacion/delete') !!}/{{ $especificacion->id }}" >Eliminar</a>
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




 <div id="myModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Especificacion</h4>

      </div>
      <div class="modal-body">
        {!! Form::open(['method'=>'PUT','id'=>'FormEspecificacionEditar']) !!}
       
        <input type="hidden" id="id"> {{-- hidden --}}
       <div class="form-group ">
            {!!Form::label('Especificacion', null, ['class' => 'control-label'])!!}
            {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Limite maximo 300 caracteres','id'=>'descripcion']) !!}
    </div>

   {{--   {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!} --}}
        
   
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="GuardarEditEspecificacion">Guardar</button>
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
        <h4 class="modal-title">Crear Especificacion</h4>

      </div>
      <div class="modal-body">
        {!! Form::open(['method'=>'POST','id'=>'FormEspecificacionGuardar']) !!}
       
        
       <div class="form-group ">
  
       

      @include('admin.especificacion.form.especificacion')

   {{--   {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!} --}}
      
   
      {!! Form::close() !!} 
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="GuardarEspecificacion">aGuardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection