<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Glasswool',
                'slug' => 'glasswool',
                'meta_title' => 'Glasswool - Insulasi Termal dan Akustik Berkualitas',
                'meta_description' => 'Insulasi glasswool berkualitas tinggi untuk thermal dan acoustic insulation. Ramah lingkungan dan tahan panas tinggi.'
            ],
            [
                'name' => 'Rockwool',
                'slug' => 'rockwool',
                'meta_title' => 'Rockwool - Insulasi Tahan Api dan Non-Combustible',
                'meta_description' => 'Material insulasi rockwool berbahan dasar batu basalt dengan ketahanan api luar biasa dan sifat non-combustible.'
            ],
            [
                'name' => 'Nitrile Rubber',
                'slug' => 'nitrile-rubber',
                'meta_title' => 'Nitrile Rubber - Karet Sintetis Premium',
                'meta_description' => 'Karet sintetis nitrile berkualitas premium untuk berbagai aplikasi industri dengan daya tahan tinggi.'
            ],
            [
                'name' => 'Aksesoris HVAC',
                'slug' => 'aksesoris-hvac',
                'meta_title' => 'Aksesoris HVAC - Komponen Pendukung Sistem HVAC',
                'meta_description' => 'Berbagai aksesoris dan komponen pendukung sistem HVAC berkualitas tinggi untuk instalasi yang optimal.'
            ],
            [
                'name' => 'Peredam Panas',
                'slug' => 'peredam-panas',
                'meta_title' => 'Peredam Panas - Insulasi Thermal Protection',
                'meta_description' => 'Material peredam panas untuk proteksi thermal dalam berbagai aplikasi industri dan komersial.'
            ],
            [
                'name' => 'Insulasi Pipa',
                'slug' => 'insulasi-pipa',
                'meta_title' => 'Insulasi Pipa - Thermal Insulation untuk Pipa',
                'meta_description' => 'Solusi insulasi pipa untuk sistem perpipaan dengan efisiensi thermal yang tinggi.'
            ]
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
