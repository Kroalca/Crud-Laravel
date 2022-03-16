<input type="text" minlength="5" name="name" id="name" placeholder="Nombre" value="{{ isset($almacen->name) ? $almacen->name : '' }}" class="form-control" required>
<input type="text" minlength="5" name="adress" id="adress" placeholder="Dirección" value="{{ isset($almacen->adress) ? $almacen->adress : '' }}" class="form-control mt-2" required>
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary  mt-2">Guardar</button>
</div>