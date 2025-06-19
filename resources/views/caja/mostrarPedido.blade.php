@extends('extras.asistente')
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ver Pedidos</title>

        <script src="assets/js/color-modes.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
        <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Miniso_logo.svg/1648px-Miniso_logo.svg.png" type="image/png">

        <style>
            body {
                font-family: 'Poppins', Arial, sans-serif;
            }
            main {
                min-height: calc(100vh - 178px); 
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .color-rojo1 {
                background-color: #d7282f !important;
            }

            .color-grisclaro {
                background-color: #f3f3f3 !important;
            }

            .color-textoblanco {
                color:rgb(255, 255, 255) !important;
            }

            /* Para centrar y controlar tamaño máximo de la imagen hero */
            .hero-img-container {
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 700px;
                max-height: 500px;
                margin: 0 auto;
                overflow: hidden;
                /* Evita que la imagen se salga si es muy grande */
            }

            .hero-img-container img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
                display: block;
            }

            .boton-rojo {
                background-color: #d7282f !important;
                color: white !important;
                border: none !important;
                box-shadow: none !important;
            }

            .boton-rojo:hover {
                background-color: #b71f27 !important; /* Un rojo más oscuro al pasar el mouse */
                color: white !important;
            }

            .boton-rojo:focus, .boton-rojo:active {
                outline: none !important;
                box-shadow: none !important;
            }

            .nav-activo {
                background-color:rgb(183, 0, 0);
                border-radius: 0.5rem;
            }

            .hover-nav:hover {
                background-color: #e6e6e6 !important;
                border-radius: 0.5rem;
            }
        </style>
    </head>

