<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;
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

            $restaurant_id = Restaurant::inRandomOrder()->first()->id;

            $imagePath = $imagePath = '/images/meal.jpg';;

            Dish::create([
                'name' => fake()->word(),
                'description' => fake()->sentence(),
                'visible' => rand(0, 1),
                'price' => fake()->randomNumber(2),
                'thumb' => $imagePath,
                'restaurant_id' => $restaurant_id
            ]);
        }
    }
}



