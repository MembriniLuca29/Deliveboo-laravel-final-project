<?php

namespace Database\Seeders;
use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $types = [
            'italiano',
            'vegetariano',
            'vegano',
            'pizza',
            'sushi',
            'cinese',
            'messicano',
            'thailandese',
            'hamburger'
        ];

        $thumbs = [
            'img-1',
            'img-2',
            'img-3',
            'img-4',
            'img-5',
            'img-6',
            'img-7',
            'img-8',
            'img-9',
        ];

        foreach ($types as $key => $type) {
            Type::create([
                'name' => $type,
                'thumb' => $thumbs[$key]
            ]);
        }
    }
}
