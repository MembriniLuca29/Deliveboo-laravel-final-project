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

        $users = User::all();

        $imagePath = '/uploads/images/restaurant.jpg';

        foreach ($users as $user) {
            Restaurant::create([
                'name' => fake()->word(),
                'address' => fake()->address(),
                'phone_number' => '1234567890',
                'thumb' => $imagePath,
                'p_iva' => '12345678912',
                'user_id' => $user->id
                ]);
        }
        
    }
}
