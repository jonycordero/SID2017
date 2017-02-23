
@extends('layout.admin')
@section('title', 'Registro de pesonas juridicas')

@section('content')
<br>
{{-- @include('admin.alertas.alertas') --}}
@section('CRUD')
{!!Html::script('js/CRUDPersonaJuridica.js')!!}
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               
               <div class="row">
                    <dir class="col-md-6">
                        <h3 class="panel-title">Registro de pesonas juridicas</h3>
                    </dir>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-xs" onclick="AbrirModalPersonaJuridica()">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Categoria</button>
                    </div>
                </div> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre y Apellidos</th>
                                <th>Razon social</th>
                                <th>Ruc</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th style="width: 100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosPersonaJuridicas">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Modal -->
<div id="myModalEditarPesonaJuridica" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Persona Juridica</h4>
          </div>
        <div class="modal-body">
            @include('admin.personajuridica.form.formpersonajuridica')
        </div>
        <div class="modal-footer">

                       
        <button type="button" id="GuardarEditPesonaJuridica" class="btn btn-primary">
        <span class="glyphicon glyphicon-floppy-disk" ></span> Guardar editado</button>                      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="myModalGuardarPesonaJuridica" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar una persona juridica</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="FromNewPersonaJuridicas">
                        

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                    <input type="hidden" name="personas_id" id="personas_id2">
                    <label>Persona: <a href="#!" onclick="CargarListaPersona()">Buscar</a></label>
                    <input type="text" readonly class="form-control" id="personas_nombre2" name="personas_nombre">
                </div>

                <div class="form-group">
                    <label>Ruc:</label>
                    <input type="text" class="form-control"  name="ruc">
                </div>
                 
                <div class="form-group">
                    <label>Razon social:</label>
                    <input type="text" class="form-control"  name="razon_social">
                </div>
        </div>
        <div class="col-md-6">
                    <div class="form-group">
                        <label>Direccion: </label>
                        <input type="text" class="form-control"  name="direccion">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control"  name="email">
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select name="tipo"  size=1 class="form-control"> 
                            <option value="1">Cliente</option>
                            <option value="2">Proveedor</option>
                        </select> 
                    </div>
        </div>
      </div>
    </form>
      </div>
      <div class="modal-footer">

                       
        <button type="button" id="GuardarPesonaJuridica" class="btn btn-primary">
        <span class="glyphicon glyphicon-floppy-disk" ></span> Guardar Nuevo</button>                      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



  <div class="modal fade" id="ModalListaPersonas" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lista de personas</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th style="width:100px;">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="datosPersona">
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
