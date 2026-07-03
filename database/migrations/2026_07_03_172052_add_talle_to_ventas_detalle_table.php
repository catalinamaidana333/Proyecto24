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
    if (!Schema::hasColumn('ventas_detalle', 'talle')) {
            Schema::table('ventas_detalle', function (Blueprint $table) {
                $table->string('talle')->nullable()->after('cantidad');
            });
        }
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas_detalle', function (Blueprint $table) {
            $table->dropColumn('talle');
        });
    }
};
