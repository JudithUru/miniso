<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto', 'tipo', 'cantidad', 'precio', 'estado', 'imagen'
    ];

    public function pedidos()
{
    return $this->belongsToMany(Pedido::class, 'pedido_producto')
                ->withPivot('cantidad', 'precio_unitario')
                ->withTimestamps();
}

}
