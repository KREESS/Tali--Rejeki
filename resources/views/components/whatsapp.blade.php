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

<div id="waFab" class="wa-fab" data-open="false">
  <button class="wa-btn" type="button" aria-label="Kontak WhatsApp" aria-expanded="false" aria-controls="waFabPanel">
    <img src="{{ asset('img/icon-logo/whatsapp.png') }}" alt="WhatsApp" width="28" height="28" loading="lazy" decoding="async" />
  </button>

  <div id="waFabPanel" class="wa-panel" hidden role="dialog" aria-modal="false" aria-labelledby="waPanelTitle">
    <div class="wa-panel-head">
      <div class="wa-panel-title" id="waPanelTitle">WhatsApp Marketing</div>
      <button class="wa-close" type="button" aria-label="Tutup">&times;</button>
    </div>

    <div class="wa-list" role="listbox">
      @foreach($waContacts as $idx => $c)
        @php
          $num  = $normalizePhone($c['phone'] ?? null);
          $init = collect(explode(' ', $c['name']))->map(fn($p)=>mb_substr($p,0,1))->take(2)->implode('');
        @endphp
        <a class="wa-item" role="option" href="{{ $num ? ('https://wa.me/'.$num.'?text='.$waText) : '#' }}" target="_blank" rel="noopener">
          <div class="wa-avatar">{{ $init }}</div>
          <div class="wa-info">
            <div class="wa-name">{{ $c['name'] }} @if(!empty($c['note'])) <span class="wa-note">({{ $c['note'] }})</span>@endif</div>
            <div class="wa-phone">{{ $c['phone'] }}</div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>

<style>
/* 基本样式 */
.wa-fab {
  position: fixed;
  left: 16px;
  bottom: 16px;
  z-index: 100003;
  font-family: inherit;
}

/* 主按钮 */
.wa-btn {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  border: none;
  background: #25D366;
  color: white;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: transform 0.2s ease;
}

.wa-btn:hover {
  transform: translateY(-2px);
}

.wa-btn:focus {
  outline: 2px solid #25D366;
  outline-offset: 2px;
}

/* 面板 */
.wa-panel {
  position: absolute;
  left: 0;
  bottom: 70px;
  width: 300px;
  max-width: calc(100vw - 32px);
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  overflow: hidden;
  transform: translateY(10px);
  opacity: 0;
  pointer-events: none;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

.wa-fab[data-open="true"] .wa-panel {
  transform: translateY(0);
  opacity: 1;
  pointer-events: auto;
}

/* 面板头部 */
.wa-panel-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  background: #25D366;
  color: white;
}

.wa-panel-title {
  font-weight: 600;
  font-size: 16px;
}

.wa-close {
  background: none;
  border: none;
  color: white;
  font-size: 20px;
  cursor: pointer;
  padding: 0;
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* 联系人列表 */
.wa-list {
  max-height: 300px;
  overflow-y: auto;
}

.wa-item {
  display: flex;
  align-items: center;
  padding: 12px 16px;
  text-decoration: none;
  color: #333;
  border-bottom: 1px solid #f0f0f0;
  transition: background-color 0.2s ease;
}

.wa-item:last-child {
  border-bottom: none;
}

.wa-item:hover {
  background-color: #f5f5f5;
}

/* 头像 */
.wa-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #25D366;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  margin-right: 12px;
  flex-shrink: 0;
}

/* 联系人信息 */
.wa-info {
  flex: 1;
  min-width: 0;
}

