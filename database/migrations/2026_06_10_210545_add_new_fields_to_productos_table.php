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
            if (!Schema::hasColumn('productos', 'material')) {
                $table->string('material')->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('productos', 'año')) {
                $table->integer('año')->nullable()->after('material');
            }
            if (!Schema::hasColumn('productos', 'diseñador')) {
                $table->string('diseñador')->nullable()->after('año');
            }
            if (!Schema::hasColumn('productos', 'descripcion_drop')) {
                $table->text('descripcion_drop')->nullable()->after('diseñador');
            }
            if (!Schema::hasColumn('productos', 'categoria_id')) {
                $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null')->after('descripcion_drop');
            }
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            if (Schema::hasColumn('productos', 'categoria_id')) {
                $table->dropForeign(['categoria_id']);
            }
            $table->dropColumn(array_filter([
                Schema::hasColumn('productos', 'material') ? 'material' : null,
                Schema::hasColumn('productos', 'año') ? 'año' : null,
                Schema::hasColumn('productos', 'diseñador') ? 'diseñador' : null,
                Schema::hasColumn('productos', 'descripcion_drop') ? 'descripcion_drop' : null,
                Schema::hasColumn('productos', 'categoria_id') ? 'categoria_id' : null,
            ]));
        });

        Schema::dropIfExists('categorias');
    }
};