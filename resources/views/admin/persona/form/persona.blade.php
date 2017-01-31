<div class="panel panel-default" >
    <div class="panel-heading">Registrar Persona</div>
    <div class="panel-body">
        
        
        <div class="form-group">
            {!!Form::label('dni','DNI:')!!}
            {!!Form::text('dni',null,['class'=>'form-control','placeholder'=>'Ingresa el dni'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('nombre','Nombre:')!!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('apellido_paterno','Apellido Paterno:')!!}
            {!!Form::text('apellido_paterno',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido paterno'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('apellido_materno','Apellido Materno:')!!}
            {!!Form::text('apellido_materno',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido materno'])!!}
        </div>
        
    </div>
</div>





