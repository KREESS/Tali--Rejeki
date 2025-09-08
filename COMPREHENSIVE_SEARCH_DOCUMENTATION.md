# Dokumentasi Sistem Search Komprehensif - Tali Rejeki

## Overview
Sistem search telah diperluas untuk mencari dari **SEMUA tabel database** dengan kemampuan advanced search yang sangat komprehensif.

## Fitur Search yang Tersedia

### 1. Global Search (Pencarian Umum)
**Endpoint:** `GET /admin/search`
**Parameter:**
- `q` (required): Query pencarian
- `limit` (optional): Batasan hasil, default 10
- `search_all` (optional): Set `true` untuk search di semua tabel

**Contoh Request:**
```javascript
// Search biasa
fetch('/admin/search?q=laptop&limit=20')

// Search di semua tabel
fetch('/admin/search?q=laptop&search_all=true&limit=50')
```

### 2. Search Suggestions (Auto-complete)
**Endpoint:** `GET /admin/search/suggestions`
**Parameter:** 
- `q` (required): Query untuk suggestions

### 3. Advanced Search (Pencarian Spesifik)
**Endpoint:** `POST /admin/search/advanced`
**Body JSON:**
```json
{
    "query": "laptop gaming",
    "type": "products", // atau "customers", "content", "management"
    "filters": {
        "status": "active",
        "category_id": 1,
        "price_min": 1000000,
        "price_max": 5000000
    }
}
```

## Tabel Database yang Bisa Dicari

### 1. Products & Related Tables
- **Products** - Nama, deskripsi, meta data
- **Product Images** - Alt text, path gambar
- **Categories** - Nama kategori, meta data
- **Subcategories** - Nama subkategori, meta data

### 2. Content Management
- **Articles** - Judul, konten, excerpt, meta data
- **Article Categories** - Nama kategori artikel
- **Galleries** - Judul galeri, deskripsi, meta data
- **Gallery Images** - Alt text, caption, title

### 3. HR & Jobs
- **Jobs** - Posisi, deskripsi, lokasi, departemen, tipe employment

### 4. Catalog System
- **Catalog Items** - Nama item, deskripsi, meta data
- **Catalog Files** - File metadata
- **Catalog Images** - Gambar metadata

### 5. User Management
- **Users** - Nama, email, alamat, informasi kontak

### 6. System Management
- **Admin Notifications** - Judul, pesan, tipe notifikasi
- **System Logs** - Log title, deskripsi, tipe, status

## Format Response JSON

### Global Search Response
```json
{
    "success": true,
    "query": "laptop",
    "total_results": 25,
    "results": {
        "products": [
            {
                "id": 1,
                "title": "Laptop Gaming ASUS",
                "description": "High-performance gaming laptop",
                "price": "Rp 15.000.000",
                "category": "Electronics",
                "status": "active",
                "url": "/admin/products/1",
                "type": "product",
                "icon": "shopping-bag"
            }
        ],
        "articles": [
            {
                "id": 1,
                "title": "Review Laptop Gaming Terbaru",
                "description": "Artikel review laptop gaming...",
                "status": "published",
                "category": "Technology",
                "published_at": "15 Jan 2025",
                "url": "/admin/articles/1",
                "type": "article",
                "icon": "newspaper"
            }
        ],
        "categories": [
            {
                "id": 1,
                "title": "Electronics",
                "description": "Kategori produk elektronik",
                "products_count": 45,
                "url": "/admin/categories/1",
                "type": "category",
                "icon": "tags"
            }
        ]
    }
}
```

### Comprehensive Search Response
Ketika `search_all=true`, response akan include:
- `products` - Data produk dan gambar
- `users` - Data pengguna
- `articles` - Artikel dan kategori artikel  
- `galleries` - Galeri dan gambar galeri
- `jobs` - Lowongan pekerjaan
- `catalogs` - Item katalog, file, dan gambar
- `categories` - Kategori dan subkategori
- `notifications` - Notifikasi admin
- `system_logs` - Log sistem

## Frontend Integration

### Search Box di Navbar
```javascript
// Auto-complete search dengan debouncing
const searchInput = document.getElementById('navbar-search');
let searchTimeout;

searchInput.addEventListener('input', function() {
    clearTimeout(searchTimeout);
    const query = this.value.trim();
    
    if (query.length >= 2) {
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    }
});

function performSearch(query, searchAll = false) {
    const url = `/admin/search?q=${encodeURIComponent(query)}${searchAll ? '&search_all=true' : ''}`;
    
    fetch(url, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        displaySearchResults(data);
    });
}
```

