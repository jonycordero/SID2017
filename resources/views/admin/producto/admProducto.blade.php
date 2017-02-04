@extends('layout.admin')
@section('title', 'Producto')

@section('content')
<br>

@section('CRUD')
     {{--  {!!Html::script('js/CRUDCategoria.js')!!} --}}
@endsection
<div class="row">
  	<div class="col-md-12">
 		<div class="panel panel-default">
  			<div class="panel-heading">
            	<h3 class="panel-title">Crear nuevo producto</h3>          
  			</div>
	  		<div class="panel-body">
	  			<div class="row">
	  			

						<form role="form">
						<div class="form-group  col-md-6">
						    <label>Codigo:</label>
						    <input type="text" class="form-control" id="codigo">
						</div>
						<div class="form-group  col-md-6">
						    <label>Nombre:</label>
						    <input type="text" class="form-control" id="nombre">
						</div>
						 
						<div class="form-group col-md-6">
						    <label>Peso neto:</label>
						    <input type="text" class="form-control" id="peso_neto">
						</div>
						<div class="form-group col-md-6">
						    <label>Peso Caja:</label>
						    <input type="text" class="form-control" id="peso_caja">
						</div>

						<div class="form-group col-md-6">
						    <label>Presentacion: </label>
						    <input type="text" class="form-control" id="presentacion">
						</div>
						<div class="form-group col-md-3">
						    <label>Categoria: <a href="">Buscar</a></label>
						    <input type="text" class="form-control" id="presentacion">
						</div>
						<div class="form-group col-md-3">
						    <label>Especificaciones:<a href="">Buscar</a></label>
						    <input type="text" class="form-control" id="presentacion">
						</div>

						

						<div class="form-group col-md-12">
							  <label for="">Descripción:</label>
							  <textarea class="form-control" rows="" id="descripción"></textarea>
						</div>
						 
						<div class="form-group col-md-12">
							<button type="button" class="btn btn-primary">
							<span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button> 
						</div>
						  
						</form>
						


	  				
	  			</div>
	  		</div>
		</div>
 	</div>

 </div>
<div class="row">
  	<div class="col-md-12">
 		<div class="panel panel-default">
  			<div class="panel-heading">

            	<h3 class="panel-title">Lista de Productos</h3>     
  			
  			</div>
	  		<div class="panel-body">
	  		<div class="table-responsive">
	  			<table class="table table-hover ">
				    <thead>
				      <tr>
				        <th>Codigo</th>
				        <th>Nombre</th>
                		<th>Descripcion</th>
                		<th>Presentacion</th>
                		<th>Peso neto</th>
                		<th>Peso Caja</th>				        
				        <th style="width: 100px;">Accion</th>
				      </tr>
				    </thead>
				    <tbody id="datosCategoria">

				    </tbody>
				</table>
	  		</div>
	  		</div>
		</div>
 	</div>

 </div>
@endsection
