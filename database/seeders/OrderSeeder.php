<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Order::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 10; $i++) { 
            Order::create([
                'name' => fake()->name(),
                'last_name' => fake()->name(),
                'phone_number' => '1234567890',
                'email' => fake()->email(),
                'address' => fake()->address(),
                'status' => fake()->word(),
                'total_price' => fake()->randomNumber(3)
            ]);
        }
    }
}
