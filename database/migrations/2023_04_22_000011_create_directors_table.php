<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Director;

return new class extends Migration
{
    /**
     * Migrar.
     */
    public function up(): void
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 123)->nullable(false);
            $table->date('edad')->nullable(false);
            $table->date('defuncion')->nullable();
            $table->string('pais', 120)->nullable(false)->default('apátrida');

            $table->timestamp(Director::CREATED_AT)->useCurrent();
            $table->timestamp(Director::UPDATED_AT)->useCurrent();

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
        Schema::dropIfExists('directors');
    }
};