<body>
    <!-- NAV -->
    <div class="px-3 py-2 border-bottom color-rojo1">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="https://victoriaplace.co.uk/wp-content/uploads/2024/12/white-and-black-logo@1080x-871x1024.png" alt="Logo Miniso" height="40" class="me-4" />
                <span class="fs-4 fw-bold text-white">MINISO</span>
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="/" class="nav-link text-secondary text-white text-center">
                            <i class="bi bi-house-fill mb-1" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
                            Home
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link text-secondary text-white text-center">
                            <i class="bi bi-bar-chart-fill mb-1" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('caja.seleccionarCliente') }}" class="nav-link text-secondary text-white fw-bold text-center">
                            <i class="bi bi-cart-fill mb-1 nav-activo" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
                            </i>
                            Pedidos
                        </a>
                    </li>
                    <li>
                        <a href="{{route('productos.index') }}" class="nav-link text-secondary text-white text-center">
                            <i class="bi bi-grid-fill mb-1" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.index') }}" class="nav-link text-secondary text-white text-center">
                            <i class="bi bi-person-circle mb-1" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
                            Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- LAYOUT: Sidebar y Hero al lado -->
    <div class="container-fluid" >
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar d-flex flex-column p-3 color-grisclaro" aria-label="Sidebar menu">
                <a
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <i class="bi bi-list me-2" width="40" height="32" aria-hidden="true"></i>
                    <span class="fs-4 fw-semibold">Menu</span>
                </a>
                <hr />
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link link-body-emphasis hover-nav" aria-current="page">
                            <i class="bi bi-house-fill me-2" width="16" height="16" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link link-body-emphasis hover-nav">
                            <i class="bi bi-bar-chart-fill me-2" width="16" height="16" aria-hidden="true">
                            </i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('caja.seleccionarCliente') }}" class="nav-link active color-rojo1">
                            <i class="bi bi-cart-fill me-2" width="16" height="16" aria-hidden="true"></i>
                            Pedidos
                        </a>
                    </li>
                    <li>
                        <a href="{{route('productos.index') }}" class="nav-link link-body-emphasis hover-nav">
                            <i class="bi bi-grid-fill me-2" width="16" height="16" aria-hidden="true"></i>
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.index') }}" class="nav-link link-body-emphasis hover-nav">
                            <i class="bi bi-person-circle me-2" width="16" height="16" aria-hidden="true"></i>
                            Clientes
                        </a>
                    </li>
                </ul>
                <hr/>
            </nav>

        
            <main class="col-md-10 overflow-auto">
            <div class="container px-4 px-lg-5 mt-5 flex-grow-1 d-flex flex-column justify-content-between">
                
                <h2>Pedidos del Cliente: {{ $cliente->nombre_cliente }}</h2>
                
                
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                    <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-primary boton-rojo">
                        ← Volver a Inicio Pedidos
                    </a>

                    <form method="GET" class="d-flex align-items-center gap-3 flex-wrap">
                        <input type="hidden" name="cliente_id" value="{{ $clienteId }}">

                        <div class="d-flex flex-column">
                            <label for="estado" class="form-label mb-0 fw-semibold">Estado</label>
                            <select name="estado" id="estado" class="form-select" onchange="this.form.submit()">
                                <option value="">Todos</option>
                                <option value="Pendiente" {{ request('estado') === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Finalizado" {{ request('estado') === 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            </select>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="orden" class="form-label mb-0 fw-semibold">Ordenar por</label>
                            <select name="orden" id="orden" class="form-select" onchange="this.form.submit()">
                                <option value="desc" {{ request('orden') === 'desc' ? 'selected' : '' }}>Más reciente</option>
                                <option value="asc" {{ request('orden') === 'asc' ? 'selected' : '' }}>Más antiguo</option>
                            </select>
                        </div>
                    </form>
                </div>

                @if($pedidos->isEmpty())
                    <p>Este cliente no tiene pedidos registrados.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle table-hover shadow-sm">
                        <thead class="table-light">
                            <tr>
                                <th>ID Pedido</th>
                                <th>Fecha de creacion</th>
                                <th>Fecha de actualización</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Método de Pago</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td class="fw-semibold">{{ $pedido->id }}</td>
                                    <td>{{ $pedido->created_at }}</td>
                                    <td>{{ $pedido->updated_at }}</td>
                                    <td>${{ number_format($pedido->total, 2) }}</td>
                                    <td>
                                    @if($pedido->estado === 'Finalizado')
                                    <span class="badge bg-success">{{ $pedido->estado }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $pedido->estado }}</span>
                                @endif
                                    </td>
                                    <td>{{ $pedido->metodo_pago ?? 'No definido' }}</td>
                                    <td class="text-center">
                                        @if ($pedido->estado !== 'Finalizado')
                                            <!-- <a href="{{ route('caja.pedido', $pedido->id) }}" class="btn btn-primary btn-sm">Editar</a> --> 
                                            <a href="{{ route('caja.pedido', $pedido->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @else
                                            <!-- <button class="btn btn-secondary btn-sm" disabled>Finalizado</button> -->
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                <i class="bi bi-check-lg"></i> 
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>



                </div>
            </main>

        </div>
            <!-- FOOTER -->
            <div class=" color-rojo1">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top px-0">
                    <div class="col-md-4 ms-4 d-flex align-items-center my-1">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 text-white text-decoration-none">
                            <img src="https://victoriaplace.co.uk/wp-content/uploads/2024/12/white-and-black-logo@1080x-871x1024.png" height="40" />
                        </a>
                    <span class="ms-3 text-body-secondary color-textoblanco">© 2025 Miniso Manager, Inc.</span>
                    </div>

                </footer>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

            <!-- SVG symbols -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

                <symbol id="speedometer2" viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3.707l2.349 1.175a.5.5 0 1 1-.448.894l-2.5-1.25A.5.5 0 0 1 7.5 8V4.5A.5.5 0 0 1 8 4z" />
                </symbol>
                <symbol id="table" viewBox="0 0 16 16">
                    <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm1 2v6h14V5H1z" />
                </symbol>
                <symbol id="grid" viewBox="0 0 16 16">
                    <path
                        d="M3 3h2v2H3V3zm0 3h2v2H3V6zm0 3h2v2H3v-2zm3-6h2v2H6V3zm0 3h2v2H6V6zm0 3h2v2H6v-2zm3-6h2v2h-2V3zm0 3h2v2h-2V6zm0 3h2v2h-2v-2z" />
                </symbol>
                <symbol id="people-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM14 8a6 6 0 1 1-12 0 6 6 0 0 1 12 0z" />
                </symbol>
                <symbol id="toggles2" viewBox="0 0 16 16">
                    <path
                        d="M4 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM12 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </symbol>
                <symbol id="cpu-fill" viewBox="0 0 16 16">
                    <path d="M4 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z" />
                </symbol>
                <symbol id="tools" viewBox="0 0 16 16">
                    <path d="M1 2l4 4-3 3-4-4v-3h3zM11 12l4-4-3-3-4 4v3h3z" />
                </symbol>

            </svg>
            <script>
                setTimeout(() => {
                    let alert = document.querySelector('.alert');
                    if (alert) {
                        alert.remove();
                    }
                }, 4000); // 4 segundos
            </script>
    </body>

</html>
