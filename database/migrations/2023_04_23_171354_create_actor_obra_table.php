<?php

use App\Models\Actor;
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
        Schema::create('actor_obra', function (Blueprint $table) {
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('actor_id')->constrained()->onDelete('CASCADE');

            $table->unique(['obra_id', 'actor_id']);

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
        Schema::dropIfExists('actor_obra');
    }
};
