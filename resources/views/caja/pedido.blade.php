
    <h1>Pedido #{{ $pedido->id }} - Cliente: {{ $pedido->cliente->nombre }}</h1>

    <h2>Agregar Producto</h2>
    <form action="{{ route('pedidoProducto.store', $pedido->id) }}" method="POST">
        @csrf
        <select name="producto_id" required>
            <option value="" disabled selected>-- Selecciona un producto --</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</option>
            @endforeach
        </select>

        <input type="number" name="cantidad" value="1" min="1" required>

        <button type="submit">Agregar al pedido</button>
    </form>

    <h2>Productos en el pedido</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>
                        <form action="{{ route('pedidoProducto.update', [$pedido->id, $producto->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="{{ $producto->pivot->cantidad }}" min="1" style="width: 60px;">
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                    <td>${{ number_format($producto->pivot->cantidad * $producto->pivot->precio_unitario, 2) }}</td>
                    <td>
                        <form action="{{ route('pedidoProducto.destroy', [$pedido->id, $producto->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: ${{ number_format($pedido->total, 2) }}</h3>

    <form action="{{ route('caja.finalizarPedido', $pedido->id) }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('¿Finalizar pedido?')">Finalizar Pedido</button>
    </form>

    <a href="{{ route('caja.seleccionarCliente') }}">Volver a seleccionar cliente</a>