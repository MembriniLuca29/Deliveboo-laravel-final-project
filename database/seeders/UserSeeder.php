<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'password',
            'address' => fake()->address(),
            'address_number' => rand(1,3),
            'p_iva' => '12345678912',
            'thumb' => fake()->sentence()
        ]);
    }
}
