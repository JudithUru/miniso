<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->date('fecha');
            $table->enum('estado', ['Pendiente', 'Finalizado'])->default('Pendiente');
            $table->enum('metodo_pago', [
                'Efectivo', 'Tarjeta', 'Transferencia'
            ]);
            $table->decimal('monto_entregado', 10, 2)->nullable();
            $table->decimal('cambio', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
