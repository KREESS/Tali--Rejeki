@extends('components.layout')

@section('content')
<style>
  /* ===== PREMIUM DARK THEME VARIABLES ===== */
  :root {
    --primary: #8b0000;
    --primary-dark: #660000;
    --primary-light: #cc0000;
    --accent: #ff4444;
    --accent-bright: #ff6666;
    
    --bg-primary: #0a0a0a;
    --bg-secondary: #1a0a0a;
    --bg-tertiary: #2a1a1a;
    
    --glass-bg: rgba(25, 25, 35, 0.8);
    --glass-border: rgba(255, 68, 68, 0.3);
    --glass-border-bright: rgba(255, 68, 68, 0.6);
    
    --text-primary: #ffffff;
    --text-secondary: rgba(255, 255, 255, 0.8);
    --text-muted: rgba(255, 255, 255, 0.6);
    
    --gradient-primary: linear-gradient(135deg, var(--primary), var(--primary-light));
    --gradient-accent: linear-gradient(135deg, var(--accent), var(--accent-bright));
    --gradient-bg: linear-gradient(135deg, var(--bg-primary), var(--bg-secondary));
    
    --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.3);
    --shadow-strong: 0 8px 32px rgba(0, 0, 0, 0.4);
    --shadow-intense: 0 16px 64px rgba(0, 0, 0, 0.6);
    
    --glow-primary: 0 0 30px rgba(255, 68, 68, 0.4);
    --glow-accent: 0 0 20px rgba(255, 68, 68, 0.6);
    --glow-intense: 0 0 50px rgba(255, 68, 68, 0.8);
    
    --radius: 16px;
    --radius-large: 24px;
  }

  /* ===== GLOBAL RESETS & BASE ===== */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    scroll-behavior: smooth;
    font-size: 16px;
  }

  body {
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    background: var(--gradient-bg);
    color: var(--text-primary);
    line-height: 1.6;
    overflow-x: hidden;
    position: relative;
  }

  /* ===== ANIMATED BACKGROUND ELEMENTS ===== */
  body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
      radial-gradient(circle at 20% 80%, rgba(255, 68, 68, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba(139, 0, 0, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 40% 40%, rgba(255, 68, 68, 0.05) 0%, transparent 50%);
    pointer-events: none;
    z-index: -2;
  }

  body::after {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
      linear-gradient(45deg, transparent 48%, rgba(255, 68, 68, 0.02) 50%, transparent 52%),
      linear-gradient(-45deg, transparent 48%, rgba(139, 0, 0, 0.02) 50%, transparent 52%);
    pointer-events: none;
    z-index: -1;
    animation: gridMove 20s ease-in-out infinite;
  }

  @keyframes gridMove {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(20px, 20px); }
  }

  /* ===== FLOATING PARTICLES ===== */
  .floating-particles {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: -1;
  }

  .particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--accent);
    border-radius: 50%;
    opacity: 0.6;
    animation: float 8s ease-in-out infinite;
    box-shadow: var(--glow-accent);
  }

  .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
  .particle:nth-child(2) { left: 20%; top: 80%; animation-delay: 1s; }
  .particle:nth-child(3) { left: 60%; top: 30%; animation-delay: 2s; }
  .particle:nth-child(4) { left: 80%; top: 70%; animation-delay: 3s; }
  .particle:nth-child(5) { left: 40%; top: 10%; animation-delay: 4s; }
  .particle:nth-child(6) { left: 90%; top: 40%; animation-delay: 5s; }
  .particle:nth-child(7) { left: 30%; top: 90%; animation-delay: 6s; }
  .particle:nth-child(8) { left: 70%; top: 60%; animation-delay: 7s; }

  @keyframes float {
    0%, 100% { 
      transform: translateY(0px) rotate(0deg); 
      opacity: 0.6; 
    }
    50% { 
      transform: translateY(-20px) rotate(180deg); 
      opacity: 1; 
    }
  }

  /* ===== FLOATING SHAPES ===== */
  .floating-shape {
    position: fixed;
    pointer-events: none;
    z-index: -1;
    opacity: 0.1;
  }

  .shape-1 {
    top: 10%;
    right: 10%;
    width: 100px;
    height: 100px;
    background: var(--gradient-primary);
    border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    animation: drift 15s ease-in-out infinite;
  }

  .shape-2 {
    bottom: 20%;
    left: 15%;
    width: 80px;
    height: 80px;
    background: var(--gradient-accent);
    border-radius: 50%;
    animation: drift 12s ease-in-out infinite reverse;
  }

  .shape-3 {
    top: 60%;
    right: 20%;
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: 20%;
    animation: drift 18s ease-in-out infinite;
  }

  @keyframes drift {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(120deg); }
    66% { transform: translate(-20px, 20px) rotate(240deg); }
  }

  /* ===== ENHANCED READING PROGRESS ===== */
  .reading-progress {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    z-index: 100;
    background: var(--gradient-primary);
    transform-origin: left;
    transform: scaleX(var(--p, 0));
    transition: transform 0.1s linear;
    box-shadow: var(--glow-primary);
  }

  .reading-progress::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(90deg, transparent, var(--accent), transparent);
    animation: shimmer 2s ease-in-out infinite;
  }

  @keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
  }

  /* ===== PREMIUM HERO SECTION ===== */
  .privacy-hero {
    position: relative;
    background: var(--gradient-bg);
    border-bottom: 2px solid var(--glass-border);
    overflow: hidden;
    min-height: 400px;
    display: flex;
    align-items: center;
  }

  .privacy-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
      radial-gradient(circle at 30% 20%, rgba(255, 68, 68, 0.15) 0%, transparent 50%),
      radial-gradient(circle at 70% 80%, rgba(139, 0, 0, 0.15) 0%, transparent 50%);
    z-index: 1;
  }

  .privacy-hero .inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 24px 60px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: relative;
    z-index: 2;
  }

  .breadcrumbs {
    font-size: 14px;
    color: var(--text-muted);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .breadcrumbs a {
    color: var(--accent);
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .breadcrumbs a:hover {
    color: var(--text-primary);
    text-shadow: var(--glow-accent);
  }

  .kicker {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    width: max-content;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 800;
    color: var(--text-primary);
    background: var(--gradient-primary);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border: 2px solid var(--glass-border);
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
  }

  .kicker::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    animation: slideShine 3s ease-in-out infinite;
  }

  @keyframes slideShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
  }

  .privacy-hero h1 {
    margin: 8px 0 12px;
    font-size: clamp(36px, 5vw, 64px);
    line-height: 1.1;
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
    text-wrap: balance;
    background: linear-gradient(135deg, var(--text-primary), var(--accent));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: var(--glow-accent);
    position: relative;
  }

  .privacy-hero h1::after {
    content: '🛡️';
    position: absolute;
    right: -60px;
    top: 0;
    font-size: 0.6em;
    opacity: 0.8;
    animation: pulse 2s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.2); opacity: 1; }
  }

  .meta {
    color: var(--text-secondary);
    font-size: 16px;
    font-weight: 500;
    line-height: 1.6;
  }

  .hero-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    margin-top: 24px;
  }

  .btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    color: var(--text-primary);
    font-weight: 700;
    text-decoration: none;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .btn-ghost::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 68, 68, 0.2), transparent);
    transition: left 0.5s ease;
  }

  .btn-ghost:hover {
    transform: translateY(-4px);
    border-color: var(--accent);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    color: var(--accent);
  }

  .btn-ghost:hover::before {
    left: 100%;
  }

  .wave {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: 
      radial-gradient(ellipse 100px 20px at 20% 100%, rgba(255, 68, 68, 0.3), transparent 70%),
      radial-gradient(ellipse 120px 25px at 50% 100%, rgba(139, 0, 0, 0.3), transparent 70%),
      radial-gradient(ellipse 80px 15px at 80% 100%, rgba(255, 68, 68, 0.3), transparent 70%);
    filter: blur(8px);
    animation: waveMotion 4s ease-in-out infinite;
  }

  @keyframes waveMotion {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(10px); }
  }

  /* ===== PREMIUM LAYOUT ===== */
  .privacy-wrap {
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 24px 160px;
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 40px;
  }

  @media (max-width: 1024px) {
    .privacy-wrap {
      grid-template-columns: 1fr;
      gap: 24px;
    }
  }

  /* ===== ENHANCED GLASS MORPHISM TOC ===== */
  .toc {
    position: sticky;
    top: 100px;
    align-self: start;
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 24px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    position: relative;
    overflow: hidden;
  }

  .toc::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0.8;
  }

  .toc h5 {
    margin: 0 0 16px;
    font-size: 14px;
    color: var(--accent);
    letter-spacing: 1px;
    font-weight: 800;
    text-transform: uppercase;
    text-shadow: var(--glow-accent);
  }

  .toc a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 12px 16px;
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.05);
    position: relative;
    overflow: hidden;
  }

  .toc a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 68, 68, 0.1), transparent);
    transition: left 0.5s ease;
  }

  .toc a .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--text-muted);
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 68, 68, 0.3);
  }

  .toc a.active {
    background: rgba(255, 68, 68, 0.15);
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: var(--glow-accent);
  }

  .toc a.active .dot {
    background: var(--accent);
    box-shadow: var(--glow-accent);
  }

  .toc a:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border-color: var(--accent);
    color: var(--text-primary);
  }

  .toc a:hover::before {
    left: 100%;
  }

  .toc .note {
    margin-top: 16px;
    font-size: 13px;
    color: var(--text-muted);
    text-align: center;
  }

  .toc .note a {
    color: var(--accent);
    font-weight: 600;
  }

  .searchbox {
    display: flex;
    align-items: center;
    gap: 12px;
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    border: 2px solid var(--glass-border);
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 8px;
    box-shadow: var(--shadow-soft);
  }

  .searchbox input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 14px;
    color: var(--text-primary);
    background: transparent;
    font-weight: 500;
  }

  .searchbox input::placeholder {
    color: var(--text-muted);
  }

  /* ===== PREMIUM CONTENT STYLING ===== */
  .content > .card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 32px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    position: relative;
    overflow: hidden;
  }

  .content > .card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0.8;
  }

  .section {
    position: relative;
    margin-bottom: 48px;
  }

  h2.section {
    margin: 48px 0 24px;
    font-size: 28px;
    font-weight: 800;
    color: var(--accent);
    scroll-margin-top: 120px;
    display: flex;
    align-items: center;
    gap: 16px;
    text-shadow: var(--glow-accent);
    position: relative;
  }

  h2.section::before {
    content: '';
    position: absolute;
    left: -24px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 100%;
    background: var(--gradient-primary);
    border-radius: 2px;
    box-shadow: var(--glow-primary);
  }

  .anchor-btn {
    opacity: 0;
    transform: translateY(4px);
    transition: all 0.3s ease;
    border: 2px solid var(--glass-border);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 12px;
    color: var(--text-secondary);
    cursor: pointer;
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    font-weight: 600;
  }

  .section:hover .anchor-btn {
    opacity: 1;
    transform: translateY(0);
  }

  .anchor-btn:hover {
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: var(--glow-accent);
  }

  p, li {
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 16px;
    margin-bottom: 16px;
  }

  ul {
    padding-left: 24px;
  }

  li {
    margin-bottom: 12px;
    position: relative;
  }

  li::marker {
    color: var(--accent);
  }

  strong {
    color: var(--text-primary);
    font-weight: 700;
  }

  .info-strip {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 32px 0;
  }

  .chip {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    padding: 20px;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .chip::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--gradient-primary);
    opacity: 0.6;
  }

  .chip:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border-color: var(--accent);
  }

  .chip .dot {
    height: 12px;
    width: 12px;
    border-radius: 50%;
    background: var(--accent);
    box-shadow: var(--glow-accent);
    animation: pulse 2s ease-in-out infinite;
  }

  .chip b {
    color: var(--text-primary);
    font-weight: 700;
  }

  .chip small {
    color: var(--text-secondary);
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .info-strip {
      grid-template-columns: 1fr;
    }
  }

  /* ===== PREMIUM CALLOUT BOXES ===== */
  .callout {
    display: flex;
    gap: 20px;
    align-items: flex-start;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 28px 32px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    margin: 32px 0;
    position: relative;
    overflow: hidden;
  }

  .callout::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0.8;
  }

  .callout .ico {
    height: 48px;
    width: 48px;
    flex: 0 0 48px;
    border-radius: 12px;
    display: grid;
    place-items: center;
    font-weight: 900;
    color: var(--text-primary);
    background: var(--gradient-primary);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    font-size: 18px;
  }

  .callout p {
    color: var(--text-secondary);
    margin-bottom: 16px;
  }

  .callout ul {
    margin: 16px 0;
  }

  .callout li {
    color: var(--text-secondary);
    margin-bottom: 8px;
  }

  .callout a {
    font-weight: 700;
    color: var(--accent);
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .callout a:hover {
    color: var(--accent-bright);
    text-shadow: var(--glow-accent);
  }

  .callout .muted {
    color: var(--text-muted);
    font-size: 14px;
    font-style: italic;
  }

  /* ===== PREMIUM COOKIE PREFERENCES ===== */
  .pref-box {
    margin: 32px 0;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 28px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    position: relative;
    overflow: hidden;
    isolation: isolate; /* Mencegah z-index issues */
  }

  .pref-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-accent);
    opacity: 0.8;
  }

  .pref-grid {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 20px;
    align-items: center;
    margin-bottom: 20px;
    padding: 16px 0;
    border-bottom: 1px solid rgba(255, 68, 68, 0.1);
    position: relative;
  }

  .pref-grid:last-of-type {
    border-bottom: none;
    margin-bottom: 0;
  }

  .pref-grid > div {
    color: var(--text-secondary);
    min-width: 0; /* Prevent overflow */
  }

  .pref-grid strong {
    color: var(--text-primary);
    font-weight: 700;
    font-size: 16px;
    display: block;
    margin-bottom: 4px;
  }

  .pref-grid small {
    color: var(--text-muted);
    font-size: 14px;
    display: block;
    line-height: 1.4;
  }

  /* Wrapper untuk toggle agar tidak memengaruhi layout */
  .toggle-wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    min-width: 60px;
    flex-shrink: 0;
  }

  .toggle {
    --w: 52px;
    --h: 30px;
    --dot: 24px;
    position: relative;
    width: var(--w);
    height: var(--h);
    border-radius: 999px;
    background: var(--bg-tertiary);
    border: 2px solid var(--glass-border);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: var(--shadow-soft);
    overflow: hidden;
  }

  .toggle input {
    appearance: none;
    position: absolute;
    inset: 0;
    margin: 0;
    cursor: pointer;
    opacity: 0;
  }

  .toggle .knob {
    position: absolute;
    top: 50%;
    left: 3px;
    width: var(--dot);
    height: var(--dot);
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    transform: translateY(-50%);
    box-shadow: 
      0 2px 8px rgba(0, 0, 0, 0.3),
      0 0 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 2;
  }

  /* State ketika switch ON/checked */
  .toggle input:checked + .knob {
    left: calc(var(--w) - var(--dot) - 3px);
    background: var(--text-primary);
    box-shadow: 
      0 2px 12px rgba(255, 68, 68, 0.4),
      0 0 0 1px rgba(255, 68, 68, 0.3);
  }

  /* Background toggle ketika checked */
  .toggle:has(input:checked) {
    background: var(--gradient-primary);
    border-color: var(--accent);
    box-shadow: 
      var(--shadow-soft),
      inset 0 0 20px rgba(255, 68, 68, 0.2);
  }

  /* Hover effects */
  .toggle:hover {
    border-color: var(--glass-border-bright);
    transform: scale(1.02);
  }

  .toggle:has(input:checked):hover {
    border-color: var(--accent-bright);
    box-shadow: 
      var(--shadow-strong),
      var(--glow-accent),
      inset 0 0 25px rgba(255, 68, 68, 0.3);
  }

  /* Focus state untuk accessibility */
  .toggle input:focus-visible + .knob {
    outline: 2px solid var(--accent);
    outline-offset: 2px;
  }

  /* Disabled state */
  .toggle:has(input:disabled) {
    opacity: 0.6;
    cursor: not-allowed;
  }

  .toggle:has(input:disabled) .knob {
    background: var(--text-muted) !important;
    cursor: not-allowed;
  }

  .pref-actions {
    display: flex;
    gap: 16px;
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 68, 68, 0.1);
  }

  /* Responsive design untuk mobile */
  @media (max-width: 768px) {
    .pref-grid {
      grid-template-columns: 1fr;
      gap: 12px;
      text-align: center;
    }
    
    .toggle-wrapper {
      justify-content: center;
      margin-top: 8px;
    }
    
    .pref-actions {
      flex-direction: column;
      gap: 12px;
    }
    
    .btn-save,
    .btn-reset {
      width: 100%;
      justify-content: center;
    }
  }

  /* Fallback untuk browser yang tidak mendukung :has() */
  @supports not (selector(:has(*))) {
    .toggle input:checked {
      background: var(--gradient-primary);
      border-color: var(--accent);
      box-shadow: 
        var(--shadow-soft),
        inset 0 0 20px rgba(255, 68, 68, 0.2);
    }
  }

  /* Prevent layout shift dan contain animations */
  .toggle-wrapper {
    contain: layout style paint;
  }

  .toggle {
    contain: layout style paint;
    will-change: transform, border-color, box-shadow;
  }

  .toggle .knob {
    contain: layout style paint;
    will-change: transform, left, background, box-shadow;
  }

  .btn-save {
    border: 2px solid var(--accent);
    background: var(--gradient-primary);
    color: var(--text-primary);
    font-weight: 700;
    border-radius: var(--radius);
    padding: 12px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-soft);
  }

  .btn-save:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-strong), var(--glow-primary);
  }

  .btn-reset {
    border: 2px solid var(--glass-border);
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    color: var(--text-secondary);
    font-weight: 700;
    border-radius: var(--radius);
    padding: 12px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-soft);
  }

  .btn-reset:hover {
    transform: translateY(-2px);
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: var(--shadow-strong), var(--glow-accent);
  }

  .pref-muted {
    color: var(--text-muted);
    font-size: 13px;
    font-style: italic;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--glass-border);
  }
  .toast-mini {
    position: fixed;
    left: 50%;
    bottom: 32px;
    transform: translateX(-50%);
    z-index: 100;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    color: var(--text-primary);
    border: 2px solid var(--glass-border);
    border-radius: 50px;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
  }

  .toast-mini.show {
    opacity: 1;
    transform: translateX(-50%) translateY(-8px);
  }

  /* ===== PREMIUM FAQ SECTION ===== */
  .faq {
    margin: 32px 0;
  }

  .faq details {
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    margin-bottom: 16px;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
  }

  .faq details::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--gradient-accent);
    opacity: 0.6;
  }

  .faq details:hover {
    border-color: var(--accent);
    box-shadow: var(--shadow-strong), var(--glow-primary);
  }

  .faq details[open] {
    border-color: var(--accent);
    box-shadow: var(--shadow-strong), var(--glow-accent);
  }

  .faq summary {
    cursor: pointer;
    list-style: none;
    padding: 20px 24px;
    font-weight: 700;
    color: var(--text-primary);
    font-size: 16px;
    transition: all 0.3s ease;
    position: relative;
  }

  .faq summary::-webkit-details-marker {
    display: none;
  }

  .faq summary::after {
    content: '+';
    position: absolute;
    right: 24px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    font-weight: 300;
    color: var(--accent);
    transition: all 0.3s ease;
  }

  .faq details[open] summary::after {
    content: '−';
    transform: translateY(-50%) rotate(180deg);
  }

  .faq summary:hover {
    color: var(--accent);
    text-shadow: var(--glow-accent);
  }

  .faq .ans {
    padding: 0 24px 24px;
    color: var(--text-secondary);
    line-height: 1.7;
    font-size: 15px;
  }

  /* ===== PREMIUM BACK-TO-TOP BUTTON ===== */
  .btn-top {
    position: fixed;
    right: 32px;
    bottom: 32px;
    height: 56px;
    width: 56px;
    border-radius: var(--radius);
    border: 2px solid var(--glass-border);
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    display: grid;
    place-items: center;
    color: var(--accent);
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
    z-index: 50;
    font-size: 24px;
    font-weight: 700;
  }

  .btn-top.show {
    opacity: 1;
    pointer-events: auto;
  }

  .btn-top:hover {
    transform: translateY(-4px);
    border-color: var(--accent);
    box-shadow: var(--shadow-intense), var(--glow-intense);
    color: var(--accent-bright);
  }

  /* Utility */
  .hidden{ display:none !important; }
