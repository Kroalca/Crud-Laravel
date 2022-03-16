@extends('layouts.app')
@section('content')
<div class="card mx-3">
    <div class="card-body">
        <h5 class="card-title">Editar Categoria</h5>
        <form action="{{ url('/categorias/'.$categoria->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('categorias.form')
        </form>
    </div>
</div>
@endsection