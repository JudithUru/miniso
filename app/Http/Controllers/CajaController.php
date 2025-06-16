<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Cliente;

use Illuminate\Http\Request;

class CajaController extends Controller
{
    // Mostrar selección de cliente
    public function seleccionarCliente(Request $request)
    {
    $clientes = Cliente::all();
    $clienteId = $request->query('cliente_id');  // Obtiene cliente_id si viene en la URL

    return view('caja.seleccionar_cliente', compact('clientes', 'clienteId'));
    }


    public function crearPedido(Request $request)
    {
    $request->validate([
        'cliente_id' => 'required|exists:clientes,id'
    ]);

    $cliente = Cliente::findOrFail($request->cliente_id);

    $pedido = Pedido::create([
        'cliente_id' => $cliente->id,
        'fecha' => now(),
        'total' => 0,
        'estado' => 'Pendiente'
    ]);

    return redirect()->route('caja.pedido', $pedido->id)->with('success', 'Pedido creado exitosamente.');
    }
    
    // Mostrar pedido (carrito)
    public function mostrarPedido($pedidoId)
    {
        $pedido = Pedido::with(['productos', 'cliente'])->findOrFail($pedidoId);
        $productos = Producto::all();

        return view('caja.pedido', compact('pedido', 'productos'));
    }

    public function finalizarPedido(Request $request, $pedidoId)
    {
        $pedido = Pedido::with('productos')->findOrFail($pedidoId);

        if ($pedido->productos->isEmpty()) {
            return back()->with('error', 'No se puede finalizar un pedido vacío.');
        }

        $request->validate([
            'metodo_pago' => 'required',
        ]);

        // Calcular total
        $total = 0;
        foreach ($pedido->productos as $producto) {
            $total += $producto->pivot->cantidad * $producto->pivot->precio_unitario;
        }

        $pedido->total = $total;
        $pedido->estado = 'Finalizado';
        $pedido->save();

        return redirect()->route('caja.seleccionarCliente')->with('success', 'Pedido finalizado correctamente.');
    }


    public function verPedidosCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $pedidos = Pedido::where('cliente_id', $clienteId)->orderBy('id', 'desc')->get();

        return view('caja.mostrarPedido', compact('cliente', 'pedidos'))->with('clienteId', $cliente->id);

    }

}