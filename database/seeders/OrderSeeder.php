<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
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
            $user_id = User::inRandomOrder()->first();
            Order::create([
                'total_price' => fake()->randomNumber(3),
                'address' => fake()->address(),
                'address_number' => rand(1,3),
                'user_id' => $user_id->id
            ]);
        }
    }
}
