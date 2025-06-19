@extends('layouts.app')
@include('extras.asistente')

@section('content')
<div class="container col-md-8 col-lg-6">
    <h2 class="fw-bold mb-4"> Agregar Producto</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ups, algo salió mal:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        {{-- Nombre --}}
        <div class="mb-3">
            <label for="nombre_producto" class="form-label"> Nombre</label>
            <input type="text" name="nombre_producto" class="form-control" value="{{ old('nombre_producto') }}" required>
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label"> Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="" disabled selected>Selecciona una categoría</option>
                <option value="Textiles">Textiles</option>
                <option value="Productos de belleza">Productos de belleza</option>
                <option value="Papelería">Papelería</option>
                <option value="Juguetería">Juguetería</option>
                <option value="Hogar">Hogar</option>
                <option value="Bolsos y Accesorios">Bolsos y Accesorios</option>
                <option value="Electrónicos">Electrónicos</option>
            </select>
        </div>

        {{-- Cantidad --}}
        <div class="mb-3">
            <label for="cantidad" class="form-label"> Cantidad</label>
            <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}" min="0" required>
        </div>

        {{-- Precio --}}
        <div class="mb-3">
            <label for="precio" class="form-label"> Precio</label>
            <input type="number" name="precio" class="form-control" value="{{ old('precio') }}" min="0" step="0.01" required>
        </div>

        {{-- Estado --}}
        <div class="mb-3">
            <label for="estado" class="form-label"> Estado</label>
            <select name="estado" class="form-select" required>
                <option value="Disponible" selected>Disponible</option>
                <option value="No disponible">No disponible</option>
            </select>
        </div>

        {{-- Imagen --}}
        <div class="mb-4">
            <label for="imagen" class="form-label"> URL de Imagen (opcional)</label>
            <input type="url" name="imagen" class="form-control" placeholder="https://...">
        </div>

        <button type="submit" class="btn btn-success w-100">
            <i class="bi bi-check-circle"></i> Guardar Producto
        </button>
    </form>
</div>
@endsection
