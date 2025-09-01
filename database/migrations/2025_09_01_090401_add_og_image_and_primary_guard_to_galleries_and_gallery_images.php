<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // 1) Tambah og_image_id di galleries (nullable)
        Schema::table('galleries', function (Blueprint $table) {
            $table->foreignId('og_image_id')->nullable()->after('canonical_url');
        });

        // Tambahkan FK setelah kolom ada
        Schema::table('galleries', function (Blueprint $table) {
            $table->foreign('og_image_id')
                ->references('id')->on('gallery_images')
                ->nullOnDelete();
        });

        // 2) Tambah generated column + unique index di gallery_images (MySQL)
        // primary_guard = gallery_id jika is_primary = 1, else NULL
        DB::statement("
            ALTER TABLE gallery_images
            ADD COLUMN primary_guard INT
            GENERATED ALWAYS AS (CASE WHEN is_primary THEN gallery_id ELSE NULL END) VIRTUAL
        ");

        DB::statement("
            CREATE UNIQUE INDEX uniq_primary_per_gallery
            ON gallery_images(primary_guard)
        ");
    }

    public function down(): void
    {
        // Hapus unique index & kolom generated
        DB::statement("DROP INDEX uniq_primary_per_gallery ON gallery_images");
        DB::statement("ALTER TABLE gallery_images DROP COLUMN primary_guard");

        // Hapus FK & kolom og_image_id
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['og_image_id']);
            $table->dropColumn('og_image_id');
        });
    }
};
