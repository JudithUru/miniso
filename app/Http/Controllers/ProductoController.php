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
        ->where('total', '>', 0) 
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
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $tipos = [
            'Textiles', 'Productos de belleza', 'Papelería',
            'Juguetería', 'Hogar', 'Electrónicos',
            'Bolsos y Accesorios'
        ];
        $estados = ['Disponible', 'Agotado', 'No Disponible'];

        return view('productos.create', compact('tipos', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:150',
            'tipo' => 'required',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required',
            'imagen' => 'nullable|url|max:2048'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $tipos = [
            'Textiles', 'Productos de belleza', 'Papelería',
            'Juguetería', 'Hogar', 'Electrónicos',
            'Bolsos y Accesorios'
        ];
        $estados = ['Disponible', 'Agotado', 'No Disponible'];

        return view('productos.edit', compact('producto', 'tipos', 'estados'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:150',
            'tipo' => 'required',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required',
            'imagen' => 'nullable|url|max:2048'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
