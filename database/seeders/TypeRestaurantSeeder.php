<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use App\Models\Restaurant;

class TypeRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types_restaurants')->truncate();
        for ($i=0; $i < 10; $i++) { 
            DB::table('types_restaurants')->insert([
                'type_id' => Type::inRandomOrder()->first()->id,
                'restaurant_id' => Restaurant::inRandomOrder()->first()->id
            ]);
        }
        
    }
}

            
