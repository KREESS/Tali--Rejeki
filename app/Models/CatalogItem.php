<?php
// app/Models/CatalogItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        // kalau kamu punya kolom lain, tambahkan di sini
    ];

    /* ================== RELASI ================== */
    public function images()
    {
        return $this->hasMany(CatalogImage::class, 'item_id')->orderBy('sort_order')->orderBy('id');
    }

    // Gambar utama (is_primary=1), fallback ke gambar pertama bila tidak ada
    public function primaryImage()
    {
        return $this->hasOne(CatalogImage::class, 'item_id')
            ->where('is_primary', 1)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function files()
    {
        return $this->hasMany(CatalogFile::class, 'item_id');
    }

    // File utama: prioritaskan PDF jika ada, lalu yang pertama
    public function primaryFile()
    {
        return $this->hasOne(CatalogFile::class, 'item_id')
            ->orderByRaw("CASE WHEN LOWER(file_url) LIKE '%.pdf' THEN 0 ELSE 1 END")
            ->orderBy('id');
    }

    /* ============== HELPER URL PUBLIC ============== */
    protected function toPublicUrl(?string $path): ?string
    {
        if (!$path) return null;
        $lower = strtolower($path);
        if (str_starts_with($lower, 'http://') || str_starts_with($lower, 'https://') || str_starts_with($lower, '//') || str_starts_with($lower, 'data:')) {
            return $path; // sudah absolut
        }
        $path = ltrim($path, '/');
        if (str_starts_with($path, 'public/')) $path = substr($path, 7); // buang 'public/'

        return asset($path); // langsung dari public/
    }

    /* ============== ACCESSOR SIAP PAKAI DI BLADE ============== */
    public function getCoverImageSrcAttribute(): ?string
    {
        $url = $this->primaryImage?->image_url ?: $this->images()->value('image_url');
        return $this->toPublicUrl($url);
    }

    public function getPrimaryFileHrefAttribute(): ?string
    {
        $url = $this->primaryFile?->file_url ?: $this->files()->value('file_url');
        return $this->toPublicUrl($url);
    }

    public function getPrimaryFileExtAttribute(): ?string
    {
        $url = $this->primaryFile?->file_url ?: null;
        return $url ? strtolower(pathinfo($url, PATHINFO_EXTENSION)) : null;
    }

    public function getFileTypeBadgeAttribute(): string
    {
        $ext = $this->primary_file_ext;
        return strtoupper($ext ?: 'FILE');
    }
}
