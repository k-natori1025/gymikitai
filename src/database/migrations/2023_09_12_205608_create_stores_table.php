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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('address', 100);
            $table->string('phone')->nullable();
            $table->string('open')->nullable();
            $table->string('close')->nullable();
            $table->boolean('all-day')->nullable();
            $table->string('off')->nullable();
            $table->boolean('visitor')->nullable();
            $table->string('visitor_price')->nullable();
            $table->tinyInteger('price_style')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('mini_weight')->nullable();
            $table->tinyInteger('max_weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
