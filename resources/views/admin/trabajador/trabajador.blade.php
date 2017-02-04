
@extends('layout.admin')
@section('title', '******')

@section('content')
<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUD******.js')!!}
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">***********</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>************</th>
                                <th>************</th>
                                <th>************</th>

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

@endsection


