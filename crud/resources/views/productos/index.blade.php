@extends('layouts.app')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>            
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->categoriaName }}</td>
                <td>{{ $producto->price }}€</td>
                <td class="d-flex">
                    <a class="btn btn-primary" href="{{ url('/productos/'.$producto->id.'/edit') }}">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <form action="{{ url('/productos/'.$producto->id) }}" method="post" class="ms-1">
                    @csrf
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/productos/create') }}"><i class="fa fa-plus-circle add" aria-hidden="true"></i></a>
@endsection
