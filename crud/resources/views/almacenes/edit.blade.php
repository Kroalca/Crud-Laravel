@extends('layouts.app')
@section('content')
<div class="card mx-3">
    <div class="card-body">
        <h5 class="card-title">Editar Almacen</h5>
        <form action="{{ url('/almacenes/'.$almacen->id) }}" method="post" enctype="multipart/form-data" onsubmit="return checkInputs()">
        @csrf
        {{ method_field('PATCH') }}
        @include('almacenes.form')
        </form>
    </div>
</div>
@endsection