@extends('layouts.app')
@section('content')
<div class="card mx-3">
    <div class="card-body">
        <h5 class="card-title">Añadir Almacen</h5>
        <form action="{{ url('/almacenes') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('almacenes.form')
        </form>
    </div>
</div>
@endsection