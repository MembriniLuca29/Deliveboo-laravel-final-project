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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();

            $table->string('name')->max(50);
            $table->text('description')->nullable();
            $table->boolean('visible')->nullable();
            $table->unsignedDecimal('price' , 5 , 2);
            $table->string('thumb')->max(2048);
            
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
