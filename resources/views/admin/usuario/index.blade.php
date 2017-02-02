@extends('layout.admin')
@section('title', 'usuario')
@section('content')

<br>
<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    <strong>Genero agregado Correctamente</strong>
</div>
@include('admin.alertas.alertas')
<div class="row">
    <div class="col-md-4 ">
        
        @include('admin.usuario.form.usuario') 
        
    </div>
    <div class="col-md-8 ">
        afs
    </div> 
</div>

@endsection


