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
        Schema::create('categorias_por_documento', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained('categorias', 'id');
            $table->foreignId('documento_id')->constrained('documentos', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias_por_documento');
    }
};
