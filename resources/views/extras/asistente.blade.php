
<div id="asistenteWrapper">
    <!-- Botón e -->

<button id="asistenteBtn" class="rounded-circle shadow d-flex justify-content-center align-items-center p-0"
        style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; width: 56px; height: 56px; background-color: #ed1c2a; border: none;">
    <img src="{{ asset('images/minisopp.png') }}" alt="Bot" style="width: 28px; height: 28px;">
</button>
    <!-- Panel  -->
    <div id="asistenteBox" class="card shadow-sm"
         style="display: none; position: fixed; bottom: 90px; right: 20px; width: 360px; border-radius: 1rem; z-index: 999; max-height: 80vh; overflow-y: auto; font-family: 'Inter', sans-serif; box-shadow: 0 0 20px rgba(0,0,0,0.1); border: none;">
        <div class="card-header bg-danger text-white fw-semibold rounded-top" style="font-size: 16px;">
            Gestión del día 🧠
        </div>

        <div class="card-body" style="background-color: #fdfdfd; font-size: 14px;">
            <p>👋 <strong>Hola, guap@</strong><br>Este es tu resumen de hoy:</p>
            <hr>

            <p class="mb-1"><strong>📦 Inventario:</strong></p>
            <ul class="list-unstyled mb-2">
                <li><i class="bi bi-check-circle-fill text-success"></i> Disponibles: <span id="prodDisponibles">...</span></li>
                <li><i class="bi bi-exclamation-triangle-fill text-warning"></i> Stock bajo: <span id="prodBajoStock">...</span></li>
                <li><i class="bi bi-x-circle-fill text-danger"></i> Agotados: <span id="prodAgotados">...</span></li>
            </ul>

            <div style="height: 200px;">
                <canvas id="graficoInventario" style="max-height: 100%; width: 100%;"></canvas>
            </div>

            <p class="mb-1 mt-3"><strong>🧾 Pedidos:</strong></p>
            <ul class="list-unstyled mb-2">
                <li>📅 Hoy: <span id="pedidosHoy">...</span></li>
                <li>⏳ Pendientes: <span id="pedidosPendientes">...</span></li>
            </ul>

            <hr>
            <p class="mb-1"><strong>📝 Bloc de tareas personales:</strong></p>
            <div class="mb-2">
                <input type="text" id="nuevaTarea" class="form-control form-control-sm" placeholder="Escribe una tarea y presiona ➕">
            </div>
            <button class="btn btn-sm btn-outline-primary mb-3 w-100" onclick="agregarTarea()">➕ Agregar tarea</button>
            <ul id="listaTareas" class="list-unstyled small"></ul>
        </div>
    </div>
</div>


<style>
    #asistenteWrapper #asistenteBox::-webkit-scrollbar {
        width: 8px;
    }
    #asistenteWrapper #asistenteBox::-webkit-scrollbar-track {
        background: #f3f3f3;
        border-radius: 8px;
    }
    #asistenteWrapper #asistenteBox::-webkit-scrollbar-thumb {
        background-color: #ed1c2a;
        border-radius: 8px;
        border: 2px solid #f3f3f3;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const btn = document.getElementById("asistenteBtn");
    const box = document.getElementById("asistenteBox");

    btn.onclick = () => {
        box.style.display = box.style.display === "none" ? "block" : "none";

        fetch('/api/gestion-resumen')
            .then(res => res.json())
            .then(data => {
                document.getElementById("prodDisponibles").innerText = data.productosDisponibles;
                document.getElementById("prodAgotados").innerText = data.productosAgotados;
                document.getElementById("prodBajoStock").innerText = data.productosBajoStock;
                document.getElementById("pedidosHoy").innerText = data.pedidosHoy;
                document.getElementById("pedidosPendientes").innerText = data.pedidosPendientes;

                new Chart(document.getElementById("graficoInventario"), {
                    type: 'doughnut',
                    data: {
                        labels: ['Disponibles', 'Bajo stock', 'Agotados'],
                        datasets: [{
                            data: [data.productosDisponibles, data.productosBajoStock, data.productosAgotados],
                            backgroundColor: ['#4caf50', '#ff9800', '#f44336']
                        }]
                    },
                    options: { plugins: { legend: { position: 'bottom' } } }
                });
            });

        cargarTareas();
    };

    function cargarTareas() {
        const tareasGuardadas = JSON.parse(localStorage.getItem('tareasAdmin')) || [];
        const lista = document.getElementById("listaTareas");
        lista.innerHTML = '';
        tareasGuardadas.forEach((tarea, index) => {
            lista.innerHTML += `
                <li class="d-flex justify-content-between align-items-center border-bottom py-1">
                    <span>${tarea}</span>
                    <button class="btn btn-sm btn-danger" onclick="eliminarTarea(${index})">✖</button>
                </li>`;
        });
    }

    function agregarTarea() {
        const input = document.getElementById("nuevaTarea");
        const tarea = input.value.trim();
        if (tarea !== '') {
            const tareas = JSON.parse(localStorage.getItem('tareasAdmin')) || [];
            tareas.push(tarea);
            localStorage.setItem('tareasAdmin', JSON.stringify(tareas));
            input.value = '';
            cargarTareas();
        }
    }

    function eliminarTarea(index) {
        const tareas = JSON.parse(localStorage.getItem('tareasAdmin')) || [];
        tareas.splice(index, 1);
        localStorage.setItem('tareasAdmin', JSON.stringify(tareas));
        cargarTareas();
    }
</script>
