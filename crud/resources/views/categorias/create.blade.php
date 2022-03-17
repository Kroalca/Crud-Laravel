@extends('layouts.app')
@section('content')
<div class="card mx-3">
    <div class="card-body">
        <h5 class="card-title">Añadir Categoria</h5>
        <form action="{{ url('/categorias') }}" method="post" enctype="multipart/form-data" onsubmit="return checkInputs()">
        @csrf
        @include('categorias.form')
        </form>
    </div>
</div>
@endsection