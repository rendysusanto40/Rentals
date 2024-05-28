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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("model");
            $table->string("brand");
            $table->string("type");
            $table->year("production_year");
            $table->string("transmission");
            $table->integer("price");
            $table->string("people_capacity");
            $table->integer("trunk_capacity");
            $table->string("engine_type");
            $table->string("image");
            $table->string("color");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
