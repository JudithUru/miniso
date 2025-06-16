<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id', 'total', 'fecha', 'estado', 'metodo_pago'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function productos()
{
    return $this->belongsToMany(Producto::class, 'pedido_producto')
                ->withPivot('cantidad', 'precio_unitario')
                ->withTimestamps();
}
}
