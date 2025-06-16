
<div class="container">
    <h2>Pedido #{{ $pedido->id }}</h2>
    <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre_cliente ?? 'Sin cliente' }}</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h4>Agregar Producto</h4>
    <form method="POST" action="{{ route('pedidoProducto.store', $pedido->id) }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <select name="producto_id" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ $producto->precio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" min="1" value="1" required>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success w-100">Agregar</button>
            </div>
        </div>
    </form>

    <h4>Productos en el Pedido</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                    <td>${{ number_format($producto->pivot->cantidad * $producto->pivot->precio_unitario, 2) }}</td>
                    <td>
                        <!-- Quitar producto -->
                        <form method="POST" action="{{ route('pedidoProducto.destroy', [$pedido->id, $producto->id]) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Quitar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Total del pedido: ${{ number_format($pedido->total, 2) }}</h5>

    <form action="{{ route('caja.finalizarPedido', $pedido->id) }}" method="POST" onsubmit="return confirm('¿Deseas finalizar este pedido?');">
    @csrf

    <div class="form-group mb-2">
        <label for="metodo_pago">Método de Pago</label>
        <select name="metodo_pago" class="form-control" required>
            <option value="">-- Seleccione método de pago --</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
            <option value="Transferencia">Transferencia</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Finalizar Pedido
    </button>
</form>
</div>
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 4000); // 4 segundos
</script>