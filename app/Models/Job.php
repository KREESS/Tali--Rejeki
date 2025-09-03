<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Job extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description_html',
        'location',
        'employment_type',
        'remote_policy',
        'department',
        'salary_min',
        'salary_max',
        'salary_currency',
        'apply_url',
        'apply_email',
        'status',
        'published_at',
        'close_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'close_at'     => 'datetime',
    ];

    // Biar field virtual ikut muncul di toArray()/JSON API
    protected $appends = [
        'is_open',
        'salary_display',
    ];

    /** Route model binding pakai slug (SEO-friendly) */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /* -------------------------- Scopes -------------------------- */

    /** Hanya job yang berstatus published dan (sudah waktunya tayang) */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /** Job yang masih terbuka (published + belum lewat close_at) */
    public function scopeOpen(Builder $query): Builder
    {
        return $query->published()
            ->where(function ($q) {
                $q->whereNull('close_at')
                    ->orWhere('close_at', '>=', now());
            });
    }

    /** Pencarian sederhana by judul/summary/lokasi */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (blank($term)) return $query;
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('summary', 'like', "%{$term}%")
                ->orWhere('location', 'like', "%{$term}%");
        });
    }

    /* ------------------------ Accessors ------------------------- */

    /** Apakah lowongan masih open (boolean) */
    protected function isOpen(): Attribute
    {
        return Attribute::get(function (): bool {
            $published = $this->status === 'published'
                && (is_null($this->published_at) || $this->published_at->lte(now()));

            $notClosed = is_null($this->close_at) || $this->close_at->gte(now());

            return $published && $notClosed;
        });
    }

    /** Teks gaji rapi: "IDR 12.000.000 - 20.000.000", atau "IDR ≥ 12.000.000" */
    protected function salaryDisplay(): Attribute
    {
        return Attribute::get(function (): ?string {
            $cur = $this->salary_currency ?: 'IDR';

            $fmt = fn($n) => number_format((int) $n, 0, ',', '.');

            $min = $this->salary_min;
            $max = $this->salary_max;

            if (is_null($min) && is_null($max)) {
                return null;
            } elseif (!is_null($min) && !is_null($max)) {
                return "{$cur} {$fmt($min)} - {$fmt($max)}";
            } elseif (!is_null($min)) {
                return "{$cur} ≥ {$fmt($min)}";
            } else { // hanya max
                return "{$cur} ≤ {$fmt($max)}";
            }
        });
    }

    /* --------------------- Auto-generate slug ------------------- */

    protected static function booted(): void
    {
        static::saving(function (Job $job) {
            if (blank($job->slug) && filled($job->title)) {
                $base = Str::slug($job->title);
                $slug = $base;
                $i = 2;

                // Pastikan unik (hindari bentrok saat create/update)
                while (static::where('slug', $slug)
                    ->when($job->exists, fn($q) => $q->where('id', '!=', $job->id))
                    ->exists()
                ) {
                    $slug = "{$base}-{$i}";
                    $i++;
                }

                $job->slug = $slug;
            }
        });
    }
}
