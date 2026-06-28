<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $cat = DB::table('categories')
            ->whereNotNull('parent_id')
            ->pluck('id', 'slug');

        $products = [

            // ── SOIN DES CHEVEUX ──────────────────────────────

            'soin-des-cheveux-shampoing' => [
                ['name' => 'Caphair Shampoing Anti-Chute',       'brand' => 'Caphair'],
                ['name' => 'Caphair Shampoing Energisant',       'brand' => 'Caphair'],
                ['name' => 'Garnier Ultra Doux Cheveux Secs',    'brand' => 'Garnier'],
                ['name' => 'Garnier Ultra Doux Cheveux Gras',    'brand' => 'Garnier'],
                ['name' => 'Elsève Huile Extraordinaire',        'brand' => "L'Oréal"],
                ['name' => 'Elsève Anti-Casse',                  'brand' => "L'Oréal"],
                ['name' => 'Pantene Lisse & Soyeux',             'brand' => 'Pantene'],
                ['name' => 'Pantene Anti-Pelliculaire',          'brand' => 'Pantene'],
                ['name' => 'Head & Shoulders Classic',           'brand' => 'Head & Shoulders'],
                ['name' => 'Vichy Dercos Anti-Pelliculaire',     'brand' => 'Vichy'],
                ['name' => 'Vichy Dercos Energisant',            'brand' => 'Vichy'],
                ['name' => 'Klorane Shampoing à la Quinine',     'brand' => 'Klorane'],
                ['name' => 'OGX Argan Oil of Morocco Shampoing', 'brand' => 'OGX'],
                ['name' => 'Cantu Shea Butter Shampoing',        'brand' => 'Cantu'],
            ],

            'soin-des-cheveux-apres-shampoing' => [
                ['name' => 'Garnier Ultra Doux Après-Shampoing',       'brand' => 'Garnier'],
                ['name' => 'Elsève Extraordinary Oil Après-Shampoing', 'brand' => "L'Oréal"],
                ['name' => 'Pantene Après-Shampoing Hydratant',        'brand' => 'Pantene'],
                ['name' => 'Cantu Leave-In Conditioning Cream',        'brand' => 'Cantu'],
                ['name' => 'OGX Après-Shampoing Argan',                'brand' => 'OGX'],
            ],

            'soin-des-cheveux-masque-capillaire' => [
                ['name' => "Garnier Masque Huile d'Argan",  'brand' => 'Garnier'],
                ['name' => 'Elsève Masque 8 Secondes',      'brand' => "L'Oréal"],
                ['name' => 'Pantene Masque Intense',        'brand' => 'Pantene'],
                ['name' => 'Cantu Masque Deep Treatment',   'brand' => 'Cantu'],
                ['name' => 'Kérastase Masque Nutritive',    'brand' => 'Kérastase'],
            ],

            'soin-des-cheveux-huile-cheveux' => [
                ['name' => "Huile d'Argan Pure Bio",             'brand' => 'Arganour'],
                ['name' => 'Vatika Huile Noix de Coco',          'brand' => 'Vatika'],
                ['name' => "OGX Huile d'Argan du Maroc",         'brand' => 'OGX'],
                ['name' => 'Elsève Huile Extraordinaire Sérum',  'brand' => "L'Oréal"],
                ['name' => 'Garnier Huile Merveilles',           'brand' => 'Garnier'],
                ['name' => 'Huile de Nigelle 100% Pure',         'brand' => 'Hemani'],
                ['name' => 'Huile de Figue de Barbarie',         'brand' => 'Zineglob'],
            ],

            'soin-des-cheveux-serum-anti-chute' => [
                ['name' => 'Caphair Lotion Anti-Chute',        'brand' => 'Caphair'],
                ['name' => 'Vichy Dercos Aminexil Clinical 5', 'brand' => 'Vichy'],
                ['name' => 'Klorane Sérum Anti-Chute Quinine', 'brand' => 'Klorane'],
                ['name' => 'Procapil Sérum Anti-Chute',        'brand' => 'Procapil'],
                ['name' => 'Ducray Anacaps Sérum',             'brand' => 'Ducray'],
            ],

            'soin-des-cheveux-coloration' => [
                ['name' => 'Garnier Nutrisse Coloration',    'brand' => 'Garnier'],
                ['name' => "L'Oréal Excellence Crème",      'brand' => "L'Oréal"],
                ['name' => 'Schwarzkopf Perfect Mousse',     'brand' => 'Schwarzkopf'],
                ['name' => 'Palette Intensive Color Cream',  'brand' => 'Palette'],
            ],

            // ── SOIN DU VISAGE ────────────────────────────────

            'soin-du-visage-eau-micellaire' => [
                ['name' => 'Bioderma Sensibio H2O',              'brand' => 'Bioderma'],
                ['name' => 'Garnier Eau Micellaire Tout-en-1',   'brand' => 'Garnier'],
                ['name' => 'La Roche-Posay Eau Micellaire',      'brand' => 'La Roche-Posay'],
                ['name' => 'Nivea Eau Micellaire Peaux Sensibles', 'brand' => 'Nivea'],
                ['name' => 'CeraVe Gel Moussant Nettoyant',      'brand' => 'CeraVe'],
                ['name' => 'Bioderma Sébium Gel Moussant',       'brand' => 'Bioderma'],
            ],

            'soin-du-visage-serum-visage' => [
                ['name' => 'The Ordinary Niacinamide 10% + Zinc', 'brand' => 'The Ordinary'],
                ['name' => 'The Ordinary Acide Hyaluronique 2%', 'brand' => 'The Ordinary'],
                ['name' => 'The Ordinary Vitamine C Suspension', 'brand' => 'The Ordinary'],
                ['name' => 'Vichy Minéral 89 Sérum',             'brand' => 'Vichy'],
                ['name' => 'La Roche-Posay Hyalu B5 Sérum',      'brand' => 'La Roche-Posay'],
                ['name' => 'Garnier Sérum Vitamine C',           'brand' => 'Garnier'],
            ],

            'soin-du-visage-creme-hydratante' => [
                ['name' => 'Nivea Soft Crème Hydratante',        'brand' => 'Nivea'],
                ['name' => 'CeraVe Crème Hydratante',            'brand' => 'CeraVe'],
                ['name' => 'Neutrogena Hydro Boost',             'brand' => 'Neutrogena'],
                ['name' => 'Vichy Aqualia Thermal',              'brand' => 'Vichy'],
                ['name' => 'La Roche-Posay Toleriane',           'brand' => 'La Roche-Posay'],
                ['name' => 'Avène Crème Légère',                 'brand' => 'Avène'],
            ],

            'soin-du-visage-soin-anti-acne' => [
                ['name' => 'La Roche-Posay Effaclar Duo+',     'brand' => 'La Roche-Posay'],
                ['name' => 'La Roche-Posay Effaclar Gel',      'brand' => 'La Roche-Posay'],
                ['name' => 'Bioderma Sébium Global',            'brand' => 'Bioderma'],
                ['name' => 'Vichy Normaderm Phytosolution',     'brand' => 'Vichy'],
                ['name' => 'The Ordinary Acide Salicylique 2%', 'brand' => 'The Ordinary'],
                ['name' => 'Avène Cleanance Comedomed',         'brand' => 'Avène'],
            ],

            'soin-du-visage-spf-solaire' => [
                ['name' => 'La Roche-Posay Anthelios SPF50+', 'brand' => 'La Roche-Posay'],
                ['name' => 'Eucerin Sun SPF50+ Visage',       'brand' => 'Eucerin'],
                ['name' => 'Vichy Capital Soleil SPF50+',     'brand' => 'Vichy'],
                ['name' => 'Bioderma Photoderm MAX SPF50+',   'brand' => 'Bioderma'],
                ['name' => 'Garnier Ambre Solaire SPF50',     'brand' => 'Garnier'],
            ],

            'soin-du-visage-contour-des-yeux' => [
                ['name' => 'La Roche-Posay Pigmentclar Yeux', 'brand' => 'La Roche-Posay'],
                ['name' => 'Vichy Liftactiv Yeux',            'brand' => 'Vichy'],
                ['name' => 'Nivea Q10 Contour des Yeux',      'brand' => 'Nivea'],
                ['name' => 'Garnier Caffeine Eye Serum',      'brand' => 'Garnier'],
            ],

            'soin-du-visage-masque-visage' => [
                ['name' => 'Ghassoul Poudre Naturel',          'brand' => 'Artisanat Maroc'],
                ['name' => 'Garnier Masque Charbon',           'brand' => 'Garnier'],
                ['name' => 'La Roche-Posay Masque Purifiant',  'brand' => 'La Roche-Posay'],
                ['name' => 'The Ordinary AHA 30% + BHA 2%',    'brand' => 'The Ordinary'],
            ],

            // ── MAQUILLAGE ────────────────────────────────────

            'maquillage-rouge-a-levres' => [
                ['name' => 'KIKO Unlimited Double Touch',    'brand' => 'KIKO Milano'],
                ['name' => 'KIKO Smart Fusion Lipstick',     'brand' => 'KIKO Milano'],
                ['name' => 'Bourjois Rouge Velvet',          'brand' => 'Bourjois'],
                ['name' => 'Bourjois Rouge Edition',         'brand' => 'Bourjois'],
                ['name' => 'Golden Rose Soft & Matte',       'brand' => 'Golden Rose'],
                ['name' => "L'Oréal Color Riche",           'brand' => "L'Oréal"],
                ['name' => 'Farmasi Rouge à Lèvres Mat',     'brand' => 'Farmasi'],
                ['name' => 'Maybelline SuperStay Matte Ink', 'brand' => 'Maybelline'],
            ],

            'maquillage-fond-de-teint' => [
                ['name' => 'KIKO Skin Tone Foundation',      'brand' => 'KIKO Milano'],
                ['name' => 'Bourjois Healthy Mix Foundation', 'brand' => 'Bourjois'],
                ['name' => 'Golden Rose Stick Foundation',   'brand' => 'Golden Rose'],
                ['name' => "L'Oréal Infaillible 24H",       'brand' => "L'Oréal"],
                ['name' => 'Farmasi BB Cream',               'brand' => 'Farmasi'],
                ['name' => 'Maybelline Fit Me Foundation',   'brand' => 'Maybelline'],
            ],

            'maquillage-mascara' => [
                ['name' => 'KIKO Lengthening Mascara',      'brand' => 'KIKO Milano'],
                ['name' => 'Bourjois Mega Mascara',         'brand' => 'Bourjois'],
                ['name' => "L'Oréal Voluminous",           'brand' => "L'Oréal"],
                ['name' => 'Golden Rose Waterproof Mascara', 'brand' => 'Golden Rose'],
                ['name' => 'Maybelline Lash Sensational',   'brand' => 'Maybelline'],
            ],

            'maquillage-kohl-kajal' => [
                ['name' => 'Bourjois Contour Clubbing Waterproof', 'brand' => 'Bourjois'],
                ['name' => "L'Oréal Le Liner Signature",         'brand' => "L'Oréal"],
                ['name' => 'Golden Rose Eyeliner Precision',      'brand' => 'Golden Rose'],
                ['name' => 'Rimmel Scandal Eyes Kajal',           'brand' => 'Rimmel'],
                ['name' => 'KIKO Kajal & Eyeliner',               'brand' => 'KIKO Milano'],
            ],

            'maquillage-palette-yeux' => [
                ['name' => 'KIKO Green Me Eyeshadow Palette', 'brand' => 'KIKO Milano'],
                ['name' => 'Golden Rose Eye Shadow Palette',  'brand' => 'Golden Rose'],
                ['name' => "L'Oréal La Petite Palette",      'brand' => "L'Oréal"],
                ['name' => 'Maybelline The Nudes Palette',    'brand' => 'Maybelline'],
            ],

            'maquillage-blush-bronzer' => [
                ['name' => 'KIKO Soft Touch Blush',          'brand' => 'KIKO Milano'],
                ['name' => 'Bourjois Little Round Pot Blush', 'brand' => 'Bourjois'],
                ['name' => 'Golden Rose Blush',              'brand' => 'Golden Rose'],
                ['name' => "L'Oréal True Match Blush",      'brand' => "L'Oréal"],
            ],

            'maquillage-highlighter' => [
                ['name' => 'KIKO 3D Hydra Lipgloss Highlighter', 'brand' => 'KIKO Milano'],
                ['name' => 'Golden Rose Highlighter',           'brand' => 'Golden Rose'],
                ['name' => 'Farmasi Highlighter Stick',         'brand' => 'Farmasi'],
            ],

            // ── SOIN DU CORPS ─────────────────────────────────

            'soin-du-corps-creme-corps' => [
                ['name' => 'Nivea Soft Crème Corps',       'brand' => 'Nivea'],
                ['name' => 'Dove Crème Corps Hydratante',  'brand' => 'Dove'],
                ['name' => 'Vaseline Intensive Care',      'brand' => 'Vaseline'],
                ['name' => 'Nuxe Huile Prodigieuse Corps', 'brand' => 'Nuxe'],
                ['name' => 'Garnier Body Aloe Vera',       'brand' => 'Garnier'],
            ],

            'soin-du-corps-gel-douche-savon' => [
                ['name' => 'Dove Gel Douche Hydratant',       'brand' => 'Dove'],
                ['name' => 'Nivea Gel Douche Fresh',          'brand' => 'Nivea'],
                ['name' => 'Savon Beldi Naturel',             'brand' => 'Artisanat Maroc'],
                ['name' => 'Dettol Gel Douche Antibactérien', 'brand' => 'Dettol'],
            ],

            'soin-du-corps-deodorant' => [
                ['name' => 'Dove Original Déodorant Roll-On', 'brand' => 'Dove'],
                ['name' => 'Nivea Black & White Déodorant',   'brand' => 'Nivea'],
                ['name' => 'Rexona Women MotionSense',        'brand' => 'Rexona'],
                ['name' => 'Garnier Mineral Déodorant',       'brand' => 'Garnier'],
            ],

            'soin-du-corps-epilation' => [
                ['name' => 'Veet Crème Dépilatoire',  'brand' => 'Veet'],
                ['name' => 'Veet Strips Cire Froide',  'brand' => 'Veet'],
                ['name' => 'Gillette Venus Rasoir',    'brand' => 'Gillette'],
            ],

            'soin-du-corps-autobronzant' => [
                ['name' => 'Garnier Ambre Solaire Autobronzant', 'brand' => 'Garnier'],
                ['name' => 'Dove DermaSpa Summer Revived',      'brand' => 'Dove'],
            ],

            // ── PARFUMS ───────────────────────────────────────

            'parfums-eau-de-parfum' => [
                ['name' => 'Zara Gardenia',              'brand' => 'Zara'],
                ['name' => 'Zara Rose Gold',             'brand' => 'Zara'],
                ['name' => 'Farmasi Floral Collection',  'brand' => 'Farmasi'],
                ['name' => 'Swiss Arabian Shaghaf Oud',  'brand' => 'Swiss Arabian'],
                ['name' => 'Lattafa Raghba',             'brand' => 'Lattafa'],
            ],

            'parfums-parfum-oriental' => [
                ['name' => 'Lattafa Ameerati',        'brand' => 'Lattafa'],
                ['name' => 'Lattafa Yara',            'brand' => 'Lattafa'],
                ['name' => 'Ajmal Deja Vu',           'brand' => 'Ajmal'],
                ['name' => 'Swiss Arabian Mukhalat',  'brand' => 'Swiss Arabian'],
                ['name' => 'Rasasi La Yuqawam',       'brand' => 'Rasasi'],
            ],

            'parfums-eau-de-toilette' => [
                ['name' => 'Zara Man Gold',             'brand' => 'Zara'],
                ['name' => "L'Oréal Men Expert Carbon", 'brand' => "L'Oréal"],
                ['name' => 'Nivea Men Fresh Active',    'brand' => 'Nivea'],
            ],

            // ── ONGLES ────────────────────────────────────────

            'ongles-vernis-a-ongles' => [
                ['name' => 'KIKO Gel Effect Nail Lacquer', 'brand' => 'KIKO Milano'],
                ['name' => 'Golden Rose Nail Expert',      'brand' => 'Golden Rose'],
                ['name' => 'Bourjois So Laque Glossy',     'brand' => 'Bourjois'],
                ['name' => "L'Oréal Color Riche Vernis",  'brand' => "L'Oréal"],
                ['name' => 'Farmasi Nail Dazzle',          'brand' => 'Farmasi'],
            ],

            'ongles-soin-ongles' => [
                ['name' => 'Mavala Scientifique Durcisseur',  'brand' => 'Mavala'],
                ['name' => 'Essie Treat Love & Color',        'brand' => 'Essie'],
                ['name' => 'Golden Rose Nail Care Base Coat', 'brand' => 'Golden Rose'],
            ],

            'ongles-gel-semi-perma' => [
                ['name' => 'KIKO Power Pro Nail Lacquer',  'brand' => 'KIKO Milano'],
                ['name' => 'Golden Rose Gel Look Shine',   'brand' => 'Golden Rose'],
                ['name' => 'Farmasi Gel Nail Polish',      'brand' => 'Farmasi'],
            ],
        ];

        $inserted = 0;

        foreach ($products as $slug => $items) {
            $categoryId = $cat[$slug] ?? null;

            if (! $categoryId) {
                $this->command->warn("⚠️  Sous-catégorie introuvable : {$slug}");
                continue;
            }

            foreach ($items as $item) {
                DB::table('products')->insertOrIgnore([
                    'name'         => $item['name'],
                    'slug'         => Str::slug($item['name']),
                    'brand'        => $item['brand'],
                    'category_id'  => $categoryId,
                    'rating_avg'   => 0,
                    'rating_count' => 0,
                    'is_approved'  => true,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
                $inserted++;
            }
        }

        $this->command->info("✅ {$inserted} produits insérés avec succès !");
    }
}
