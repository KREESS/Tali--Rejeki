{{-- resources/views/components/back-to-top.blade.php
   Back To Top — inner fill progress (liquid), dark/light aware
   - Dark: base putih, Light: base hitam
   - Isi merah terisi dari bawah ke atas sesuai progres scroll
   - Wave halus di permukaan (stop untuk reduced motion)
   Pakai: <x-back-to-top size="48" corner-offset="20" threshold="220" />
--}}

@props([
  'threshold' => 220,   // px dari atas sebelum tombol muncul
  'size' => 48,         // diameter tombol
  'cornerOffset' => 20, // jarak dari pojok (px)
  'label' => 'Kembali ke atas'
])

@php
  $bttId = $attributes->get('id') ?? ('btt-'.uniqid());
@endphp

<div id="{{ $bttId }}" data-btt-id="{{ $bttId }}" data-threshold="{{ (int)$threshold }}" data-size="{{ (int)$size }}" data-offset="{{ (int)$cornerOffset }}" data-label="{{ $label }}">
  <div class="btt-wrap" style="--btt-size: {{ (int)$size }}px; --btt-offset: {{ (int)$cornerOffset }}px; --btt-progress: 0;">
    <button type="button" class="btt-btn" aria-label="{{ $label }}" title="{{ $label }}">
      <!-- Lapisan isi cair (merah) di dalam tombol -->
      <span class="btt-fill" aria-hidden="true">
        <span class="btt-liquid"></span>
        <!-- Wave permukaan -->
        <svg class="btt-wave btt-wave-a" viewBox="0 0 120 20" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 10 Q 15 0, 30 10 T 60 10 T 90 10 T 120 10 V20 H0 Z"></path>
        </svg>
        <svg class="btt-wave btt-wave-b" viewBox="0 0 120 20" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 12 Q 20 2, 40 12 T 80 12 T 120 12 V20 H0 Z"></path>
        </svg>
      </span>

      <!-- Ikon -->
      <svg class="btt-icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 5l6 6-1.5 1.5L13 9.5V19h-2V9.5L7.5 12.5 6 11l6-6z" fill="currentColor"/>
      </svg>

      <!-- Tooltip -->
      <span class="btt-tip" role="presentation">Back to top</span>
    </button>
  </div>
</div>

