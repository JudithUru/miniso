<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Cliente;

use Illuminate\Http\Request;

class CajaController extends Controller
{
    // Mostrar selección de cliente
    public function seleccionarCliente()
    {
        $clientes = Cliente::all();
        return view('caja.seleccionar_cliente', compact('clientes'));
    }

    // Crear pedido para cliente
    public function crearPedido(Request $request)
    {
        $request->validate(['cliente_id' => 'required|exists:clientes,id']);

        $pedido = Pedido::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => now(),
            'total' => 0,
        ]);

        return redirect()->route('caja.pedido', $pedido->id);
    }

    // Mostrar pedido (carrito)
    public function mostrarPedido($pedidoId)
    {
        $pedido = Pedido::with('productos')->findOrFail($pedidoId);
        $productos = Producto::all();

        return view('caja.pedido', compact('pedido', 'productos'));
    }

    // Finalizar pedido (cobrar)
    public function finalizarPedido($pedidoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);
        // Aquí podrías marcarlo como pagado o similar
        $pedido->estado = 'finalizado';
        $pedido->save();

        return redirect()->route('caja.seleccionarCliente')->with('success', 'Pedido finalizado');

}

}