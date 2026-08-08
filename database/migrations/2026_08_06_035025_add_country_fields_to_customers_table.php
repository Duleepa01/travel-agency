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
    Schema::table('customers', function (Blueprint $table) {

        $table->foreignId('nationality_country_id')
              ->nullable()
              ->constrained('countries')
              ->nullOnDelete();

        $table->foreignId('residence_country_id')
              ->nullable()
              ->constrained('countries')
              ->nullOnDelete();

    });
}

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('customers', function (Blueprint $table) {

        $table->dropForeign(['nationality_country_id']);
        $table->dropForeign(['residence_country_id']);

        $table->dropColumn([
            'nationality_country_id',
            'residence_country_id'
        ]);

    });
}
};
