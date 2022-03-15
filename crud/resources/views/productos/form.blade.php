<input type="text" name="name" id="name" placeholder="Nombre" value="{{ isset($producto->name) ? $producto->name : '' }}" class="form-control" required>
<input type="number" min="0.01" step='0.01' name="price" id="price" placeholder="Precio" value="{{ isset($producto->price) ? $producto->price : '' }}" class="form-control mt-2" required>
<div class="form-floating mt-2">
    <select class="form-select" aria-label="Categoria" id="id_categorias" name="id_categorias">
        @foreach($categorias as $categoria)
        @if(isset($producto->id_categorias) && $categoria->id===$producto->id_categorias)
        <option selected value="{{ $categoria->id }}">{{  $categoria->name }}</option>
        @else
        <option value="{{ $categoria->id }}">{{  $categoria->name }}</option>
        @endif
        @endforeach
    </select>
    <label for="id_categorias">Categoria</label>
</div>
<div class="form-floating mt-2">
    <textarea class="form-control" id="comments" name="comments" style="height: 150px">{{ isset($producto->comments) ? $producto->comments : '' }}</textarea>
    <label for="comments">Observaciones</label>
</div>
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary  mt-2">Guardar</button>
</div>