@extends('layout.admin')
@section('title', 'Categoria')

@section('content')
		<br>
 <div class="row">
 	<div class="col-md-4">
 		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Nuevo cliente</h3>
  </div>
  <div class="panel-body">

{!! Form::open(['route' =>'categoria.store', 'method'=>'POST']) !!}
       <br />

    <div class="form-group ">
            {!!Form::label('Nombre de la categoria', null, ['class' => 'control-label'])!!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de la categoria'])!!}
    </div>
    



    <div class="form-group ">
            {!!Form::label('Descripcion de la categoria', null, ['class' => 'control-label'])!!}
            {!! Form::textarea('notes', '3 < 4') !!}
    </div>
    <div class="form-group ">
            {!!Form::label('Apellido_paterno', null, ['class' => 'control-label'])!!}
            {!!Form::text('ape_p',null,['class'=>'form-control','placeholder'=>'Apellido paterno'])!!}
    </div>
	<div class="form-group ">
            {!!Form::label('Apellido_materno', null, ['class' => 'control-label'])!!}
            {!!Form::text('ape_m',null,['class'=>'form-control','placeholder'=>'Apellido materno'])!!}
    </div>

    <div class="form-group ">
            {!!Form::label('Numero de telefono', null, ['class' => 'control-label'])!!}
            {!!Form::text('num_tele',null,['class'=>'form-control','placeholder'=>'numero de telefono'])!!}
    </div>
    <div class="form-group ">
            {!!Form::label('Correo Electronico', null, ['class' => 'control-label'])!!}
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Correo Electronico'])!!}
    </div>

   

   

 	

  
     
     

     {!! Form::submit('Guardar',['class'=>'btn btn-primary']); !!}
    <hr />
    <!-- {!!Form::date('name', \Carbon\Carbon::now());!!} -->
   
  {!! Form::close() !!}
  </div>
</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Lista de Clientes</h3>
  			</div>
	  		<div class="panel-body">
	  		<div class="table-responsive">
	  			<table class="table table-hover ">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Email</th>
				        <th>Fecha de registro</th>
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