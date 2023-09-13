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
        Schema::table('stores', function (Blueprint $table) {
            $table->renameColumn('all_day', 'twentyfour');
            $table->renameColumn('price_style', 'term');
            $table->renameColumn('mini_weight', 'minimum');
            $table->renameColumn('max_weight', 'maximum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->renameColumn('twentyfour', 'all_day',);
            $table->renameColumn('term', 'price_style');
            $table->renameColumn('minimum', 'mini_weight');
            $table->renameColumn('maximum', 'max_weight');
        });
    }
};
