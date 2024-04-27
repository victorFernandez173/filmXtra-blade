<?php

use App\Models\Medio;
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
        Schema::create('medios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120)->nullable(false);
            $table->string('web', 200)->nullable();

            $table->timestamp(Medio::CREATED_AT)->useCurrent();
            $table->timestamp(Medio::UPDATED_AT)->useCurrent();

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
        Schema::dropIfExists('medios');
    }
};
