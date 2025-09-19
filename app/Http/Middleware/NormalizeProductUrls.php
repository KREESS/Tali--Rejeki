<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NormalizeProductUrls
{
    public function handle(Request $request, Closure $next)
    {
        // Hanya GET /products (tanpa segmen setelahnya)
        if ($request->isMethod('GET') && $request->is('products')) {
            $cat = $request->query('category');
            $sub = $request->query('subcategory');

            if ($cat) {
                // Bangun URL kanonik: /products/{category}[/{subcategory}]
                $target = url('/products/' . urlencode($cat) . ($sub ? '/' . urlencode($sub) : ''));

                // Bawa semua query lain selain category/subcategory (search, sort, min_price, max_price, dll)
                $qs = Arr::except($request->query(), ['category', 'subcategory']);
                $query = http_build_query($qs);

                return redirect()->to($target . ($query ? ('?' . $query) : ''), 301);
            }
        }

        return $next($request);
    }
}
