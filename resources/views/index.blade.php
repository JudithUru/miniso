<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Miniso Manger</title>

    <script src="assets/js/color-modes.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Miniso_logo.svg/1648px-Miniso_logo.svg.png" type="image/png">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
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
                        <a href="/" class="nav-link text-secondary text-white fw-bold text-center">
                            <i class="bi bi-house-fill mb-1 nav-activo" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
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
                        <a href="{{ route('caja.seleccionarCliente') }}" class="nav-link text-secondary text-white text-center">
                            <i class="bi bi-cart-fill mb-1" style="font-size: 24px; display: block; margin: 0 auto;" aria-hidden="true"></i>
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
    <div class="container-fluid">
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
                        <a href="/" class="nav-link active color-rojo1" aria-current="page">
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
                        <a href="{{ route('caja.seleccionarCliente') }}" class="nav-link link-body-emphasis hover-nav">
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
                <hr />
            </nav>

            <!-- Hero -->
            <main class="col-md-10">
                <div class="container py-5 px-4 px-lg-5">
                    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6 hero-img-container">
                            <!-- <img src="https://media.fashionnetwork.com/cdn-cgi/image/format=auto/m/6c67/7cb7/5ca2/01bc/1237/57f4/623c/d32d/aa4b/4e53/4e53.jpg" alt="Fondo" /> -->
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
                            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 boton-rojo">
                                    Primary
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                                    Default
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="container py-5 px-4 px-lg-5" id="hanging-icons">
                    <h2 class="pb-2 border-bottom">Funcionalidades</h2>
                    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                        <div class="col d-flex align-items-start">
                            <div
                                class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                <i class="bi bi-bag-fill" width="1em" height="1em" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="fs-2 text-body-emphasis">Pedidos</h3>
                                <p>
                                    Crea y visualiza órdenes. No se pueden editar ni borrar para
                                    mantener la integridad de los registros.
                                </p>
                                <a href="{{ route('caja.seleccionarCliente') }}" class="btn btn-primary boton-rojo">Ir a Pedidos</a>
                            </div>
                        </div>
                        <div class="col d-flex align-items-start">
                            <div
                                class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                <i class="bi bi-person-fill" width="1em" height="1em" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="fs-2 text-body-emphasis">Clientes</h3>
                                <p>
                                    Puedes añadir, modificar y eliminar clientes para mantener
                                    tu base actualizada.
                                </p>
                                <a href="{{ route('clientes.index') }}" class="btn btn-primary boton-rojo">Ir a Clientes</a>
                            </div>
                        </div>
                        <div class="col d-flex align-items-start">
                            <div
                                class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                <i class="bi bi-heart-fill" width="1em" height="1em" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="fs-2 text-body-emphasis">Productos</h3>
                                <p>
                                    Agrega, edita y elimina productos para mantener tu catálogo actualizado y ofrecer lo mejor.
                                </p>
                                <a href="{{route('productos.index') }}" class="btn btn-primary boton-rojo">Ir a Productos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <!-- FOOTER -->
            <div class="container color-rojo1">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top ">
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



</body>

</html>