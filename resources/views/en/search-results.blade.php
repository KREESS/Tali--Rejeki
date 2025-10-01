<h1>{{ $title }}</h1>

<h2>Produk</h2>
@if($products->count())
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada produk ditemukan.</p>
@endif

<h2>Artikel</h2>
@if($articles->count())
    <ul>
        @foreach($articles as $article)
            <li>{{ $article->title }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada artikel ditemukan.</p>
@endif

<h2>Galeri</h2>
@if($galleries->count())
    <ul>
        @foreach($galleries as $gallery)
            <li>{{ $gallery->title }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada galeri ditemukan.</p>
@endif
