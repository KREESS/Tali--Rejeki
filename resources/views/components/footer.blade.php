@php
// Get categories for footer navigation (semua kategori, tanpa limit)
 $footerCategories = \App\Models\Category::all();

// Route fallbacks
 $termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
 $privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
@endphp

<style>
/* Footer Styles */
.footer-container {
    background: #ffffff;
    color: #333;
    padding: 40px 0 20px;
    font-family: Arial, sans-serif;
    border-top: 1px solid #eee;
}

.footer-content {
    position: relative;
    z-index: 3;
}

.footer-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.footer-column {
    padding: 0 15px;
}

.footer-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #e74c3c;
    position: relative;
    padding-bottom: 8px;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background: #e74c3c;
}

.footer-text {
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
    color: #555;
}

.footer-contact-item {
    margin-bottom: 10px;
    font-size: 14px;
    color: #555;
    display: flex;
    align-items: center;
}

.footer-contact-item i {
    color: #e74c3c;
    margin-right: 10px;
    width: 16px;
}

.footer-contact-item a {
    color: #555;
    text-decoration: none;
}

.footer-contact-item a:hover {
    color: #e74c3c;
}

.footer-team-members {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 15px;
}

.footer-team-member {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 10px 0;
}

.footer-team-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer-team-name {
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
    font-size: 14px;
    min-width: 100px;
}

.footer-whatsapp-btn {
    display: inline-block;
    background: #25D366;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 12px;
}

.footer-whatsapp-btn:hover {
    background: #128C7E;
    color: white;
    text-decoration: none;
}

.footer-wa-only {
    font-size: 11px;
    color: #FFA500;
    font-style: italic;
    margin-left: 100px;
}

.footer-social-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #e74c3c;
}

.footer-social-links {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    flex-wrap: wrap;
}

.footer-social-link {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
    border: 1px solid #eee;
}

.footer-social-link img {
    width: 18px;
    height: 18px;
}

.footer-product-link {
    display: block;
    padding: 8px 0;
    color: #555;
    text-decoration: none;
    border-bottom: 1px solid #eee;
}

.footer-product-link:hover {
    color: #e74c3c;
}

.footer-facebook-widget {
    margin-bottom: 20px;
}

.footer-map {
    width: 100%;
    height: 180px;
    border-radius: 5px;
    border: 0;
}

.footer-bottom {
    text-align: center;
    padding: 20px 0;
    border-top: 1px solid #eee;
    margin-top: 20px;
}

.footer-copyright {
    font-size: 13px;
    color: #777;
    margin-bottom: 10px;
}

