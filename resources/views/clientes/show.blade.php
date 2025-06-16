
    <div class="container">
        <h1>Detalle del Cliente</h1>
        <p><strong>Nombre:</strong> {{ $cliente->nombre_cliente }}</p>
        <p><strong>Cédula:</strong> {{ $cliente->cedula }}</p>

        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>