<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    
    <style>
    .bd-placeholder-img{font-size:1.125rem;text-anchor:middle;-webkit-user-select:none;-moz-user-select:none;user-select:none}@media
    (min-width:
    768px){.bd-placeholder-img-lg{font-size:3.5rem}}.b-example-divider{width:100%;height:3rem;background-color:#0000001a;border:solid
    rgba(0,0,0,.15);border-width:1px 0;box-shadow:inset 0 .5em 1.5em #0000001a,inset 0 .125em .5em
    #00000026}.b-example-vr{flex-shrink:0;width:1.5rem;height:100vh}.bi{vertical-align:-.125em;fill:currentColor}.nav-scroller{position:relative;z-index:2;height:2.75rem;overflow-y:hidden}.nav-scroller
    .nav{display:flex;flex-wrap:nowrap;padding-bottom:1rem;margin-top:-1px;overflow-x:auto;text-align:center;white-space:nowrap;-webkit-overflow-scrolling:touch}.btn-bd-primary{--bd-violet-bg:
    #712cf9;--bd-violet-rgb: 112.520718, 44.062154, 249.437846;--bs-btn-font-weight: 600;--bs-btn-color:
    var(--bs-white);--bs-btn-bg: var(--bd-violet-bg);--bs-btn-border-color: var(--bd-violet-bg);--bs-btn-hover-color:
    var(--bs-white);--bs-btn-hover-bg: #6528e0;--bs-btn-hover-border-color: #6528e0;--bs-btn-focus-shadow-rgb:
    var(--bd-violet-rgb);--bs-btn-active-color: var(--bs-btn-hover-color);--bs-btn-active-bg:
    #5a23c8;--bs-btn-active-border-color: #5a23c8}.bd-mode-toggle{z-index:1500}.bd-mode-toggle
    .bi{width:1em;height:1em}.bd-mode-toggle .dropdown-menu .active .bi{display:block!important}

    body {
    font-family: 'Poppins', Arial, sans-serif;
    }

    .color-rojo1{
        background-color:#d7282f !important;
    }

    .color-grisclaro{
        background-color:#f3f3f3 !important;
    }

    
    
    </style>
</head>
<body>

<!-- NAV -->
<div class="px-3 py-2 border-bottom color-rojo1">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="#" class="nav-link text-secondary text-white fw-bold">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#table"></use>
                        </svg>
                        Pedidos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#people-circle"></use>
                        </svg>
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
        <nav class="col-md-3 sidebar d-flex flex-column p-3 color-grisclaro">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
            <use xlink:href="#bootstrap"></use>
          </svg>
          <span class="fs-4 fw-semibold">Sidebar</span>
        </a>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                <use xlink:href="#home"></use>
              </svg>
              Home
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                <use xlink:href="#speedometer2"></use>
              </svg>
              Dashboard
            </a>
          </li>
          <li>
            <a href="{{ route('caja.seleccionarCliente') }}" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                <use xlink:href="#table"></use>
              </svg>
              Orders
            </a>
          </li>
          <li>
            <a href=" {{route('productos.index') }}" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                <use xlink:href="#grid"></use>
              </svg>
              Products
            </a>
          </li>
          <li>
            <a href="{{ route('clientes.index') }}" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                <use xlink:href="#people-circle"></use>
              </svg>
              Customers
            </a>
          </li>
        </ul>
        <hr />
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
             data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2" />
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </nav>
        
        
        
        
        
        <!-- Hero -->
        <div class="col-md-9">
            <div class="container py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="bootstrap-themes.png"
                            class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                            loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">MINISO Manager
                        </h1>
                        <p class="lead">Bienvenido al Centro de Gestión MINISO, donde puedes administrar 
                            clientes, órdenes y productos fácilmente. Realiza operaciones CRUD para mantener 
                            tus datos organizados y actualizados.</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Features -->
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Funcionalidades</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em" aria-hidden="true">
                            <use xlink:href="#toggles2"></use>
                        </svg> </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Pedidos</h3>
                        <p>Crea y visualiza órdenes. No se pueden editar ni borrar para mantener la
                             integridad de los registros.</p> 
                             <a href="#"
                            class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em" aria-hidden="true">
                            <use xlink:href="#cpu-fill"></use>
                        </svg> </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Productos</h3>
                        <p>Gestiona productos: crea, visualiza, edita y elimina para mantener tu 
                            catálogo actualizado.</p> <a href="#"
                            class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em" aria-hidden="true">
                            <use xlink:href="#tools"></use>
                        </svg> </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Clientes</h3>
                        <p>Administra clientes con opciones para crear, visualizar, editar y 
                            borrar sus datos fácilmente.</p> <a href="#"
                            class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
            </div>
        </div>



        </div>
        

<!--FOOTER-->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center"> <a href="/"
                    class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1" aria-label="Bootstrap"> <svg
                        class="bi" width="30" height="24" aria-hidden="true">
                        <use xlink:href="#bootstrap"></use>
                    </svg> </a> <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2025 Miniso Company, Inc</span> </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="#" aria-label="Instagram"><svg class="bi"
                            width="24" height="24" aria-hidden="true">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#" aria-label="Facebook"><svg class="bi"
                            width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </footer>
    </div>






    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" 
crossorigin="anonymous"></script>
</body>
</html>