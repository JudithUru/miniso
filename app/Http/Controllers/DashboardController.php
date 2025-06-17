<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


public function index()
{
    // Indicadores
    $totalPedidos = DB::table('pedidos')->count();
    $ingresoTotal = DB::table('pedidos')->sum('total');
    $totalClientes = DB::table('clientes')->count();

    // Top 5 productos más vendidos
    $topProductos = DB::table('pedido_producto')
        ->join('productos', 'pedido_producto.producto_id', '=', 'productos.id')
        ->select('productos.nombre_producto as nombre', DB::raw('SUM(pedido_producto.cantidad) as total_vendidos'))
        ->groupBy('productos.nombre_producto')
        ->orderByDesc('total_vendidos')
        ->limit(5)
        ->get();

    // Ingreso por categoría de producto (usando columna 'tipo')
    $ingresoPorCategoria = DB::table('pedido_producto')
        ->join('productos', 'pedido_producto.producto_id', '=', 'productos.id')
        ->select('productos.tipo as categoria', DB::raw('SUM(pedido_producto.precio_unitario * pedido_producto.cantidad) as total'))
        ->groupBy('productos.tipo')
        ->get();

$ingresosDiarios = DB::table('pedidos')
    ->select(DB::raw('DATE(fecha) as fecha'), DB::raw('SUM(total) as total'))
    ->whereBetween('fecha', [now()->subDays(30), now()])
    ->groupBy('fecha')
    ->orderBy('fecha')
    ->get();

    $colores = ['#e74c3c', '#f1c40f', '#3498db', '#1abc9c', '#9b59b6', '#2ecc71', '#e67e22'];


    return view('analisis.dashboard', compact(
    'ingresoPorCategoria',
    'colores',
        'totalPedidos',
        'ingresoTotal',
        'totalClientes',
        'topProductos',
        'ingresoPorCategoria',
            'ingresosDiarios'
    ));
}




//borrar dddata/*
 /*   public function getDashboardData()
{
    $productosDisponibles = Producto::where('estado', 'Disponible')->count();
    $productosBajoStock = Producto::where('cantidad', '<', 10)->count();
    $productosAgotados = Producto::where('cantidad', 0)->count();

    $topProductos = DB::table('pedido_producto')
        ->join('producto', 'pedido_producto.id_producto', '=', 'producto.id_producto')
        ->select('producto.nombre_producto', DB::raw('SUM(pedido_producto.cantidad) as total_vendido'))
        ->groupBy('producto.nombre_producto')
        ->orderByDesc('total_vendido')
        ->limit(5)
        ->get();

    $ingresosMensuales = DB::table('pedido')
        ->select(DB::raw("DATE_FORMAT(fecha, '%Y-%m') as mes"), DB::raw('SUM(total) as total'))
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

    $ingresosPorCategoria = DB::table('pedido_producto')
        ->join('producto', 'pedido_producto.id_producto', '=', 'producto.id_producto')
        ->select('producto.tipo', DB::raw('SUM(pedido_producto.cantidad * producto.precio) as ingreso'))
        ->groupBy('producto.tipo')
        ->get();

    $metodosPago = DB::table('pedido_producto')
        ->select('metodo_pago', DB::raw('COUNT(*) as cantidad'))
        ->groupBy('metodo_pago')
        ->get();

    return response()->json([
        'productosDisponibles' => $productosDisponibles,
        'productosBajoStock' => $productosBajoStock,
        'productosAgotados' => $productosAgotados,
        'topProductos' => $topProductos,
        'ingresosMensuales' => $ingresosMensuales,
        'ingresosPorCategoria' => $ingresosPorCategoria,
        'metodosPago' => $metodosPago,
    ]);
}
*/
}
