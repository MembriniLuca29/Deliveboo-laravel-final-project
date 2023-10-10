<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use App\Models\User;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types_users')->truncate();
        for ($i=0; $i < 10; $i++) { 
            DB::table('types_users')->insert([
                'type_id' => Type::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }
        
    }
}

            
