<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
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
