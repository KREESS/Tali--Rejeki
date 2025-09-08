<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class NavbarComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $view->with('categories', $categories);
    }
}
