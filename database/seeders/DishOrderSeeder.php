<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Dish;
use App\Models\Order;


class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dishes_orders')->truncate();
        for ($i=0; $i < 10; $i++) { 
            DB::table('dishes_orders')->insert([
                'dish_id' => Dish::inRandomOrder()->first()->id,
                'order_id' => Order::inRandomOrder()->first()->id
            ]);
        }
    }
}
