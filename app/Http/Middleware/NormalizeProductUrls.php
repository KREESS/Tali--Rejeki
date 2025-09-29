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
        if ($request->isMethod('GET') && ($request->is('products') || $request->is('en/products'))) {
            $cat = $request->query('category');
            $sub = $request->query('subcategory');

            if ($cat) {
                // Tentukan prefix (kosong atau "en/")
                $prefix = $request->is('en/products') ? 'en/' : '';

                // Bangun URL kanonik: /{prefix}products/{category}[/{subcategory}]
                $target = url('/' . $prefix . 'products/' . urlencode($cat) . ($sub ? '/' . urlencode($sub) : ''));

                $qs = Arr::except($request->query(), ['category', 'subcategory']);
                $query = http_build_query($qs);

                return redirect()->to($target . ($query ? ('?' . $query) : ''), 301);
            }
        }

        return $next($request);
    }
}
