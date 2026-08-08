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
    Schema::create('destination_package', function (Blueprint $table) {
        $table->id();

        $table->foreignId('package_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('destination_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->unsignedTinyInteger('day_number')->nullable();

        $table->timestamps();

        $table->unique(['package_id', 'destination_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_package');
    }
};
