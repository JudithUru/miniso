<div class="mb-3">
    <label for="nombre_producto" class="form-label">Nombre:</label>
    <input type="text" name="nombre_producto" class="form-control" value="{{ old('nombre_producto', optional($producto)->nombre_producto) }}" required>
</div>

<div class="mb-3">
    <label for="tipo" class="form-label">Tipo:</label>
    <select name="tipo" class="form-control" required>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo }}" {{ old('tipo', optional($producto)->tipo) == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad:</label>
    <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad', optional($producto)->cantidad) }}" required>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio:</label>
    <input type="number" name="precio" class="form-control" step="0.01" value="{{ old('precio', optional($producto)->precio) }}" required>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado:</label>
    <select name="estado" class="form-control" required>
        @foreach($estados as $estado)
            <option value="{{ $estado }}" {{ old('estado', optional($producto)->estado) == $estado ? 'selected' : '' }}>{{ $estado }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="imagen" class="form-label">URL de Imagen (opcional):</label>
    <input type="url" name="imagen" class="form-control" value="{{ old('imagen', optional($producto)->imagen) }}">

    @if(!empty($producto) && $producto->imagen)
        <img src="{{ $producto->imagen }}" alt="Imagen actual" width="100" class="mt-2">
    @endif
</div>