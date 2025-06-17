More actions
<div class="container">
    <h1>Crear Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups...</strong> Corrige los errores para continuar:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required value="{{ old('nombre_cliente') }}">
        </div>

        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" required value="{{ old('cedula') }}">
        </div>

        <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo electrónico</label>
            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required value="{{ old('correo_electronico') }}">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"
    ></script>