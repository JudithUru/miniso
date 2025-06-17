 <div class="container">
        <h1>Editar Producto</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            @include('productos.form', ['producto' => $producto])

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>