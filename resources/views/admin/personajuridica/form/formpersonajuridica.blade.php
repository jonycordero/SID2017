 <form role="form" id="FromEditPersonaJuridicas">
        
        <input type="hidden" id="id">

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                    <input type="hidden" name="personas_id" id="personas_id1">
                    <label>Persona: <a href="#!" onclick="CargarListaPersona()">Buscar</a></label>
                    <input type="text" readonly class="form-control" id="personas_nombre1" name="personas_nombre">
                </div>

                <div class="form-group">
                    <label>Ruc:</label>
                    <input type="text" class="form-control" id="ruc" name="ruc">
                </div>
                 
                <div class="form-group">
                    <label>Razon social:</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social">
                </div>
        </div>
        <div class="col-md-6">
                    <div class="form-group">
                        <label>Direccion: </label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select name="tipo" id="tipo" size=1 class="form-control"> 
                            <option value="1">Cliente</option>
                            <option value="2">Proveedor</option>
                        </select>
                    </div>
        </div>
    </div>
</form>