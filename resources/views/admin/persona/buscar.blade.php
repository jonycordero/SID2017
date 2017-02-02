
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buscar Persona</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar persona</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
                <div class="row">
                    <div class="col-md-12">    
                        {!!Form::label('buscar','Buscar por dni')!!}
                    </div>
                    <div class="col-md-12">    


                        {!!Form::text('buscarDni',null,['class'=>'form-control','placeholder'=>'Ingresa un dni'])!!}
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Buscar</button>
                        </span>

                    </div>
                </div>
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
                        <a class="btn btn-primary btn-xs"  >Seleccionar</a>
                        <a class="btn btn-primary btn-xs"  >Editar</a>
                        <a class="btn btn-danger btn-xs" href="{!! URL::to('persona/delete') !!}/{{ $persona->id }}" >Eliminar</a>
                    </td>
                    </tbody>
                    @endforeach
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