### Comprehensive Search Toggle
```javascript
// Tombol untuk enable/disable comprehensive search
function toggleComprehensiveSearch() {
    const isComprehensive = document.getElementById('comprehensive-search').checked;
    const query = document.getElementById('navbar-search').value;
    
    if (query.length >= 2) {
        performSearch(query, isComprehensive);
    }
}
```

## Performance Optimization

### 1. Limit Results Per Table
- Global search: Maximum 10 results per table
- Comprehensive search: Results dibagi merata antar tabel
- Advanced search: Custom limit per request

### 2. Indexing Recommendations
Untuk performa optimal, buat index pada kolom:
```sql
-- Products
CREATE INDEX idx_products_search ON products(name, description);
CREATE INDEX idx_products_status ON products(status);

-- Articles  
CREATE INDEX idx_articles_search ON articles(title, content, excerpt);
CREATE INDEX idx_articles_status ON articles(status);

-- Categories
CREATE INDEX idx_categories_name ON categories(name);
CREATE INDEX idx_subcategories_name ON subcategories(name);

-- Users
CREATE INDEX idx_users_search ON users(name, email);
```

### 3. Caching Strategy
```php
// Cache search results untuk query populer
$cacheKey = "search:" . md5($query);
$results = Cache::remember($cacheKey, 300, function() use ($query) {
    return $this->performDatabaseSearch($query);
});
```

## Security Features

### 1. Input Sanitization
- Semua input di-escape untuk mencegah SQL injection
- HTML tags di-strip dari query search
- Length limit untuk mencegah abuse

### 2. Rate Limiting
```php
// Limit search requests per user
Route::middleware(['throttle:search'])->group(function () {
    Route::get('/admin/search', [SearchController::class, 'globalSearch']);
});
```

### 3. Permission-based Results
- Results difilter berdasarkan permission user
- Admin dapat melihat semua results
- User biasa hanya melihat data yang diizinkan

## Monitoring & Analytics

### 1. Search Analytics
```php
// Log popular search queries
DB::table('search_analytics')->insert([
    'query' => $query,
    'user_id' => auth()->id(),
    'results_count' => $totalResults,
    'search_type' => $searchType,
    'ip_address' => request()->ip(),
    'created_at' => now()
]);
```

### 2. Performance Monitoring
- Track search response times
- Monitor database query performance
- Alert untuk slow queries (>2 detik)

## Testing Examples

### 1. Basic Search Test
```bash
curl -X GET "http://localhost:8000/admin/search?q=laptop" \
     -H "Accept: application/json" \
     -H "X-CSRF-TOKEN: your-token"
```

### 2. Comprehensive Search Test
```bash
curl -X GET "http://localhost:8000/admin/search?q=technology&search_all=true&limit=50" \
     -H "Accept: application/json" \
     -H "X-CSRF-TOKEN: your-token"
```

### 3. Advanced Search Test
```bash
curl -X POST "http://localhost:8000/admin/search/advanced" \
     -H "Content-Type: application/json" \
     -H "X-CSRF-TOKEN: your-token" \
     -d '{
       "query": "laptop gaming",
       "type": "products",
       "filters": {
         "status": "active",
         "price_min": 1000000,
         "price_max": 10000000
       }
     }'
```

## Troubleshooting

### Common Issues

1. **Search tidak mengembalikan hasil**
   - Check apakah table memiliki data
   - Verify column names di query
   - Check permission user

2. **Search lambat**
   - Add database indexes
   - Reduce search limit
   - Implement caching

3. **CSRF Token Error**
   - Pastikan meta tag csrf token ada di header
   - Refresh halaman untuk token baru

### Debug Mode
```php
// Enable search debugging
'search_debug' => env('SEARCH_DEBUG', false)

// Di SearchController
if (config('app.search_debug')) {
    Log::info('Search Query', [
        'query' => $query,
        'results_count' => count($results),
        'execution_time' => microtime(true) - $startTime
    ]);
}
```

## Future Enhancements

1. **Elasticsearch Integration** - Untuk search yang lebih powerful
2. **Search Filters UI** - Interface untuk advanced filtering
3. **Search History** - Simpan riwayat pencarian user
4. **Auto-suggestions** - Berdasarkan popular searches
5. **Fuzzy Search** - Toleransi typo dalam pencarian
6. **Full-text Search** - Untuk content yang lebih kompleks

---

**Developer:** Sistem Search Komprehensif untuk Admin Panel Tali Rejeki  
**Last Updated:** 15 Januari 2025  
**Version:** 2.0 - Comprehensive Database Search
