@extends('layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">Dashboard de Gestión</h2>

    {{-- Indicadores principales --}}
    <div class="row justify-content-center text-center mb-4">
        <div class="col-md-3">
            <div class="overview-box bg-gradient-1">
                <div class="overview-icon"><i class="bi bi-person-fill"></i></div>
                <div class="overview-number">{{ $totalClientes }}</div>
                <div class="overview-label">Clientes totales</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="overview-box bg-gradient-2">
                <div class="overview-icon"><i class="bi bi-cart-fill"></i></div>
                <div class="overview-number">{{ $totalPedidos }}</div>
                <div class="overview-label">Pedidos totales</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="overview-box bg-gradient-4">
                <div class="overview-icon"><i class="bi bi-cash-stack"></i></div>
                <div class="overview-number">${{ number_format($ingresoTotal, 2) }}</div>
                <div class="overview-label">Ingresos totales</div>
            </div>
        </div>
    </div>

    {{-- Gráficos --}}
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card card-modern shadow-sm p-3">
                <h6 class="text-muted mb-2">Top 5 productos más vendidos</h6>
                <div>
                    <canvas id="graficoTopProductos" height="150"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card card-modern shadow-sm p-3">
                <h6 class="fw-bold text-dark mb-3">Ingresos por categoría</h6>
                <div class="d-flex align-items-center">
                    <div>
                        <ul class="list-unstyled me-4">
                            @foreach($ingresoPorCategoria as $index => $cat)
                                <li class="mb-2 d-flex align-items-center">
                                    <span class="legend-dot me-2" style="background-color: {{ $colores[$index] ?? '#ccc' }}"></span>
                                    {{ $cat->categoria }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <canvas id="graficoCategorias" width="150" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold">📈 Ingresos diarios (últimos 30 días)</div>
        <canvas id="graficoIngresosDiarios" height="200"></canvas>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const productos = @json($topProductos);
    const categorias = @json($ingresoPorCategoria);
    const colores = @json($colores);
    const ingresos = @json($ingresosDiarios);

    new Chart(document.getElementById('graficoTopProductos'), {
        type: 'bar',
        data: {
            labels: productos.map(p => p.nombre),
            datasets: [{
                data: productos.map(p => p.total_vendidos),
                backgroundColor: [
  '#d72828',
  '#e33434',
  '#f04747',
  '#ff5c5c',
  '#ff7777'
],
                borderRadius: 6,
                barThickness: 20
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#999', font: { size: 12 } }
                },
                y: {
                    display: false
                }
            }
        }
    });

    new Chart(document.getElementById('graficoCategorias'), {
        type: 'doughnut',
        data: {
            labels: categorias.map(c => c.categoria),
            datasets: [{
                data: categorias.map(c => c.total),
                backgroundColor: colores
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { display: false }
            }
        }
    });

    new Chart(document.getElementById('graficoIngresosDiarios'), {
        type: 'line',
        data: {
            labels: ingresos.map(i => i.fecha),
            datasets: [{
                label: 'Ingresos ($)',
                data: ingresos.map(i => i.total),
                fill: true,
            borderColor: '#e52d27',
            backgroundColor: 'rgba(229, 45, 39, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
