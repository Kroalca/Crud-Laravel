@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>            
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection