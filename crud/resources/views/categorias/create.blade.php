<form action="{{ url('/categorias') }}" method="post" enctype="multipart/form-data">
@csrf
    <input type="text" name="name" id="name" placeholder="Nombre" required>
    <button type="submit">Crear</button>
</form>