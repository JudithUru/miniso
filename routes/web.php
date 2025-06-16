<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProductoController;
use App\Http\Controllers\CajaController;


Route::get('/', function () {
    return view('index');
});


Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('pedidos', PedidoController::class);


Route::prefix('caja')->group(function () {

    Route::get('/seleccionar-cliente', [CajaController::class, 'seleccionarCliente'])->name('caja.seleccionarCliente');

    Route::post('/crear-pedido', [CajaController::class, 'crearPedido'])->name('caja.crearPedido');

    Route::get('/pedido/{pedido}', [CajaController::class, 'mostrarPedido'])->name('caja.pedido');

    Route::post('/pedido/{pedido}/producto', [PedidoProductoController::class, 'store'])->name('pedidoProducto.store');

    Route::put('/pedido/{pedido}/producto/{producto}', [PedidoProductoController::class, 'update'])->name('pedidoProducto.update');

    Route::delete('/pedido/{pedido}/producto/{producto}', [PedidoProductoController::class, 'destroy'])->name('pedidoProducto.destroy');

    Route::post('/pedido/{pedido}/finalizar', [CajaController::class, 'finalizarPedido'])->name('caja.finalizarPedido');

});

Route::get('/caja/cliente/{cliente}', [CajaController::class, 'verPedidosCliente'])->name('caja.verPedidosCliente');

// Route::delete('/caja/cancelar-pedido/{pedido}', [CajaController::class, 'cancelarPedido'])->name('caja.cancelarPedido');

// // Rutas AJAX para manejar productos en el pedido
// Route::post('/pedidos/{pedido}/productos', [PedidoProductoController::class, 'store']);
// Route::put('/pedidos/{pedido}/productos/{producto}', [PedidoProductoController::class, 'update']);
// Route::delete('/pedidos/{pedido}/productos/{producto}', [PedidoProductoController::class, 'destroy']);
