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
    Schema::create('consultas', function (Blueprint $table) {
        $table->id();
        $table->string('email');
        $table->text('mensaje');
        // El estado por defecto será 'no_visto'
        $table->enum('estado', ['no_visto', 'visto'])->default('no_visto');
        $table->timestamps(); // Esto ya nos da la fecha y hora exacta (created_at)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
