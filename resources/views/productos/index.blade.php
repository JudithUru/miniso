@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">📦 Lista de Productos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Agregar Producto
        </a>
        <span class="text-muted">Total: {{ $productos->count() }} productos</span>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td class="fw-semibold">{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->tipo }}</td>
                        <td>
                            @if($producto->cantidad == 0)
                                <span class="badge bg-danger">Agotado</span>
                            @elseif($producto->cantidad < 5)
                                <span class="badge bg-warning text-dark">Bajo stock ({{ $producto->cantidad }})</span>
                            @else
                                {{ $producto->cantidad }}
                            @endif
                        </td>
                        <td>$ {{ number_format($producto->precio, 2) }}</td>
                        <td>
                            @if($producto->estado === 'Disponible')
                                <span class="badge bg-success">{{ $producto->estado }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $producto->estado }}</span>
                            @endif
                        </td>
                        <td>
                            @if($producto->imagen)
                                <img src="{{ $producto->imagen }}" alt="Imagen" width="50" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar producto?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
