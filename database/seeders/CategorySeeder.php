<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Soin des cheveux', 'icon' => '💇‍♀️', 'order' => 1],
            ['name' => 'Soin du visage',   'icon' => '✨',   'order' => 2],
            ['name' => 'Maquillage',       'icon' => '💄',   'order' => 3],
            ['name' => 'Parfums',          'icon' => '🌸',   'order' => 4],
            ['name' => 'Soin du corps',    'icon' => '🧴',   'order' => 5],
            ['name' => 'Ongles',           'icon' => '💅',   'order' => 6],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'name'       => $cat['name'],
                'slug'       => Str::slug($cat['name']),
                'icon'       => $cat['icon'],
                'order'      => $cat['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
