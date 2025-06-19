@extends('layouts.app')
@include('extras.asistente')

@section('content')
<div class="container col-md-8 col-lg-6">
    <h2 class="fw-bold mb-4">
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

    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Campos del formulario --}}
            @include('productos.form', ['producto' => $producto])

         <div class="mt-3 text-end">
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-check-circle"></i> Actualizar Productos
                </button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-2 w-100">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
