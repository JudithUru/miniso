<div class="container">
    <h3>Seleccionar Cliente</h3>

     <!-- @if(isset($clienteId))
    <div class="mb-3">
        <a href="{{ route('caja.crearPedido') }}?cliente_id={{ $clienteId }}" class="btn btn-success">
            Crear Nuevo Pedido
        </a>
    </div>
@endif -->

@if(isset($clienteId))
    <form action="{{ route('caja.crearPedido') }}" method="POST">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $clienteId }}">
        <button type="submit" class="btn btn-success">
            Crear Nuevo Pedido
        </button>
    </form>
      <!-- Botón para ver pedidos del cliente -->
        <a href="{{ url('/caja/cliente/' . $clienteId) }}" class="btn btn-primary">
            Ver Pedidos del Cliente
        </a>
@endif


    <form method="GET" id="form-cliente" action="">
        <div class="row mb-3">
            <div class="col-md-8">
                <select name="cliente_id" class="form-control" onchange="verPedidosCliente(this.value)">
                    <option value="">-- Seleccione un cliente --</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ isset($clienteId) && $clienteId == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre_cliente }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

</div>
<script>
function verPedidosCliente(clienteId) {
    if (clienteId) {
        const url = "{{ url('/caja/seleccionar-cliente') }}?cliente_id=" + clienteId;
        window.location.href = url;
    }
}

</script>