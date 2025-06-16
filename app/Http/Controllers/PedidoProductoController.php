<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoProductoController extends Controller
{
    public function store(Request $request, $pedidoId)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedido = Pedido::findOrFail($pedidoId);
        $producto = Producto::findOrFail($request->producto_id);

        // Validación adicional: estado del producto
        if ($producto->estado === 'Agotado' || $producto->estado === 'No Disponible') {
            return back()->with('error', 'Este producto no se puede agregar porque está agotado o no disponible.');
        }

        // Agregar o actualizar el producto en el pedido
        $pedido->productos()->syncWithoutDetaching([
            $producto->id => [
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio
            ]
        ]);

        // Recalcular el total del pedido
        $total = $pedido->productos->sum(function ($p) {
            return $p->pivot->cantidad * $p->pivot->precio_unitario;
        });

        $pedido->total = $total;
        $pedido->save();

        return back()->with('success', 'Producto agregado al pedido');
    }

    // Actualizar cantidad producto en pedido
    public function update(Request $request, $pedidoId, $productoId)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedido = Pedido::findOrFail($pedidoId);

        if ($pedido->productos()->where('producto_id', $productoId)->exists()) {
            $pedido->productos()->updateExistingPivot($productoId, ['cantidad' => $request->cantidad]);
        }

        // Recalcular total
        $total = $pedido->productos->sum(function ($p) {
            return $p->pivot->cantidad * $p->pivot->precio_unitario;
        });
        $pedido->total = $total;
        $pedido->save();

        return back()->with('success', 'Cantidad actualizada');
    }

    // Quitar producto del pedido
    public function destroy($pedidoId, $productoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);
        $pedido->productos()->detach($productoId);

        // Recalcular total
        $total = $pedido->productos->sum(function ($p) {
            return $p->pivot->cantidad * $p->pivot->precio_unitario;
        });
        $pedido->total = $total;
        $pedido->save();

        return back()->with('success', 'Producto eliminado del pedido');
    }

}