.wa-name {
  font-weight: 600;
  font-size: 14px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.wa-note {
  font-size: 12px;
  color: #666;
  margin-left: 4px;
}

.wa-phone {
  font-size: 13px;
  color: #666;
  margin-top: 2px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* 暗色模式 */
@media (prefers-color-scheme: dark) {
  .wa-panel {
    background: #333;
    color: #fff;
  }
  
  .wa-item {
    color: #fff;
    border-bottom-color: #444;
  }
  
  .wa-item:hover {
    background-color: #444;
  }
  
  .wa-name {
    color: #fff;
  }
  
  .wa-note, .wa-phone {
    color: #aaa;
  }
}

/* 响应式调整 */
/* 大屏幕 (桌面) */
@media (min-width: 1200px) {
  .wa-panel {
    width: 320px;
  }
  
  .wa-list {
    max-height: 400px;
  }
}

/* 中等屏幕 (平板横屏) */
@media (max-width: 1199px) and (min-width: 992px) {
  .wa-panel {
    width: 300px;
  }
  
  .wa-list {
    max-height: 350px;
  }
}

/* 小屏幕 (平板竖屏) */
@media (max-width: 991px) and (min-width: 768px) {
  .wa-panel {
    width: 280px;
  }
  
  .wa-panel-title {
    font-size: 15px;
  }
  
  .wa-name {
    font-size: 13px;
  }
  
  .wa-phone {
    font-size: 12px;
  }
  
  .wa-list {
    max-height: 300px;
  }
}

/* 手机横屏 */
@media (max-width: 767px) and (min-width: 576px) and (orientation: landscape) {
  .wa-panel {
    width: 320px;
    max-height: calc(100vh - 100px);
  }
  
  .wa-list {
    max-height: calc(100vh - 180px);
  }
  
  .wa-fab {
    bottom: 12px;
    left: 12px;
  }
}

/* 手机竖屏 */
@media (max-width: 575px) {
  .wa-fab {
    left: 12px;
    bottom: 12px;
  }
  
  .wa-btn {
    width: 50px;
    height: 50px;
  }
  
  .wa-panel {
    width: calc(100vw - 24px);
    left: 12px;
    max-height: calc(100vh - 80px);
  }
  
  .wa-list {
    max-height: calc(100vh - 140px);
  }
  
  .wa-panel-head {
    padding: 10px 14px;
  }
  
  .wa-panel-title {
    font-size: 15px;
  }
  
  .wa-item {
    padding: 10px 14px;
  }
  
  .wa-avatar {
    width: 36px;
    height: 36px;
    margin-right: 10px;
  }
  
  .wa-name {
    font-size: 13px;
  }
  
  .wa-note {
    font-size: 11px;
  }
  
  .wa-phone {
    font-size: 12px;
  }
}

/* 超小屏幕 */
@media (max-width: 360px) {
  .wa-fab {
    left: 8px;
    bottom: 8px;
  }
  
  .wa-panel {
    width: calc(100vw - 16px);
    left: 8px;
  }
  
  .wa-item {
    padding: 8px 12px;
  }
  
  .wa-avatar {
    width: 32px;
    height: 32px;
    margin-right: 8px;
  }
  
  .wa-name {
    font-size: 12px;
  }
  
  .wa-note {
    font-size: 10px;
  }
  
  .wa-phone {
    font-size: 11px;
  }
}

/* 确保在所有设备上都不会与其他元素重叠 */
@media (max-height: 500px) and (orientation: landscape) {
  .wa-panel {
    max-height: calc(100vh - 100px);
    bottom: 70px;
  }
  
  .wa-list {
    max-height: calc(100vh - 150px);
  }
}
</style>

<script>
(function(){
  const root = document.getElementById('waFab');
  if(!root) return;
  
  const btn = root.querySelector('.wa-btn');
  const panel = root.querySelector('#waFabPanel');
  const close = root.querySelector('.wa-close');

  function setOpen(open){
    root.dataset.open = String(open);
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    if(panel) {
      panel.hidden = !open;
      panel.setAttribute('aria-modal', open ? 'true' : 'false');
    }
  }

  // 切换面板
  btn?.addEventListener('click', () => {
    setOpen(root.dataset.open !== 'true');
  });

  // 关闭面板
  close?.addEventListener('click', () => {
    setOpen(false);
  });

  // 点击外部关闭
  document.addEventListener('click', (e) => {
    if(root.dataset.open !== 'true') return;
    if(!root.contains(e.target)) setOpen(false);
  });

  // ESC键关闭
  document.addEventListener('keydown', (e) => {
    if(root.dataset.open !== 'true') return;
    if(e.key === 'Escape') setOpen(false);
  });
})();
</script>