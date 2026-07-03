<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Verificar si la columna NO existe antes de agregarla
        if (!Schema::hasColumn('productos', 'estado')) {
            Schema::table('productos', function (Blueprint $table) {
                $table->string('estado')->default('activo')->after('precio');
            });
        }
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
