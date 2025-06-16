    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente', $cliente->nombre_cliente ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $cliente->cedula ?? '') }}" required>
        </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
</div>
