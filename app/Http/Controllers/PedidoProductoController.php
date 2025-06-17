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
            'cantidad' => [
                'required',
                'integer',
                'min:1'
            ],
        ]);
        $pedido = Pedido::findOrFail($pedidoId);
        $producto = Producto::findOrFail($request->producto_id);

        // Validación adicional: estado del producto
        if ($producto->estado !== 'Disponible') {
            return back()->with('error', 'Este producto no se puede agregar porque está agotado o no disponible.');
        }

       // Verificamos si hay suficiente stock
        if ($producto->cantidad < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        DB::transaction(function () use ($pedido, $producto, $request) {
            // Descontar stock
            $producto->cantidad -= $request->cantidad;
            if ($producto->cantidad <= 0) {
                $producto->estado = 'Agotado';
            }
            $producto->save();

            // Agregar a pedido (sin eliminar si ya existe)
            $pedido->productos()->syncWithoutDetaching([
                $producto->id => [
                    'cantidad' => $request->cantidad,
                    'precio_unitario' => $producto->precio
                ]
            ]);

            // Recalcular total del pedido
            $pedido->load('productos');
            $pedido->total = $pedido->productos->sum(function ($p) {
                return $p->pivot->cantidad * $p->pivot->precio_unitario;
            });
            $pedido->save();
        });

        return back()->with('success', 'Producto agregado al pedido');
    }

    // Actualizar cantidad producto en pedido
    public function update(Request $request, $pedidoId, $productoId)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedido = Pedido::findOrFail($pedidoId);
        $producto = Producto::findOrFail($productoId);

        if (!$pedido->productos()->where('producto_id', $productoId)->exists()) {
            return back()->with('error', 'El producto no está en el pedido.');
        }

        DB::transaction(function () use ($pedido, $producto, $request, $productoId) {
            $pivot = $pedido->productos()->where('producto_id', $productoId)->first();
            $cantidadAnterior = $pivot->pivot->cantidad;
            $cantidadNueva = $request->cantidad;
            $diferencia = $cantidadNueva - $cantidadAnterior;

            if ($diferencia > 0 && $producto->cantidad < $diferencia) {
                abort(400, 'No hay suficiente stock para aumentar la cantidad.');
            }

            // Ajustar stock
            $producto->cantidad -= $diferencia;
            $producto->save();

            // Actualizar cantidad en tabla intermedia
            $pedido->productos()->updateExistingPivot($productoId, ['cantidad' => $cantidadNueva]);

            // Recalcular total
            $pedido->load('productos');
            $pedido->total = $pedido->productos->sum(function ($p) {
                return $p->pivot->cantidad * $p->pivot->precio_unitario;
            });
            $pedido->save();
        });

        return back()->with('success', 'Cantidad actualizada');
    }

    // Quitar producto del pedido
    public function destroy($pedidoId, $productoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);
        $producto = Producto::findOrFail($productoId);
        // Obtener la cantidad antes de eliminar
        
        DB::transaction(function () use ($pedido, $productoId, $producto) {
            $pivot = $pedido->productos()->where('producto_id', $productoId)->first();

            if ($pivot) {
                $cantidadADevolver = $pivot->pivot->cantidad;

                // Restaurar stock
                $producto->cantidad += $cantidadADevolver;
                if ($producto->cantidad > 0 && $producto->estado === 'Agotado') {
                    $producto->estado = 'Disponible';
                }

                $producto->save();

                // Quitar producto del pedido
                $pedido->productos()->detach($productoId);

                // Recalcular total
                $pedido->load('productos');
                $pedido->total = $pedido->productos->sum(function ($p) {
                    return $p->pivot->cantidad * $p->pivot->precio_unitario;
                });
                $pedido->save();
            }
        });

        return back()->with('success', 'Producto eliminado del pedido.');
    }

}
