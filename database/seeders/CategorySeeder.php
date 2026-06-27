<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Structure: parent => [sous-catégories]
        $categories = [
            [
                'name' => 'Soin des cheveux',
                'icon' => '💇‍♀️',
                'order' => 1,
                'children' => [
                    ['name' => 'Shampoing',          'icon' => '🧴', 'order' => 1],
                    ['name' => 'Après-shampoing',    'icon' => '🧴', 'order' => 2],
                    ['name' => 'Masque capillaire',  'icon' => '✨', 'order' => 3],
                    ['name' => 'Huile cheveux',      'icon' => '💧', 'order' => 4],
                    ['name' => 'Sérum anti-chute',   'icon' => '💊', 'order' => 5],
                    ['name' => 'Coloration',         'icon' => '🎨', 'order' => 6],
                ],
            ],
            [
                'name' => 'Soin du visage',
                'icon' => '✨',
                'order' => 2,
                'children' => [
                    ['name' => 'Eau micellaire',     'icon' => '💦', 'order' => 1],
                    ['name' => 'Sérum visage',       'icon' => '💧', 'order' => 2],
                    ['name' => 'Crème hydratante',   'icon' => '🫙', 'order' => 3],
                    ['name' => 'Soin anti-acné',     'icon' => '🔬', 'order' => 4],
                    ['name' => 'SPF / Solaire',      'icon' => '☀️', 'order' => 5],
                    ['name' => 'Contour des yeux',   'icon' => '👁️', 'order' => 6],
                    ['name' => 'Masque visage',      'icon' => '🎭', 'order' => 7],
                ],
            ],
            [
                'name' => 'Maquillage',
                'icon' => '💄',
                'order' => 3,
                'children' => [
                    ['name' => 'Rouge à lèvres',     'icon' => '💋', 'order' => 1],
                    ['name' => 'Fond de teint',      'icon' => '🪞', 'order' => 2],
                    ['name' => 'Mascara',            'icon' => '👁️', 'order' => 3],
                    ['name' => 'Kohl / Kajal',       'icon' => '✏️', 'order' => 4],
                    ['name' => 'Palette yeux',       'icon' => '🎨', 'order' => 5],
                    ['name' => 'Blush / Bronzer',    'icon' => '🌸', 'order' => 6],
                    ['name' => 'Highlighter',        'icon' => '✨', 'order' => 7],
                ],
            ],
            [
                'name' => 'Soin du corps',
                'icon' => '🧴',
                'order' => 4,
                'children' => [
                    ['name' => 'Crème corps',        'icon' => '🫙', 'order' => 1],
                    ['name' => 'Gel douche / Savon', 'icon' => '🧼', 'order' => 2],
                    ['name' => 'Déodorant',          'icon' => '🌿', 'order' => 3],
                    ['name' => 'Épilation',          'icon' => '🪒', 'order' => 4],
                    ['name' => 'Autobronzant',       'icon' => '☀️', 'order' => 5],
                ],
            ],
            [
                'name' => 'Parfums',
                'icon' => '🌸',
                'order' => 5,
                'children' => [
                    ['name' => 'Eau de parfum',      'icon' => '🫧', 'order' => 1],
                    ['name' => 'Parfum oriental',    'icon' => '🪔', 'order' => 2],
                    ['name' => 'Eau de toilette',    'icon' => '💦', 'order' => 3],
                ],
            ],
            [
                'name' => 'Ongles',
                'icon' => '💅',
                'order' => 6,
                'children' => [
                    ['name' => 'Vernis à ongles',    'icon' => '💅', 'order' => 1],
                    ['name' => 'Soin ongles',        'icon' => '✨', 'order' => 2],
                    ['name' => 'Gel / Semi-perma',   'icon' => '💎', 'order' => 3],
                ],
            ],
        ];

        foreach ($categories as $parentData) {
            // Insérer le parent
            $parentId = DB::table('categories')->insertGetId([
                'parent_id'  => null,
                'name'       => $parentData['name'],
                'slug'       => Str::slug($parentData['name']),
                'icon'       => $parentData['icon'],
                'order'      => $parentData['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insérer les enfants
            foreach ($parentData['children'] as $child) {
                DB::table('categories')->insert([
                    'parent_id'  => $parentId,
                    'name'       => $child['name'],
                    'slug'       => Str::slug($parentData['name'] . ' ' . $child['name']),
                    'icon'       => $child['icon'],
                    'order'      => $child['order'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
