<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('usuario_id')->nullable();
        $table->dateTime('fecha_pedido');
        $table->string('estado')->default('pendiente');
        $table->decimal('total', 10, 2);
        $table->timestamps();

        // Si tienes tabla usuarios, puedes poner la relación así:
        // $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
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
