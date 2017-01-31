@extends('layout.admin')
@section('title', 'Categoria')






@section('content')

<br>
  @include('admin.alertas.alertas')
	
 <div class="row">
 	<div class="col-md-4">
 		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Nueva categoria</h3>
  </div>
  <div class="panel-body">

{!! Form::open(['route' =>'categoria.store', 'method'=>'POST']) !!}
       

    <div class="form-group ">
            {!!Form::label('Nombre de la categoria', null, ['class' => 'control-label'])!!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de la categoria'])!!}
    </div>
    <div class="form-group ">
            {!!Form::label('Descripcion de la categoria', null, ['class' => 'control-label'])!!}
            {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Limite maximo 300 caracteres']) !!}
    </div>

     {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!}
   
  {!! Form::close() !!}
  </div>
</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Lista de categorias</h3>
  			</div>
	  		<div class="panel-body">
	  		<div class="table-responsive">
	  			<table class="table table-hover ">
				    <thead>
				      <tr>
				        <th>Nombre de la categoria</th>
				        <th>Descripcion</th>
				        
				        <th style="width: 100px;">Accion</th>
				      </tr>
				    </thead>
				    <tbody>


				   {{--  @foreach($clientes as $cliente)
              <tr>
                <td>{{ $cliente->ape_p }} {{ $cliente->ape_m }}, {{ $cliente->nombre }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->created_at }}</td>
                <td>
            {!! Form::open(['route' =>['usuario.destroy',$cliente->id], 'method'=>'DELETE']) !!}{!! Form::submit('Eliminar',['class'=>'btn btn-danger square-btn-adjust']); !!}{!! Form::close() !!}
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