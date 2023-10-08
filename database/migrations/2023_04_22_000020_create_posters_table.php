<?php

use App\Models\Poster;
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
        Schema::create('posters', function (Blueprint $table) {
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');
            $table->string('ruta', 255)->nullable(false);
            $table->string('alt', 255)->nullable(false);

            $table->timestamp(Poster::CREATED_AT)->useCurrent();
            $table->timestamp(Poster::UPDATED_AT)->useCurrent();

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
        Schema::dropIfExists('posters');
    }
};
