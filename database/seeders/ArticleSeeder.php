<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create article categories
        $categories = [
            'Teknologi Insulasi',
            'Tips & Cara',
            'Berita Industri',
            'Tutorial Instalasi',
            'Review Produk'
        ];

        $createdCategories = [];
        foreach ($categories as $categoryName) {
            $category = ArticleCategory::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
            $createdCategories[] = $category;
        }

        // Create sample articles
        $sampleArticles = [
            [
                'title' => 'Panduan Lengkap Memilih Insulasi yang Tepat untuk Industri',
                'excerpt' => 'Pelajari cara memilih jenis insulasi yang paling sesuai untuk kebutuhan industri Anda dengan pertimbangan efisiensi energi dan biaya.',
                'content' => "Insulasi merupakan komponen penting dalam berbagai aplikasi industri. Pemilihan jenis insulasi yang tepat dapat menghemat biaya energi secara signifikan.\n\nFaktor-faktor yang perlu dipertimbangkan:\n1. Suhu operasi\n2. Lingkungan kerja\n3. Tingkat efisiensi yang diinginkan\n4. Budget yang tersedia\n\nDengan mempertimbangkan faktor-faktor tersebut, Anda dapat membuat keputusan yang tepat untuk investasi insulasi industri Anda.",
                'category' => 'Teknologi Insulasi',
                'status' => 'published'
            ],
            [
                'title' => 'Tips Menghemat Energi dengan Insulasi Berkualitas',
                'excerpt' => 'Dapatkan tips praktis untuk mengoptimalkan penggunaan energi di fasilitas industri Anda menggunakan sistem insulasi yang tepat.',
                'content' => "Penghematan energi merupakan prioritas utama dalam operasional industri modern. Insulasi berkualitas tinggi dapat mengurangi kehilangan panas hingga 70%.\n\nTips praktis penghematan energi:\n- Lakukan audit energi rutin\n- Pilih material insulasi dengan R-value yang sesuai\n- Pastikan instalasi dilakukan dengan benar\n- Lakukan maintenance berkala\n\nInvestasi pada insulasi berkualitas akan memberikan return on investment yang menguntungkan dalam jangka panjang.",
                'category' => 'Tips & Cara',
                'status' => 'published'
            ],
            [
                'title' => 'Tren Terbaru dalam Teknologi Insulasi Industri 2025',
                'excerpt' => 'Simak perkembangan terbaru dalam dunia teknologi insulasi industri dan bagaimana hal ini dapat menguntungkan bisnis Anda.',
                'content' => "Industri insulasi terus berkembang dengan inovasi-inovasi terbaru yang lebih efisien dan ramah lingkungan.\n\nTren teknologi insulasi 2025:\n1. Material nano-teknologi\n2. Insulasi cerdas dengan sensor IoT\n3. Material ramah lingkungan\n4. Sistem insulasi modular\n\nTeknologi-teknologi ini memberikan peluang besar untuk meningkatkan efisiensi operasional industri.",
                'category' => 'Berita Industri',
                'status' => 'published'
            ],
            [
                'title' => 'Cara Instalasi Insulasi Pipa yang Benar',
                'excerpt' => 'Tutorial step-by-step untuk melakukan instalasi insulasi pipa dengan hasil yang optimal dan tahan lama.',
                'content' => "Instalasi insulasi pipa yang benar sangat penting untuk mencapai efisiensi maksimal. Berikut adalah panduan lengkapnya.\n\nLangkah-langkah instalasi:\n1. Persiapan alat dan material\n2. Pembersihan permukaan pipa\n3. Pengukuran dan pemotongan insulasi\n4. Pemasangan dengan teknik yang benar\n5. Finishing dan pengamanan\n\nPastikan semua sambungan rapat dan tidak ada celah yang dapat mengurangi efektivitas insulasi.",
                'category' => 'Tutorial Instalasi',
                'status' => 'draft'
            ],
            [
                'title' => 'Review Material Insulasi Glasswool vs Rockwool',
                'excerpt' => 'Perbandingan mendalam antara glasswool dan rockwool untuk membantu Anda memilih material insulasi yang tepat.',
                'content' => "Glasswool dan rockwool adalah dua jenis insulasi yang paling populer di industri. Keduanya memiliki karakteristik unik.\n\nPerbandingan utama:\n- Ketahanan terhadap api\n- Kemampuan isolasi termal\n- Kemudahan instalasi\n- Harga dan availability\n- Dampak lingkungan\n\nPemilihan material tergantung pada spesifikasi aplikasi dan prioritas proyek Anda.",
                'category' => 'Review Produk',
                'status' => 'published'
            ]
        ];

        foreach ($sampleArticles as $articleData) {
            $category = collect($createdCategories)->firstWhere('name', $articleData['category']);

            Article::create([
                'category_id' => $category->id,
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'excerpt' => $articleData['excerpt'],
                'content' => $articleData['content'],
                'status' => $articleData['status'],
                'published_at' => $articleData['status'] === 'published' ? now() : null,
            ]);
        }
    }
}
