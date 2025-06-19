@extends('layouts.app')
@include('extras.asistente')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-bold">
        <i class="bi bi-pencil-square text-warning"></i> Editar Producto
    </h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            @include('productos.form', ['producto' => $producto])

            <div class="text-end">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-repeat"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection