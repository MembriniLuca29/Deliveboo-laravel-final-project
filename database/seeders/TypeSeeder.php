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
            '/assets/img_cibo_italiano_png.jpeg',
            '/assets/img_cibo_vegetariano_png.jpeg',
            '/assets/img_cibo_vegano_png.jpeg',
            '/assets/img_pizza_png.jpeg',
            '/assets/img_sushi_png.jpeg',
            '/assets/img_cibo_cinese_png.jpeg',
            '/assets/img_cibo_messicano_png.jpeg',
            '/assets/img_cibo_thailandese_png.jpeg',
            '/assets/img_hamburger_png.jpeg',
        ];

        foreach ($types as $key => $type) {
            Type::create([
                'name' => $type,
                'thumb' => $thumbs[$key]
            ]);
        }
    }
}
