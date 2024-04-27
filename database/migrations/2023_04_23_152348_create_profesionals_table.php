<?php

use App\Models\Profesional;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migrar.
     */
    public function up(): void
    {
        Schema::create('profesionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('medio_id')->nullable()->constrained();
            $table->string('autor', 200)->nullable(false);
            $table->string('contenido', 5000)->nullable(false);
            $table->date('fecha')->nullable();

            $table->timestamp(Profesional::CREATED_AT)->useCurrent();
            $table->timestamp(Profesional::UPDATED_AT)->useCurrent();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Anular migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesionals');
    }
};
