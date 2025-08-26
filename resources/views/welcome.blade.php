<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="Tali Rejeki — Distributor Insulasi Industri: Nitrile Rubber, Glasswool, Rockwool, aksesoris HVAC & proyek." />
  <meta name="theme-color" content="#7c1415" />
  <title>Tali Rejeki — Distributor Insulasi Industri</title>

  <!-- Bootstrap (opsional) -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    /* ======================= THEME TOKENS ======================= */
    :root{
      --primary:#7c1415;
      --primary-600:#6e1112;
      --primary-700:#5f0f10;
      --primary-900:#33090a;

      /* Layout stopper & paddings */
      --container-w: 1200px;                       /* stopper width */
      --page-pad: clamp(16px, 4vw, 36px);          /* side paddings */
      --section-pad-y: clamp(56px, 8vw, 80px);     /* vertical padding */

      /* Radii (softer, smoother) */
      --r-sm: 12px;
      --r-md: 18px;
      --r-lg: clamp(18px, 2.2vw, 28px);
      --r-xl: clamp(22px, 3vw, 36px);
      --r-pill: 999px;

      /* Dark (default) */
      --bg:#0b090a;
      --ink:#f5f6f8;
      --ink-soft:#cfd2da;
      --panel:#141014;
      --panel-soft:#191316;
      --line:#332024;
      --line-strong:#5f2326;
      --chip:#2b1719;
      --chip-text:#ffd1d2;
      --grid:#ffffff;
      --ring:0 10px 35px rgba(124,20,21,.18);
      --ring-strong:0 16px 55px rgba(124,20,21,.28);
      --soft:0 8px 24px rgba(17,17,20,.08);

      /* BG effects intensity */
      --conic-opacity: .50;
      --mesh-opacity: .55;
      --grid-opacity: .10;

      /* Canvas RGB (tanpa alpha) */
      --rgb-line: 229,122,124;
      --rgb-dot: 255,255,255;
      --rgb-glow: 255,220,222;

      /* Floating nav metrics (updated via JS) */
      --nav-gap: 16px;
      --navTop: 88px; /* fallback */
    }
    /* Light theme overrides */
    html[data-theme="light"]{
      --bg:#fff7f7;
      --ink:#0f0f12;
      --ink-soft:#4b5563;
      --panel:#ffffff;
      --panel-soft:#ffffff;
      --line:#f1d6d7;
      --line-strong:#e6b5b7;
      --chip:#fff0f1;
      --chip-text:#7c1415;
      --grid:#7c1415;
      --ring:0 10px 35px rgba(124,20,21,.14);
      --ring-strong:0 16px 55px rgba(124,20,21,.22);

      --conic-opacity: .35;
      --mesh-opacity: .42;
      --grid-opacity: .11;

      --rgb-line: 124,20,21;    /* garis partikel lebih gelap */
      --rgb-dot: 124,20,21;     /* dot maroon */
      --rgb-glow: 241,197,198;  /* glow hangat */
    }

    *{box-sizing:border-box}
    html,body{
      margin:0;padding:0;font-family:Inter,system-ui,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--ink);background:var(--bg);scroll-behavior:smooth;
      -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;
    }
    a{color:inherit;text-decoration:none}
    img{max-width:100%;display:block}

    /* Consistent "stopper" container with equal left/right paddings */
    .container{
      width:min(var(--container-w), calc(100vw - var(--page-pad)*2));
      margin-inline:auto;
      padding-inline:0; /* we already accounted padding via stopper formula */
    }

    /* ======================= ANIMATED BACKGROUND STACK ======================= */
    .bg-stage{position:fixed; inset:0; z-index:-3; pointer-events:none; overflow:hidden;}
    /* 1) Slow rotating conic glow (theme-aware via opacity vars) */
    .bg-conic{
      position:absolute; inset:-40% -10% -10% -10%;
      background:
        conic-gradient(from 0deg at 70% 30%, rgba(124,20,21,var(--conic-opacity)), transparent 40%),
        conic-gradient(from 40deg at 30% 70%, rgba(229,122,124,calc(var(--conic-opacity) - .12)), transparent 55%);
      filter: blur(60px); transform-origin:50% 50%;
      animation: conicSpin 38s linear infinite;
    }
    @keyframes conicSpin{ to{ transform: rotate(360deg) scale(1.05); } }

    /* 2) Gradient mesh blobs (morphing) */
    .mesh{
      position:absolute; inset:-20% -10% -10% -10%; mix-blend-mode:screen; filter: blur(38px); opacity:var(--mesh-opacity);
    }
    .mesh .m{
      position:absolute; width:44vw; height:44vw; border-radius:50%;
      background: radial-gradient(closest-side, rgba(226,120,122,.85), rgba(226,120,122,0) 70%);
      animation: drift 26s ease-in-out infinite;
    }
    .mesh .m.m2{
      width:50vw; height:50vw; left:55%; top:-12%;
      background: radial-gradient(closest-side, rgba(124,20,21,.9), rgba(124,20,21,0) 70%);
      animation-duration: 34s; animation-delay:-6s;
    }
    .mesh .m.m3{
      width:36vw; height:36vw; left:20%; top:60%;
      background: radial-gradient(closest-side, rgba(255,255,255,.35), rgba(255,255,255,0) 70%);
      animation-duration: 30s; animation-delay:-12s;
    }
    @keyframes drift{
      0%   { transform: translate(-10%, -6%) rotate(0deg)   scale(1); }
      33%  { transform: translate(26%,   -2%) rotate(60deg)  scale(1.08); }
      66%  { transform: translate(-12%,  18%) rotate(140deg) scale(.92); }
      100% { transform: translate(-10%,  -6%) rotate(360deg) scale(1); }
    }

    /* 3) Animated grid (theme-aware color & opacity) */
    .bg-grid{
      position:absolute; inset:-2px; opacity:var(--grid-opacity); mix-blend-mode:screen;
      background:
        repeating-linear-gradient(90deg, var(--grid) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg,  var(--grid) 0 1px, transparent 1px 40px);
      animation: gridMove 22s linear infinite;
    }
    @keyframes gridMove{
      0%{ transform: translateY(0) }
      100%{ transform: translateY(-40px) }
    }

    /* 4) Canvas layer: particles + constellations + orbits + cursor trail */
    .bg-canvas{ position:fixed; inset:0; z-index:-1; pointer-events:none; }

    /* ======================= FLOATING (CURVY) NAVBAR ======================= */
    .progress{
      position:fixed;inset:0 0 auto 0;height:3px;background:linear-gradient(90deg,#ffd1d2,#7c1415);
      transform-origin:0 50%;transform:scaleX(0);z-index:1000;box-shadow:0 0 10px rgba(124,20,21,.45);
    }
    .navbar-wrap{
      position:fixed;
      top:var(--nav-gap);
      left:50%;
      transform:translateX(-50%);
      width:min(var(--container-w), calc(100vw - var(--page-pad)*2));
      z-index:999;
      pointer-events:none;
    }
    .navbar{
      pointer-events:auto;
      display:flex;align-items:center;justify-content:space-between;gap:16px;
      padding:8px; /* inner padding for roundness feel */
      border-radius: var(--r-pill);              /* full pill shape */
      background: color-mix(in srgb, #101013 60%, transparent);
      border:1px solid color-mix(in srgb, var(--line) 38%, transparent);
      backdrop-filter: saturate(120%) blur(16px);
      box-shadow:
        0 18px 40px rgba(0,0,0,.28),
        inset 0 1px 0 rgba(255,255,255,.06);
      transition: border-color .25s ease, background .25s ease, transform .25s ease, box-shadow .25s ease;
      position:relative;
      overflow:hidden; /* smooth edges */
    }
    /* soft highlight stripe */
    .navbar::before{
      content:"";
      position:absolute; inset:0;
      background: radial-gradient(120% 60% at 50% -10%, rgba(255,255,255,.08), transparent 60%);
      pointer-events:none;
    }
    html[data-theme="light"] .navbar{
      background: color-mix(in srgb, #ffffff 68%, transparent);
      border-color:#f1d6d7;
      box-shadow:
        0 18px 44px rgba(124,20,21,.10),
        inset 0 1px 0 rgba(255,255,255,.65);
    }
    /* Subtle lift on scroll */
    .nav-scrolled .navbar{
      transform:translateY(-2px) scale(.995);
      background:color-mix(in srgb, var(--bg) 72%, transparent);
      border-color:color-mix(in srgb, var(--line) 52%, transparent);
      box-shadow:
        0 22px 50px rgba(0,0,0,.32),
        inset 0 1px 0 rgba(255,255,255,.04);
    }

    .nav-inner{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:4px 8px;border-radius:var(--r-pill)}
    .brand{display:flex;align-items:center;gap:12px;font-weight:800;letter-spacing:.2px}
    .logo{
      width:42px;height:42px;border-radius:calc(var(--r-pill) - 2px);
      background:linear-gradient(135deg,#9a191a,#5f0f10);
      display:grid;place-items:center;color:#fff;font-weight:800;box-shadow:var(--ring)
    }
    .brand .title{line-height:1}
    .brand .subtitle{font-size:12px;color:var(--ink-soft);line-height:1;margin-top:2px}

    .nav{display:flex;align-items:center;gap:8px}
    .nav a.link{
      padding:10px 14px;border-radius:var(--r-pill);border:1px solid transparent;font-weight:600;color:var(--ink);
      transition:transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease;
    }
    .nav a.link:hover{background:var(--chip);border-color:var(--line);box-shadow:var(--soft);transform:translateY(-2px)}
    .nav a.active{background:color-mix(in srgb, var(--chip) 70%, #ffffff 30%);border-color:var(--line-strong);color:var(--ink)}

    .btn{display:inline-flex;align-items:center;gap:10px;padding:12px 16px;border-radius:var(--r-pill);font-weight:700;transition:.22s ease;border:1px solid transparent}
    .btn-primary{background:var(--primary);color:#fff;box-shadow:var(--ring)}
    .btn-primary:hover{transform:translateY(-2px);box-shadow:var(--ring-strong);background:var(--primary-600)}
    .btn-ghost{border-color:var(--line);color:var(--ink);background:var(--panel-soft)}
    .btn-ghost:hover{border-color:var(--line-strong);transform:translateY(-2px);box-shadow:var(--soft)}

    .btn-logout{
      background:linear-gradient(135deg, #ef4444, #dc2626);
      color:#fff;
      border:1px solid transparent;
      font-weight:700;
      transition:.22s ease;
      display:inline-flex;
      align-items:center;
      gap:6px;
      padding:12px 16px;
      border-radius:var(--r-pill);
      cursor:pointer;
      box-shadow:0 4px 12px rgba(239, 68, 68, 0.3);
    }
    .btn-logout:hover{
      transform:translateY(-2px);
      box-shadow:0 8px 20px rgba(239, 68, 68, 0.4);
      background:linear-gradient(135deg, #dc2626, #ef4444);
    }

    .theme-toggle{
      width:44px;height:44px;border-radius:var(--r-pill);display:grid;place-items:center;
      border:1px solid var(--line);background:var(--panel-soft);color:var(--ink);
      transition:.2s; font-size:18px;
    }
    .theme-toggle:hover{transform:translateY(-2px);box-shadow:var(--soft)}

    .burger{display:none;flex-direction:column;gap:4px;width:44px;height:44px;border-radius:var(--r-pill);justify-content:center;align-items:center;border:1px solid var(--line);background:var(--panel-soft)}
    .burger span{width:20px;height:2px;background:var(--ink);border-radius:10px;transition:.2s}

    /* MOBILE PANEL, width stops exactly with container width */
    .mobile-panel{
      position:fixed;
      left:50%;
      transform:translateX(-50%);
      top:var(--navTop);
      width:min(var(--container-w), calc(100vw - var(--page-pad)*2));
      border:1px solid var(--line);border-radius:var(--r-lg);background:var(--panel);box-shadow:0 28px 60px rgba(0,0,0,.18);
      padding:12px;display:none;flex-direction:column;gap:8px;z-index:998;overflow:hidden;
    }
    .mobile-panel a{padding:12px 10px;border-radius:var(--r-md);color:var(--ink)}
    .mobile-panel a:hover{background:var(--chip)}
    .mobile-open .mobile-panel{display:flex}

    /* ======================= HERO ======================= */
    .nav-offset{height:120px} /* spacer so content won't hide under floating nav (updated in JS) */

    .hero{position:relative;padding:calc(var(--section-pad-y) + 24px) 0 var(--section-pad-y);border-radius:var(--r-xl);overflow:hidden}
    .hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:36px;align-items:center}
    .eyebrow{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:var(--r-pill);background:var(--chip);color:var(--chip-text);font-weight:800;font-size:12px;letter-spacing:.5px;text-transform:uppercase;border:1px solid var(--line-strong)}
    .headline{font-size:clamp(30px,4.2vw,52px);line-height:1.05;margin:16px 0 12px;font-weight:800;letter-spacing:-.3px}
    .headline .grad{
      background:linear-gradient(90deg,#ffffff 0%,#e57a7c 60%,#ffd1d2 100%);-webkit-background-clip:text;background-clip:text;color:transparent;
      text-shadow:0 0 24px rgba(229,122,124,.18);
    }
    html[data-theme="light"] .headline .grad{
      background:linear-gradient(90deg,#7c1415 0%,#a33a3b 60%,#d56c6e 100%);
      -webkit-background-clip:text;background-clip:text;color:transparent;
    }
    .subtitle{color:var(--ink-soft);font-size:clamp(14px,1.6vw,16px);line-height:1.75}
    .hero-cta{display:flex;flex-wrap:wrap;gap:12px;margin-top:22px}

    .hero-card{
      background:linear-gradient(180deg, var(--panel) 0%, color-mix(in srgb, var(--panel) 70%, var(--panel-soft) 30%) 100%);
      border:1px solid var(--line);border-radius:var(--r-lg);padding:16px 16px;display:flex;gap:12px;align-items:center;
      box-shadow:0 14px 40px rgba(0,0,0,.18)
    }
    .hero-badge{width:42px;height:42px;border-radius:var(--r-md);background:var(--primary);display:grid;place-items:center;color:#fff;font-weight:800}
    .illus{
      aspect-ratio:4/3;border-radius:var(--r-xl);
      background:
        radial-gradient(500px 300px at 60% 10%, rgba(124,20,21,.30), transparent 60%),
        linear-gradient(135deg,#7c1415 0%,#9a191a 45%,#2b090a 120%);
      position:relative;overflow:hidden;box-shadow:0 40px 80px rgba(124,20,21,.28);
      transform: translateZ(0);
    }
    html[data-theme="light"] .illus{
      background:
        radial-gradient(500px 300px at 60% 10%, rgba(124,20,21,.18), transparent 60%),
        linear-gradient(135deg,#fff0f1 0%,#ffe4e5 45%,#ffd7d9 120%);
      box-shadow:0 40px 80px rgba(124,20,21,.12);
    }
    .chip{
      position:absolute;inset:auto 16px 16px auto;background:var(--panel-soft);border:1px solid var(--line);border-radius:var(--r-md);padding:10px 12px;font-size:12px;color:var(--chip-text);font-weight:800;box-shadow:0 8px 24px rgba(0,0,0,.20)
    }
    .spark{position:absolute;inset:auto auto -40px -40px;width:260px;height:260px;background:radial-gradient(closest-side,rgba(255,255,255,.22),transparent);filter:blur(12px)}
    .float-dot{
      position:absolute;width:10px;height:10px;border-radius:var(--r-pill);background:rgba(var(--rgb-dot),.9);box-shadow:0 6px 22px rgba(var(--rgb-dot),.35);
      animation:float 10s ease-in-out infinite;
    }
    .float-dot:nth-child(3){top:16%;left:12%;animation-delay:.2s}
    .float-dot:nth-child(4){top:8%;left:72%;animation-delay:1.1s}
    .float-dot:nth-child(5){top:42%;left:86%;animation-delay:.6s}
    .float-dot:nth-child(6){top:62%;left:6%;animation-delay:1.8s}
    @keyframes float{ 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }

    /* ======================= SECTIONS ======================= */
    .section{padding:var(--section-pad-y) 0; scroll-margin-top: 120px;}
    .section-title{font-size:clamp(22px,3.2vw,30px);font-weight:800;margin-bottom:6px}
    .section-sub{color:var(--ink-soft);margin-bottom:22px}

    .features{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    .card{background:var(--panel);border:1px solid var(--line);border-radius:var(--r-lg);padding:18px;transition:.25s ease;box-shadow:0 10px 30px rgba(0,0,0,.12)}
    .card:hover{transform:translateY(-6px);box-shadow:0 18px 44px rgba(0,0,0,.18)}
    .icon{width:42px;height:42px;border-radius:var(--r-md);background:var(--chip);color:var(--chip-text);display:grid;place-items:center;font-weight:800;margin-bottom:12px}
    .card h4{margin:0 0 6px;font-size:16px}
    .card p{margin:0;color:var(--ink-soft);font-size:14px;line-height:1.6}

    .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
    .cat{position:relative;border-radius:var(--r-lg);overflow:hidden;background:var(--panel);border:1px solid var(--line);transition:.25s}
    .cat:hover{transform:translateY(-6px);box-shadow:0 18px 44px rgba(0,0,0,.18)}
    .cat-img{height:180px;background:linear-gradient(135deg,#7c1415,#5f0f10);opacity:.9}
    html[data-theme="light"] .cat-img{background:linear-gradient(135deg,#ffd7d9,#ffe9ea)}
    .cat-body{padding:16px}
    .tag{display:inline-block;background:var(--chip);color:var(--chip-text);font-weight:800;font-size:12px;border-radius:var(--r-pill);padding:6px 10px;border:1px solid var(--line-strong)}

    .cta{
      margin:56px 0;border-radius:var(--r-lg);padding:24px;
      background:linear-gradient(90deg, #7c1415 0%, #5f0f10 100%);
      color:#fff;display:flex;gap:20px;align-items:center;justify-content:space-between;flex-wrap:wrap;
      box-shadow:0 20px 50px rgba(124,20,21,.25)
    }
    html[data-theme="light"] .cta{
      background:linear-gradient(90deg,#9a191a 0%, #7c1415 100%);
      box-shadow:0 20px 50px rgba(124,20,21,.18)
    }
    .cta h3{margin:0;font-weight:800;font-size:clamp(18px,2.6vw,24px)}
    .cta .btn-white{background:#fff;color:#7c1415;border:1px solid #ffffff;border-radius:var(--r-pill);padding:12px 16px;font-weight:800}
    .cta .btn-white:hover{transform:translateY(-2px);box-shadow:var(--ring)}

    .form{padding:18px;border:1px solid var(--line);border-radius:var(--r-lg);background:var(--panel)}
    .field{display:flex;flex-direction:column;gap:6px}
    .input{
      width:100%;padding:12px 14px;border:1px solid var(--line);border-radius:var(--r-md);outline:none;transition:border-color .18s, box-shadow .18s;
      background:var(--panel-soft);color:var(--ink);
    }
    .input:focus{border-color:var(--line-strong);box-shadow:0 0 0 4px rgba(124,20,21,.14)}
    label{font-size:13px;color:var(--ink-soft)}
    .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .form-grid .full{grid-column:1/-1}

    footer{padding:36px 0;color:color-mix(in srgb, var(--ink) 55%, transparent);font-size:14px}
    footer a{color:#f3a8aa}
    html[data-theme="light"] footer a{color:#a23a3c}
    .foot{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;border-top:1px dashed var(--line);padding-top:18px}

    .reveal{opacity:0;transform:translateY(16px);transition:opacity .6s ease, transform .6s ease}
    .in-view{opacity:1;transform:none}

    .to-top{
      position:fixed;right:16px;bottom:16px;width:44px;height:44px;border-radius:var(--r-pill);background:var(--panel-soft);border:1px solid var(--line);
      display:grid;place-items:center;color:var(--chip-text);box-shadow:0 8px 30px rgba(0,0,0,.18);
      transform:translateY(12px);opacity:0;pointer-events:none;transition:.25s;z-index:998;
    }
    .to-top.show{transform:none;opacity:1;pointer-events:auto}
    .to-top:hover{transform:translateY(-2px);box-shadow:var(--ring)}

    @media (prefers-reduced-motion: reduce){
      .bg-conic,.mesh,.bg-grid,.bg-canvas{display:none}
      .reveal{opacity:1;transform:none}
      .card:hover,.cat:hover,.btn-primary:hover,.btn-ghost:hover,.theme-toggle:hover{transform:none;box-shadow:none}
    }
    @media (max-width: 1024px){
      .features{grid-template-columns:repeat(2,1fr)}
      .grid{grid-template-columns:repeat(2,1fr)}
    }
    @media (max-width: 720px){
      .hero-grid{grid-template-columns:1fr}
      .grid{grid-template-columns:1fr}
      .features{grid-template-columns:1fr}
      .nav{display:none}
      .burger{display:flex}
      .btn{width:100%;justify-content:center}
      .cta{gap:14px}
    }
  </style>
</head>
<body>

  <!-- ======= BACKGROUND LAYERS ======= -->
  <div class="bg-stage" aria-hidden="true">
    <div class="bg-conic"></div>
    <div class="mesh">
      <div class="m"   style="top:5%;left:-8%"></div>
      <div class="m m2"></div>
      <div class="m m3"></div>
    </div>
    <div class="bg-grid"></div>
    <canvas id="bgCanvas" class="bg-canvas"></canvas>
  </div>

  <!-- Scroll progress -->
  <div class="progress" id="progress"></div>

  <!-- ======= FLOATING CURVED NAVBAR ======= -->
  <div class="navbar-wrap" id="navWrap">
    <div class="navbar">
      <div class="container nav-inner">
        <a href="#" class="brand" aria-label="Tali Rejeki Home">
          <div class="logo">TR</div>
          <div class="title-wrap">
            <div class="title" style="font-size:15px;line-height:1;">Tali Rejeki</div>
            <div class="subtitle">Distributor Insulasi Industri</div>
          </div>
        </a>

        <nav class="nav" aria-label="Primary">
          <a href="#produk" class="link">Produk</a>
          <a href="#keunggulan" class="link">Keunggulan</a>
          <a href="#kontak" class="link">Kontak</a>

          @if (Route::has('login'))
            <div class="auth" style="display:flex;align-items:center;gap:8px;margin-left:8px">
              @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-ghost">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form>
              @else
                <a href="{{ route('login') }}" class="btn btn-ghost">Log in</a>
                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
              @endauth
            </div>
          @endif
        </nav>

        <div style="display:flex;align-items:center;gap:10px">
          <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme" role="switch" aria-checked="false">🌙</button>
          <button class="burger" id="burger" aria-label="Buka menu">
            <span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </div>
    <!-- Mobile dropdown aligned under floating navbar -->
    <div class="mobile-panel" id="mobilePanel" role="dialog" aria-modal="true" aria-label="Menu">
      <div class="container" style="display:flex;flex-direction:column;gap:8px;padding:0">
        <a href="#produk" class="link">Produk</a>
        <a href="#keunggulan" class="link">Keunggulan</a>
        <a href="#kontak" class="link">Kontak</a>
        <div style="display:flex;gap:8px;margin-top:6px">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/dashboard') }}" class="btn btn-ghost" style="flex:1;justify-content:center">Dashboard</a>
              <form method="POST" action="{{ route('logout') }}" style="flex:1;">
                @csrf
                <button type="submit" class="btn btn-logout" style="width:100%;justify-content:center" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                  Logout
                </button>
              </form>
            @else
              <a href="{{ route('login') }}" class="btn btn-ghost" style="flex:1;justify-content:center">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary" style="flex:1;justify-content:center">Register</a>
              @endif
            @endauth
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- spacer to push content below floating nav -->
  <div id="navOffset" class="nav-offset" aria-hidden="true"></div>

  <!-- HERO -->
  <header class="container hero">
    <div class="hero-grid">
      <div class="reveal">
        <span class="eyebrow">Solusi Insulasi Industri</span>
        <h1 class="headline">Distributor Insulasi <span class="grad">Lengkap</span> untuk Pabrik &amp; Proyek Anda</h1>
        <p class="subtitle">
          Kami menyediakan insulasi pipa, ducting, panas &amp; suara, serta aksesorinya. Ready stock, pengiriman cepat, dan dukungan teknis profesional.
        </p>
        <div class="hero-cta">
          <a href="#produk" class="btn btn-primary">Lihat Katalog</a>
          <a href="#kontak" class="btn btn-ghost">Minta Penawaran</a>
        </div>

        <div style="margin-top:22px;display:flex;gap:12px;flex-wrap:wrap">
          <div class="hero-card">
            <div class="hero-badge">✓</div>
            <div>
              <div style="font-weight:800;margin-bottom:4px">Stok Terjamin</div>
              <div style="font-size:13px;color:var(--ink-soft)">Varian lengkap &amp; kemitraan pabrikan</div>
            </div>
          </div>
          <div class="hero-card">
            <div class="hero-badge">⚡</div>
            <div>
              <div style="font-weight:800;margin-bottom:4px">Respon Cepat</div>
              <div style="font-size:13px;color:var(--ink-soft)">Quotation &amp; pengiriman lebih cepat</div>
            </div>
          </div>
        </div>
      </div>

      <div class="illus reveal" aria-hidden="true">
        <span class="chip">ISO Grade | Heat &amp; Acoustic</span>
        <div class="spark"></div>
        <div class="float-dot"></div>
        <div class="float-dot"></div>
        <div class="float-dot"></div>
        <div class="float-dot"></div>
      </div>
    </div>
  </header>

  <!-- KEUNGGULAN -->
  <section id="keunggulan" class="container section">
    <h2 class="section-title reveal">Kenapa Pilih <span style="color:#ffd1d2">Tali Rejeki</span>?</h2>
    <p class="section-sub reveal">Fokus B2B industri, proses cepat, garansi kualitas, dan layanan purna jual yang jelas.</p>

    <div class="features">
      <div class="card reveal">
        <div class="icon">🏭</div>
        <h4>Produk Lengkap</h4>
        <p>Insulasi pipa/ducting, panas &amp; suara, aluminium foil, glasswool, rockwool, nitrile rubber, hingga aksesoris.</p>
      </div>
      <div class="card reveal">
        <div class="icon">🧪</div>
        <h4>Standar Kualitas</h4>
        <p>Sertifikasi teknis &amp; spesifikasi jelas, cocok untuk aplikasi HVAC, oil &amp; gas, dan konstruksi.</p>
      </div>
      <div class="card reveal">
        <div class="icon">🚚</div>
        <h4>Pengiriman Sigap</h4>
        <p>Gudang strategis &amp; armada rekanan. Lead time yang pasti untuk kebutuhan proyek.</p>
      </div>
      <div class="card reveal">
        <div class="icon">🤝</div>
        <h4>Dukungan Teknis</h4>
        <p>Tim siap membantu kalkulasi kebutuhan material &amp; rekomendasi pemasangan.</p>
      </div>
    </div>
  </section>

  <!-- PRODUK -->
  <section id="produk" class="container section">
    <h2 class="section-title reveal">Kategori <span style="color:#ffd1d2">Produk</span></h2>
    <p class="section-sub reveal">Contoh kategori — ganti sesuai katalog kamu.</p>

    <div class="grid">
      <div class="cat reveal">
        <div class="cat-img" style="background-image:linear-gradient(135deg,#7c1415,#8e1718);"></div>
        <div class="cat-body">
          <span class="tag">Insulasi Pipa</span>
          <h4 style="margin:10px 0 6px">Nitrile Rubber / Polyethylene</h4>
          <p style="color:var(--ink-soft);font-size:14px">Tahan kondensasi &amp; korosi, mudah pemasangan.</p>
        </div>
      </div>
      <div class="cat reveal">
        <div class="cat-img" style="background-image:linear-gradient(135deg,#7c1415,#5f0f10);"></div>
        <div class="cat-body">
          <span class="tag">Ducting HVAC</span>
          <h4 style="margin:10px 0 6px">Glasswool / Rockwool</h4>
          <p style="color:var(--ink-soft);font-size:14px">Peredam panas &amp; suara untuk sistem udara.</p>
        </div>
      </div>
      <div class="cat reveal">
        <div class="cat-img" style="background-image:linear-gradient(135deg,#9a191a,#33090a);"></div>
        <div class="cat-body">
          <span class="tag">Aksesoris</span>
          <h4 style="margin:10px 0 6px">Foil, Lem, Tape, Wiremesh</h4>
          <p style="color:var(--ink-soft);font-size:14px">Pelengkap pemasangan agar hasil rapi &amp; awet.</p>
        </div>
      </div>
    </div>

    <div class="cta reveal">
      <h3>Butuh daftar harga &amp; ketersediaan stok terbaru?</h3>
      <div style="display:flex;gap:10px;flex-wrap:wrap">
        <a href="#kontak" class="btn-white">Minta Penawaran</a>
        <a href="#kontak" class="btn-white" style="background:transparent;color:#fff;border-color:#ffffff90">Konsultasi Teknis</a>
      </div>
    </div>
  </section>

  <!-- KONTAK -->
  <section id="kontak" class="container section">
    <h2 class="section-title reveal">Kontak <span style="color:#ffd1d2">Kami</span></h2>
    <p class="section-sub reveal">Isi form sederhana ini — kami balas secepatnya.</p>

    <form method="POST" action="{{ url('/inquiry') }}" class="form reveal">
      @csrf
      <div class="form-grid">
        <div class="field">
          <label for="name">Nama</label>
          <input id="name" name="name" required placeholder="Nama Anda" class="input" />
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" required placeholder="email@perusahaan.com" class="input" />
        </div>
        <div class="field full">
          <label for="message">Pesan</label>
          <textarea id="message" name="message" rows="4" required placeholder="Ceritakan kebutuhan Anda..." class="input"></textarea>
        </div>
      </div>
      <div style="display:flex;gap:10px;align-items:center;justify-content:flex-end;margin-top:12px">
        <button class="btn btn-ghost" type="reset">Reset</button>
        <button class="btn btn-primary" type="submit">Kirim</button>
      </div>
    </form>
  </section>

  <!-- FOOTER -->
  <footer class="container">
    <div class="foot">
      <div>&copy; {{ date('Y') }} Tali Rejeki. All rights reserved.</div>
      <div style="display:flex;gap:14px">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat &amp; Ketentuan</a>
      </div>
    </div>
  </footer>

  <!-- Back to top -->
  <a href="#" class="to-top" id="toTop" aria-label="Kembali ke atas">↑</a>

  <script>
    /* ===== Theme bootstrapping (localStorage + prefers-color-scheme) ===== */
    (function initTheme(){
      const saved = localStorage.getItem('tr-theme');
      const prefersLight = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;
      const theme = saved || (prefersLight ? 'light' : 'dark');
      document.documentElement.setAttribute('data-theme', theme);
      const tbtn = document.getElementById('themeToggle');
      if (tbtn) {
        tbtn.textContent = theme === 'light' ? '☀️' : '🌙';
        tbtn.setAttribute('aria-checked', theme === 'light');
      }
    })();

    /* ===== Layout helpers: floating nav spacing & mobile panel top ===== */
    function adjustNavMetrics(){
      const wrap = document.getElementById('navWrap');
      const spacer = document.getElementById('navOffset');
      if(!wrap || !spacer) return;
      const rect = wrap.getBoundingClientRect();
      const height = rect.height;
      const gap = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-gap')) || 16;
      // spacer: push content below floating nav
      spacer.style.height = (height + gap*2) + 'px';
      // mobile panel top var
      document.documentElement.style.setProperty('--navTop', (height + gap*1.1) + 'px');
    }
    window.addEventListener('load', adjustNavMetrics);
    window.addEventListener('resize', adjustNavMetrics);

    /* ===== Scroll progress + floating nav state ===== */
    const navWrap = document.getElementById('navWrap');
    const progress = document.getElementById('progress');
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function setProgress(){
      const st = document.documentElement.scrollTop || document.body.scrollTop;
      const sh = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      progress.style.transform = `scaleX(${sh ? (st/sh) : 0})`;
    }
    function onScroll(){
      const y = window.scrollY || 0;
      navWrap.classList.toggle('nav-scrolled', y > 8);
      setProgress(); toggleTopBtn(); highlight();
    }
    window.addEventListener('scroll', onScroll, {passive:true}); setProgress();

    /* ===== Mobile menu ===== */
    const burger = document.getElementById('burger');
    const mobilePanel = document.getElementById('mobilePanel');
    const root = document.documentElement;
    burger?.addEventListener('click', () => root.classList.toggle('mobile-open'));
    mobilePanel?.querySelectorAll('a').forEach(a => a.addEventListener('click', ()=>root.classList.remove('mobile-open')));
    document.addEventListener('keydown', (e)=>{ if(e.key==='Escape') root.classList.remove('mobile-open'); });

    /* ===== Theme switch ===== */
    const themeToggle = document.getElementById('themeToggle');
    themeToggle?.addEventListener('click', ()=>{
      const current = document.documentElement.getAttribute('data-theme') || 'dark';
      const next = current === 'light' ? 'dark' : 'light';
      document.documentElement.setAttribute('data-theme', next);
      localStorage.setItem('tr-theme', next);
      themeToggle.textContent = next === 'light' ? '☀️' : '🌙';
      themeToggle.setAttribute('aria-checked', next === 'light');
      readCanvasColors();
    });

    /* ===== Reveal on scroll ===== */
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting){ e.target.classList.add('in-view'); io.unobserve(e.target); }
      });
    }, {rootMargin:'-10% 0px -5% 0px', threshold:0.1});
    document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

    /* ===== Active link highlight ===== */
    const anchors = Array.from(document.querySelectorAll('.nav a.link'));
    const ids = ['produk','keunggulan','kontak'];
    const targets = ids.map(id=>document.getElementById(id));
    function highlight(){
      const y = window.scrollY + 120; let current = null; // offset for floating nav
      targets.forEach((el,i)=>{ if (el && y >= el.offsetTop) current = ids[i]; });
      anchors.forEach(a=>a.classList.toggle('active', a.getAttribute('href') === '#' + current));
    }
    highlight();

    /* ===== Back to top ===== */
    const toTop = document.getElementById('toTop');
    function toggleTopBtn(){ toTop.classList.toggle('show', (window.scrollY || 0) > 420); }
    toggleTopBtn();

    /* ===================== BG Canvas (theme-aware) ===================== */
    const canvas = document.getElementById('bgCanvas');
    const ctx = canvas.getContext('2d', { alpha: true });
    let DPR = Math.min(window.devicePixelRatio || 1, 2);
    let W, H, running = true;

    const particles = [];
    const orbits = [];
    const trail = [];

    let RGB_LINE = '229,122,124';
    let RGB_DOT  = '255,255,255';
    let RGB_GLOW = '255,220,222';

    function readCanvasColors(){
      const styles = getComputedStyle(document.documentElement);
      RGB_LINE = styles.getPropertyValue('--rgb-line').trim() || RGB_LINE;
      RGB_DOT  = styles.getPropertyValue('--rgb-dot').trim()  || RGB_DOT;
      RGB_GLOW = styles.getPropertyValue('--rgb-glow').trim() || RGB_GLOW;
    }
    readCanvasColors();

    function rand(min,max){ return Math.random()*(max-min)+min; }
    function resize(){
      W = canvas.width  = Math.floor(innerWidth  * DPR);
      H = canvas.height = Math.floor(innerHeight * DPR);
      canvas.style.width  = innerWidth + 'px';
      canvas.style.height = innerHeight + 'px';
      adjustNavMetrics(); // ensure spacer recalcs on resize too
    }
    resize();
    window.addEventListener('resize', ()=>{ DPR = Math.min(window.devicePixelRatio || 1, 2); resize(); init(true); });

    function init(keep=false){
      const targetCount = Math.floor((innerWidth*innerHeight)/38000) + (innerWidth>1024? 28:16);
      if(!keep) particles.length = 0;
      while(particles.length < targetCount){
        particles.push({
          x: rand(0, W), y: rand(0, H),
          vx: rand(-0.10, 0.10)*DPR, vy: rand(-0.10, 0.10)*DPR,
          r: rand(0.8, 2.0)*DPR
        });
      }
      if(particles.length > targetCount) particles.length = targetCount;

      orbits.length = 0;
      const cx = W/2, cy = H/2;
      const rings = [
        { r: Math.min(W,H)*0.18, count: 10, speed: 0.0012 },
        { r: Math.min(W,H)*0.28, count: 14, speed: -0.0009 },
        { r: Math.min(W,H)*0.38, count: 18, speed: 0.0007 }
      ];
      rings.forEach((ring,ri)=>{
        for(let i=0;i<ring.count;i++){
          orbits.push({
            cx, cy, rad: ring.r, a: (i/ring.count)*Math.PI*2,
            speed: ring.speed * (1 + ri*0.2),
            size: (ri===0? 1.2: ri===1? 1.0: 0.9)*DPR
          });
        }
      });
    }
    init();

    let lastMove = 0;
    window.addEventListener('pointermove', (e)=>{
      lastMove = performance.now();
      const x = e.clientX * DPR, y = e.clientY * DPR;
      trail.push({x,y, life: 1});
      if(trail.length > 60) trail.shift();
    }, {passive:true});

    function draw(){
      if(!running) return;
      ctx.clearRect(0,0,W,H);
      ctx.save();

      const sy = (window.scrollY || 0) * DPR * 0.05;
      ctx.translate(0, -sy);
      ctx.globalCompositeOperation = 'lighter';

      // lines
      for(let i=0;i<particles.length;i++){
        const p = particles[i];
        for(let j=i+1;j<particles.length;j++){
          const q = particles[j];
          const dx = p.x - q.x, dy = p.y - q.y;
          const d2 = dx*dx + dy*dy;
          const maxD = 120*DPR, maxD2 = maxD*maxD;
          if(d2 < maxD2){
            const alpha = 1 - (d2/maxD2);
            ctx.strokeStyle = `rgba(${RGB_LINE},${alpha*0.10})`;
            ctx.lineWidth = 1*DPR*alpha;
            ctx.beginPath(); ctx.moveTo(p.x, p.y); ctx.lineTo(q.x, q.y); ctx.stroke();
          }
        }
      }

      // dots
      for(const p of particles){
        p.x += p.vx; p.y += p.vy;
        if(p.x < 0 || p.x > W) p.vx *= -1;
        if(p.y < 0 || p.y > H) p.vy *= -1;

        const grd = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.r*3);
        grd.addColorStop(0, `rgba(${RGB_GLOW},.9)`);
        grd.addColorStop(1, `rgba(${RGB_GLOW},0)`);
        ctx.fillStyle = grd;
        ctx.beginPath(); ctx.arc(p.x, p.y, p.r*3, 0, Math.PI*2); ctx.fill();

        ctx.fillStyle = `rgba(${RGB_DOT},.7)`;
        ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI*2); ctx.fill();
      }

      // orbits
      ctx.globalAlpha = 0.85;
      for(const s of orbits){
        s.a += s.speed * 16;
        const x = s.cx + Math.cos(s.a) * s.rad;
        const y = s.cy + Math.sin(s.a) * s.rad;
        ctx.fillStyle = `rgba(${RGB_GLOW},.9)`;
        ctx.beginPath(); ctx.arc(x, y, s.size*2.2, 0, Math.PI*2); ctx.fill();

        ctx.strokeStyle = `rgba(${RGB_LINE},.06)`;
        ctx.lineWidth = 1*DPR;
        ctx.beginPath(); ctx.arc(s.cx, s.cy, s.rad, 0, Math.PI*2); ctx.stroke();
      }
      ctx.globalAlpha = 1;

      // trail
      for(let i=0;i<trail.length;i++){ trail[i].life *= 0.96; }
      while(trail.length && trail[0].life < 0.03) trail.shift();

      if(trail.length){
        ctx.lineCap = 'round'; ctx.lineJoin = 'round';
        for(let i=1;i<trail.length;i++){
          const a = trail[i-1], b = trail[i];
          const f = b.life;
          ctx.strokeStyle = `rgba(${RGB_GLOW}, ${0.18 * f})`;
          ctx.lineWidth = (6 * DPR) * f;
          ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y); ctx.stroke();
        }
        const last = trail[trail.length-1];
        const glow = ctx.createRadialGradient(last.x, last.y, 0, last.x, last.y, 16*DPR);
        glow.addColorStop(0, `rgba(${RGB_GLOW}, .7)`);
        glow.addColorStop(1, `rgba(${RGB_GLOW}, 0)`);
        ctx.fillStyle = glow;
        ctx.beginPath(); ctx.arc(last.x, last.y, 16*DPR, 0, Math.PI*2); ctx.fill();
      }

      ctx.restore();
      requestAnimationFrame(draw);
    }
    if(!prefersReduced) requestAnimationFrame(draw);

    document.addEventListener('visibilitychange', ()=>{
      running = !document.hidden && !prefersReduced;
      if(running) requestAnimationFrame(draw);
    });

    setInterval(()=>{
      if(performance.now() - (window.lastMove || 0) > 140) {
        for(const t of trail){ t.life *= 0.92; }
      }
    }, 140);

    /* ===== Prevent background scroll when mobile menu open ===== */
    const observer = new MutationObserver(()=>{
      document.body.style.overflow = root.classList.contains('mobile-open') ? 'hidden' : '';
    });
    observer.observe(root, {attributes:true, attributeFilter:['class']});
  </script>
</body>
</html>
