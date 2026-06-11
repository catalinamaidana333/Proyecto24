<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Primero creamos la tabla categorias de forma segura
        if (!Schema::hasTable('categorias')) {
            Schema::create('categorias', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->timestamps();
            });
        }

        // 2. Ahora que la tabla existe sí o sí, modificamos productos
        Schema::table('productos', function (Blueprint $table) {
            
            $table->string('material')->nullable()->after('nombre');
            $table->integer('año')->nullable()->after('material');
            $table->string('diseñador')->nullable()->after('año');
            $table->text('descripcion_drop')->nullable()->after('diseñador');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null')->after('descripcion_drop');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn(['descripcion', 'material', 'año', 'diseñador', 'descripcion_drop', 'categoria_id']);
        });
        
        Schema::dropIfExists('categorias');
    }
};