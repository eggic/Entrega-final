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
            $table->id(); // id autoincremental
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion'); // Descripción del producto
            $table->decimal('precio', 8, 2); // Precio con hasta 8 dígitos y 2 decimales
            $table->text('tipo', ['Pupusa', 'Bebida', 'Postre'])->default('Pupusa'); // Tipo de producto (enum)
            $table->integer('stock'); // Cantidad en stock
            $table->timestamps(); // Tiempos de creación y actualización
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
