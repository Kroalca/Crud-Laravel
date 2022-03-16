@extends('layouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-danger mx-3 alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{ $errors->first() }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card mx-3">
    <div class="card-body">
        <h5 class="card-title">Añadir Productos al Almacen</h5>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{ isset($almacen->name) ? $almacen->name : '' }}" class="form-control" required disabled>
        <form action="{{ url('/almacenes/'.$almacen->id.'/storeProductos') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-floating mt-2">
                <input type="number" name="id_almacenes" id="id_almacenes" value="{{ isset($almacen->id) ? $almacen->id : '' }}" class="form-control visually-hidden" required disabled>
                <select class="form-select" aria-label="Productos" id="id_productos" name="id_productos">
                    @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{  $producto->name }}</option>
                    @endforeach
                </select>
                <label for="id_categorias">Productos</label>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary  mt-2">Guardar</button>
            </div>
        </form>
    </div>
</div>
<div class="mx-3 py-4">
    <div class="row mx-0">
        @foreach($allProductos as $productoAlmacen)
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body d-flex d-flex justify-content-between align-items-center">
                    <h3>{{ $productoAlmacen->producto }}</h3>
                    <form action="{{ url('/almacenes/'.$almacen->id.'/'.$productoAlmacen->id_productos) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection