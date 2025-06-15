<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Seleccionar Cliente</h1>

    <form action="{{ route('caja.crearPedido') }}" method="POST">
        @csrf
        <select name="cliente_id" required>
            <option value="" disabled selected>-- Selecciona un cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{$cliente->cedula}} - {{$cliente->nombre_cliente}}</option>
            @endforeach
        </select>
        <button type="submit">Crear Pedido</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"
    ></script>
</body>
</html>