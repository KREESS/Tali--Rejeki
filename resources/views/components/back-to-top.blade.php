{{-- resources/views/components/back-to-top.blade.php
   简化版回到顶部按钮
   - 暗色模式：白色按钮，亮色模式：黑色按钮
   - 简单的圆形进度指示器
   - 基本的向上箭头图标
   - 使用方法：<x-back-to-top size="48" corner-offset="20" threshold="220" />
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
  <div class="btt-wrap" style="--btt-size: {{ (int)$size }}px; --btt-offset: {{ (int)$cornerOffset }}px;">
    <button type="button" class="btt-btn" aria-label="{{ $label }}" title="{{ $label }}">
      <!-- 圆形进度条 -->
      <svg class="btt-progress" width="100%" height="100%" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="45" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="4"/>
        <circle class="btt-progress-circle" cx="50" cy="50" r="45" fill="none" stroke="#e11d48" stroke-width="4"
                stroke-dasharray="283" stroke-dashoffset="283" stroke-linecap="round"
                transform="rotate(-90 50 50)"/>
      </svg>
      
      <!-- 向上箭头图标 -->
      <svg class="btt-icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 5l6 6-1.5 1.5L13 9.5V19h-2V9.5L7.5 12.5 6 11l6-6z" fill="currentColor"/>
      </svg>
    </button>
  </div>
</div>

<style>
  /* 基本变量 */
  [data-btt-id="{{ $bttId }}"] {
    --btt-ease: cubic-bezier(.2,.8,.2,1);
    --btt-fast: .2s;
    --btt-med: .35s;
    
    /* 亮色模式默认颜色 */
    --btt-bg: #0f0f12;
    --btt-icon: #f7f7f8;
    --btt-progress-color: #e11d48;
  }

  /* 暗色模式 */
  .dark [data-btt-id="{{ $bttId }}"] {
    --btt-bg: #ffffff;
    --btt-icon: #141417;
  }

  /* 定位 */
  [data-btt-id="{{ $bttId }}"] .btt-wrap {
    position: fixed;
    right: var(--btt-offset);
    bottom: calc(var(--btt-offset) + env(safe-area-inset-bottom, 0));
    width: var(--btt-size);
    height: var(--btt-size);
    pointer-events: none;
    transform: translateY(10px);
    opacity: 0;
    transition: opacity var(--btt-med) var(--btt-ease), transform var(--btt-med) var(--btt-ease);
    z-index: 9999;
  }
  
  [data-btt-id="{{ $bttId }}"] .btt-wrap.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* 按钮样式 */
  [data-btt-id="{{ $bttId }}"] .btt-btn {
    pointer-events: auto;
    position: relative;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 50%;
    cursor: pointer;
    background: var(--btt-bg);
    color: var(--btt-icon);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    outline: none;
    -webkit-tap-highlight-color: transparent;
    transition: transform var(--btt-fast) var(--btt-ease), box-shadow var(--btt-med) var(--btt-ease);
  }
  
  [data-btt-id="{{ $bttId }}"] .btt-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.2);
  }
  
  [data-btt-id="{{ $bttId }}"] .btt-btn:active {
    transform: translateY(0);
  }
  
  [data-btt-id="{{ $bttId }}"] .btt-btn:focus-visible {
    outline: 2px solid var(--btt-progress-color);
    outline-offset: 3px;
  }

  /* 图标 */
  [data-btt-id="{{ $bttId }}"] .btt-icon {
    position: relative;
    z-index: 2;
  }

  /* 进度条 */
  [data-btt-id="{{ $bttId }}"] .btt-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }
  
  [data-btt-id="{{ $bttId }}"] .btt-progress-circle {
    transition: stroke-dashoffset 0.3s ease;
  }

  /* 减少动画 */
  @media (prefers-reduced-motion: reduce) {
    [data-btt-id="{{ $bttId }}"] .btt-wrap,
    [data-btt-id="{{ $bttId }}"] .btt-btn,
    [data-btt-id="{{ $bttId }}"] .btt-progress-circle { 
      transition: none !important; 
    }
  }
</style>

<script>
  (function() {
    var root = document.getElementById(@json($bttId));
    if (!root) return;

    var wrap = root.querySelector('.btt-wrap');
    var btn = root.querySelector('.btt-btn');
    var progressCircle = root.querySelector('.btt-progress-circle');
    var thr = parseInt(root.dataset.threshold || '220', 10);
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var circumference = 2 * Math.PI * 45; // 圆的周长

    var ticking = false;

    function update() {
      var y = window.scrollY || window.pageYOffset || 0;
      var doc = document.documentElement;
      var max = Math.max(doc.scrollHeight, doc.offsetHeight, doc.clientHeight) - window.innerHeight;
      var progress = max > 0 ? Math.min(1, Math.max(0, y / max)) : 0; // 0..1
      
      // 更新进度条
      var offset = circumference - (progress * circumference);
      progressCircle.style.strokeDashoffset = offset;
      
      // 显示/隐藏按钮
      if (y > thr) wrap.classList.add('show'); 
      else wrap.classList.remove('show');
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

    // 初始化
    update();
  })();
</script>