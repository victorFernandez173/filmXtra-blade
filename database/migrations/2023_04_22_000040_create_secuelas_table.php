<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Secuela;

return new class extends Migration
{
    /**
     * Migrar.
     */
    public function up(): void
    {
        Schema::create('secuelas', function (Blueprint $table) {
            $table->foreignId('obra_id')->constrained()->onDelete('CASCADE');
            $table->integer('orden')->unsigned()->default(0)->nullable(false);
            $table->string('saga', 255)->nullable(false);

            $table->unique(['obra_id', 'orden']);

            $table->timestamp(Secuela::CREATED_AT)->useCurrent();
            $table->timestamp(Secuela::UPDATED_AT)->useCurrent();

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
        Schema::dropIfExists('secuelas');
    }
};
