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
        Schema::create('copias', function (Blueprint $table) {
            $table->id();
            $table->string('editorial');
            $table->date('fechaDePublicacion');
            $table->string('nombreArchivo')->nullable();
            $table->foreignId('documento_id')->constrained('documentos', 'id');
            $table->foreignId('tipo_id')->constrained('tipos_de_copia', 'id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copias');
    }
};
