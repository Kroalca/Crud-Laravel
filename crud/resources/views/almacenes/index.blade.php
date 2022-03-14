@extends('layouts.app')
@section('content')
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
            @foreach($almacenes as $almacenes)
            <tr>            
                <td>{{ $almacenes->id }}</td>
                <td>{{ $almacenes->name }}</td>
                <td>{{ $almacenes->adress }}</td>
                <td class="d-flex">
                    <a class="btn btn-primary" href="{{ url('/almacenes/'.$almacenes->id.'/edit') }}">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <form action="{{ url('/almacenes/'.$almacenes->id) }}" method="post" class="ms-1">
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
    <a href="{{ url('/almacenes/create') }}"><i class="fa fa-plus-circle add" aria-hidden="true"></i></a>
@endsection
