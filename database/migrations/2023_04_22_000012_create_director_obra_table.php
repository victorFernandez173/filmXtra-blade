<?php

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
        Schema::create('director_obra', function (Blueprint $table){
            $table->foreignId('director_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');

            $table->unique(['director_id', 'obra_id']);

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
        Schema::dropIfExists('director_obra');
    }
};
