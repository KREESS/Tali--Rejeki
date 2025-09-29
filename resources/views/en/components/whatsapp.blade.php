{{-- resources/views/components/whatsapp.blade.php --}}
@php
    // Pesan default (bisa di-override via include: ['waMessage' => '...'])
    $waMessage = $waMessage ?? 'Halo, saya tertarik dengan salah satu produk Anda.';

    // Daftar kontak default (bisa di-override via include: ['waContacts' => [...]] )
    $waContacts = $waContacts ?? [
        ['name' => 'Siti',        'phone' => '0813 8252 3722'],
        ['name' => 'Kurnia',      'phone' => '0813 8480 8218', 'note' => 'WA Only'],
        ['name' => 'Sari',        'phone' => '0813 1682 6959'],
        ['name' => 'Edy Purwanto','phone' => '0815 1451 5990'],
        ['name' => 'Yoviena',     'phone' => '0813 8523 1149'],
    ];

    $normalizePhone = function($number){
        $digits = preg_replace('/[^0-9]+/', '', $number ?? '');
        if ($digits === '') return null;
        if (strpos($digits, '0') === 0) $digits = '62'.substr($digits,1);
        if (strpos($digits, '62') !== 0) $digits = '62'.$digits;
        return $digits;
    };

    $waText = rawurlencode($waMessage);
@endphp

<div id="waFab" class="wa-fab wa-theme" data-open="false">
  <button class="wa-btn" type="button" aria-label="Kontak WhatsApp" aria-expanded="false" aria-controls="waFabPanel">
    <!-- SIMPLE WhatsApp glyph (tanpa gradient & circle) -->
    <span class="wa-icon" aria-hidden="true">
      <img src="{{ asset('img/icon-logo/whatsapp.png') }}" alt="WhatsApp" width="28" height="28" loading="lazy" decoding="async" />
    </span>
    <span class="wa-wave" aria-hidden="true"></span>
  </button>

  <div id="waFabPanel" class="wa-panel" hidden role="dialog" aria-modal="false" aria-labelledby="waPanelTitle">
    <div class="wa-panel-head">
      <div class="wa-panel-title" id="waPanelTitle">WhatsApp Marketing</div>
      <button class="wa-close" type="button" aria-label="Tutup">&times;</button>
    </div>
    <div class="wa-panel-sub">Pilih kontak untuk chat — pesan otomatis siap dikirim.</div>

    <div class="wa-list" role="listbox">
      @foreach($waContacts as $idx => $c)
        @php
          $num  = $normalizePhone($c['phone'] ?? null);
          $init = collect(explode(' ', $c['name']))->map(fn($p)=>mb_substr($p,0,1))->take(2)->implode('');
        @endphp
        <a class="wa-item" role="option" style="--d: {{ $idx }}" href="{{ $num ? ('https://wa.me/'.$num.'?text='.$waText) : '#' }}" target="_blank" rel="noopener">
          <div class="wa-avatar" aria-hidden="true">{{ $init }}</div>
          <div class="wa-meta">
            <div class="wa-name">{{ $c['name'] }} @if(!empty($c['note'])) <span class="wa-note">({{ $c['note'] }})</span>@endif</div>
            <div class="wa-phone">
              <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true" focusable="false" class="wa-phone-ico"><path fill="currentColor" d="M6.6 10.8c1.1 2.1 2.9 3.9 5 5l1.7-1.7c.3-.3.8-.4 1.2-.3 1 .3 2 .5 3.1.5.7 0 1.2.5 1.2 1.2v2.9c0 .7-.5 1.2-1.2 1.2C9.9 19.6 4.4 14.1 4.4 7.4c0-.7.5-1.2 1.2-1.2h2.9c.7 0 1.2.5 1.2 1.2 0 1.1.2 2.1.5 3.1.1.4 0 .9-.3 1.2l-1.7 1.7z"/></svg>
              {{ $c['phone'] }}
            </div>
          </div>
          <svg class="wa-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path fill="currentColor" d="M8.59 16.59 13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
      @endforeach
    </div>
  </div>
