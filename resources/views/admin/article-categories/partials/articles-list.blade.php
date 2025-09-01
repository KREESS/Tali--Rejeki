@if($articles->count() > 0)
    <div class="articles-list">
        @foreach($articles as $article)
        <div class="article-card">
            <div class="article-image">
                @if($article->cover_url)
                    <img src="{{ asset($article->cover_url) }}" alt="{{ $article->title }}">
                @else
                    <div class="no-image">
                        <i class="fas fa-image"></i>
                    </div>
                @endif
            </div>
            
            <div class="article-content">
                <div class="article-header">
                    <h5 class="article-title">
                        @if(Route::has('admin.articles.show'))
                        <a href="{{ route('admin.articles.show', $article) }}">
                            {{ Str::limit($article->title, 50) }}
                        </a>
                        @else
                        <span>{{ Str::limit($article->title, 50) }}</span>
                        @endif
                    </h5>
                    <div class="article-meta">
                        <span class="status-badge status-{{ $article->status }}">
                            {{ $article->status === 'published' ? 'Published' : 'Draft' }}
                        </span>
                        <span class="date">{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                
                <p class="article-excerpt">
                    {{ Str::limit($article->excerpt ?? $article->content ?? 'Tidak ada deskripsi artikel.', 80) }}
                </p>
                
                <div class="article-actions">
                    @if(Route::has('admin.articles.show'))
                    <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-xs btn-red-outline" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                        Lihat
                    </a>
                    @endif
                    @if(Route::has('admin.articles.edit'))
                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-xs btn-red" title="Edit Artikel">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    @endif
                    @if(Route::has('admin.articles.destroy'))
                    <button type="button" class="btn btn-xs btn-danger delete-article-btn" 
                            data-article-id="{{ $article->id }}" 
                            data-article-title="{{ $article->title }}"
                            data-delete-url="{{ route('admin.articles.destroy', $article) }}"
                            title="Hapus Artikel">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                    @endif
                </div>
                
                <div class="bulk-checkbox">
                    <input type="checkbox" class="bulk-select-item" value="{{ $article->id }}" id="article-{{ $article->id }}">
                    <label for="article-{{ $article->id }}" class="checkbox-label"></label>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fas fa-search"></i>
        </div>
        <h4>Tidak Ada Hasil</h4>
        <p>Tidak ada artikel yang sesuai dengan filter pencarian.</p>
        <button type="button" class="btn btn-red btn-compact" onclick="resetClientSideFilters()">
            <i class="fas fa-undo"></i>
            Reset Filter
        </button>
    </div>
@endif
