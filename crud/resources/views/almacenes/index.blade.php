@extends('layouts.app')
@section('content')
    <div class="mx-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($almacenes as $almacen)
                <tr>            
                    <td>{{ $almacen->id }}</td>
                    <td>{{ $almacen->name }}</td>
                    <td>{{ $almacen->adress }}</td>
                    <td class="d-flex">
                        <a class="btn btn-success" href="{{ url('/almacenes/'.$almacen->id.'/addProductos') }}">
                            Añadir productos
                        </a>
                        <a class="btn btn-primary ms-1" href="{{ url('/almacenes/'.$almacen->id.'/edit') }}">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <form action="{{ url('/almacenes/'.$almacen->id) }}" method="post" class="ms-1">
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
    </div>
    <a href="{{ url('/almacenes/create') }}"><i class="fa fa-plus-circle add" aria-hidden="true"></i></a>
@endsection