<style>
  /* ===== Variabel dasar ===== */
  [data-btt-id="{{ $bttId }}"] {
    --btt-ease: cubic-bezier(.2,.8,.2,1);
    --btt-fast: .2s;
    --btt-med: .35s;

    /* Warna default (light) */
    --btt-base: #0f0f12;        /* warna tombol (light) */
    --btt-icon: #f7f7f8;        /* warna ikon (light) */
    --btt-border: rgba(255,255,255,0.08);

    /* Isi merah */
    --btt-red-1: #b3122d;       /* dasar isi */
    --btt-red-2: #e11d48;       /* highlight */
    --btt-red-3: #ff2d55;       /* puncak/wave */
    --btt-glow: rgba(225,29,72,0.22);

    /* Progress (0..1) akan diisi via JS */
    --btt-progress: 0;
  }

  /* ===== Dark mode (support .dark class & prefers-color-scheme) ===== */
  :where(.dark) [data-btt-id="{{ $bttId }}"],
  @media (prefers-color-scheme: dark) {
    .dark [data-btt-id="{{ $bttId }}"] {
      --btt-base: #ffffff;      /* tombol putih */
      --btt-icon: #141417;      /* ikon gelap */
      --btt-border: rgba(10,10,12,0.12);
    }
  }

  /* ===== WRAP positioning ===== */
  [data-btt-id="{{ $bttId }}"] .btt-wrap {
    position: fixed;
    right: var(--btt-offset);
    bottom: calc(var(--btt-offset) + env(safe-area-inset-bottom, 0));
    width: var(--btt-size);
    height: var(--btt-size);
    pointer-events: none;
    transform: translate3d(0, 10px, 0) scale(0.95);
    opacity: 0;
    transition: opacity var(--btt-med) var(--btt-ease), transform var(--btt-med) var(--btt-ease);
    z-index: 9999;
  }
  [data-btt-id="{{ $bttId }}"] .btt-wrap.show {
    opacity: 1;
    transform: translate3d(0, 0, 0) scale(1);
  }

  /* ===== BUTTON ===== */
  [data-btt-id="{{ $bttId }}"] .btt-btn {
    pointer-events: auto;
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 14px;
    cursor: pointer;
    color: var(--btt-icon);
    background: var(--btt-base);
    box-shadow:
      0 8px 22px var(--btt-glow),
      inset 0 0 0 1px var(--btt-border);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* penting agar isi merah tetap di dalam */
    outline: none;
    -webkit-tap-highlight-color: transparent;
    transition: transform var(--btt-fast) var(--btt-ease), box-shadow var(--btt-med) var(--btt-ease), filter var(--btt-med) var(--btt-ease);
  }
  [data-btt-id="{{ $bttId }}"] .btt-btn:hover {
    transform: translateY(-2px);
    box-shadow:
      0 12px 28px var(--btt-glow),
      inset 0 0 0 1px var(--btt-border);
  }
  [data-btt-id="{{ $bttId }}"] .btt-btn:active {
    transform: translateY(0) scale(0.98);
  }
  [data-btt-id="{{ $bttId }}"] .btt-btn:focus-visible {
    outline: 2px solid rgba(225,29,72,0.5);
    outline-offset: 3px;
  }

  /* ===== IKON ===== */
  [data-btt-id="{{ $bttId }}"] .btt-icon {
    position: relative;
    z-index: 2; /* di atas cairan */
    filter: drop-shadow(0 1px 2px rgba(0,0,0,0.25));
  }

  /* ===== ISI MERAH DI DALAM (liquid) ===== */
  [data-btt-id="{{ $bttId }}"] .btt-fill {
    position: absolute;
    inset: 0;
    border-radius: inherit;
    pointer-events: none;
    overflow: hidden;
    z-index: 1; /* di bawah ikon */
  }

  /* Lapisan liquid: terisi dari bawah -> atas */
  [data-btt-id="{{ $bttId }}"] .btt-liquid {
    position: absolute;
    left: 0; right: 0; bottom: 0; top: 0;
    background:
      linear-gradient(180deg, var(--btt-red-2) 0%, var(--btt-red-1) 100%);
    transform-origin: bottom;
    transform: translateY(calc((1 - var(--btt-progress)) * 100%));
    transition: transform var(--btt-med) var(--btt-ease);
  }

  /* Wave di permukaan isi */
  [data-btt-id="{{ $bttId }}"] .btt-wave {
    position: absolute;
    left: -10%;
    width: 120%;
    height: 22px;
    bottom: calc(var(--btt-progress) * 100% - 11px); /* posisi di permukaan */
    fill: var(--btt-red-3);
    opacity: .9;
    filter: drop-shadow(0 -1px 3px rgba(225,29,72,0.25));
    transition: bottom var(--btt-med) var(--btt-ease);
  }
  [data-btt-id="{{ $bttId }}"] .btt-wave path { vector-effect: non-scaling-stroke; }

  /* Dua gelombang dengan kecepatan beda untuk efek natural */
  [data-btt-id="{{ $bttId }}"] .btt-wave-a { animation: btt-{{ $bttId }}-drift 4s linear infinite; opacity: .8; }
  [data-btt-id="{{ $bttId }}"] .btt-wave-b { animation: btt-{{ $bttId }}-drift 6.5s linear infinite reverse; opacity: .6; }
  @keyframes btt-{{ $bttId }}-drift {
    from { transform: translateX(0); }
    to   { transform: translateX(-10%); }
  }

  /* ===== Tooltip minimal ===== */
  [data-btt-id="{{ $bttId }}"] .btt-tip {
    position: absolute;
    bottom: calc(100% + 8px);
    left: 50%;
    transform: translateX(-50%) translateY(4px);
    background: rgba(20, 12, 14, 0.75);
    color: #ffe3e8;
    padding: 5px 8px;
    font-size: 11px;
    border-radius: 8px;
    white-space: nowrap;
    opacity: 0;
    transition: opacity .18s var(--btt-ease), transform .18s var(--btt-ease);
    border: 1px solid rgba(230,71,94,0.2);
    box-shadow: 0 8px 18px rgba(161,0,32,0.12);
    pointer-events: none;
    z-index: 3;
  }
  [data-btt-id="{{ $bttId }}"] .btt-btn:hover .btt-tip {
    opacity: 1; transform: translateX(-50%) translateY(0);
  }

  /* ===== Reduce motion ===== */
  @media (prefers-reduced-motion: reduce) {
    [data-btt-id="{{ $bttId }}"] .btt-wrap,
    [data-btt-id="{{ $bttId }}"] .btt-btn,
    [data-btt-id="{{ $bttId }}"] .btt-tip { transition: none !important; }
    [data-btt-id="{{ $bttId }}"] .btt-wave-a,
    [data-btt-id="{{ $bttId }}"] .btt-wave-b { animation: none !important; }
  }
</style>

<script>
  (function() {
    var root = document.getElementById(@json($bttId));
    if (!root) return;

    var wrap   = root.querySelector('.btt-wrap');
    var btn    = root.querySelector('.btt-btn');
    var thr    = parseInt(root.dataset.threshold || '220', 10);
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var ticking = false;

    function update() {
      var y   = window.scrollY || window.pageYOffset || 0;
      var doc = document.documentElement;
      var max = Math.max(doc.scrollHeight, doc.offsetHeight, doc.clientHeight) - window.innerHeight;
      var p   = max > 0 ? Math.min(1, Math.max(0, y / max)) : 0; // 0..1

      wrap.style.setProperty('--btt-progress', p.toFixed(4));
      if (y > thr) wrap.classList.add('show'); else wrap.classList.remove('show');
    }

    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function() {
        update();
        ticking = false;
      });
    }

    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
      // micro ripple optional (di dalam)
      if (!reduce) {
        var rip = document.createElement('span');
        rip.style.position = 'absolute';
        rip.style.inset = '0';
        rip.style.borderRadius = '14px';
        rip.style.pointerEvents = 'none';
        rip.style.background = 'radial-gradient(circle at center, rgba(225,29,72,0.25), rgba(225,29,72,0) 55%)';
        rip.style.animation = 'btt-ripple-{{ $bttId }} .45s var(--btt-ease) forwards';
        btn.appendChild(rip);
        setTimeout(function(){ rip.remove(); }, 500);
      }
    }

    btn.addEventListener('keydown', function(e){
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        scrollToTop();
      }
    });

    btn.addEventListener('click', scrollToTop);
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);

    // initial
    update();

    // define ripple keyframes dynamically to avoid global collisions
    var style = document.createElement('style');
    style.textContent = '@keyframes btt-ripple-{{ $bttId }}{from{transform:scale(.8);opacity:.7}to{transform:scale(1.2);opacity:0}}';
    document.head.appendChild(style);
  })();
</script>
