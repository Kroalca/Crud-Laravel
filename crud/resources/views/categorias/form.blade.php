<input type="text" minlength="3" name="name" id="name" placeholder="Nombre" value="{{ isset($categoria->name) ? $categoria->name : '' }}" class="form-control" required>
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary  mt-2">Guardar</button>
</div>