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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('name')->max(50);
            $table->string('last_name')->max(50);
            $table->string('phone_number')->max(13);
            $table->string('email');
            $table->string('address');

            $table->string('status')->max(50);

            $table->unsignedDecimal('total_price' , 5 , 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
