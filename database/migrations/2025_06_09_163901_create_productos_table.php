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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 150);
            $table->enum('tipo', [
                'Textiles', 'Productos de belleza', 'Papelería',
                'Juguetería', 'Hogar', 'Electrónicos',
                'Bolsos y Accesorios'
            ]);
            $table->integer('cantidad');
            $table->decimal('precio',10, 2);
            $table->enum('estado', ['Disponible', 'Agotado', 'No Disponible']);
            $table->string('imagen', 2000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
