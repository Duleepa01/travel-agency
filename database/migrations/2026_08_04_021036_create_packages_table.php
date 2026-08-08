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
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->unsignedTinyInteger('duration_days');
        $table->unsignedTinyInteger('duration_nights');
        $table->unsignedInteger('max_capacity');
        $table->enum('status', [
            'draft',
            'published',
            'inactive'
        ])->default('draft');
        $table->foreignId('created_by')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
