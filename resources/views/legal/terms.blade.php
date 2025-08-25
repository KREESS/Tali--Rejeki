@extends('components.layout')

@section('content')
<style>
  :root{
    --primary:#7c1415;
    --primary-2:#b71c1c;
    --ink:#1f2428;
    --muted:#6b6f76;
    --ring:#ececec;
    --card:#ffffff;
    --bg:#faf8f8;
    --radius:14px;
  }
  html { scroll-behavior:smooth; }

  /* ===== HERO ===== */
  .legal-hero{
    position:relative;
    border-bottom:1px solid var(--ring);
    background:
      radial-gradient(80% 120% at 10% 0%, #ffe6e6 0%, transparent 60%),
      radial-gradient(90% 120% at 90% 0%, #fff0f0 0%, transparent 60%),
      linear-gradient(#fff, #fff);
    overflow:hidden;
  }
  .legal-hero .inner{
    max-width:1080px; margin:0 auto; padding:54px 16px 30px;
    display:flex; flex-direction:column; gap:10px;
  }
  .breadcrumbs{
    font-size:12px; color:#8a8a8a; font-weight:700;
  }
  .breadcrumbs a{ color:#8a8a8a; text-decoration:none; }
  .breadcrumbs a:hover{ color:var(--primary); text-decoration:underline; }
  .kicker{
    display:inline-flex; align-items:center; gap:8px; width:max-content;
    padding:6px 12px; border-radius:999px;
    font-size:12px; font-weight:800; color:#fff;
    background:linear-gradient(90deg,var(--primary),var(--primary-2));
    box-shadow:0 8px 24px rgba(124,20,21,.28)
  }
  .legal-hero h1{
    margin:4px 0 2px; font-size:clamp(28px,4vw,40px); line-height:1.08;
    color:var(--primary); font-weight:900; letter-spacing:.2px; text-wrap:balance;
  }
  .meta{color:var(--muted);font-size:13px}

  /* aksen gelombang */
  .wave{
    position:absolute; inset:auto 0 -1px 0; height:44px;
    background:
      radial-gradient(60px 12px at 10% 12px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(70px 12px at 30% 10px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(80px 12px at 55% 16px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(90px 12px at 78% 12px, rgba(124,20,21,.08), transparent 70%);
    filter: blur(6px);
  }

  /* ===== WRAP ===== */
  .legal-wrap{
    max-width:1080px; margin:0 auto; padding:28px 16px 120px;
    display:grid; grid-template-columns: 280px 1fr; gap:20px;
  }
  @media (max-width:980px){ .legal-wrap{ grid-template-columns: 1fr; } }

  /* ===== SIDEBAR TOC (lengket) ===== */
  .toc{
    position:sticky; top:90px; align-self:start;
    display:flex; flex-direction:column; gap:8px;
    background:#fff; border:1px solid var(--ring); border-radius:12px; padding:12px;
  }
  .toc h5{ margin:2px 0 6px; font-size:12px; color:#8a8a8a; letter-spacing:.6px; font-weight:900; }
  .toc a{
    display:flex; align-items:center; gap:10px;
    border:1px solid #f1f1f1; border-radius:10px; padding:10px 12px;
    color:#333; text-decoration:none; font-weight:700; font-size:13px;
    transition:transform .12s ease, box-shadow .12s ease, border-color .12s ease;
  }
  .toc a::before{ content:"◆"; color:var(--primary); font-size:12px; transform:translateY(-1px); }
  .toc a:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(0,0,0,.06); border-color:#e4e4e4; }
  .toc .note{
    margin-top:6px; font-size:12px; color:#8a8a8a;
  }

  /* ===== CONTENT ===== */
  .content > .card{
    background:var(--card); border:1px solid var(--ring); border-radius:var(--radius);
    padding:16px 18px; box-shadow:0 10px 34px rgba(0,0,0,.04);
  }
  h2.section{
    margin:28px 0 10px; font-size:20px; font-weight:800; color:var(--ink);
    scroll-margin-top:96px;
  }
  p, li{ color:#333; line-height:1.75; }
  ul{ padding-left:18px; }

  .callout{
    display:flex; gap:14px; align-items:flex-start;
    background:linear-gradient(180deg, #fff, #fff7f7);
    border:1px solid var(--ring); border-radius:12px; padding:14px 16px;
    box-shadow:0 6px 20px rgba(124,20,21,.06);
  }
  .callout .ico{
    height:36px; width:36px; flex:0 0 36px; border-radius:10px;
    display:grid; place-items:center; font-weight:900; color:#fff;
    background:linear-gradient(135deg,var(--primary),var(--primary-2));
    box-shadow:0 8px 20px rgba(124,20,21,.25);
  }
  .callout a{ font-weight:700; color:var(--primary-2); }

  /* ===== INFO STRIP ===== */
  .info-strip{
    display:grid; grid-template-columns: repeat(3, 1fr); gap:12px;
    margin-top:12px;
  }
  .chip{
    display:flex; align-items:center; gap:10px;
    background:#fff; border:1px solid var(--ring); border-radius:12px; padding:10px 12px;
    box-shadow:0 6px 14px rgba(0,0,0,.04);
  }
  .chip .dot{height:10px;width:10px;border-radius:50%;background:var(--primary);}
  .chip b{color:#222}

  @media (max-width:720px){ .info-strip{ grid-template-columns: 1fr; } }

  /* ===== FAQ (details) ===== */
  .faq{ margin-top:10px; }
  .faq details{
    border:1px solid var(--ring); border-radius:12px; background:#fff; margin-bottom:8px;
    box-shadow:0 6px 14px rgba(0,0,0,.04);
  }
  .faq summary{
    cursor:pointer; list-style:none; padding:12px 14px; font-weight:800; color:#333;
  }
  .faq summary::-webkit-details-marker{ display:none; }
  .faq .ans{ padding:0 14px 12px; color:#444; }

  /* ===== TOP BUTTON ===== */
  .btn-top{
    position:fixed; right:18px; bottom:18px; height:44px; width:44px; border-radius:12px;
    border:1px solid var(--ring); background:#fff; box-shadow:0 12px 28px rgba(0,0,0,.12);
    display:grid; place-items:center; color:var(--primary); cursor:pointer;
    opacity:0; pointer-events:none; transition:opacity .2s ease, transform .2s ease; z-index:30;
  }
  .btn-top.show{ opacity:1; pointer-events:auto; }
  .btn-top:hover{ transform:translateY(-2px); }

  /* SMALL */
  @media (max-width:420px){
    .content > .card{ padding:14px; }
  }
</style>

<section class="legal-hero">
  <div class="inner">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="{{ url('/') }}">Beranda</a> &nbsp;/&nbsp; <span>Ketentuan Layanan</span>
    </nav>
    <span class="kicker">LEGAL — TALIREJEKI.COM</span>
    <h1>Ketentuan Layanan</h1>
    <div class="meta">
      Tali Rejeki — Distributor Insulasi Industri • Diperbarui: {{ now()->format('d F Y') }}
    </div>
  </div>
  <div class="wave"></div>
</section>

<div class="legal-wrap">
  <!-- Sidebar TOC -->
  <aside class="toc" aria-label="Daftar Isi">
    <h5>NAVIGASI</h5>
    <a href="#definisi">Definisi</a>
    <a href="#ruang-lingkup">Ruang Lingkup</a>
    <a href="#akun">Akun & Keamanan</a>
    <a href="#pemesanan">Pemesanan & Pembayaran</a>
    <a href="#pengiriman">Pengiriman & Risiko</a>
    <a href="#retur">Retur & Garansi</a>
    <a href="#hki">Kekayaan Intelektual</a>
    <a href="#larangan">Larangan Penggunaan</a>
    <a href="#batasan">Batasan Tanggung Jawab</a>
    <a href="#kepatuhan">Kepatuhan & Keselamatan</a>
    <a href="#tautan">Tautan Pihak Ketiga</a>
    <a href="#perubahan">Perubahan Ketentuan</a>
    <a href="#hukum">Hukum yang Berlaku</a>
    <a href="#sengketa">Penyelesaian Sengketa</a>
    <a href="#kontak">Kontak</a>
    <p class="note">Butuh salinan? <a href="{{ asset('docs/ketentuan-layanan.pdf') }}">Unduh PDF</a></p>
  </aside>

  <!-- Content -->
  <section class="content">
    <div class="card">
      <p>Selamat datang di <strong>Tali Rejeki</strong> (<em>“Kami”</em>). Ketentuan Layanan ini mengatur penggunaan situs talirejeki.com, katalog, serta layanan kami sebagai distributor material insulasi industri (mis. Nitrile Rubber, Glasswool, Rockwool), aksesoris HVAC, dan kebutuhan proyek. Dengan mengakses atau menggunakan layanan, Anda menyetujui Ketentuan ini.</p>
      <div class="info-strip">
        <div class="chip"><span class="dot"></span> <div><b>Respons Cepat</b><br><small>Konsultasi & penawaran efisien.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>Produk Terstandar</b><br><small>Spesifikasi jelas & konsisten.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>Jangkauan Nasional</b><br><small>Pengiriman ke berbagai daerah.</small></div></div>
      </div>
    </div>

    <h2 id="definisi" class="section">1. Definisi</h2>
    <p>“Pengguna/Anda” adalah setiap orang atau badan yang mengakses atau menggunakan layanan kami. “Layanan” meliputi situs, katalog, penawaran harga, transaksi, pengiriman, dan dukungan purna jual.</p>

    <h2 id="ruang-lingkup" class="section">2. Ruang Lingkup Layanan</h2>
    <ul>
      <li>Distribusi material insulasi, aksesoris HVAC, dan produk terkait proyek.</li>
      <li>Pemberian penawaran harga (quotation), dukungan teknis dasar produk, dan koordinasi logistik.</li>
      <li>Layanan dapat berubah menyesuaikan ketersediaan stok, kebijakan vendor, atau regulasi.</li>
    </ul>

    <h2 id="akun" class="section">3. Akun & Keamanan</h2>
    <ul>
      <li>Fitur tertentu dapat memerlukan akun. Anda wajib menjaga kerahasiaan kredensial.</li>
      <li>Aktivitas yang terjadi melalui akun menjadi tanggung jawab pemilik akun.</li>
      <li>Segera hubungi kami jika mencurigai akses tanpa izin.</li>
    </ul>

    <h2 id="pemesanan" class="section">4. Pemesanan & Pembayaran</h2>
    <ul>
      <li>Harga bersifat dinamis; harga final tercantum pada quotation/invoice.</li>
      <li>Pembayaran via transfer bank/payment gateway sesuai instruksi pada dokumen pemesanan.</li>
      <li>Pesanan diproses setelah pembayaran terverifikasi atau sesuai syarat kredit/PO yang disetujui.</li>
      <li>Pajak, ongkir, dan biaya tambahan lain (bila ada) diinformasikan pada dokumen terkait.</li>
    </ul>

    <h2 id="pengiriman" class="section">5. Pengiriman & Risiko</h2>
    <ul>
      <li>Perkiraan waktu pengiriman bersifat indikatif; dapat berubah karena faktor logistik.</li>
      <li>Risiko kerusakan/kehilangan beralih saat barang diserahkan ke ekspedisi, kecuali disepakati lain.</li>
      <li>Periksa barang saat diterima dan dokumentasikan jika ditemukan kerusakan.</li>
    </ul>

    <h2 id="retur" class="section">6. Retur & Garansi</h2>
    <ul>
      <li>Permohonan retur diajukan dalam periode wajar sesuai kebijakan retur.</li>
      <li>Barang kustom/potongan tertentu mungkin tidak dapat diretur kecuali cacat produksi.</li>
      <li>Garansi (jika ada) mengacu pada kebijakan pabrikan/prinsipal dan penggunaan yang sesuai.</li>
    </ul>

    <h2 id="hki" class="section">7. Kekayaan Intelektual</h2>
    <p>Seluruh konten, merek, logo, foto, deskripsi teknis, dan materi di situs dilindungi hukum. Dilarang menyalin, memodifikasi, atau memanfaatkan untuk tujuan komersial tanpa izin tertulis.</p>

    <h2 id="larangan" class="section">8. Larangan Penggunaan</h2>
    <ul>
      <li>Melanggar hukum atau hak pihak lain.</li>
      <li>Mengunggah konten menyesatkan, melecehkan, atau merugikan.</li>
      <li>Mengakali sistem (termasuk scraping berlebihan) tanpa izin tertulis.</li>
    </ul>

    <h2 id="batasan" class="section">9. Batasan Tanggung Jawab</h2>
    <p>Sepanjang diizinkan hukum, Tali Rejeki tidak bertanggung jawab atas kerugian tidak langsung, insidental, atau konsekuensial yang timbul dari penggunaan layanan atau keterlambatan pengiriman. Tanggung jawab maksimal (jika ada) dibatasi pada nilai transaksi terkait.</p>

    <h2 id="kepatuhan" class="section">10. Kepatuhan & Keselamatan</h2>
    <ul>
      <li>Penggunaan produk wajib mengikuti petunjuk teknis, lembar data keselamatan, dan ketentuan proyek.</li>
      <li>Kami dapat menolak permintaan yang tidak sesuai regulasi atau standar keselamatan.</li>
    </ul>

    <h2 id="tautan" class="section">11. Tautan Pihak Ketiga</h2>
    <p>Situs dapat memuat tautan ke situs pihak ketiga. Kami tidak mengendalikan konten atau kebijakan privasi mereka.</p>

    <h2 id="perubahan" class="section">12. Perubahan Ketentuan</h2>
    <p>Ketentuan ini dapat diperbarui sewaktu-waktu. Versi terakhir berlaku dan ditampilkan di halaman ini dengan tanggal pembaruan.</p>

    <h2 id="hukum" class="section">13. Hukum yang Berlaku</h2>
    <p>Ketentuan ini diatur oleh hukum Republik Indonesia.</p>

    <h2 id="sengketa" class="section">14. Penyelesaian Sengketa</h2>
    <p>Sengketa diselesaikan terlebih dahulu secara musyawarah. Jika tidak tercapai, para pihak dapat menempuh mediasi/arbiter/arbitrase sesuai kesepakatan (mis. lembaga arbitrase di Jakarta).</p>

    <h2 id="kontak" class="section">15. Kontak</h2>
    <div class="callout">
      <div class="ico">TR</div>
      <div>
        <p>Tim kami siap membantu Anda:</p>
        <ul>
          <li>Email: <a href="mailto:support@talirejeki.co.id">support@talirejeki.co.id</a></li>
          <li>Telepon/WhatsApp: 08xx-xxxx-xxxx</li>
          <li>Alamat: (Isi alamat kantor/warehouse)</li>
        </ul>
        <small class="muted">Jam operasional: Senin–Jumat, 09.00–17.00 WIB</small>
      </div>
    </div>

    <!-- FAQ ringkas -->
    <div class="faq" aria-label="Pertanyaan umum">
      <details>
        <summary>Apakah bisa request spesifikasi teknis khusus?</summary>
        <div class="ans">Bisa. Sertakan detail aplikasi/standar proyek pada saat permintaan penawaran agar kami rekomendasikan material yang sesuai.</div>
      </details>
      <details>
        <summary>Apakah tersedia pengiriman ke luar pulau?</summary>
        <div class="ans">Ya, kami bekerja sama dengan berbagai ekspedisi. Estimasi ongkir & lead time akan diinformasikan pada quotation.</div>
      </details>
      <details>
        <summary>Bagaimana cara klaim retur/garansi?</summary>
        <div class="ans">Dokumentasikan kendala (foto/video) dan kirimkan dalam periode yang ditentukan. Tim kami akan melakukan evaluasi sesuai kebijakan retur/garansi.</div>
      </details>
    </div>

  </section>
</div>

<!-- Back-to-top button -->
<button class="btn-top" id="btnTop" title="Kembali ke atas" aria-label="Kembali ke atas">↑</button>

<script>
  (function(){
    const btn = document.getElementById('btnTop');
    const toggle = () => {
      if (window.scrollY > 280) btn.classList.add('show');
      else btn.classList.remove('show');
    };
    window.addEventListener('scroll', toggle, {passive:true});
    toggle();
    btn.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));
  })();
</script>
@endsection
