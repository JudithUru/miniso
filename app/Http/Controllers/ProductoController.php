<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

public function dashboardResumen()
{
    $disponibles = \App\Models\Producto::where('estado', 'Disponible')->count();
    $bajoStock = \App\Models\Producto::where('estado', 'Disponible')->where('stock', '<', 5)->count();
    $pedidos = \App\Models\Pedido::where('estado', 'Pendiente')->count();

    return response()->json([
        'disponibles' => $disponibles,
        'bajoStock' => $bajoStock,
        'pedidos' => $pedidos
    ]);
}

public function gestionResumen()
{
    $productosDisponibles = DB::table('productos')
        ->where('estado', 'Disponible')
        ->count();

    $productosAgotados = DB::table('productos')
        ->where('estado', 'Disponible')
        ->where('cantidad', '=', 0)
        ->count();

    $productosBajoStock = DB::table('productos')
        ->where('estado', 'Disponible')
        ->where('cantidad', '<', 5)
        ->where('cantidad', '>', 0)
        ->count();

    $pedidosHoy = DB::table('pedidos')
        ->whereDate('fecha', today())
        ->count();

    $pedidosPendientes = DB::table('pedidos')
        ->where('total', '>', 0) // cambia esto si tienes un campo "estado"
        ->count();

    return response()->json([
        'productosDisponibles' => $productosDisponibles,
        'productosAgotados' => $productosAgotados,
        'productosBajoStock' => $productosBajoStock,
        'pedidosHoy' => $pedidosHoy,
        'pedidosPendientes' => $pedidosPendientes,
    ]);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
