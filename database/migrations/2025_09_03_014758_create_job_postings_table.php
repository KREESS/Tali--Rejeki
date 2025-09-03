<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();

            // Info dasar lowongan
            $table->string('title', 200);
            $table->string('slug', 220)->unique();     // URL ramah SEO
            $table->string('summary', 255)->nullable();
            $table->mediumText('description_html');    // Deskripsi lengkap (HTML/teks)

            // Lokasi & tipe kerja
            $table->string('location', 120);           // contoh: "Jakarta", "Remote"
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'internship'])
                ->default('full-time');
            $table->enum('remote_policy', ['onsite', 'hybrid', 'remote'])
                ->default('hybrid');
            $table->string('department', 100)->nullable();

            // Gaji (opsional)
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->char('salary_currency', 3)->default('IDR');

            // Cara apply (opsional)
            $table->string('apply_url', 500)->nullable();
            $table->string('apply_email', 160)->nullable();

            // Status publikasi
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->dateTime('close_at')->nullable();

            $table->timestamps();

            // Index yang sering dipakai
            $table->index(['status', 'published_at'], 'idx_jobs_status_published');
            $table->index('location', 'idx_jobs_location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
