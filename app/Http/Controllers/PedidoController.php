<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    // Mostrar lista de pedidos
    public function index()
    {
        $pedidos = Pedido::with('productos')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    // Mostrar formulario para crear un nuevo pedido
    public function create()
    {
        return view('pedidos.create');
    }

    // Guardar un nuevo pedido
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->cliente_id = $request->cliente_id; // ajusta si usas clientes
        $pedido->total = 0;
        $pedido->save();

        return redirect()->route('pedidos.show', $pedido)->with('success', 'Pedido creado');
    }

    // Mostrar un pedido específico
    public function show(Pedido $pedido)
    {
        $productos = Producto::all(); // para mostrar productos disponibles en el formulario
        $pedido->load('productos');

        return view('pedidos.show', compact('pedido', 'productos'));
    }

    // Eliminar un pedido
    public function destroy(Pedido $pedido)
    {
        if ($pedido->estado === 'Finalizado') {
            return back()->with('error', 'No se puede eliminar un pedido que ya ha sido finalizado.');
        }

        $pedido->productos()->detach(); // primero quitamos los productos relacionados
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado');
    }
}
