@extends('layout.admin')
@section('title', 'persona')
@section('content')

<br>
<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    <strong>Genero agregado Correctamente</strong>
</div>
@include('admin.alertas.alertas')
<div class="row">
    <div class="col-md-4 ">
        
        {!!Form::open(['route'=>'persona.store', 'method'=>'POST'])!!}
        @include('admin.persona.form.persona')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}     
    </div>
    <div class="col-md-8 ">
        @include('admin.persona.form.personas')
    </div> 
</div>

@endsection
