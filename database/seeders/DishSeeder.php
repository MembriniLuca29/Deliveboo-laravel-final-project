<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Dish::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 20; $i++) { 

            $user_id = User::inRandomOrder()->first();
            Dish::create([
                'name' => fake()->word(),
                'ingredients' => fake()->sentence(),
                'price' => fake()->randomNumber(2),
                'user_id' => $user_id
            ]);
        }
    }
}



