@extends('layout.admin')
@section('title', 'Categoria')

@section('content')

<br>
@include('admin.alertas.alertas')

 <div class="row">
 	<div class="col-md-4">
 		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Nueva Especificacion</h3>
  </div>
  <div class="panel-body">
  @section('CRUD')
      {!!Html::script('js/CRUDEspecificaciones.js')!!}
  @endsection

 {!! Form::open(['method'=>'POST','id'=>'FormEspecificacion']) !!}
       

    @include('admin.especificacion.form.especificacion')

   {{--   {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!} --}}
     <button type="button" class="btn btn-primary" id="GuardarEspecificacion">Guardar</button>
   
  {!! Form::close() !!} 
  </div>
</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Lista de Especificacion</h3>
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
				    <tbody id="datosEspecificacion">


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

@endsection