<?php

use App\Models\Trailer;
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
        Schema::create('trailers', function (Blueprint $table) {
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');
            $table->string('trailers', 500)->nullable(false);

            $table->timestamp(Trailer::CREATED_AT)->useCurrent();
            $table->timestamp(Trailer::UPDATED_AT)->useCurrent();

            $table->primary('obra_id');

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
        Schema::dropIfExists('trailers');
    }
};