</style>

<div class="reading-progress" id="progress"></div>

<!-- Floating Particles & Shapes -->
<div class="floating-particles">
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
</div>

<div class="floating-shape shape-1"></div>
<div class="floating-shape shape-2"></div>
<div class="floating-shape shape-3"></div>

<section class="privacy-hero">
  <div class="inner">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="{{ url('/') }}">🏠 Beranda</a> &nbsp;/&nbsp; <span>🛡️ Kebijakan Privasi</span>
    </nav>
    <span class="kicker">🔒 PRIVACY — TALIREJEKI.COM</span>
    <h1>🛡️ Kebijakan Privasi</h1>
    <div class="meta">
      {{ config('app.name', 'Tali Rejeki') }} — 🏭 Distributor Insulasi Industri Premium • ✅ Berlaku sejak: {{ now()->format('d F Y') }} • ⏱️ <span id="readTime">~5 menit baca</span>
    </div>
  </div>
  <div class="wave"></div>
</section>

<div class="privacy-wrap">
  <aside class="toc" aria-label="Daftar Isi">
    <div class="searchbox" role="search">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      <input id="searchInput" type="search" placeholder="🔍 Cari di halaman...">
    </div>
    <h5>🧭 NAVIGASI CEPAT</h5>
    <a href="#ringkasan" data-anchor><span>📋 Ringkasan</span><span class="dot"></span></a>
    <a href="#data-dikumpulkan" data-anchor><span>📊 Data yang Dikumpulkan</span><span class="dot"></span></a>
    <a href="#sumber-data" data-anchor><span>🎯 Sumber Data</span><span class="dot"></span></a>
    <a href="#penggunaan" data-anchor><span>⚙️ Penggunaan Data</span><span class="dot"></span></a>
    <a href="#dasar-hukum" data-anchor><span>⚖️ Dasar Hukum</span><span class="dot"></span></a>
    <a href="#berbagi" data-anchor><span>🤝 Berbagi ke Pihak Ketiga</span><span class="dot"></span></a>
    <a href="#lintas-negara" data-anchor><span>🌐 Transfer Lintas Negara</span><span class="dot"></span></a>
    <a href="#retensi" data-anchor><span>📅 Retensi Data</span><span class="dot"></span></a>
    <a href="#keamanan" data-anchor><span>🔐 Keamanan</span><span class="dot"></span></a>
    <a href="#hak" data-anchor><span>👤 Hak Anda</span><span class="dot"></span></a>
    <a href="#cookies" data-anchor><span>🍪 Cookies & Preferensi</span><span class="dot"></span></a>
    <a href="#anak" data-anchor><span>👶 Privasi Anak</span><span class="dot"></span></a>
    <a href="#permintaan-data" data-anchor><span>📝 Permintaan Data</span><span class="dot"></span></a>
    <a href="#perubahan" data-anchor><span>🔄 Perubahan</span><span class="dot"></span></a>
    <a href="#kontak" data-anchor><span>📞 Kontak</span><span class="dot"></span></a>
    <p class="note">📄 Perlu salinan? <a href="{{ asset('docs/kebijakan-privasi.pdf') }}">💾 Unduh PDF</a></p>
  </aside>

  <section class="content" id="content">
    <div class="card">
      <p>🛡️ Kebijakan Privasi ini menjelaskan bagaimana <strong>{{ config('app.name', 'Tali Rejeki') }}</strong> mengumpulkan, menggunakan, membagikan, menyimpan, dan melindungi data pribadi saat Anda menggunakan situs dan layanan kami di talirejeki.com. 🔒 Kami berkomitmen pada praktik pengelolaan data yang aman, transparan, dan bertanggung jawab.</p>
      <div class="info-strip">
        <div class="chip"><span class="dot"></span> <div><b>🔐 Data Aman</b><br><small>Kontrol akses & pemantauan internal.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>👁️ Transparan</b><br><small>Tujuan pemrosesan jelas & terukur.</small></div></div>
        <div class="chip"><span class="dot"></span> <div><b>🎛️ Kendali Anda</b><br><small>Akses, koreksi, dan opt-out yang mudah.</small></div></div>
      </div>
    </div>

    <div class="section" data-section id="ringkasan">
      <h2 class="section">📋 1. Ringkasan
        <button class="anchor-btn" data-copy="#ringkasan" title="Salin tautan">🔗 Salin tautan</button>
      </h2>
      <ul>
        <li>🎯 Data digunakan untuk memproses pesanan, dukungan pelanggan, peningkatan layanan, dan komunikasi penting.</li>
        <li>🤝 Data dapat dibagikan ke penyedia pembayaran, logistik, analitik, dan mitra IT yang mendukung operasional.</li>
        <li>👤 Anda dapat mengakses, memperbaiki, atau meminta penghapusan data tertentu sesuai ketentuan.</li>
      </ul>
    </div>

    <div class="section" data-section id="data-dikumpulkan">
      <h2 class="section">📊 2. Data yang Kami Kumpulkan
        <button class="anchor-btn" data-copy="#data-dikumpulkan">🔗 Salin tautan</button>
      </h2>
      <ul>
        <li><strong>👤 Identitas & Kontak:</strong> nama, email, telepon/WhatsApp, alamat pengiriman, NPWP (jika relevan).</li>
        <li><strong>🔐 Akun:</strong> kredensial (hash password), preferensi, riwayat interaksi.</li>
        <li><strong>💳 Transaksi:</strong> pesanan, tagihan, metode pembayaran (token/ID gateway; bukan nomor kartu penuh).</li>
        <li><strong>💻 Teknis & Penggunaan:</strong> IP, tipe perangkat/browser, halaman yang diakses, cookies, log.</li>
        <li><strong>📧 Komunikasi:</strong> pesan email/form, catatan dukungan.</li>
      </ul>
    </div>

    <div class="section" data-section id="sumber-data">
      <h2 class="section">🎯 3. Sumber Data
        <button class="anchor-btn" data-copy="#sumber-data">🔗 Salin tautan</button>
      </h2>
      <p>🔍 Kami memperoleh data dari Anda (form, akun), otomatis melalui sistem (cookies/log), dan dari pihak ketiga yang Anda gunakan (payment gateway, logistik, analitik).</p>
    </div>

    <div class="section" data-section id="penggunaan">
      <h2 class="section">⚙️ 4. Cara Kami Menggunakan Data
        <button class="anchor-btn" data-copy="#penggunaan">🔗 Salin tautan</button>
      </h2>
      <ul>
        <li>🛒 Memproses pemesanan, pembayaran, dan pengiriman.</li>
        <li>🔐 Manajemen akun, autentikasi, dan pencegahan penipuan.</li>
        <li>🎧 Dukungan pelanggan & komunikasi terkait layanan.</li>
        <li>📧 Pengiriman faktur, pembaruan penting, dan pemberitahuan keamanan.</li>
        <li>📢 Pemasaran yang Anda setujui (dapat berhenti berlangganan kapan saja).</li>
        <li>📊 Analitik performa & pengalaman pengguna.</li>
        <li>⚖️ Kepatuhan hukum & audit internal.</li>
      </ul>
    </div>

    <div class="section" data-section id="dasar-hukum">
      <h2 class="section">⚖️ 5. Dasar Hukum Pemrosesan
        <button class="anchor-btn" data-copy="#dasar-hukum">🔗 Salin tautan</button>
      </h2>
      <ul>
        <li><strong>✅ Persetujuan</strong> (mis. pemasaran email yang Anda setujui).</li>
        <li><strong>📋 Pelaksanaan kontrak</strong> (memproses pesanan Anda).</li>
        <li><strong>📜 Kewajiban hukum</strong> (pencatatan pajak, kepatuhan regulasi).</li>
        <li><strong>🎯 Kepentingan sah</strong> (keamanan sistem, peningkatan layanan) dengan perlindungan yang seimbang.</li>
      </ul>
    </div>

    <div class="section" data-section id="berbagi">
      <h2 class="section">🤝 6. Berbagi Data kepada Pihak Ketiga
        <button class="anchor-btn" data-copy="#berbagi">🔗 Salin tautan</button>
      </h2>
      <p>🔄 Kami dapat membagikan data kepada:</p>
      <ul>
        <li><strong>💳 Penyedia pembayaran</strong> untuk memproses transaksi dengan aman.</li>
        <li><strong>🚚 Mitra logistik/kurir</strong> untuk pengiriman produk insulasi.</li>
        <li><strong>📊 Penyedia analitik</strong> untuk memahami penggunaan situs dan peningkatan layanan.</li>
        <li><strong>💻 Konsultan/penyedia IT</strong> untuk pemeliharaan & keamanan sistem.</li>
      </ul>
      <p>🚫 Kami <strong>tidak menjual</strong> data pribadi Anda kepada pihak manapun.</p>
    </div>

    <div class="section" data-section id="lintas-negara">
      <h2 class="section">🌐 7. Transfer Lintas Negara
        <button class="anchor-btn" data-copy="#lintas-negara">🔗 Salin tautan</button>
      </h2>
      <p>🛡️ Jika pemrosesan melibatkan server/penyedia layanan di luar Indonesia, kami akan menerapkan perlindungan yang wajar agar setara dengan standar keamanan data yang berlaku di Indonesia.</p>
    </div>

    <div class="section" data-section id="retensi">
      <h2 class="section">📅 8. Penyimpanan & Retensi
        <button class="anchor-btn" data-copy="#retensi">🔗 Salin tautan</button>
      </h2>
      <p>🗂️ Data disimpan selama diperlukan untuk tujuan pemrosesan atau sesuai kewajiban hukum (mis. arsip keuangan untuk keperluan pajak). Setelah periode tersebut, data akan dihapus atau dianonimkan secara aman.</p>
    </div>

    <div class="section" data-section id="keamanan">
      <h2 class="section">🔐 9. Keamanan Data
        <button class="anchor-btn" data-copy="#keamanan">🔗 Salin tautan</button>
      </h2>
      <p>🛡️ Kami menerapkan langkah teknis & organisasi yang wajar seperti enkripsi saat transit, kontrol akses berlapis, dan audit keamanan berkala. Meski demikian, tidak ada sistem yang 100% bebas risiko dari ancaman siber.</p>
    </div>

    <div class="section" data-section id="hak">
      <h2 class="section">👤 10. Hak Anda
        <button class="anchor-btn" data-copy="#hak">🔗 Salin tautan</button>
      </h2>
      <ul>
        <li>📖 Mengakses salinan data pribadi tertentu yang kami simpan.</li>
        <li>✏️ Memperbaiki data yang tidak akurat atau tidak lengkap.</li>
        <li>🗑️ Meminta penghapusan data tertentu sesuai ketentuan yang berlaku.</li>
        <li>↩️ Menarik persetujuan (tanpa memengaruhi pemrosesan yang telah sah sebelumnya).</li>
        <li>⛔ Menolak pemrosesan berbasis kepentingan sah dalam kondisi tertentu.</li>
      </ul>
    </div>

    <div class="section" data-section id="cookies">
      <h2 class="section">🍪 11. Cookies & Preferensi
        <button class="anchor-btn" data-copy="#cookies">🔗 Salin tautan</button>
      </h2>
      <div class="pref-box">
        <div class="pref-grid">
          <div>
            <strong>🔒 Cookies Esensial</strong>
            <small>Wajib untuk fungsi dasar situs (login, keamanan, form).</small>
          </div>
          <div class="toggle-wrapper">
            <label class="toggle" aria-label="Cookies esensial">
              <input id="ck-essential" type="checkbox" checked disabled>
              <span class="knob"></span>
            </label>
          </div>
        </div>

        <div class="pref-grid">
          <div>
            <strong>📊 Analitik</strong>
            <small>Membantu memahami performa & pengalaman pengguna.</small>
          </div>
          <div class="toggle-wrapper">
            <label class="toggle" aria-label="Cookies analitik">
              <input id="ck-analytics" type="checkbox">
              <span class="knob"></span>
            </label>
          </div>
        </div>

        <div class="pref-grid">
          <div>
            <strong>📢 Pemasaran</strong>
            <small>Penawaran relevan jika Anda menyetujuinya.</small>
          </div>
          <div class="toggle-wrapper">
            <label class="toggle" aria-label="Cookies pemasaran">
              <input id="ck-marketing" type="checkbox">
              <span class="knob"></span>
            </label>
          </div>
        </div>

        <div class="pref-actions">
          <button type="button" class="btn-save" id="btnSavePref">Simpan Preferensi</button>
          <button type="button" class="btn-reset" id="btnResetPref">Reset</button>
        </div>

        <div class="pref-muted">Pengaturan ini menyimpan preferensi di perangkat Anda (localStorage). Untuk solusi consent produksi, sambungkan ke platform cookie-consent yang digunakan.</div>
      </div>
    </div>

    <div class="section" data-section id="anak">
      <h2 class="section">👶 12. Privasi Anak
        <button class="anchor-btn" data-copy="#anak">🔗 Salin tautan</button>
      </h2>
      <p>👨‍👩‍👧‍👦 Layanan kami tidak ditujukan untuk anak di bawah 18 tahun. Kami tidak secara sadar mengumpulkan data pribadi anak tanpa persetujuan orang tua atau wali yang sah sesuai ketentuan hukum yang berlaku.</p>
    </div>

    <div class="section" data-section id="permintaan-data">
      <h2 class="section">📝 13. Permintaan Akses/Penghapusan Data
        <button class="anchor-btn" data-copy="#permintaan-data">🔗 Salin tautan</button>
      </h2>
      <div class="callout">
        <div class="ico">TR</div>
        <div>
          <p>Ingin meminta salinan, koreksi, atau penghapusan data pribadi? Kirimkan permintaan dengan subjek <em>“Permintaan Data Pribadi”</em> melalui:</p>
          <ul>
            <li>📧 Email: <a href="mailto:talirejeki@gmail.com?subject=Permintaan%20Data%20Pribadi">talirejeki@gmail.com</a></li>
            <li>📱 WhatsApp: <a href="https://wa.me/6281316826959">+62 813-1682-6959</a></li>
            <li>📞 Telepon: (021) 29470622, (021) 22889956</li>
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
            <li>Email: <a href="mailto:talirejeki@gmail.com">talirejeki@gmail.com</a></li>
            <li>Telepon/WhatsApp: <a href="https://wa.me/6281316826959">+62 813-1682-6959</a></li>
            <li>Alamat: JL. RAYA TARUMAJAYA NO. 11 RT 001 RW 029 DUSUN III DESA SETIA ASIH KEC. TARUMAJAYA KAB. BEKASI 17215</li>
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

  // Cookie prefs save/reset (localStorage demo) with enhanced animations
  (function(){
    const key = 'tr_cookie_prefs';
    const elA = document.getElementById('ck-analytics');
    const elM = document.getElementById('ck-marketing');
    
    // Add smooth toggle animation
    const toggles = document.querySelectorAll('.toggle input[type="checkbox"]');
    toggles.forEach(toggle => {
      toggle.addEventListener('change', function() {
        const label = this.closest('.toggle');
        if (this.checked) {
          label.style.transform = 'scale(1.05)';
          setTimeout(() => {
            label.style.transform = 'scale(1)';
          }, 150);
        }
      });
    });
    
    const save = () => {
      const payload = { 
        analytics: !!elA?.checked, 
        marketing: !!elM?.checked, 
        ts: Date.now() 
      };
      localStorage.setItem(key, JSON.stringify(payload));
      
      // Visual feedback untuk semua switch yang aktif
      toggles.forEach(toggle => {
        if (toggle.checked && !toggle.disabled) {
          const label = toggle.closest('.toggle');
          label.style.animation = 'pulse 0.6s ease-in-out';
          setTimeout(() => {
            label.style.animation = '';
          }, 600);
        }
      });
      
      showToast('✅ Preferensi tersimpan');
    };
    
    const reset = () => {
      localStorage.removeItem(key);
      if(elA) {
        elA.checked = false;
        elA.dispatchEvent(new Event('change'));
      }
      if(elM) {
        elM.checked = false;
        elM.dispatchEvent(new Event('change'));
      }
      showToast('🔄 Preferensi direset');
    };
    
    // Load saved preferences
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
