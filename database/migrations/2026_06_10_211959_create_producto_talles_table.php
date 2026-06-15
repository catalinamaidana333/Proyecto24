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
    if (!Schema::hasTable('producto_talles')) {
        Schema::create('producto_talles', function (Blueprint $table) {
        $table->id();
        // Conectamos con tu tabla productos
        $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
        $table->string('talle'); // Acá guardamos 'S', 'M', 'L', etc.
        $table->integer('stock')->default(0); // El stock específico de ESTE talle
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_talles');
    }
};
