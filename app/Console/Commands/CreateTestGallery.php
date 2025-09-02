<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Gallery;

class CreateTestGallery extends Command
{
    protected $signature = 'gallery:create-test';
    protected $description = 'Create a test gallery for debugging';

    public function handle()
    {
        $gallery = Gallery::create([
            'title' => 'Test Gallery',
            'slug' => 'test-gallery-' . time(),
            'description' => 'This is a test gallery for debugging purposes',
            'status' => 'draft'
        ]);

        $this->info("Test gallery created with ID: {$gallery->id}");
        $this->info("Edit URL: http://localhost:8000/admin/gallery/{$gallery->id}/edit");

        return 0;
    }
}