.footer-bottom-links {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.footer-bottom-link {
    color: #555;
    text-decoration: none;
    font-size: 13px;
}

.footer-bottom-link:hover {
    color: #e74c3c;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-row {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .footer-bottom-links {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

<!-- Footer -->
<div class="footer-container">
    <div class="container">
        <div class="footer-content">
            <div class="footer-row">
                <!-- Column 1: Company Info -->
                <div class="footer-column">
                    <h3 class="footer-title">PT TALI REJEKI</h3>
                    <p class="footer-text">
                        JL. RAYA TARUMAJAYA NO. 11<br>
                        RT 001 RW 029 DUSUN III<br>
                        DESA SETIA ASIH<br>
                        KEC. TARUMAJAYA<br>
                        KAB. BEKASI 17215
                    </p>
                    <h4 class="footer-title" style="font-size: 16px; margin-top: 20px;">Jam Operasional</h4>
                    <div class="footer-contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Senin - Jumat: 08:00 - 17:00 WIB</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Sabtu - Minggu: Tutup</span>
                    </div>

                    <h4 class="footer-title" style="font-size: 16px; margin-top: 20px;">Media Sosial</h4>
                    <div class="footer-social-links">
                        <a href="https://www.tokopedia.com/talirejeki" target="_blank" class="footer-social-link">
                            <img src="https://cdn.brandfetch.io/idoruRsDhk/theme/dark/symbol.svg?c=1bxid64Mup7aczewSAYMX&t=1668515567929" alt="Tokopedia">
                        </a>
                        <a href="https://shopee.co.id/pttalirejeki" target="_blank" class="footer-social-link">
                            <img src="https://img.icons8.com/color/48/shopee.png" alt="Shopee">
                        </a>
                        <a href="https://facebook.com/PTTaliRejeki" target="_blank" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
                        </a>
                        <a href="https://instagram.com/PTTaliRejeki" target="_blank" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram">
                        </a>
                        <a href="https://wa.me/6281382523722" target="_blank" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/3670/3670051.png" alt="WhatsApp">
                        </a>
                        <a href="mailto:talirejeki@gmail.com" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email">
                        </a>
                        <a href="https://www.youtube.com/@pttalirejeki1408" target="_blank" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube">
                        </a>
                        <a href="https://www.tiktok.com/@pt.tali.rejeki" target="_blank" class="footer-social-link">
                            <img src="https://cdn-icons-png.flaticon.com/512/4782/4782345.png" alt="Tiktok">
                        </a>
                    </div>
                </div>

                <!-- Column 2: Contact & Team -->
                <div class="footer-column">
                    <h3 class="footer-title">Informasi Kontak</h3>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone"></i>
                        <span>021-29470622</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone"></i>
                        <span>021-22889956</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-fax"></i>
                        <span>021-29470622</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:talirejeki@gmail.com">talirejeki@gmail.com</a>
                    </div>
                    
                    <h4 class="footer-title" style="font-size: 16px; margin-top: 20px;">Tim Marketing</h4>
                    <div class="footer-team-members">
                        <div class="footer-team-member">
                            <div class="footer-team-info">
                                <div class="footer-team-name">Sari</div>
                                <a href="https://wa.me/6281316826959" target="_blank" class="footer-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    0813 1682 6959
                                </a>
                            </div>
                        </div>
                        <div class="footer-team-member">
                            <div class="footer-team-info">
                                <div class="footer-team-name">Yovien</div>
                                <a href="https://wa.me/6281385231149" target="_blank" class="footer-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    0813-8523-1149
                                </a>
                            </div>
                        </div>
                        <div class="footer-team-member">
                            <div class="footer-team-info">
                                <div class="footer-team-name">Siti</div>
                                <a href="https://wa.me/6281382523722" target="_blank" class="footer-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    0813 8252 3722
                                </a>
                            </div>
                        </div>
                        <div class="footer-team-member">
                            <div class="footer-team-info">
                                <div class="footer-team-name">Kurnia</div>
                                <a href="https://wa.me/6281384808218" target="_blank" class="footer-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    0813 8480 8218
                                </a>
                            </div>
                            <span class="footer-wa-only">WA Only</span>
                        </div>
                        <div class="footer-team-member">
                            <div class="footer-team-info">
                                <div class="footer-team-name">Edy</div>
                                <a href="https://wa.me/6281514515990" target="_blank" class="footer-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    0815 1451 5990
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Products -->
                <div class="footer-column">
                    <h3 class="footer-title">Produk Kami</h3>
                    @if($footerCategories->count() > 0)
                        @foreach($footerCategories as $category)
                            <a href="{{ route('products.category', $category->slug) }}" class="footer-product-link">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @else
                        <a href="{{ route('products.index') }}" class="footer-product-link">
                            Semua Produk
                        </a>
                    @endif
                </div>

                <!-- Column 4: Facebook & Map -->
                <div class="footer-column">
                    <h3 class="footer-title">Hubungi Kami</h3>
                    <div class="footer-facebook-widget">
                        <div id="fb-root"></div>
                        <div class="fb-page" data-href="https://www.facebook.com/pt.talirejeki/" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/pt.talirejeki/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/pt.talirejeki/">PT Tali Rejeki</a>
                            </blockquote>
                        </div>
                    </div>
                    
                    <h4 class="footer-title" style="font-size: 16px; margin-top: 20px;">Lokasi Kami</h4>
                    <iframe 
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=PT+Tali+Rejeki,Jalan+Raya+Tarumajaya+No+11,Setia+Asih,Tarumajaya,Bekasi,Jawa+Barat+17215&center=-6.1652294890513755,106.99002294901793&zoom=18&maptype=roadmap" 
                        class="footer-map" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">Copyright © 2011 - {{ date('Y') }} PT Tali Rejeki. All Rights Reserved.</p>
                <div class="footer-bottom-links">
                    <a href="{{ $termsHref }}" class="footer-bottom-link">
                        <i class="fas fa-file-contract"></i> Terms of Service
                    </a>
                    <a href="{{ $privacyHref }}" class="footer-bottom-link">
                        <i class="fas fa-shield-alt"></i> Privacy Policy
                    </a>
                    <a href="{{ route('contact') }}" class="footer-bottom-link">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wa-float"></div>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('public/js/whatsapp-chat.js') }}"></script>

<script>
  whatsappchat.multipleUser({
    selector: '#wa-float',
    users: [
      {
        name: 'Admin',
        phone: '6281385231149',
        image: 'https://www.talirejeki.com/public/image/icon/wa.png'
      },
    ],
    headerMessage: 'Hi! Click one of our member below to chat on <strong>WhatsApp</strong>',
    chatBoxMessage: 'The team typically replies in a few minutes.',
    color: '#25D366',
  });
</script>

<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVFSBHL4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
