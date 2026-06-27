<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les sous-catégories par slug
        $cat = DB::table('categories')
            ->whereNotNull('parent_id')
            ->pluck('id', 'slug');

        $products = [

            // ─── SHAMPOING ────────────────────────────────────────
            [
                'category_slug' => 'soin-des-cheveux-shampoing',
                'items' => [
                    ['name' => 'Caphair Shampoing Anti-Chute',           'brand' => 'Caphair'],
                    ['name' => 'Caphair Shampoing Energisant',           'brand' => 'Caphair'],
                    ['name' => 'Garnier Ultra Doux Cheveux Secs',        'brand' => 'Garnier'],
                    ['name' => 'Garnier Ultra Doux Cheveux Gras',        'brand' => 'Garnier'],
                    ['name' => 'Elsève Huile Extraordinaire',            'brand' => "L'Oréal"],
                    ['name' => 'Elsève Anti-Casse',                      'brand' => "L'Oréal"],
                    ['name' => 'Pantene Lisse & Soyeux',                 'brand' => 'Pantene'],
                    ['name' => 'Pantene Anti-Pelliculaire',              'brand' => 'Pantene'],
                    ['name' => 'Head & Shoulders Classic',               'brand' => 'Head & Shoulders'],
                    ['name' => 'Vichy Dercos Anti-Pelliculaire',         'brand' => 'Vichy'],
                    ['name' => 'Vichy Dercos Energisant',                'brand' => 'Vichy'],
                    ['name' => 'Klorane Shampoing à la Quinine',         'brand' => 'Klorane'],
                    ['name' => 'Vatika Enriched Coconut Hair Oil',       'brand' => 'Vatika'],
                    ['name' => 'OGX Argan Oil of Morocco',               'brand' => 'OGX'],
                    ['name' => 'Cantu Shea Butter Shampoing',            'brand' => 'Cantu'],
                ],
            ],

            // ─── APRÈS-SHAMPOING ──────────────────────────────────
            [
                'category_slug' => 'soin-des-cheveux-apres-shampoing',
                'items' => [
                    ['name' => 'Garnier Ultra Doux Après-Shampoing',     'brand' => 'Garnier'],
                    ['name' => 'Elsève Extraordinary Oil Après-Shampoing','brand' => "L'Oréal"],
                    ['name' => 'Pantene Après-Shampoing Hydratant',      'brand' => 'Pantene'],
                    ['name' => 'Cantu Leave-In Conditioning Cream',      'brand' => 'Cantu'],
                    ['name' => 'OGX Après-Shampoing Argan',              'brand' => 'OGX'],
                ],
            ],

            // ─── MASQUE CAPILLAIRE ────────────────────────────────
            [
                'category_slug' => 'soin-des-cheveux-masque-capillaire',
                'items' => [
                    ['name' => 'Garnier Masque Huile d\'Argan',          'brand' => 'Garnier'],
                    ['name' => 'Elsève Masque 8 Secondes',               'brand' => "L'Oréal"],
                    ['name' => 'Pantene Masque Intense',                 'brand' => 'Pantene'],
                    ['name' => 'Cantu Masque Deep Treatment',            'brand' => 'Cantu'],
                    ['name' => 'Kerastase Masque Nutritive',             'brand' => 'Kérastase'],
                ],
            ],

            // ─── HUILE CHEVEUX ────────────────────────────────────
            [
                'category_slug' => 'soin-des-cheveux-huile-cheveux',
                'items' => [
                    ['name' => 'Huile d\'Argan Pure Bio',                'brand' => 'Arganour'],
                    ['name' => 'Vatika Huile Noix de Coco',              'brand' => 'Vatika'],
                    ['name' => 'OGX Huile d\'Argan du Maroc',            'brand' => 'OGX'],
                    ['name' => 'Elsève Huile Extraordinaire Sérum',      'brand' => "L'Oréal"],
                    ['name' => 'Garnier Huile Merveilles',               'brand' => 'Garnier'],
                    ['name' => 'Huile de Nigelle 100% Pure',             'brand' => 'Hemani'],
                ],
            ],

            // ─── SÉRUM ANTI-CHUTE ─────────────────────────────────
            [
                'category_slug' => 'soin-des-cheveux-serum-anti-chute',
                'items' => [
                    ['name' => 'Caphair Lotion Anti-Chute',              'brand' => 'Caphair'],
                    ['name' => 'Vichy Dercos Aminexil Clinical 5',       'brand' => 'Vichy'],
                    ['name' => 'Klorane Sérum Anti-Chute Quinine',       'brand' => 'Klorane'],
                    ['name' => 'Procapil Sérum Anti-Chute',              'brand' => 'Procapil'],
                    ['name' => 'Ducray Anacaps Sérum',                   'brand' => 'Ducray'],
                ],
            ],

            // ─── EAU MICELLAIRE / NETTOYANT ──────────────────────
            [
                'category_slug' => 'soin-du-visage-eau-micellaire',
                'items' => [
                    ['name' => 'Bioderma Sensibio H2O',                  'brand' => 'Bioderma'],
                    ['name' => 'Garnier Eau Micellaire Tout-en-1',       'brand' => 'Garnier'],
                    ['name' => 'La Roche-Posay Eau Micellaire',          'brand' => 'La Roche-Posay'],
                    ['name' => 'Nivea Eau Micellaire Peaux Sensibles',   'brand' => 'Nivea'],
                    ['name' => 'CeraVe Gel Moussant Nettoyant',         'brand' => 'CeraVe'],
                    ['name' => 'Bioderma Sébium Gel Moussant',           'brand' => 'Bioderma'],
                ],
            ],

            // ─── SÉRUM VISAGE ─────────────────────────────────────
            [
                'category_slug' => 'soin-du-visage-serum-visage',
                'items' => [
                    ['name' => 'The Ordinary Niacinamide 10% + Zinc 1%', 'brand' => 'The Ordinary'],
                    ['name' => 'The Ordinary Acide Hyaluronique 2%',     'brand' => 'The Ordinary'],
                    ['name' => 'The Ordinary Vitamine C Suspension',     'brand' => 'The Ordinary'],
                    ['name' => 'Vichy Minéral 89 Sérum',                 'brand' => 'Vichy'],
                    ['name' => 'La Roche-Posay Hyalu B5 Sérum',         'brand' => 'La Roche-Posay'],
                    ['name' => 'Garnier Sérum Vitamine C',               'brand' => 'Garnier'],
                ],
            ],

            // ─── CRÈME HYDRATANTE ─────────────────────────────────
            [
                'category_slug' => 'soin-du-visage-creme-hydratante',
                'items' => [
                    ['name' => 'Nivea Soft Crème Hydratante',            'brand' => 'Nivea'],
                    ['name' => 'CeraVe Crème Hydratante',                'brand' => 'CeraVe'],
                    ['name' => 'Neutrogena Hydro Boost',                 'brand' => 'Neutrogena'],
                    ['name' => 'Vichy Aqualia Thermal',                  'brand' => 'Vichy'],
                    ['name' => 'La Roche-Posay Toleriane Double Repair', 'brand' => 'La Roche-Posay'],
                    ['name' => 'Avène Crème Légère',                     'brand' => 'Avène'],
                ],
            ],

            // ─── SOIN ANTI-ACNÉ ───────────────────────────────────
            [
                'category_slug' => 'soin-du-visage-soin-anti-acne',
                'items' => [
                    ['name' => 'La Roche-Posay Effaclar Duo+',          'brand' => 'La Roche-Posay'],
                    ['name' => 'La Roche-Posay Effaclar Gel',           'brand' => 'La Roche-Posay'],
                    ['name' => 'Bioderma Sébium Global',                 'brand' => 'Bioderma'],
                    ['name' => 'Vichy Normaderm Phytosolution',          'brand' => 'Vichy'],
                    ['name' => 'The Ordinary Acide Salicylique 2%',      'brand' => 'The Ordinary'],
                    ['name' => 'Avène Cleanance Comedomed',              'brand' => 'Avène'],
                ],
            ],

            // ─── SPF / SOLAIRE ────────────────────────────────────
            [
                'category_slug' => 'soin-du-visage-spf-solaire',
                'items' => [
                    ['name' => 'La Roche-Posay Anthelios SPF50+',       'brand' => 'La Roche-Posay'],
                    ['name' => 'Eucerin Sun SPF50+ Visage',              'brand' => 'Eucerin'],
                    ['name' => 'Vichy Capital Soleil SPF50+',            'brand' => 'Vichy'],
                    ['name' => 'Bioderma Photoderm MAX SPF50+',          'brand' => 'Bioderma'],
                    ['name' => 'Garnier Ambre Solaire SPF50',            'brand' => 'Garnier'],
                ],
            ],

            // ─── ROUGE À LÈVRES ───────────────────────────────────
            [
                'category_slug' => 'maquillage-rouge-a-levres',
                'items' => [
                    ['name' => 'KIKO Unlimited Double Touch',            'brand' => 'KIKO Milano'],
                    ['name' => 'KIKO Smart Fusion Lipstick',             'brand' => 'KIKO Milano'],
                    ['name' => 'Bourjois Rouge Velvet',                  'brand' => 'Bourjois'],
                    ['name' => 'Bourjois Rouge Edition',                 'brand' => 'Bourjois'],
                    ['name' => 'Golden Rose Soft & Matte',               'brand' => 'Golden Rose'],
                    ['name' => "L'Oréal Color Riche",                   'brand' => "L'Oréal"],
                    ['name' => 'Farmasi Rouge à Lèvres Mat',             'brand' => 'Farmasi'],
                ],
            ],

            // ─── FOND DE TEINT ────────────────────────────────────
            [
                'category_slug' => 'maquillage-fond-de-teint',
                'items' => [
                    ['name' => 'KIKO Skin Tone Foundation',              'brand' => 'KIKO Milano'],
                    ['name' => 'Bourjois Healthy Mix Foundation',        'brand' => 'Bourjois'],
                    ['name' => 'Golden Rose Stick Foundation',           'brand' => 'Golden Rose'],
                    ['name' => "L'Oréal Infaillible 24H",               'brand' => "L'Oréal"],
                    ['name' => 'Farmasi BB Cream',                       'brand' => 'Farmasi'],
                    ['name' => 'Maybelline Fit Me Foundation',           'brand' => 'Maybelline'],
                ],
            ],

            // ─── MASCARA ─────────────────────────────────────────
            [
                'category_slug' => 'maquillage-mascara',
                'items' => [
                    ['name' => 'KIKO Lengthening Mascara',               'brand' => 'KIKO Milano'],
                    ['name' => 'Bourjois Mega Mascara',                  'brand' => 'Bourjois'],
                    ['name' => "L'Oréal Voluminous",                    'brand' => "L'Oréal"],
                    ['name' => 'Golden Rose Waterproof Mascara',         'brand' => 'Golden Rose'],
                    ['name' => 'Maybelline Lash Sensational',            'brand' => 'Maybelline'],
                ],
            ],

            // ─── KOHL / KAJAL ────────────────────────────────────
            [
                'category_slug' => 'maquillage-kohl-kajal',
                'items' => [
                    ['name' => 'Bourjois Contour Clubbing Waterproof',   'brand' => 'Bourjois'],
                    ['name' => "L'Oréal Le Liner Signature",            'brand' => "L'Oréal"],
                    ['name' => 'Golden Rose Eyeliner Precision',         'brand' => 'Golden Rose'],
                    ['name' => 'Rimmel Scandal Eyes Kajal',              'brand' => 'Rimmel'],
                    ['name' => 'KIKO Kajal & Eyeliner',                  'brand' => 'KIKO Milano'],
                ],
            ],

            // ─── CRÈME CORPS ─────────────────────────────────────
            [
                'category_slug' => 'soin-du-corps-creme-corps',
                'items' => [
                    ['name' => 'Nivea Soft Crème Corps',                 'brand' => 'Nivea'],
                    ['name' => 'Dove Crème Corps Hydratante',            'brand' => 'Dove'],
                    ['name' => 'Vaseline Intensive Care',                'brand' => 'Vaseline'],
                    ['name' => 'Nuxe Huile Prodigieuse Corps',           'brand' => 'Nuxe'],
                    ['name' => 'Garnier Body Aloe Vera',                 'brand' => 'Garnier'],
                ],
            ],

            // ─── GEL DOUCHE / SAVON ───────────────────────────────
            [
                'category_slug' => 'soin-du-corps-gel-douche-savon',
                'items' => [
                    ['name' => 'Dove Gel Douche Hydratant',              'brand' => 'Dove'],
                    ['name' => 'Nivea Gel Douche Fresh',                 'brand' => 'Nivea'],
                    ['name' => 'Savon Beldi Naturel',                    'brand' => 'Artisanat Maroc'],
                    ['name' => 'Dettol Gel Douche Antibactérien',        'brand' => 'Dettol'],
                ],
            ],

            // ─── DÉODORANT ───────────────────────────────────────
            [
                'category_slug' => 'soin-du-corps-deodorant',
                'items' => [
                    ['name' => 'Dove Original Déodorant Roll-On',        'brand' => 'Dove'],
                    ['name' => 'Nivea Black & White Déodorant',          'brand' => 'Nivea'],
                    ['name' => 'Rexona Women MotionSense',               'brand' => 'Rexona'],
                    ['name' => 'Garnier Mineral Déodorant',              'brand' => 'Garnier'],
                ],
            ],

            // ─── EAU DE PARFUM ───────────────────────────────────
            [
                'category_slug' => 'parfums-eau-de-parfum',
                'items' => [
                    ['name' => 'Zara Gardenia',                          'brand' => 'Zara'],
                    ['name' => 'Zara Rose Gold',                         'brand' => 'Zara'],
                    ['name' => 'Farmasi Floral Collection',              'brand' => 'Farmasi'],
                    ['name' => 'Swiss Arabian Shaghaf Oud',              'brand' => 'Swiss Arabian'],
                ],
            ],

            // ─── PARFUM ORIENTAL ─────────────────────────────────
            [
                'category_slug' => 'parfums-parfum-oriental',
                'items' => [
                    ['name' => 'Lattafa Raghba',                         'brand' => 'Lattafa'],
                    ['name' => 'Lattafa Ameerati',                       'brand' => 'Lattafa'],
                    ['name' => 'Ajmal Deja Vu',                          'brand' => 'Ajmal'],
                    ['name' => 'Swiss Arabian Mukhalat',                 'brand' => 'Swiss Arabian'],
                ],
            ],

            // ─── VERNIS À ONGLES ─────────────────────────────────
            [
                'category_slug' => 'ongles-vernis-a-ongles',
                'items' => [
                    ['name' => 'KIKO Gel Effect Nail Lacquer',           'brand' => 'KIKO Milano'],
                    ['name' => 'Golden Rose Nail Expert',                'brand' => 'Golden Rose'],
                    ['name' => 'Bourjois So Laque Glossy',               'brand' => 'Bourjois'],
                    ['name' => "L'Oréal Color Riche Vernis",            'brand' => "L'Oréal"],
                    ['name' => 'Farmasi Nail Dazzle',                    'brand' => 'Farmasi'],
                ],
            ],
        ];

        foreach ($products as $group) {
            $categoryId = $cat[$group['category_slug']] ?? null;

            if (! $categoryId) {
                $this->command->warn("Catégorie introuvable : {$group['category_slug']}");
                continue;
            }

            foreach ($group['items'] as $item) {
                DB::table('products')->insert([
                    'name'        => $item['name'],
                    'slug'        => Str::slug($item['name']),
                    'brand'       => $item['brand'],
                    'category_id' => $categoryId,
                    'rating_avg'  => 0,
                    'rating_count'=> 0,
                    'is_approved' => true,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        $total = DB::table('products')->count();
        $this->command->info("✅ {$total} produits insérés avec succès !");
    }
}
