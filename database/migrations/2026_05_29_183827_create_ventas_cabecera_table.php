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
    Schema::create('ventas_cabecera', function (Blueprint $table) {
        $table->id();
        $table->timestamp('fecha_venta')->nullable(); // Se llena solo al confirmar compra
        $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade'); // El dueño del carrito
        $table->string('estado')->default('carrito'); // 'carrito' o 'confirmado'
        $table->decimal('total', 10, 2)->default(0);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_cabecera');
    }
};
