@extends('en.components.layout')

@section('title', $article->title)

@section('content')
<!-- Article Header -->
<section class="article-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="article-meta" data-aos="fade-up">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active">{{ Str::limit($article->title, 30) }}</li>
                        </ol>
                    </nav>
                    
                    <div class="article-category">
                        <i class="fas fa-tag"></i>
                        {{ $article->category->name ?? 'Umum' }}
                    </div>
                </div>
                
                <h1 class="article-title" data-aos="fade-up" data-aos-delay="100">
                    {{ $article->title }}
                </h1>
                
                <div class="article-info" data-aos="fade-up" data-aos-delay="200">
                    <div class="author-info">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-details">
                            <span class="author-name">{{ $article->author ?? 'Admin' }}</span>
                            <span class="publish-date">
                                <i class="fas fa-calendar"></i>
                                {{ $article->created_at->format('d F Y') }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="article-stats">
                        <span class="read-time">
                            <i class="fas fa-clock"></i>
                            {{ $readTime ?? 5 }} menit baca
                        </span>
                        <span class="view-count">
                            <i class="fas fa-eye"></i>
                            {{ $article->views ?? 0 }} views
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="article-body" data-aos="fade-up">
                    @if($article->featured_image)
                    <div class="featured-image mb-4">
                        <img src="{{ asset('storage/' . $article->featured_image) }}" 
                             alt="{{ $article->title }}" 
                             class="img-fluid rounded">
                    </div>
                    @endif
                    
                    <div class="article-text">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    
                    @if($article->tags)
                    <div class="article-tags mt-4">
                        <h5>Tags:</h5>
                        <div class="tags-list">
                            @foreach(explode(',', $article->tags) as $tag)
                            <span class="tag-item">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </article>
                
                <!-- Share Section -->
                <div class="share-section mt-5" data-aos="fade-up">
                    <h5>Bagikan Artikel:</h5>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                           class="share-btn facebook" 
                           target="_blank">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $article->title }}" 
                           class="share-btn twitter" 
                           target="_blank">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" 
                           class="share-btn linkedin" 
                           target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                            LinkedIn
                        </a>
                        <a href="whatsapp://send?text={{ $article->title }} - {{ url()->current() }}" 
                           class="share-btn whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="article-navigation mt-5" data-aos="fade-up">
                    <div class="row">
                        @if($previousArticle)
                        <div class="col-md-6">
                            <div class="nav-item prev-article">
                                <span class="nav-label">
                                    <i class="fas fa-chevron-left"></i>
                                    Artikel Sebelumnya
                                </span>
                                <a href="{{ route('blog.detail', $previousArticle->slug) }}" class="nav-title">
                                    {{ Str::limit($previousArticle->title, 50) }}
                                </a>
                            </div>
                        </div>
                        @endif
                        
                        @if($nextArticle)
                        <div class="col-md-6">
                            <div class="nav-item next-article text-end">
                                <span class="nav-label">
                                    Artikel Selanjutnya
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                                <a href="{{ route('blog.detail', $nextArticle->slug) }}" class="nav-title">
                                    {{ Str::limit($nextArticle->title, 50) }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Recent Articles -->
                    <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="widget-title">Artikel Terbaru</h4>
                        <div class="recent-articles">
                            @foreach($recentArticles as $recentArticle)
                            <div class="recent-item">
                                @if($recentArticle->featured_image)
                                <div class="recent-image">
                                    <img src="{{ asset('storage/' . $recentArticle->featured_image) }}" 
                                         alt="{{ $recentArticle->title }}">
                                </div>
                                @endif
                                <div class="recent-content">
                                    <h6 class="recent-title">
                                        <a href="{{ route('blog.detail', $recentArticle->slug) }}">
                                            {{ Str::limit($recentArticle->title, 60) }}
                                        </a>
                                    </h6>
                                    <div class="recent-date">
                                        <i class="fas fa-calendar"></i>
                                        {{ $recentArticle->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="widget-title">Kategori</h4>
                        <div class="categories-list">
                            @foreach($categories as $category)
                            <a href="{{ route('blog', ['category' => $category->slug]) }}" 
                               class="category-item">
                                <span class="category-name">{{ $category->name }}</span>
                                <span class="category-count">{{ $category->articles_count ?? 0 }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Popular Articles -->
                    <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="300">
                        <h4 class="widget-title">Artikel Populer</h4>
                        <div class="popular-articles">
                            @foreach($popularArticles as $index => $popularArticle)
                            <div class="popular-item">
                                <div class="popular-number">{{ $index + 1 }}</div>
                                <div class="popular-content">
                                    <h6 class="popular-title">
                                        <a href="{{ route('blog.detail', $popularArticle->slug) }}">
                                            {{ Str::limit($popularArticle->title, 60) }}
                                        </a>
                                    </h6>
                                    <div class="popular-stats">
                                        <span><i class="fas fa-eye"></i> {{ $popularArticle->views ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Newsletter -->
                    <div class="sidebar-widget newsletter-widget" data-aos="fade-up" data-aos-delay="400">
                        <div class="newsletter-content">
                            <div class="newsletter-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Berlangganan Newsletter</h4>
                            <p>Dapatkan artikel terbaru dan update industri langsung di email Anda</p>
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" 
                                           class="form-control" 
                                           placeholder="Email Anda"
                                           required>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($relatedArticles->count() > 0)
<section class="related-articles py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Artikel Terkait</h2>
            <p class="section-description">
                Artikel lain yang mungkin menarik untuk Anda baca
            </p>
        </div>
        
        <div class="row">
            @foreach($relatedArticles as $index => $relatedArticle)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="article-card">
                    <div class="article-image">
                        @if($relatedArticle->featured_image)
                            <img src="{{ asset('storage/' . $relatedArticle->featured_image) }}" 
                                 alt="{{ $relatedArticle->title }}">
                        @else
                            <div class="no-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        @endif
                        
                        <div class="article-category">
                            {{ $relatedArticle->category->name ?? 'Umum' }}
                        </div>
                    </div>
                    
                    <div class="article-content">
                        <h3 class="article-title">
                            <a href="{{ route('blog.detail', $relatedArticle->slug) }}">
                                {{ $relatedArticle->title }}
                            </a>
                        </h3>
                        
                        <p class="article-excerpt">
                            {{ Str::limit(strip_tags($relatedArticle->content), 120) }}
                        </p>
                        
                        <div class="article-meta">
                            <span class="article-date">
                                <i class="fas fa-calendar"></i>
                                {{ $relatedArticle->created_at->format('d M Y') }}
                            </span>
                            
                            <a href="{{ route('blog.detail', $relatedArticle->slug) }}" class="read-more">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
/* Article Header */
.article-header {
    background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
    color: white;
    padding: 120px 0 60px;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 1rem;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: white;
}

.article-category {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 2rem;
}

.article-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.author-avatar {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.author-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.author-name {
    font-weight: 600;
    font-size: 1.1rem;
}

.publish-date {
    opacity: 0.8;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.article-stats {
    display: flex;
    gap: 1.5rem;
    font-size: 14px;
    opacity: 0.8;
}

.article-stats span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Article Content */
.article-body {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.featured-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
}

.article-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
}

.article-text p {
    margin-bottom: 1.5rem;
}

.article-tags {
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
}

.article-tags h5 {
    color: #374151;
    font-weight: 600;
    margin-bottom: 1rem;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.tag-item {
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

/* Share Section */
.share-section {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 15px;
}

.share-section h5 {
    color: #374151;
    font-weight: 600;
    margin-bottom: 1rem;
}

.share-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.share-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    color: white;
}

.share-btn.facebook {
    background: #3b5998;
}

.share-btn.twitter {
    background: #1da1f2;
}

.share-btn.linkedin {
    background: #0077b5;
}

.share-btn.whatsapp {
    background: #25d366;
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
}

/* Article Navigation */
.article-navigation {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.nav-item {
    padding: 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.nav-item:hover {
    border-color: #7c1415;
    transform: translateY(-2px);
}

.nav-label {
    display: block;
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.nav-title {
    color: #374151;
    font-weight: 600;
    text-decoration: none;
    display: block;
    line-height: 1.4;
}

.nav-title:hover {
    color: #7c1415;
}

/* Sidebar */
.sidebar {
    padding-left: 2rem;
}

.sidebar-widget {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.widget-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #7c1415;
}

/* Recent Articles */
.recent-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.recent-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.recent-image {
    width: 80px;
    height: 60px;
    flex-shrink: 0;
    border-radius: 8px;
    overflow: hidden;
}

.recent-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recent-content {
    flex: 1;
}

.recent-title a {
    color: #374151;
    text-decoration: none;
    font-weight: 600;
    line-height: 1.4;
    display: block;
    margin-bottom: 0.5rem;
}

.recent-title a:hover {
    color: #7c1415;
}

.recent-date {
    font-size: 12px;
    color: #9ca3af;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Categories */
.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    margin-bottom: 0.5rem;
    text-decoration: none;
    color: #374151;
    transition: all 0.3s ease;
}

.category-item:hover {
    border-color: #7c1415;
    background: #fef2f2;
    color: #7c1415;
}

.category-name {
    font-weight: 500;
}

.category-count {
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

/* Popular Articles */
.popular-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.popular-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.popular-number {
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
}

.popular-content {
    flex: 1;
}

.popular-title a {
    color: #374151;
    text-decoration: none;
    font-weight: 600;
    line-height: 1.4;
    display: block;
    margin-bottom: 0.5rem;
}

.popular-title a:hover {
    color: #7c1415;
}

.popular-stats {
    font-size: 12px;
    color: #9ca3af;
}

/* Newsletter Widget */
.newsletter-widget {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    text-align: center;
}

.newsletter-widget .widget-title {
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.newsletter-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
}

.newsletter-widget h4 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.newsletter-widget p {
    opacity: 0.9;
    margin-bottom: 1.5rem;
}

.newsletter-form .input-group {
    background: white;
    border-radius: 25px;
    padding: 0.25rem;
}

.newsletter-form input {
    background: transparent;
    border: none;
    padding: 0.75rem 1rem;
}

.newsletter-form input:focus {
    outline: none;
    box-shadow: none;
}

.newsletter-form button {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border: none;
    border-radius: 20px;
    padding: 0.75rem 1rem;
    color: white;
}

/* Related Articles */
.related-articles {
    background: #f8f9fa;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.section-description {
    font-size: 1.1rem;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
}

.article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.article-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.article-card:hover .article-image img {
    transform: scale(1.05);
}

.no-image {
    width: 100%;
    height: 100%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 2rem;
}

.article-image .article-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(124, 20, 21, 0.9);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.article-content {
    padding: 1.5rem;
}

.article-content .article-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.article-content .article-title a {
    color: #374151;
    text-decoration: none;
    line-height: 1.4;
}

.article-content .article-title a:hover {
    color: #7c1415;
}

.article-excerpt {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.article-content .article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.article-date {
    font-size: 14px;
    color: #9ca3af;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.read-more {
    color: #7c1415;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #dc2626;
    transform: translateX(3px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }
    
    .sidebar {
        padding-left: 0;
        padding-top: 2rem;
    }
    
    .article-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .share-buttons {
        justify-content: center;
    }
    
    .article-navigation .row {
        flex-direction: column;
        gap: 1rem;
    }
    
    .nav-item {
        text-align: left !important;
    }
    
    .featured-image img {
        height: 250px;
    }
}

@media (max-width: 480px) {
    .article-title {
        font-size: 1.75rem;
    }
    
    .article-body {
        padding: 1.5rem;
    }
    
    .sidebar-widget {
        padding: 1.5rem;
    }
    
    .share-buttons {
        flex-direction: column;
    }
    
    .article-text {
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            // Here you would typically send the email to your backend
            alert('Terima kasih! Email Anda telah terdaftar untuk newsletter.');
            this.reset();
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Reading progress indicator (optional)
    const article = document.querySelector('.article-text');
    if (article) {
        window.addEventListener('scroll', function() {
            const articleTop = article.offsetTop;
            const articleHeight = article.offsetHeight;
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset;
            
            const progress = Math.min(
                (scrollTop - articleTop + windowHeight) / articleHeight * 100,
                100
            );
            
            // You could create a progress bar here
            console.log('Reading progress:', Math.max(0, progress) + '%');
        });
    }
});
</script>
@endsection
