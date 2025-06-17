<div class="container">
    <h2>Pedidos del Cliente: {{ $cliente->nombre_cliente }}</h2>

    @if($pedidos->isEmpty())
        <p>Este cliente no tiene pedidos registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Método de Pago</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->created_at }}</td>
                        <td>${{ number_format($pedido->total, 2) }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ $pedido->metodo_pago ?? 'No definido' }}</td>
                        <!-- <td>
                            <a href="{{ route('caja.pedido', $pedido->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        </td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-secondary">← Volver</a>
</div>
