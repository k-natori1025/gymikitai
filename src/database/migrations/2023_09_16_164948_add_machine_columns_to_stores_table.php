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
            $table->tinyInteger('pool')->nullable(true);
            $table->tinyInteger('sauna')->nullable(true);
            $table->tinyInteger('shower')->nullable(true);
            $table->tinyInteger('wifi')->nullable(true);
            $table->integer('bench')->nullable(true);
            $table->integer('rack')->nullable(true);
            $table->integer('smith')->nullable(true);
            $table->integer('cable')->nullable(true);
            $table->integer('chestpress')->nullable(true);
            $table->integer('pec')->nullable(true);
            $table->integer('shoulderpress')->nullable(true);
            $table->integer('sideraise')->nullable(true);
            $table->integer('armcurl')->nullable(true);
            $table->integer('triceps')->nullable(true);
            $table->integer('latpull')->nullable(true);
            $table->integer('rawing')->nullable(true);
            $table->integer('abcrunch')->nullable(true);
            $table->integer('hacksquat')->nullable(true);
            $table->integer('legext')->nullable(true);
            $table->integer('legpress')->nullable(true);
            $table->integer('tread')->nullable(true);
            $table->integer('cross')->nullable(true);
            $table->integer('bike')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('pool');
            $table->dropColumn('sauna');
            $table->dropColumn('shower');
            $table->dropColumn('wifi');
            $table->dropColumn('bench');
            $table->dropColumn('rack');
            $table->dropColumn('smith');
            $table->dropColumn('cable');
            $table->dropColumn('chestpress');
            $table->dropColumn('pec');
            $table->dropColumn('shoulderpress');
            $table->dropColumn('sideraise');
            $table->dropColumn('armcurl');
            $table->dropColumn('triceps');
            $table->dropColumn('latpull');
            $table->dropColumn('rawing');
            $table->dropColumn('abcrunch');
            $table->dropColumn('hacksquat');
            $table->dropColumn('legext');
            $table->dropColumn('legpress');
            $table->dropColumn('tread');
            $table->dropColumn('cross');
            $table->dropColumn('bike');
        });
    }
};
