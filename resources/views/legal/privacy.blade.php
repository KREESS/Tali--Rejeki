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
  html{ scroll-behavior:smooth; }

  /* ===== READING PROGRESS ===== */
  .reading-progress{
    position:sticky; top:0; left:0; right:0; height:3px; z-index:60;
    background:linear-gradient(90deg, var(--primary), var(--primary-2));
    transform-origin:left; transform:scaleX(var(--p,0)); transition:transform .12s linear;
  }

  /* ===== HERO ===== */
  .privacy-hero{
    position:relative;
    border-bottom:1px solid var(--ring);
    background:
      radial-gradient(80% 120% at 10% 0%, #ffe6e6 0%, transparent 60%),
      radial-gradient(90% 120% at 90% 0%, #fff0f0 0%, transparent 60%),
      linear-gradient(#fff, #fff);
    overflow:hidden;
  }
  .privacy-hero .inner{
    max-width:1080px; margin:0 auto; padding:54px 16px 30px;
    display:flex; flex-direction:column; gap:10px;
  }
  .breadcrumbs{ font-size:12px; color:#8a8a8a; font-weight:700; }
  .breadcrumbs a{ color:#8a8a8a; text-decoration:none; }
  .breadcrumbs a:hover{ color:var(--primary); text-decoration:underline; }
  .kicker{
    display:inline-flex; align-items:center; gap:8px; width:max-content;
    padding:6px 12px; border-radius:999px;
    font-size:12px; font-weight:800; color:#fff;
    background:linear-gradient(90deg,var(--primary),var(--primary-2));
    box-shadow:0 8px 24px rgba(124,20,21,.28)
  }
  .privacy-hero h1{
    margin:4px 0 6px; font-size:clamp(28px,4vw,40px); line-height:1.08;
    color:var(--primary); font-weight:900; letter-spacing:.2px; text-wrap:balance;
  }
  .meta{color:var(--muted);font-size:13px}

  .hero-actions{ display:flex; gap:8px; flex-wrap:wrap; margin-top:8px; }
  .btn-ghost{
    display:inline-flex; align-items:center; gap:8px; padding:8px 12px;
    border:1px solid var(--ring); border-radius:10px; background:#fff; color:#333; font-weight:800;
    text-decoration:none; box-shadow:0 6px 16px rgba(0,0,0,.04);
    transition:transform .12s ease, box-shadow .12s ease, border-color .12s ease;
  }
  .btn-ghost:hover{ transform:translateY(-2px); border-color:#e4e4e4; box-shadow:0 10px 22px rgba(0,0,0,.06); }

  .wave{
    position:absolute; inset:auto 0 -1px 0; height:44px;
    background:
      radial-gradient(60px 12px at 10% 12px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(70px 12px at 30% 10px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(80px 12px at 55% 16px, rgba(124,20,21,.08), transparent 70%),
      radial-gradient(90px 12px at 78% 12px, rgba(124,20,21,.08), transparent 70%);
    filter: blur(6px);
  }

  /* ===== LAYOUT ===== */
  .privacy-wrap{
    max-width:1080px; margin:0 auto; padding:26px 16px 120px;
    display:grid; grid-template-columns: 300px 1fr; gap:22px;
  }
  @media (max-width:980px){ .privacy-wrap{ grid-template-columns: 1fr; } }

  /* ===== TOC (sticky) ===== */
  .toc{
    position:sticky; top:86px; align-self:start;
    display:flex; flex-direction:column; gap:10px;
    background:#fff; border:1px solid var(--ring); border-radius:12px; padding:12px;
  }
  .toc h5{ margin:2px 0 6px; font-size:12px; color:#8a8a8a; letter-spacing:.6px; font-weight:900; }
  .toc a{
    display:flex; align-items:center; justify-content:space-between; gap:10px;
    border:1px solid #f1f1f1; border-radius:10px; padding:10px 12px;
    color:#333; text-decoration:none; font-weight:700; font-size:13px;
    transition:transform .12s ease, box-shadow .12s ease, border-color .12s ease, background .12s ease;
  }
  .toc a .dot{ width:8px; height:8px; border-radius:50%; background:#d9d9d9; }
  .toc a.active{ background:#fff7f7; border-color:#f0dada; }
  .toc a.active .dot{ background:var(--primary); }
  .toc a:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(0,0,0,.06); border-color:#e4e4e4; }
  .toc .note{ margin-top:6px; font-size:12px; color:#8a8a8a; }

  .searchbox{
    display:flex; align-items:center; gap:8px;
    background:#fff; border:1px solid var(--ring); border-radius:10px; padding:8px 10px;
  }
  .searchbox input{
    border:none; outline:none; width:100%; font-size:13px; color:#333; background:transparent;
  }

  /* ===== CONTENT ===== */
  .content > .card{
    background:var(--card); border:1px solid var(--ring); border-radius:var(--radius);
    padding:16px 18px; box-shadow:0 10px 34px rgba(0,0,0,.04);
  }
  .section{ position:relative; }
  h2.section{
    margin:28px 0 10px; font-size:20px; font-weight:800; color:var(--ink);
    scroll-margin-top:96px; display:flex; align-items:center; gap:8px;
  }
  .anchor-btn{
    opacity:0; transform:translateY(2px); transition:opacity .12s ease, transform .12s ease;
    border:1px solid var(--ring); border-radius:8px; padding:4px 8px; font-size:12px; color:#555; cursor:pointer; background:#fff;
  }
  .section:hover .anchor-btn{ opacity:1; transform:translateY(0); }
  p, li{ color:#333; line-height:1.75; }
  ul{ padding-left:18px; }

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

  /* ===== COOKIE PREFERENCES (UI) ===== */
  .pref-box{
    margin-top:12px; background:#fff; border:1px solid var(--ring);
    border-radius:12px; padding:12px 14px; box-shadow:0 6px 14px rgba(0,0,0,.04);
  }
  .pref-grid{ display:grid; grid-template-columns: 1fr auto; gap:10px; align-items:center; }
  .toggle{
    --w:44px; --h:26px; --dot:20px;
    position:relative; width:var(--w); height:var(--h); border-radius:999px;
    background:#e8e8e8; border:1px solid #ddd; cursor:pointer;
    transition:background .18s ease,border-color .18s ease;
  }
  .toggle input{ appearance:none; position:absolute; inset:0; margin:0; cursor:pointer; }
  .toggle .knob{
    position:absolute; top:50%; left:3px; width:var(--dot); height:var(--dot);
    background:#fff; border-radius:50%; transform:translateY(-50%); box-shadow:0 2px 6px rgba(0,0,0,.16);
    transition:left .18s ease;
  }
  .toggle input:checked ~ .knob{ left:calc(var(--w) - var(--dot) - 3px); }
  .toggle input:checked{ background:linear-gradient(135deg,var(--primary),var(--primary-2)); border-color:var(--primary-2); }
  .pref-actions{ display:flex; gap:8px; margin-top:10px; }
  .btn-save{
    border:1px solid var(--primary); background:linear-gradient(135deg,var(--primary),var(--primary-2)); color:#fff;
    font-weight:800; border-radius:10px; padding:8px 12px;
  }
  .btn-reset{
    border:1px solid var(--ring); background:#fff; color:#333; font-weight:800; border-radius:10px; padding:8px 12px;
  }
  .toast-mini{
    position:fixed; left:50%; bottom:18px; transform:translateX(-50%); z-index:50;
    background:#111; color:#fff; border-radius:999px; padding:8px 14px; font-size:12px;
    box-shadow:0 10px 24px rgba(0,0,0,.28); opacity:0; pointer-events:none; transition:opacity .18s ease, transform .18s ease;
  }
  .toast-mini.show{ opacity:1; transform:translateX(-50%) translateY(-6px); }

  /* ===== FAQ ===== */
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

  /* Utility */
  .hidden{ display:none !important; }
</style>

<div class="reading-progress" id="progress"></div>

<section class="privacy-hero">
  <div class="inner">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="{{ url('/') }}">Beranda</a> &nbsp;/&nbsp; <span>Kebijakan Privasi</span>
    </nav>
    <span class="kicker">PRIVACY — TALIREJEKI.COM</span>
    <h1>Kebijakan Privasi</h1>
    <div class="meta">
      {{ config('app.name', 'Tali Rejeki') }} — Distributor Insulasi Industri • Berlaku sejak: {{ now()->format('d F Y') }} • <span id="readTime">~5 menit baca</span>
    </div>
    <div class="hero-actions">
      <a class="btn-ghost" href="{{ asset('docs/kebijakan-privasi.pdf') }}" download>
        <!-- download icon -->
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        Unduh PDF
      </a>
      <button class="btn-ghost" type="button" onclick="window.print()">
        <!-- print icon -->
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M6 9V4h12v5M6 17v3h12v-3M4 13h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        Cetak
      </button>
    </div>
  </div>
  <div class="wave"></div>
</section>

<div class="privacy-wrap">
  <!-- Sidebar TOC -->
  <aside class="toc" aria-label="Daftar Isi">
    <div class="searchbox" role="search">
      <!-- search icon -->
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="#999" stroke-width="2"/><path d="M20 20l-3.5-3.5" stroke="#999" stroke-width="2" stroke-linecap="round"/></svg>
      <input id="searchInput" type="search" placeholder="Cari di halaman...">
    </div>
    <h5>NAVIGASI</h5>
    <a href="#ringkasan" data-anchor><span>Ringkasan</span><span class="dot"></span></a>
    <a href="#data-dikumpulkan" data-anchor><span>Data yang Dikumpulkan</span><span class="dot"></span></a>
    <a href="#sumber-data" data-anchor><span>Sumber Data</span><span class="dot"></span></a>
    <a href="#penggunaan" data-anchor><span>Penggunaan Data</span><span class="dot"></span></a>
    <a href="#dasar-hukum" data-anchor><span>Dasar Hukum</span><span class="dot"></span></a>
    <a href="#berbagi" data-anchor><span>Berbagi ke Pihak Ketiga</span><span class="dot"></span></a>
    <a href="#lintas-negara" data-anchor><span>Transfer Lintas Negara</span><span class="dot"></span></a>
    <a href="#retensi" data-anchor><span>Retensi Data</span><span class="dot"></span></a>
    <a href="#keamanan" data-anchor><span>Keamanan</span><span class="dot"></span></a>
    <a href="#hak" data-anchor><span>Hak Anda</span><span class="dot"></span></a>
    <a href="#cookies" data-anchor><span>Cookies & Preferensi</span><span class="dot"></span></a>
    <a href="#anak" data-anchor><span>Privasi Anak</span><span class="dot"></span></a>
    <a href="#permintaan-data" data-anchor><span>Permintaan Data</span><span class="dot"></span></a>
    <a href="#perubahan" data-anchor><span>Perubahan</span><span class="dot"></span></a>
    <a href="#kontak" data-anchor><span>Kontak</span><span class="dot"></span></a>
    <p class="note">Perlu salinan? <a href="{{ asset('docs/kebijakan-privasi.pdf') }}">Unduh PDF</a></p>
  </aside>

  <!-- Content -->
  <section class="content" id="content">
    <div class="card">
      <p>Kebijakan Privasi ini menjelaskan bagaimana <strong>{{ config('app.name', 'Tali Rejeki') }}</strong> mengumpulkan, menggunakan, membagikan, menyimpan, dan melindungi data pribadi saat Anda menggunakan situs dan layanan kami di talirejeki.com. Kami berkomitmen pada praktik pengelolaan data yang aman, transparan, dan bertanggung jawab.</p>
      <div class="info-strip">
        <div class="chip"><span class="dot"></span> <div><b>Data Aman</b><br><small>Kontrol akses & pemantauan internal.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>Transparan</b><br><small>Tujuan pemrosesan jelas & terukur.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>Kendali Anda</b><br><small>Akses, koreksi, dan opt-out yang mudah.</small></div></div>
      </div>
    </div>

    <div class="section" data-section id="ringkasan">
      <h2 class="section">1. Ringkasan
        <button class="anchor-btn" data-copy="#ringkasan" title="Salin tautan">Salin tautan</button>
      </h2>
      <ul>
        <li>Data digunakan untuk memproses pesanan, dukungan pelanggan, peningkatan layanan, dan komunikasi penting.</li>
        <li>Data dapat dibagikan ke penyedia pembayaran, logistik, analitik, dan mitra IT yang mendukung operasional.</li>
        <li>Anda dapat mengakses, memperbaiki, atau meminta penghapusan data tertentu sesuai ketentuan.</li>
      </ul>
    </div>

    <div class="section" data-section id="data-dikumpulkan">
      <h2 class="section">2. Data yang Kami Kumpulkan
        <button class="anchor-btn" data-copy="#data-dikumpulkan">Salin tautan</button>
      </h2>
      <ul>
        <li><strong>Identitas & Kontak:</strong> nama, email, telepon/WhatsApp, alamat pengiriman, NPWP (jika relevan).</li>
        <li><strong>Akun:</strong> kredensial (hash password), preferensi, riwayat interaksi.</li>
        <li><strong>Transaksi:</strong> pesanan, tagihan, metode pembayaran (token/ID gateway; bukan nomor kartu penuh).</li>
        <li><strong>Teknis & Penggunaan:</strong> IP, tipe perangkat/browser, halaman yang diakses, cookies, log.</li>
        <li><strong>Komunikasi:</strong> pesan email/form, catatan dukungan.</li>
      </ul>
    </div>

    <div class="section" data-section id="sumber-data">
      <h2 class="section">3. Sumber Data
        <button class="anchor-btn" data-copy="#sumber-data">Salin tautan</button>
      </h2>
      <p>Kami memperoleh data dari Anda (form, akun), otomatis melalui sistem (cookies/log), dan dari pihak ketiga yang Anda gunakan (payment gateway, logistik, analitik).</p>
    </div>

    <div class="section" data-section id="penggunaan">
      <h2 class="section">4. Cara Kami Menggunakan Data
        <button class="anchor-btn" data-copy="#penggunaan">Salin tautan</button>
      </h2>
      <ul>
        <li>Memproses pemesanan, pembayaran, dan pengiriman.</li>
        <li>Manajemen akun, autentikasi, dan pencegahan penipuan.</li>
        <li>Dukungan pelanggan & komunikasi terkait layanan.</li>
        <li>Pengiriman faktur, pembaruan penting, dan pemberitahuan keamanan.</li>
        <li>Pemasaran yang Anda setujui (dapat berhenti berlangganan kapan saja).</li>
        <li>Analitik performa & pengalaman pengguna.</li>
        <li>Kepatuhan hukum & audit internal.</li>
      </ul>
    </div>

    <div class="section" data-section id="dasar-hukum">
      <h2 class="section">5. Dasar Hukum Pemrosesan
        <button class="anchor-btn" data-copy="#dasar-hukum">Salin tautan</button>
      </h2>
      <ul>
        <li><strong>Persetujuan</strong> (mis. pemasaran email yang Anda setujui).</li>
        <li><strong>Pelaksanaan kontrak</strong> (memproses pesanan Anda).</li>
        <li><strong>Kewajiban hukum</strong> (pencatatan pajak, kepatuhan regulasi).</li>
        <li><strong>Kepentingan sah</strong> (keamanan sistem, peningkatan layanan) dengan perlindungan yang seimbang.</li>
      </ul>
    </div>

    <div class="section" data-section id="berbagi">
      <h2 class="section">6. Berbagi Data kepada Pihak Ketiga
        <button class="anchor-btn" data-copy="#berbagi">Salin tautan</button>
      </h2>
      <p>Kami dapat membagikan data kepada:</p>
      <ul>
        <li><strong>Penyedia pembayaran</strong> untuk memproses transaksi.</li>
        <li><strong>Mitra logistik/kurir</strong> untuk pengiriman.</li>
        <li><strong>Penyedia analitik</strong> untuk memahami penggunaan situs.</li>
        <li><strong>Konsultan/penyedia IT</strong> untuk pemeliharaan & keamanan sistem.</li>
      </ul>
      <p>Kami <strong>tidak menjual</strong> data pribadi Anda.</p>
    </div>

    <div class="section" data-section id="lintas-negara">
      <h2 class="section">7. Transfer Lintas Negara
        <button class="anchor-btn" data-copy="#lintas-negara">Salin tautan</button>
      </h2>
      <p>Jika pemrosesan melibatkan server/penyedia layanan di luar Indonesia, kami akan menerapkan perlindungan yang wajar agar setara dengan standar yang berlaku.</p>
    </div>

    <div class="section" data-section id="retensi">
      <h2 class="section">8. Penyimpanan & Retensi
        <button class="anchor-btn" data-copy="#retensi">Salin tautan</button>
      </h2>
      <p>Data disimpan selama diperlukan untuk tujuan pemrosesan atau sesuai kewajiban hukum (mis. arsip keuangan). Setelah itu, data dihapus atau dianonimkan secara aman.</p>
    </div>

    <div class="section" data-section id="keamanan">
      <h2 class="section">9. Keamanan Data
        <button class="anchor-btn" data-copy="#keamanan">Salin tautan</button>
      </h2>
      <p>Kami menerapkan langkah teknis & organisasi yang wajar (enkripsi saat transit, kontrol akses, audit). Meski demikian, tidak ada sistem yang 100% bebas risiko.</p>
    </div>

    <div class="section" data-section id="hak">
      <h2 class="section">10. Hak Anda
        <button class="anchor-btn" data-copy="#hak">Salin tautan</button>
      </h2>
      <ul>
        <li>Mengakses salinan data pribadi tertentu.</li>
        <li>Memperbaiki data yang tidak akurat.</li>
        <li>Meminta penghapusan data tertentu sesuai ketentuan.</li>
        <li>Menarik persetujuan (tanpa memengaruhi pemrosesan yang telah sah).</li>
        <li>Menolak pemrosesan berbasis kepentingan sah dalam kondisi tertentu.</li>
      </ul>
    </div>

    <div class="section" data-section id="cookies">
      <h2 class="section">11. Cookies & Preferensi
        <button class="anchor-btn" data-copy="#cookies">Salin tautan</button>
      </h2>
      <div class="pref-box">
        <div class="pref-grid">
          <div>
            <strong>Cookies Esensial</strong><br>
            <small>Wajib untuk fungsi dasar situs (login, keamanan, form).</small>
          </div>
          <label class="toggle" aria-label="Cookies esensial">
            <input id="ck-essential" type="checkbox" checked disabled>
            <span class="knob"></span>
          </label>

          <div>
            <strong>Analitik</strong><br>
            <small>Membantu memahami performa & pengalaman pengguna.</small>
          </div>
          <label class="toggle" aria-label="Cookies analitik">
            <input id="ck-analytics" type="checkbox">
            <span class="knob"></span>
          </label>

          <div>
            <strong>Pemasaran</strong><br>
            <small>Penawaran relevan jika Anda menyetujuinya.</small>
          </div>
          <label class="toggle" aria-label="Cookies pemasaran">
            <input id="ck-marketing" type="checkbox">
            <span class="knob"></span>
          </label>
        </div>

        <div class="pref-actions">
          <button type="button" class="btn-save" id="btnSavePref">Simpan Preferensi</button>
          <button type="button" class="btn-reset" id="btnResetPref">Reset</button>
        </div>

        <div class="pref-muted">Pengaturan ini menyimpan preferensi di perangkat Anda (localStorage). Untuk solusi consent produksi, sambungkan ke platform cookie-consent yang digunakan.</div>
      </div>
    </div>

    <div class="section" data-section id="anak">
      <h2 class="section">12. Privasi Anak
        <button class="anchor-btn" data-copy="#anak">Salin tautan</button>
      </h2>
      <p>Layanan kami tidak ditujukan untuk anak di bawah 18 tahun. Kami tidak secara sadar mengumpulkan data anak tanpa persetujuan yang sah.</p>
    </div>

    <div class="section" data-section id="permintaan-data">
      <h2 class="section">13. Permintaan Akses/Penghapusan Data
        <button class="anchor-btn" data-copy="#permintaan-data">Salin tautan</button>
      </h2>
      <div class="callout">
        <div class="ico">TR</div>
        <div>
          <p>Ingin meminta salinan, koreksi, atau penghapusan data pribadi? Kirimkan permintaan dengan subjek <em>“Permintaan Data Pribadi”</em> melalui:</p>
          <ul>
            <li>Email: <a href="mailto:privacy@talirejeki.co.id?subject=Permintaan%20Data%20Pribadi">privacy@talirejeki.co.id</a></li>
            <li>WhatsApp: 08xx-xxxx-xxxx</li>
          </ul>
          <small class="muted">Kami dapat melakukan verifikasi identitas sebelum memproses permintaan.</small>
        </div>
      </div>
    </div>

    <div class="section" data-section id="perubahan">
      <h2 class="section">14. Perubahan Kebijakan
        <button class="anchor-btn" data-copy="#perubahan">Salin tautan</button>
      </h2>
      <p>Kebijakan ini dapat diperbarui sewaktu-waktu. Versi terbaru akan ditampilkan di halaman ini beserta tanggal berlaku.</p>
    </div>

    <div class="section" data-section id="kontak">
      <h2 class="section">15. Kontak
        <button class="anchor-btn" data-copy="#kontak">Salin tautan</button>
      </h2>
      <div class="callout">
        <div class="ico">TR</div>
        <div>
          <p>Jika ada pertanyaan terkait Kebijakan Privasi, hubungi kami:</p>
          <ul>
            <li>Email: <a href="mailto:privacy@talirejeki.co.id">privacy@talirejeki.co.id</a></li>
            <li>Telepon/WhatsApp: 08xx-xxxx-xxxx</li>
            <li>Alamat: (Isi alamat kantor/warehouse)</li>
          </ul>
          <small class="muted">Jam operasional: Senin–Jumat, 09.00–17.00 WIB</small>
        </div>
      </div>

      <!-- FAQ ringkas -->
      <div class="faq" aria-label="Pertanyaan umum">
        <details>
          <summary>Apakah data saya dipakai untuk iklan?</summary>
          <div class="ans">Hanya jika Anda menyetujuinya. Anda bisa menonaktifkan kategori pemasaran pada preferensi cookies atau berhenti berlangganan email.</div>
        </details>
        <details>
          <summary>Apakah saya bisa minta data saya dihapus?</summary>
          <div class="ans">Bisa untuk data tertentu sesuai ketentuan. Kirimkan permintaan melalui kontak resmi pada bagian “Permintaan Data”.</div>
        </details>
        <details>
          <summary>Apakah talirejeki.com membagikan data ke pihak ketiga?</summary>
          <div class="ans">Hanya ke mitra operasional (pembayaran, logistik, analitik, IT) untuk menyediakan layanan dengan aman & efisien. Kami tidak menjual data pribadi.</div>
        </details>
      </div>
    </div>

  </section>
</div>

<!-- Back-to-top button & toast -->
<button class="btn-top" id="btnTop" title="Kembali ke atas" aria-label="Kembali ke atas">↑</button>
<div class="toast-mini" id="toastMini" role="status" aria-live="polite">Preferensi tersimpan</div>

<script>
  // Reading progress
  (function(){
    const bar = document.getElementById('progress');
    const onScroll = () => {
      const sc = window.scrollY;
      const h  = document.documentElement.scrollHeight - window.innerHeight;
      const p  = Math.max(0, Math.min(1, sc / (h || 1)));
      bar.style.setProperty('--p', p);
    };
    window.addEventListener('scroll', onScroll, {passive:true}); onScroll();
  })();

  // Estimate reading time (~200 wpm)
  (function(){
    const text = document.getElementById('content')?.innerText || '';
    const words = text.trim().split(/\s+/).length;
    const mins = Math.max(1, Math.round(words / 200));
    const el = document.getElementById('readTime');
    if (el) el.textContent = `~${mins} menit baca`;
  })();

  // Active TOC via IntersectionObserver
  (function(){
    const tocLinks = Array.from(document.querySelectorAll('.toc a[data-anchor]'));
    const map = new Map(tocLinks.map(a => [a.getAttribute('href'), a]));
    const obs = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        const id = '#' + e.target.id;
        const link = map.get(id);
        if (!link) return;
        if (e.isIntersecting) {
          tocLinks.forEach(a => a.classList.remove('active'));
          link.classList.add('active');
        }
      });
    }, {rootMargin: '-40% 0px -50% 0px', threshold: 0});
    document.querySelectorAll('[data-section]').forEach(sec => obs.observe(sec));
  })();

  // Copy link buttons
  (function(){
    document.querySelectorAll('[data-copy]').forEach(btn=>{
      btn.addEventListener('click', async ()=>{
        const hash = btn.getAttribute('data-copy');
        const url = location.origin + location.pathname + hash;
        try{
          await navigator.clipboard.writeText(url);
          showToast('Tautan disalin');
          history.replaceState(null, '', hash);
        }catch(e){ showToast('Gagal menyalin'); }
      });
    });
  })();

  // Search in page (filter sections)
  (function(){
    const input = document.getElementById('searchInput');
    if(!input) return;
    const sections = Array.from(document.querySelectorAll('[data-section]'));
    input.addEventListener('input', ()=>{
      const q = input.value.trim().toLowerCase();
      sections.forEach(sec=>{
        const txt = sec.innerText.toLowerCase();
        sec.classList.toggle('hidden', q && !txt.includes(q));
      });
    });
  })();

  // Back-to-top
  (function(){
    const btn = document.getElementById('btnTop');
    const toggle = () => { if (window.scrollY > 280) btn.classList.add('show'); else btn.classList.remove('show'); };
    window.addEventListener('scroll', toggle, {passive:true}); toggle();
    btn.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));
  })();

  // Cookie prefs save/reset (localStorage demo)
  (function(){
    const key = 'tr_cookie_prefs';
    const elA = document.getElementById('ck-analytics');
    const elM = document.getElementById('ck-marketing');
    const save = () => {
      const payload = { analytics: !!elA?.checked, marketing: !!elM?.checked, ts: Date.now() };
      localStorage.setItem(key, JSON.stringify(payload));
      showToast('Preferensi tersimpan');
    };
    const reset = () => {
      localStorage.removeItem(key);
      if(elA) elA.checked = false;
      if(elM) elM.checked = false;
      showToast('Preferensi direset');
    };
    // load
    try{
      const raw = localStorage.getItem(key);
      if(raw){
        const v = JSON.parse(raw);
        if(elA) elA.checked = !!v.analytics;
        if(elM) elM.checked = !!v.marketing;
      }
    }catch(e){}
    document.getElementById('btnSavePref')?.addEventListener('click', save);
    document.getElementById('btnResetPref')?.addEventListener('click', reset);
  })();

  // Mini toast
  function showToast(msg){
    const t = document.getElementById('toastMini');
    if(!t) return;
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(()=> t.classList.remove('show'), 1600);
  }
</script>
@endsection
