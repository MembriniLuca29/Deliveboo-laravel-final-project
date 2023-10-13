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
            '/assets/img_cibo_italiano_png.png',
            '/assets/img_cibo_vegetariano_png.png',
            '/assets/img_cibo_vegano_png.png',
            '/assets/img_pizza_png.png',
            '/assets/img_sushi_png.png',
            '/assets/img_cibo_cinese_png.png',
            '/assets/img_cibo_messicano_png.png',
            '/assets/img_cibo_thailandese_png.png',
            '/assets/img_hamburger_png.png',
        ];

        foreach ($types as $key => $type) {
            Type::create([
                'name' => $type,
                'thumb' => $thumbs[$key]
            ]);
        }
    }
}
