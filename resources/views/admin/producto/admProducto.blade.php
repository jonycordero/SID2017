@extends('layout.admin')
@section('title', 'Producto')

@section('content')
<br>

@section('CRUD')
<script type="text/javascript">
	function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb img-thumbnail img-responsive" height="100" width="230" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');


               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('img').addEventListener('change', archivo, false);
</script>
      {!!Html::script('js/CRUDProducto.js')!!}
@endsection


<style type="text/css">
	.thumb{
     height: auto;
     border: 1px solid #000;
     margin: 10px 5px 0 0;
}
</style>

<div class="row">
  	<div class="col-md-12">
 		<div class="panel panel-default">
  			<div class="panel-heading">
            	<h3 class="panel-title">Crear nuevo producto</h3>          
  			</div>
	  		<div class="panel-body">
	  			<div class="row">
	  			<div class="col-md-9">
					<form role="form" id="FromProducto" enctype="multipart/form-data">
						<div class="form-group  col-md-6">
						    <label>Codigo:</label>
						    <input type="text" class="form-control" id="codigo" name="codigo">
						</div>
						<div class="form-group col-md-6">
						    <label>Nombre:</label>
						    <input type="text" class="form-control" id="nombre" name="nombre">
						</div>
						 
						<div class="form-group col-md-6">
						    <label>Peso neto:</label>
						    <input type="text" class="form-control" id="peso_neto" name="peso_neto">
						</div>
						<div class="form-group col-md-6">
						    <label>Peso Caja: </label>
						    <input type="text" class="form-control" id="peso_caja" name="peso_caja">
						</div>

						<div class="form-group col-md-6">
						    <label>Presentacion:</label>
						    <input type="text" class="form-control" id="presentacion" name="presentacion">
						</div>
						<div class="form-group col-md-3">
							<input type="hidden" name="especificacion_id" id="especificacion_id">
						    <label>Especificacion: <a href="#!" onclick="javascript:AbrirModalEspecificacion();" class="btn btn-info btn-xs">Buscar</a></label>
						    <input type="text" class="form-control" id="especificacion_nombre" name="especificacion_nombre">
						</div>

						<div class="form-group col-md-3">
							<input type="hidden" name="categoria_id" id="categoria_id">
						    <label>Categoria: <a href="#!" onclick="javascript:AbrirModalCategoria();" class="btn btn-info btn-xs">Buscar</a></label>
						    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria">
						</div>
						<div class="form-group col-md-12">
							  <label>Descripción:</label>
							  <textarea class="form-control" rows="" id="descripcion" name="descripcion"></textarea>
						</div>

						<div class="form-group col-md-12">
							<label>Foto del producto:</label>
							<input type="file" id="img" name="img" />
														
						</div>
						 
						<div class="form-group col-md-12">
							<strong id="btn-guardar">
								<button type="button" id="GuardarProducto" class="btn btn-primary">
							<span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
							</strong>
							<strong id="btn-editar">
								<button type="button" id="GuardarEditProducto" class="btn btn-info">
							<span class="glyphicon glyphicon-floppy-disk" ></span> Actualizar</button>
							<button type="button" id="CancelarProducto" class="btn btn-danger">
							<span class="glyphicon glyphicon-floppy-disk" ></span> Cancelar</button>
							</strong> 
						</div>
						  
					</form>
				</div>
					<div class="col-md-3">
						<output id="list">
							
							<h1>Foto Producto</h1>
						</output>
					</div>

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
                
                		<th>Presentacion</th>
                	
                		<th>Categoria</th>				        
				        <th style="width: 100px;">Accion</th>
				      </tr>
				    </thead>
				    <tbody id="datosProductos">

				    </tbody>
				</table>
	  		</div>
	  		</div>
		</div>
 	</div>

 </div>


<!-- Modal -->
<div id="myModalMasDetalle" class="modal fade bs-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mas detalle</h4>
      </div>
   
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6">
        		<div id="more_img">
        			
        		</div>
        	</div>
        	<div class="col-md-6 p">
        		<div class="row">
        			<div class="col-md-12">
        				<label>Codigo:</label>
        				<p id="more_codigo">No definido</p>		
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Nombre del producto:</label>
        				<p id="more_nombre">No definido</p>	
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Categoria:</label>
        				<p id="more_categoria">No definido</p>			
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Peso neto:</label>
        				<p id="more_peso_neto">No definido</p>			
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Peso caja:</label>
        				<p id="more_peso_caja">No definido</p>			
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Epecificacion:</label>
        				<p id="more_especificacion">No definido</p>			
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Presentacion:</label>
        				<p id="more_presentacion">No definido</p>			
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<label>Descripcion:</label>
        				<p id="more_descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        				consequat.</p>			
        			</div>
        		</div>
        	</div>
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="myModalCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Categoria</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        	<table class="table table-hover">
        	 <thead>
		      <tr>
		        <th>Nombre</th>
		        <th>Descripcion</th>
		        <th style="width: 100px;">Accion</th>
		      </tr>
		    </thead>
		    <tbody id="datosCategoria">
		    </tbody>
        	</table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="myModalEspecificacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Especificacion</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        	<table class="table table-hover">
        	 <thead>
		      <tr>
		        <th>Nombre</th>
		        <th>Descripcion</th>
		        <th>Accion</th>
		      </tr>
		    </thead>
		    <tbody id="datosEspecificacion">
		    </tbody>
        	</table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



@endsection


