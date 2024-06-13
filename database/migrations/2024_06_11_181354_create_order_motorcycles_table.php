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
        Schema::create('order_motorcycles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("motorcycle_id")->constrained("motorcycles")->cascadeOnDelete();
            $table->date("start_date");
            $table->date("end_date");
            $table->integer("price");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordermotorcycles');
    }
};
