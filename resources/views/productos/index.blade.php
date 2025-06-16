<div class="container">
        <h1>Lista de Productos</h1>

        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->tipo }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>$ {{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>
                            @if($producto->imagen)
                                <img src="{{ $producto->imagen }}" alt="Imagen" width="50">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>