@extends('layouts.app')

@section('content')
<div class="container py-5 px-4 px-lg-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6 hero-img-container">
            <img src="{{ asset('images/fondo.jpg') }}" alt="Fondo" />
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
                MINISO Manager
            </h1>
            <p class="lead">
                Bienvenido al Centro de Gestión MINISO, donde puedes administrar
                clientes, órdenes y productos fácilmente. Realiza operaciones CRUD
                para mantener tus datos organizados y actualizados.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-primary btn-lg px-4 me-md-2">Pedidos</a>
                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-lg px-4">Productos</a>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 px-4 px-lg-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Funcionalidades</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                <i class="bi bi-bag-fill" aria-hidden="true"></i>
            </div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Pedidos</h3>
                <p>Crea y visualiza órdenes. No se pueden editar ni borrar para mantener la integridad de los registros.</p>
                <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-primary">Ver Pedidos</a>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                <i class="bi bi-person-fill" aria-hidden="true"></i>
            </div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Clientes</h3>
                <p>Puedes añadir, modificar y eliminar clientes para mantener tu base actualizada.</p>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver Clientes</a>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                <i class="bi bi-heart-fill" aria-hidden="true"></i>
            </div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Productos</h3>
                <p>Agrega, edita y elimina productos para mantener tu catálogo actualizado.</p>
                <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>
    </div>
</div>
@endsection