</div>

<style>
/* =====================
   THEME TOKENS
   ===================== */
.wa-theme{ --wa-green:#25D366; --wa-green-2:#1EBE4C; --wa-ink:#0f172a; --wa-muted:#64748b; --wa-border:rgba(2,6,23,.08); --wa-glass:rgba(255,255,255,.72); --wa-surface:#ffffff; --wa-shadow:0 20px 40px rgba(0,0,0,.35); }
@media (prefers-color-scheme: dark){ .wa-theme{ --wa-ink:#e5e7eb; --wa-muted:#cbd5e1; --wa-border:rgba(255,255,255,.12); --wa-glass:rgba(18,18,20,.65); --wa-surface:#0f1216; --wa-shadow:0 24px 48px rgba(0,0,0,.6); } }

/* =====================
   FAB BUTTON
   ===================== */
.wa-fab{ position:fixed; left:16px; bottom:16px; z-index:100003; font-family: inherit; }
.wa-btn{ position:relative; width:60px; height:60px; border-radius:999px; border:none; display:grid; place-items:center; cursor:pointer; background: radial-gradient(120% 120% at 30% 20%, var(--wa-green) 0%, var(--wa-green-2) 100%); color:#fff; box-shadow: 0 16px 30px rgba(37,211,102,.35), 0 3px 0 rgba(0,0,0,.08) inset; transition: transform .18s ease, box-shadow .18s ease, filter .18s ease; }
.wa-btn:hover{ transform: translateY(-2px); filter: saturate(1.05); box-shadow: 0 20px 36px rgba(37,211,102,.42), 0 3px 0 rgba(0,0,0,.08) inset; }
.wa-btn:active{ transform: translateY(0); }
.wa-btn:focus{ outline:none; box-shadow: 0 0 0 3px rgba(37,211,102,.3), 0 16px 30px rgba(37,211,102,.35); }
.wa-icon{ display:grid; place-items:center; filter: drop-shadow(0 2px 4px rgba(0,0,0,.25)); }
.wa-icon img{ width:28px; height:28px; display:block; }

/* subtle pulse */
.wa-wave{ position:absolute; inset:0; border-radius:999px; pointer-events:none; }
.wa-wave::before{ content:""; position:absolute; inset:-2px; border-radius:999px; border:3px solid rgba(37,211,102,.35); animation: wa-ping 2.2s infinite ease-out; }
@keyframes wa-ping{ 0%{ opacity:.6; transform: scale(1); } 80%{ opacity:0; transform: scale(1.7); } 100%{ opacity:0; transform: scale(1.8);} }

/* =====================
   PANEL (Glass + Animation)
   ===================== */
.wa-panel{ position:absolute; left:0; bottom:76px; width:min(360px, 92vw); background: var(--wa-surface); color: var(--wa-ink); border-radius:16px; border:1px solid var(--wa-border); box-shadow: var(--wa-shadow); overflow:hidden; transform: translateY(12px) scale(.98); opacity:0; pointer-events:none; transition: transform .22s cubic-bezier(.2,.7,.2,1), opacity .2s ease; backdrop-filter: saturate(140%) blur(6px); }
.wa-fab[data-open="true"] .wa-panel{ transform: translateY(0) scale(1); opacity:1; pointer-events:auto; }

.wa-panel-head{ display:flex; align-items:center; justify-content:space-between; gap:.5rem; padding:12px 14px; background: linear-gradient(180deg, rgba(37,211,102,.16), rgba(37,211,102,.06)); border-bottom:1px solid var(--wa-border); }
.wa-panel-title{ font-weight:900; letter-spacing:.01em; }
.wa-close{ width:36px; height:36px; border-radius:10px; border:1px solid var(--wa-border); background: transparent; color: currentColor; display:grid; place-items:center; cursor:pointer; }
.wa-close:hover{ background: rgba(2,6,23,.04); }

.wa-panel-sub{ padding:8px 14px; color: var(--wa-muted); font-size:.95rem; border-bottom:1px solid var(--wa-border); }
.wa-list{ max-height: 60vh; overflow:auto; }

/* list item */
.wa-item{ --delay: calc(var(--d, 0) * 50ms); display:flex; align-items:center; gap:.7rem; padding:.8rem .95rem; text-decoration:none; color:inherit; position:relative; background:transparent; border-bottom:1px solid var(--wa-border); transform: translateY(8px); opacity:0; animation: wa-reveal .35s both; animation-delay: var(--delay); }
.wa-item:last-child{ border-bottom:none; }
.wa-item:hover{ background: rgba(37,211,102,.08); }
@media (prefers-color-scheme: dark){ .wa-item:hover{ background: rgba(37,211,102,.12); } }

@keyframes wa-reveal{ from{ opacity:0; transform: translateY(8px);} to{ opacity:1; transform: translateY(0);} }

.wa-avatar{ width:42px; height:42px; border-radius:999px; display:grid; place-items:center; font-weight:900; color:#fff; background: radial-gradient(120% 120% at 30% 20%, var(--wa-green) 0%, var(--wa-green-2) 100%); box-shadow: inset 0 1px 0 rgba(255,255,255,.35), 0 4px 10px rgba(0,0,0,.25); }
.wa-meta{ display:flex; flex-direction:column; line-height:1.25; flex:1; min-width:0; }
.wa-name{ font-weight:900; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.wa-note{ font-size:.85em; opacity:.85; margin-left:.25rem; font-weight:700; }
.wa-phone{ font-size:.95em; opacity:.9; display:flex; align-items:center; gap:.4rem; color: var(--wa-muted); }
.wa-phone-ico{ opacity:.9; }
.wa-arrow{ opacity:.6; transition: transform .18s ease, opacity .18s ease; }
.wa-item:hover .wa-arrow{ transform: translateX(2px); opacity:.9; }

/* Small screens tweak */
@media (max-width: 480px){ .wa-fab{ left:12px; bottom:12px; } .wa-panel{ bottom:70px; width:min(340px, 94vw); } }
</style>

<script>
(function(){
  const root  = document.getElementById('waFab');
  if(!root) return;
  const btn   = root.querySelector('.wa-btn');
  const panel = root.querySelector('#waFabPanel');
  const close = root.querySelector('.wa-close');

  let lastFocus = null;

  function setOpen(open){
    root.dataset.open = String(open);
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    if(panel){ panel.hidden = !open; panel.setAttribute('aria-modal', open ? 'true' : 'false'); }
    if(open){
      lastFocus = document.activeElement;
      // focus first item
      const firstItem = panel?.querySelector('.wa-item');
      setTimeout(()=> firstItem?.focus?.(), 10);
      // restart reveal animation
      panel?.querySelectorAll('.wa-item').forEach((el)=>{
        el.style.animation = 'none';
        // force reflow
        void el.offsetHeight;
        el.style.animation = '';
      });
    }else{
      lastFocus?.focus?.();
    }
  }

  btn?.addEventListener('click', ()=>{ setOpen(root.dataset.open !== 'true'); });
  close?.addEventListener('click', ()=> setOpen(false));

  // Klik di luar
  document.addEventListener('click', (e)=>{
    if(root.dataset.open !== 'true') return;
    if(!root.contains(e.target)) setOpen(false);
  });

  // ESC & focus trap minimal
  document.addEventListener('keydown', (e)=>{
    if(root.dataset.open !== 'true') return;
    if(e.key === 'Escape') { setOpen(false); return; }
    if(e.key === 'Tab' && panel){
      const focusables = panel.querySelectorAll('a.wa-item, button.wa-close');
      if(!focusables.length) return;
      const first = focusables[0];
      const last  = focusables[focusables.length - 1];
      if(e.shiftKey && document.activeElement === first){ e.preventDefault(); last.focus(); }
      else if(!e.shiftKey && document.activeElement === last){ e.preventDefault(); first.focus(); }
    }
  });
})();
</script>
