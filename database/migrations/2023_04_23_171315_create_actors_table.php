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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120)->nullable(false);
            $table->string('nombre_real', 120)->nullable();
            $table->date('edad')->nullable();
            $table->date('defuncion')->nullable();
            $table->string('pais', 120)->nullable(false)->default('apátrida');

            $table->timestamp(Actor::CREATED_AT)->useCurrent();
            $table->timestamp(Actor::UPDATED_AT)->useCurrent();

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
        Schema::dropIfExists('actors');
    }
};
