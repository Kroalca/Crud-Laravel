@extends('layouts.app')
@section('content')
    <div class="mx-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>            
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td class="d-flex">
                        <a class="btn btn-primary" href="{{ url('/categorias/'.$categoria->id.'/edit') }}">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <form action="{{ url('/categorias/'.$categoria->id) }}" method="post" class="ms-1">
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
    <a href="{{ url('/categorias/create') }}"><i class="fa fa-plus-circle add" aria-hidden="true"></i></a>
@endsection
