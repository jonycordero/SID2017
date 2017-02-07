<div class="hidden">
    <input id="id" name="id">
</div>
<div class="row">
<div class="form-group  col-sm-6">
    <label >Monto total</label>
    <div class="input-group">
        <input name="monto_total" id="monto_total" type="number" class="form-control" placeholder="Inserte el monto total" aria-label="Amount (to the nearest dollar)">  
    </div>
</div>
    <br>
    <a class="btn btn-primary " id="btnGenerarDescuento" >Generar descuento</a>
</div>

<div class="form-group ">
    <label >Tipo pago</label>
    <div class="input-group">

        <select class="form-control" name="tipo_pago" id="estado_pago" >
            <option value="contado">Contado</option>
            <option value="credito">Credito</option>    
        </select>

    </div>
</div>

<div class="form-group ">
    <label >Estado pago</label>
    <div class="input-group">
        <select class="form-control" name="estado_pago" id="estado_pago" >
            <option value="1">Cancelado</option>
            <option value="0">Deuda</option>    
        </select>

    </div>
</div>

<div class="form-group ">
    <label >Descuento</label>
    <div class="input-group">
        <span class="input-group-addon">S/.</span>
        <input name="descuento" id="descuento" type="number" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)" >

    </div>
</div>

<div class="form-group ">
    <label >Monto con descuento</label>
    <div class="input-group">
        <span class="input-group-addon">S/.</span>
        <input name="monto_con_descuento" id="monto_con_descuento" type="number" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)" >
    </div>
</div>