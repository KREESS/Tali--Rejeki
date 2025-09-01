<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class GalleryImage extends Model
{
    protected $table = 'gallery_images';

    protected $fillable = [
        'gallery_id',
        'image_url',
        'alt_text',
        'title_attr',
        'caption',
        'seo_filename',
        'is_primary',
        'sort_order',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'sort_order' => 'integer',
    ];

    /** Kolom generated: tidak perlu diekspos ke API */
    protected $hidden = [
        'primary_guard',
    ];

    /** Saat image berubah, sentuh parent agar updated_at gallery ikut naik */
    protected $touches = ['gallery'];

    /** Relasi: milik galeri */
    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    /** Scope: urut tampil stabil */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /** Scope: hanya primary */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    /**
     * Jadikan gambar ini sebagai primary untuk galeri terkait.
     * Aman (transaksi) dan tetap kompatibel dengan constraint uniq primary per gallery.
     */
    public function setAsPrimary(): void
    {
        DB::transaction(function () {
            static::where('gallery_id', $this->gallery_id)->update(['is_primary' => false]);
            $this->forceFill(['is_primary' => true])->save();
        });
    }
}
