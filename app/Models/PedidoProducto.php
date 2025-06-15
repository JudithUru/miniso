<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{

    protected $table = 'pedido_producto';

    protected $fillable = [
        'pedido_id', 'producto_id', 'cantidad'
    ];

    public $timestamps = false; // si no usas created_at y updated_at
}
