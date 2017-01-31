
<div class="panel panel-default" >
    <div class="panel-heading">Lista de personas Persona</div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Ap Paterno</th>
            <th>Ap Materno</th>
            </thead>

            @foreach($personas as $persona)
            <tbody>
            <td>{{$persona->dni}}</td>
            <td>{{$persona->nombre}}</td>
            <td>{{$persona->apellido_paterno}}</td>
            <td>{{$persona->apellido_materno}}</td>
            <td>
                <a class="btn btn-primary btn-xs"  >Editar</a>
                <a class="btn btn-danger btn-xs" href="{!! URL::to('persona/delete') !!}/{{ $persona->id }}" >Eliminar</a>
            </td>
            </tbody>
            @endforeach

        </table>
        {{$personas->render()}}
    </div>
</div>

