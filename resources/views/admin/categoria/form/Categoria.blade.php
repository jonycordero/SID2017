 <div class="form-group ">
            {!!Form::label('Nombre de la categoria', null, ['class' => 'control-label'])!!}
            {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre de la categoria'])!!}
    </div>
    <div class="form-group ">
            {!!Form::label('Descripcion de la categoria', null, ['class' => 'control-label'])!!}
            {!! Form::textarea('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Limite maximo 300 caracteres']) !!}
    </div>