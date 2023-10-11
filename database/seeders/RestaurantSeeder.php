<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Restaurant::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 10; $i++) { 

            $user_id = User::inRandomOrder()->first()->id;

            Restaurant::create([
            'name' => fake()->word(),
            'address' => fake()->address(),
            'phone_number' => '1234567890',
            'thumb' => fake()->sentence(),
            'p_iva' => '12345678912',
            'user_id' => $user_id
            
        ]);
        }
    }
}
