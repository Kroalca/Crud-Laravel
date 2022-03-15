@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar Producto</h5>
        <form action="{{ url('/productos/'.$producto->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('productos.form')
        </form>
    </div>
</div>
@endsection