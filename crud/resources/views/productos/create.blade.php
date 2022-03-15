@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Añadir Producto</h5>
        <form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('productos.form')
        </form>
    </div>
</div>
@endsection