@extends('components.layout')

@section('title', 'Terms Of Service - Tali Rejeki')

@section('content')
<style>
  /* ===== PREMIUM DARK THEME VARIABLES ===== */
  :root {
    --primary: #8b0000;
    --primary-dark: #660000;
    --primary-light: #cc0000;
    --primary-darker: #440000;
    --accent: #ff4444;
    --accent-bright: #ff6666;
    --accent-dark: #cc2222;
    
    --bg-primary: #0a0a0a;
    --bg-secondary: #1a0a0a;
    --bg-tertiary: #2a1a1a;
    --bg-quaternary: #3a2a2a;
    
    --glass-bg: rgba(25, 25, 35, 0.8);
    --glass-border: rgba(255, 68, 68, 0.3);
    --glass-border-bright: rgba(255, 68, 68, 0.6);
    
    --text-primary: #ffffff;
    --text-secondary: rgba(255, 255, 255, 0.8);
    --text-muted: rgba(255, 255, 255, 0.6);
    --text-accent: #ff6666;
    
    --gradient-primary: linear-gradient(135deg, var(--primary), var(--primary-light));
    --gradient-accent: linear-gradient(135deg, var(--accent), var(--accent-bright));
    --gradient-bg: linear-gradient(135deg, var(--bg-primary), var(--bg-secondary));
    --gradient-glass: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
    
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
    min-height: 100vh;
  }

  /* ===== PREMIUM ANIMATED BACKGROUND ===== */
  body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
      radial-gradient(circle at 15% 25%, rgba(255, 68, 68, 0.15) 0%, transparent 50%),
      radial-gradient(circle at 85% 75%, rgba(139, 0, 0, 0.15) 0%, transparent 50%),
      radial-gradient(circle at 50% 10%, rgba(255, 68, 68, 0.08) 0%, transparent 60%),
      radial-gradient(circle at 30% 90%, rgba(204, 0, 0, 0.12) 0%, transparent 50%);
    pointer-events: none;
    z-index: -3;
    animation: bgPulse 12s ease-in-out infinite;
  }

  body::after {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
      linear-gradient(45deg, transparent 48%, rgba(255, 68, 68, 0.03) 50%, transparent 52%),
      linear-gradient(-45deg, transparent 48%, rgba(139, 0, 0, 0.03) 50%, transparent 52%),
      linear-gradient(90deg, transparent 48%, rgba(255, 68, 68, 0.02) 50%, transparent 52%);
    pointer-events: none;
    z-index: -2;
    animation: gridShift 15s ease-in-out infinite;
  }

  @keyframes bgPulse {
    0%, 100% { opacity: 0.8; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.05); }
  }

  @keyframes gridShift {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(20px, -10px) rotate(1deg); }
    66% { transform: translate(-15px, 15px) rotate(-1deg); }
  }

  /* ===== FLOATING PARTICLES SYSTEM ===== */
  .floating-particles {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: -1;
    overflow: hidden;
  }

  .particle {
    position: absolute;
    background: var(--accent);
    border-radius: 50%;
    opacity: 0.7;
    animation: particleFloat 12s ease-in-out infinite;
    box-shadow: var(--glow-accent);
  }

  .particle:nth-child(1) { width: 6px; height: 6px; left: 10%; top: 20%; animation-delay: 0s; }
  .particle:nth-child(2) { width: 4px; height: 4px; left: 25%; top: 80%; animation-delay: 2s; }
  .particle:nth-child(3) { width: 8px; height: 8px; left: 70%; top: 15%; animation-delay: 4s; }
  .particle:nth-child(4) { width: 5px; height: 5px; left: 85%; top: 60%; animation-delay: 6s; }
  .particle:nth-child(5) { width: 7px; height: 7px; left: 45%; top: 5%; animation-delay: 8s; }
  .particle:nth-child(6) { width: 4px; height: 4px; left: 95%; top: 85%; animation-delay: 10s; }
  .particle:nth-child(7) { width: 6px; height: 6px; left: 15%; top: 75%; animation-delay: 1s; }
  .particle:nth-child(8) { width: 5px; height: 5px; left: 60%; top: 40%; animation-delay: 3s; }
  .particle:nth-child(9) { width: 8px; height: 8px; left: 35%; top: 95%; animation-delay: 5s; }
  .particle:nth-child(10) { width: 4px; height: 4px; left: 80%; top: 30%; animation-delay: 7s; }
  .particle:nth-child(11) { width: 7px; height: 7px; left: 5%; top: 50%; animation-delay: 9s; }
  .particle:nth-child(12) { width: 5px; height: 5px; left: 55%; top: 70%; animation-delay: 11s; }

  @keyframes particleFloat {
    0%, 100% { 
      transform: translateY(0px) translateX(0px) rotate(0deg) scale(1); 
      opacity: 0.7; 
    }
    25% { 
      transform: translateY(-30px) translateX(15px) rotate(90deg) scale(1.2); 
      opacity: 1; 
    }
    50% { 
      transform: translateY(-15px) translateX(-20px) rotate(180deg) scale(0.8); 
      opacity: 0.9; 
    }
    75% { 
      transform: translateY(-40px) translateX(10px) rotate(270deg) scale(1.1); 
      opacity: 0.8; 
    }
  }

  /* ===== FLOATING GEOMETRIC SHAPES ===== */
  .floating-shape {
    position: fixed;
    pointer-events: none;
    z-index: -1;
    opacity: 0.15;
    animation: shapeDrift 20s ease-in-out infinite;
  }

  .shape-1 {
    top: 8%;
    right: 12%;
    width: 120px;
    height: 120px;
    background: var(--gradient-primary);
    border-radius: 35% 65% 70% 30% / 25% 45% 55% 75%;
    animation-delay: 0s;
  }

  .shape-2 {
    bottom: 15%;
    left: 8%;
    width: 100px;
    height: 100px;
    background: var(--gradient-accent);
    border-radius: 50%;
    animation-delay: 7s;
    animation-direction: reverse;
  }

  .shape-3 {
    top: 45%;
    right: 5%;
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: 25%;
    animation-delay: 14s;
  }

  .shape-4 {
    top: 70%;
    left: 20%;
    width: 90px;
    height: 90px;
    background: var(--gradient-accent);
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    animation-delay: 3s;
    animation-direction: reverse;
  }

  .shape-5 {
    top: 25%;
    left: 40%;
    width: 70px;
    height: 70px;
    background: var(--gradient-primary);
    border-radius: 40% 60% 60% 40% / 40% 40% 60% 60%;
    animation-delay: 10s;
  }

  @keyframes shapeDrift {
    0%, 100% { 
      transform: translate(0, 0) rotate(0deg) scale(1); 
      opacity: 0.15; 
    }
    25% { 
      transform: translate(40px, -40px) rotate(90deg) scale(1.1); 
      opacity: 0.25; 
    }
    50% { 
      transform: translate(-30px, 30px) rotate(180deg) scale(0.9); 
      opacity: 0.2; 
    }
    75% { 
      transform: translate(20px, -20px) rotate(270deg) scale(1.05); 
      opacity: 0.18; 
    }
  }

  /* ===== ENHANCED READING PROGRESS ===== */
  .reading-progress {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    z-index: 1000;
    background: var(--gradient-primary);
    transform-origin: left;
    transform: scaleX(var(--p, 0));
    transition: transform 0.1s linear;
    box-shadow: var(--glow-primary);
  }

  .reading-progress::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(90deg, 
      transparent, 
      rgba(255, 255, 255, 0.4), 
      transparent);
    animation: progressShine 3s ease-in-out infinite;
  }

  @keyframes progressShine {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
  }

  /* ===== PREMIUM HERO SECTION ===== */
  .legal-hero {
    position: relative;
    background: var(--gradient-bg);
    border-bottom: 2px solid var(--glass-border);
    overflow: hidden;
    min-height: 70vh;
    display: flex;
    align-items: center;
  }

  .legal-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
      radial-gradient(circle at 25% 25%, rgba(255, 68, 68, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 75% 75%, rgba(139, 0, 0, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 50% 0%, rgba(255, 68, 68, 0.1) 0%, transparent 60%);
    z-index: 1;
    animation: heroGlow 10s ease-in-out infinite;
  }

  @keyframes heroGlow {
    0%, 100% { opacity: 0.6; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.05); }
  }

  .legal-hero .inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 100px 24px 80px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
    z-index: 2;
  }

  .breadcrumbs {
    font-size: 14px;
    color: var(--text-accent);
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
    animation: fadeInUp 1s ease-out;
  }

  .breadcrumbs a {
    color: var(--accent);
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 4px 8px;
    border-radius: 6px;
    border: 1px solid transparent;
  }

  .breadcrumbs a:hover {
    color: var(--text-primary);
    background: rgba(255, 68, 68, 0.2);
    border-color: var(--accent);
    text-shadow: var(--glow-accent);
  }

  .breadcrumbs span {
    font-size: 18px;
    opacity: 0.7;
  }

  .kicker {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    width: max-content;
    padding: 16px 32px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 900;
    color: var(--text-primary);
    background: var(--gradient-primary);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border: 2px solid var(--glass-border);
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
    animation: fadeInUp 1s ease-out 0.2s both;
  }

  .kicker::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    animation: kickerShine 4s ease-in-out infinite;
  }

  @keyframes kickerShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
  }

  .legal-hero h1 {
    margin: 16px 0 20px;
    font-size: clamp(42px, 7vw, 80px);
    line-height: 1.1;
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
    text-wrap: balance;
    background: linear-gradient(135deg, var(--text-primary), var(--accent), var(--text-primary));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: var(--glow-accent);
    position: relative;
    animation: fadeInUp 1s ease-out 0.4s both;
  }

  .legal-hero h1::after {
    content: '⚖️';
    position: absolute;
    right: -80px;
    top: 0;
    font-size: 0.5em;
    opacity: 0.8;
    animation: titleIcon 3s ease-in-out infinite;
  }

  @keyframes titleIcon {
    0%, 100% { transform: rotate(-10deg) scale(1); opacity: 0.8; }
    50% { transform: rotate(10deg) scale(1.2); opacity: 1; }
  }

  .meta {
    color: var(--text-secondary);
    font-size: 18px;
    font-weight: 600;
    line-height: 1.6;
    opacity: 0.9;
    animation: fadeInUp 1s ease-out 0.6s both;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .hero-actions {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 32px;
    animation: fadeInUp 1s ease-out 0.8s both;
  }

  .btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 24px;
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    color: var(--text-primary);
    font-weight: 700;
    text-decoration: none;
    box-shadow: var(--shadow-soft);
    transition: all 0.4s ease;
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
    background: linear-gradient(90deg, transparent, rgba(255, 68, 68, 0.3), transparent);
    transition: left 0.6s ease;
  }

  .btn-ghost:hover {
    transform: translateY(-6px) scale(1.02);
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
    height: 80px;
    background: 
      radial-gradient(ellipse 150px 30px at 15% 100%, rgba(255, 68, 68, 0.4), transparent 70%),
      radial-gradient(ellipse 180px 35px at 50% 100%, rgba(139, 0, 0, 0.4), transparent 70%),
      radial-gradient(ellipse 120px 25px at 85% 100%, rgba(255, 68, 68, 0.4), transparent 70%);
    filter: blur(12px);
    animation: waveMotion 6s ease-in-out infinite;
  }

  @keyframes waveMotion {
    0%, 100% { transform: translateX(0) scale(1); }
    50% { transform: translateX(15px) scale(1.05); }
  }

  /* ===== PREMIUM LAYOUT ===== */
  .legal-wrap {
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 24px 160px;
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 40px;
    position: relative;
  }

  @media (max-width: 1024px) {
    .legal-wrap {
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
    padding: 28px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    position: relative;
    overflow: hidden;
    animation: fadeInLeft 1s ease-out;
  }

  .toc::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    opacity: 0.9;
  }

  .toc::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius-large);
  }

  @keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
  }

  .toc h5 {
    margin: 0 0 20px;
    font-size: 14px;
    color: var(--accent);
    letter-spacing: 1.5px;
    font-weight: 900;
    text-transform: uppercase;
    text-shadow: var(--glow-accent);
    position: relative;
    text-align: center;
  }

  .toc h5::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    width: 60px;
    height: 3px;
    background: var(--gradient-primary);
    transform: translateX(-50%);
    border-radius: 2px;
    box-shadow: var(--glow-primary);
  }

  .toc a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 16px 18px;
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 700;
    font-size: 14px;
    transition: all 0.4s ease;
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
    background: linear-gradient(90deg, transparent, rgba(255, 68, 68, 0.2), transparent);
    transition: left 0.6s ease;
  }

  .toc a .nav-icon {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--text-muted);
    transition: all 0.4s ease;
    box-shadow: 0 0 10px rgba(255, 68, 68, 0.3);
    position: relative;
  }

  .toc a .nav-icon::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 6px;
    height: 6px;
    background: var(--accent);
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.3s ease;
  }

  .toc a.active {
    background: rgba(255, 68, 68, 0.2);
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: var(--glow-accent);
    transform: translateX(8px);
  }

  .toc a.active .nav-icon {
    background: var(--accent);
    box-shadow: var(--glow-accent);
  }

  .toc a.active .nav-icon::after {
    transform: translate(-50%, -50%) scale(1);
  }

  .toc a:hover {
    transform: translateX(6px) translateY(-2px);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border-color: var(--accent);
    color: var(--text-primary);
    background: rgba(255, 68, 68, 0.15);
  }

  .toc a:hover::before {
    left: 100%;
  }

  .toc a:hover .nav-icon {
    background: var(--accent);
    box-shadow: var(--glow-accent);
    transform: scale(1.2);
  }

  .toc .note {
    margin-top: 20px;
    padding: 16px;
    font-size: 13px;
    color: var(--text-muted);
    text-align: center;
    background: rgba(255, 68, 68, 0.1);
    border-radius: 10px;
    border: 1px solid var(--glass-border);
  }

  .toc .note a {
    color: var(--accent);
    font-weight: 700;
    margin: 0;
    padding: 0;
    background: none;
    border: none;
    text-decoration: underline;
  }

  .toc .note a:hover {
    transform: none;
    box-shadow: none;
  }

  /* ===== PREMIUM CONTENT STYLING ===== */
  .content > .card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 40px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    position: relative;
    overflow: hidden;
    margin-bottom: 40px;
    animation: fadeInRight 1s ease-out;
  }

  .content > .card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    opacity: 0.9;
  }

  .content > .card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius-large);
  }

  @keyframes fadeInRight {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
  }

  .section {
    position: relative;
    margin-bottom: 48px;
    scroll-margin-top: 120px;
  }

  h2.section {
    margin: 48px 0 28px;
    font-size: 32px;
    font-weight: 900;
    color: var(--accent);
    display: flex;
    align-items: center;
    gap: 20px;
    text-shadow: var(--glow-accent);
    position: relative;
    animation: fadeInUp 0.8s ease-out;
  }

  h2.section::before {
    content: '';
    position: absolute;
    left: -32px;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 100%;
    background: var(--gradient-primary);
    border-radius: 3px;
    box-shadow: var(--glow-primary);
  }

  h2.section::after {
    content: '';
    flex: 1;
    height: 3px;
    background: linear-gradient(90deg, var(--accent) 0%, transparent 100%);
    border-radius: 2px;
    opacity: 0.6;
  }

  .anchor-btn {
    opacity: 0;
    transform: translateY(4px);
    transition: all 0.3s ease;
    border: 2px solid var(--glass-border);
    border-radius: 8px;
    padding: 8px 16px;
    font-size: 12px;
    color: var(--text-secondary);
    cursor: pointer;
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    font-weight: 700;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
  }

  .section:hover .anchor-btn {
    opacity: 1;
    transform: translateY(-50%);
  }

  .anchor-btn:hover {
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: var(--glow-accent);
    transform: translateY(-50%) scale(1.05);
  }

  p, li {
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 16px;
    margin-bottom: 16px;
  }

  ul {
    padding-left: 28px;
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
    font-weight: 800;
  }

  .info-strip {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin: 32px 0;
  }

  .chip {
    display: flex;
    align-items: center;
    gap: 20px;
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow-soft);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
  }

  .chip::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0.7;
  }

  .chip:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border-color: var(--accent);
  }

  .chip .dot {
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: var(--accent);
    box-shadow: var(--glow-accent);
    animation: chipPulse 3s ease-in-out infinite;
    position: relative;
  }

  .chip .dot::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 8px;
    height: 8px;
    background: var(--text-primary);
    border-radius: 50%;
    transform: translate(-50%, -50%);
  }

  @keyframes chipPulse {
    0%, 100% { box-shadow: var(--glow-accent); }
    50% { box-shadow: 0 0 40px rgba(255, 68, 68, 0.8); }
  }

  .chip b {
    color: var(--text-primary);
    font-weight: 800;
    font-size: 16px;
  }

  .chip small {
    color: var(--text-secondary);
    font-size: 14px;
  }

  /* ===== PREMIUM CALLOUT BOXES ===== */
  .callout {
    display: flex;
    gap: 24px;
    align-items: flex-start;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 32px;
    box-shadow: var(--shadow-strong), var(--glow-primary);
    margin: 32px 0;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.8s ease-out;
  }

  .callout::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    opacity: 0.9;
  }

  .callout::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius-large);
  }

  .callout .ico {
    height: 56px;
    width: 56px;
    flex: 0 0 56px;
    border-radius: 16px;
    display: grid;
    place-items: center;
    font-weight: 900;
    color: var(--text-primary);
    background: var(--gradient-primary);
    box-shadow: var(--shadow-strong), var(--glow-primary);
    font-size: 20px;
    position: relative;
    overflow: hidden;
  }

  .callout .ico::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
    animation: iconShine 4s ease-in-out infinite;
  }

  @keyframes iconShine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
  }

  .callout p {
    color: var(--text-secondary);
    margin-bottom: 16px;
    line-height: 1.7;
  }

  .callout ul {
    margin: 16px 0;
  }

  .callout li {
    color: var(--text-secondary);
    margin-bottom: 10px;
  }

  .callout a {
    font-weight: 800;
    color: var(--accent);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
  }

  .callout a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent);
    transition: width 0.3s ease;
  }

  .callout a:hover {
    color: var(--accent-bright);
    text-shadow: var(--glow-accent);
  }

  .callout a:hover::after {
    width: 100%;
  }

  .callout .muted {
    color: var(--text-muted);
    font-size: 14px;
    font-style: italic;
    margin-top: 16px;
  }

  /* ===== PREMIUM CONTENT CARDS ===== */
  .content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
    margin: 32px 0;
  }

  .definition-card, .feature-card, .security-card, .payment-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 28px;
    box-shadow: var(--shadow-strong);
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.8s ease-out;
  }

  .definition-card::before, .feature-card::before, .security-card::before, .payment-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    opacity: 0.8;
  }

  .definition-card::after, .feature-card::after, .security-card::after, .payment-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius-large);
  }

  .definition-card:hover, .feature-card:hover, .security-card:hover, .payment-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-intense), var(--glow-intense);
    border-color: var(--accent);
  }

  .definition-card h4, .feature-card h4, .security-card h4, .payment-card h4 {
    margin: 0 0 20px 0;
    font-size: 20px;
    font-weight: 900;
    color: var(--accent);
    text-shadow: var(--glow-accent);
    position: relative;
  }

  .definition-card h4::after, .feature-card h4::after, .security-card h4::after, .payment-card h4::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--gradient-accent);
    border-radius: 2px;
  }

  .feature-grid, .security-grid, .payment-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin: 32px 0;
  }

  .feature-list, .price-features, .payment-methods, .process-steps, .security-features {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
  }

  .feature-tag, .price-tag, .method-tag, .step-tag, .security-tag {
    background: var(--gradient-accent);
    color: var(--text-primary);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    box-shadow: var(--shadow-soft);
    border: 1px solid var(--glass-border);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .feature-tag::before, .price-tag::before, .method-tag::before, .step-tag::before, .security-tag::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
  }

  .feature-tag:hover, .price-tag:hover, .method-tag:hover, .step-tag:hover, .security-tag:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: var(--shadow-strong);
  }

  .feature-tag:hover::before, .price-tag:hover::before, .method-tag:hover::before, .step-tag:hover::before, .security-tag:hover::before {
    left: 100%;
  }

  .feature-card ul {
    margin: 20px 0 0 0;
    padding: 0;
    list-style: none;
  }

  .feature-card li {
    margin: 16px 0;
    padding-left: 24px;
    color: var(--text-secondary);
    line-height: 1.7;
    position: relative;
  }

  .feature-card li::before {
    content: '🔹';
    position: absolute;
    left: 0;
    top: 0;
    color: var(--accent);
    font-size: 14px;
  }

  .callout-box {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius-large);
    padding: 32px;
    margin: 40px 0;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.8s ease-out;
  }

  .callout-box::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius-large);
  }

  .callout-box.warning {
    border-color: #ff6b6b;
    box-shadow: 0 0 40px rgba(255, 107, 107, 0.4);
  }

  .callout-box.warning::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff6b6b, #ff8e8e);
  }

  .callout-box.info {
    border-color: #4ecdc4;
    box-shadow: 0 0 40px rgba(78, 205, 196, 0.4);
  }

  .callout-box.info::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #4ecdc4, #6fd4cc);
  }

  .callout-box.success {
    border-color: #51cf66;
    box-shadow: 0 0 40px rgba(81, 207, 102, 0.4);
  }

  .callout-box.success::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #51cf66, #72d687);
  }

  .callout-box h4 {
    margin: 0 0 20px 0;
    font-size: 20px;
    font-weight: 900;
    color: var(--accent);
    text-shadow: var(--glow-accent);
  }

  /* ===== ENHANCED FAQ SECTION ===== */
  .faq {
    margin-top: 32px;
  }

  .faq details {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 2px solid var(--glass-border);
    border-radius: var(--radius);
    margin-bottom: 16px;
    box-shadow: var(--shadow-soft);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
  }

  .faq details::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    z-index: -1;
    border-radius: var(--radius);
  }

  .faq details[open] {
    box-shadow: var(--shadow-strong), var(--glow-primary);
    border-color: var(--accent);
    transform: translateY(-2px);
  }

  .faq details[open]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0.9;
  }

  .faq summary {
    cursor: pointer;
    list-style: none;
    padding: 24px 28px;
    font-weight: 800;
    color: var(--text-primary);
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.3s ease;
  }

  .faq summary::-webkit-details-marker {
    display: none;
  }

  .faq summary::before {
    content: '+';
    background: var(--gradient-primary);
    color: var(--text-primary);
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    font-size: 20px;
    transition: all 0.4s ease;
    box-shadow: var(--glow-primary);
    flex-shrink: 0;
  }

  .faq details[open] summary::before {
    content: '−';
    transform: rotate(180deg) scale(1.1);
    background: var(--gradient-accent);
  }

  .faq summary:hover {
    color: var(--accent);
    text-shadow: var(--glow-accent);
  }

  .faq .ans {
    padding: 0 28px 28px;
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 15px;
    animation: fadeInUp 0.3s ease-out;
  }

  /* ===== PREMIUM SCROLL TO TOP BUTTON ===== */
  .scroll-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px) scale(0.8);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1000;
    box-shadow: 
      0 10px 30px rgba(139, 0, 0, 0.4),
      0 4px 15px rgba(0, 0, 0, 0.3),
      inset 0 1px 0 rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px);
    overflow: hidden;
  }

  .scroll-to-top::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
  }

  .scroll-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    animation: scrollButtonFloat 3s ease-in-out infinite;
  }

  @keyframes scrollButtonFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-8px) scale(1.05); }
  }

  .scroll-to-top:hover {
    transform: translateY(-6px) scale(1.15);
    box-shadow: 
      0 15px 40px rgba(139, 0, 0, 0.5),
      0 6px 20px rgba(0, 0, 0, 0.4),
      inset 0 1px 0 rgba(255, 255, 255, 0.3);
    background: linear-gradient(135deg, var(--accent), #ff6666);
  }

  .scroll-to-top:hover::before {
    transform: translateX(100%);
  }

  .scroll-to-top:active {
    transform: translateY(-3px) scale(1.1);
    transition: all 0.1s ease;
  }

  .scroll-to-top svg {
    width: 1.5rem;
    height: 1.5rem;
    transition: all 0.3s ease;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
  }

  .scroll-to-top:hover svg {
    transform: translateY(-3px);
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.4));
  }

  /* ===== SCROLL BUTTON RESPONSIVE ===== */
  @media (max-width: 768px) {
    .scroll-to-top {
      bottom: 1.5rem;
      right: 1.5rem;
      width: 3.5rem;
      height: 3.5rem;
    }
    
    .scroll-to-top svg {
      width: 1.2rem;
      height: 1.2rem;
    }
  }

  /* ===== PERFORMANCE & ACCESSIBILITY ===== */
  .reduce-motion .floating-particles,
  .reduce-motion .floating-shape,
  .reduce-motion .reading-progress::after {
    display: none !important;
  }

  .reduce-motion * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }

  /* ===== PRINT STYLES ===== */
  @media print {
    .floating-particles,
    .floating-shape,
    .scroll-to-top,
    .reading-progress {
      display: none !important;
    }
    
    .legal-hero {
      background: white !important;
      color: black !important;
    }
    
    .toc {
      break-inside: avoid;
    }
    
    .card {
      break-inside: avoid;
      margin-bottom: 1rem;
    }
  }

  /* ===== ENHANCED RESPONSIVE DESIGN ===== */
  @media (max-width: 480px) {
    .floating-particles .particle:nth-child(n+7) {
      display: none;
    }
    
    .floating-shape {
      opacity: 0.1;
      transform: scale(0.7);
    }
    
    .legal-hero {
      min-height: 50vh;
      padding: 2rem 0;
    }
    
    .toc {
      position: static;
      width: 100%;
      margin-bottom: 2rem;
    }
    
    .legal-wrap {
      flex-direction: column;
    }
  }
    border-color: var(--accent);
    color: var(--text-primary);
    box-shadow: var(--shadow-intense), var(--glow-intense);
  }

  /* ===== RESPONSIVE DESIGN ===== */
  @media (max-width: 768px) {
    .legal-hero .inner {
      padding: 80px 20px 60px;
    }

    .legal-wrap {
      padding: 32px 20px 120px;
    }

    .content > .card {
      padding: 28px;
    }

    .toc {
      position: static;
      margin-bottom: 32px;
    }

    .info-strip {
      grid-template-columns: 1fr;
    }

    .floating-shape {
      display: none;
    }

    .content-grid {
      grid-template-columns: 1fr;
    }

    .feature-grid, .security-grid, .payment-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 480px) {
    .legal-hero h1 {
      font-size: 36px;
    }

    .content > .card {
      padding: 24px;
    }

    .callout {
      flex-direction: column;
      text-align: center;
    }

    .btn-top {
      right: 20px;
      bottom: 20px;
      height: 56px;
      width: 56px;
      font-size: 20px;
    }
  }

  /* ===== UTILITY CLASSES ===== */
  .hidden {
    display: none !important;
  }

  /* ===== PERFORMANCE OPTIMIZATIONS ===== */
  @media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
    }
  }
</style>
<!-- Reading Progress Bar -->
<div class="reading-progress" id="progress"></div>

<!-- Floating Particles System -->
<div class="floating-particles">
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
</div>

<!-- Floating Geometric Shapes -->
<div class="floating-shape shape-1"></div>
<div class="floating-shape shape-2"></div>
<div class="floating-shape shape-3"></div>
<div class="floating-shape shape-4"></div>
<div class="floating-shape shape-5"></div>

<section class="legal-hero">
  <div class="inner">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="{{ url('/') }}">🏠 Beranda</a> 
      <span>⚡</span> 
      <span>📋 Ketentuan Layanan</span>
    </nav>
    <span class="kicker">
      ⚖️ LEGAL — TALIREJEKI.COM ⚖️
    </span>
    <h1>🏛️ Ketentuan Layanan</h1>
    <div class="meta">
      🏭 {{ config('app.name', 'Tali Rejeki') }} — Distributor Insulasi Industri Premium • 🗓️ Berlaku sejak: {{ now()->format('d F Y') }} • ⏱️ <span id="readTime">~8 menit baca</span>
    </div>
  </div>
  <div class="wave"></div>
</section>

<div class="legal-wrap">
  <!-- Enhanced Glass Morphism TOC -->
  <aside class="toc" aria-label="Daftar Isi">
    <h5>🧭 NAVIGASI PREMIUM</h5>
    <a href="#definisi" class="nav-item">
      <span class="nav-icon">📝</span>
      <span class="nav-text">Definisi & Terminologi</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#ruang-lingkup" class="nav-item">
      <span class="nav-icon">🎯</span>
      <span class="nav-text">Ruang Lingkup Layanan</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#akun" class="nav-item">
      <span class="nav-icon">🔐</span>
      <span class="nav-text">Akun & Keamanan</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#pemesanan" class="nav-item">
      <span class="nav-icon">🛒</span>
      <span class="nav-text">Pemesanan & Pembayaran</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#pengiriman" class="nav-item">
      <span class="nav-icon">🚚</span>
      <span class="nav-text">Pengiriman & Logistik</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#retur" class="nav-item">
      <span class="nav-icon">↩️</span>
      <span class="nav-text">Retur & Garansi</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#hki" class="nav-item">
      <span class="nav-icon">🏛️</span>
      <span class="nav-text">Kekayaan Intelektual</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#larangan" class="nav-item">
      <span class="nav-icon">⛔</span>
      <span class="nav-text">Larangan Penggunaan</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#batasan" class="nav-item">
      <span class="nav-icon">⚖️</span>
      <span class="nav-text">Batasan Tanggung Jawab</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#kepatuhan" class="nav-item">
      <span class="nav-icon">✅</span>
      <span class="nav-text">Kepatuhan & Keselamatan</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#tautan" class="nav-item">
      <span class="nav-icon">🔗</span>
      <span class="nav-text">Tautan Pihak Ketiga</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#perubahan" class="nav-item">
      <span class="nav-icon">🔄</span>
      <span class="nav-text">Perubahan Ketentuan</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#hukum" class="nav-item">
      <span class="nav-icon">🏛️</span>
      <span class="nav-text">Hukum yang Berlaku</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#sengketa" class="nav-item">
      <span class="nav-icon">🤝</span>
      <span class="nav-text">Penyelesaian Sengketa</span>
      <span class="nav-indicator">→</span>
    </a>
    <a href="#kontak" class="nav-item">
      <span class="nav-icon">📞</span>
      <span class="nav-text">Kontak Legal</span>
      <span class="nav-indicator">→</span>
    </a>
    
    <div class="toc-actions">
      <p class="note">💎 Premium Document</p>
      <a href="{{ asset('docs/ketentuan-layanan.pdf') }}" class="toc-download">
        <span class="download-icon">💾</span>
        <span>Unduh PDF</span>
      </a>
    </div>
    
    <div class="toc-stats">
      <div class="stat-item">
        <span class="stat-value">15</span>
        <span class="stat-label">Sections</span>
      </div>
      <div class="stat-item">
        <span class="stat-value">~8min</span>
        <span class="stat-label">Read Time</span>
      </div>
      <div class="stat-item">
        <span class="stat-value">v2.1</span>
        <span class="stat-label">Version</span>
      </div>
    </div>
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

    <h2 id="ruang-lingkup" class="section">🎯 2. RUANG LINGKUP LAYANAN</h2>
    <div class="feature-grid">
      <div class="feature-card">
        <h4>🏭 DISTRIBUSI MATERIAL PREMIUM</h4>
        <ul>
          <li>🔹 Material insulasi industri berkualitas tinggi (Nitrile Rubber, Glasswool, Rockwool)</li>
          <li>🔹 Aksesoris HVAC dan komponen sistem pendingin/pemanas</li>
          <li>🔹 Produk terkait proyek konstruksi dan infrastruktur</li>
          <li>🔹 Material khusus sesuai spesifikasi teknis proyek</li>
        </ul>
      </div>
      
      <div class="feature-card">
        <h4>💼 LAYANAN PROFESIONAL</h4>
        <ul>
          <li>🔹 Pemberian penawaran harga (quotation) komprehensif dan kompetitif</li>
          <li>🔹 Dukungan teknis dasar produk dan konsultasi aplikasi</li>
          <li>🔹 Koordinasi logistik dan pengiriman nasional</li>
          <li>🔹 Layanan purna jual dan dukungan pelanggan</li>
        </ul>
      </div>
      
      <div class="feature-card">
        <h4>🔄 FLEKSIBILITAS LAYANAN</h4>
        <ul>
          <li>🔹 Adaptasi sesuai ketersediaan stok dan permintaan pasar</li>
          <li>🔹 Penyesuaian kebijakan vendor dan regulasi industri</li>
          <li>🔹 Pengembangan layanan berkelanjutan</li>
          <li>🔹 Customisasi solusi untuk kebutuhan khusus</li>
        </ul>
      </div>
    </div>
    
    <div class="callout-box info">
      <h4>🚀 KOMITMEN KUALITAS</h4>
      <p>Kami berkomitmen menyediakan material insulasi dan aksesoris HVAC terbaik dengan standar industri tertinggi, didukung layanan profesional dan pengiriman yang dapat diandalkan ke seluruh Indonesia.</p>
    </div>

    <h2 id="akun" class="section">🔐 3. AKUN & KEAMANAN</h2>
    <div class="security-grid">
      <div class="security-card">
        <h4>👤 PENDAFTARAN AKUN</h4>
        <p>Fitur tertentu memerlukan akun terdaftar untuk akses penuh ke katalog premium, riwayat pemesanan, dan penawaran khusus untuk material insulasi industri.</p>
        <div class="feature-list">
          <span class="feature-tag">✅ Akses Katalog Premium</span>
          <span class="feature-tag">✅ Riwayat Transaksi</span>
          <span class="feature-tag">✅ Penawaran Eksklusif</span>
        </div>
      </div>
      
      <div class="security-card">
        <h4>🛡️ KERAHASIAAN KREDENSIAL</h4>
        <p>Anda wajib menjaga kerahasiaan username, password, dan informasi akun lainnya. Gunakan password yang kuat dan unik untuk melindungi akun Anda.</p>
        <div class="feature-list">
          <span class="feature-tag">🔒 Password Kuat</span>
          <span class="feature-tag">🔒 Informasi Pribadi</span>
          <span class="feature-tag">🔒 Akses Terbatas</span>
        </div>
      </div>
      
      <div class="security-card">
        <h4>⚖️ TANGGUNG JAWAB AKUN</h4>
        <p>Semua aktivitas yang terjadi melalui akun Anda, termasuk pemesanan material, quotation, dan transaksi keuangan menjadi tanggung jawab penuh pemilik akun.</p>
        <div class="feature-list">
          <span class="feature-tag">📋 Pemesanan</span>
          <span class="feature-tag">📋 Transaksi</span>
          <span class="feature-tag">📋 Komunikasi</span>
        </div>
      </div>
      
      <div class="security-card">
        <h4>🚨 PELAPORAN INSIDEN</h4>
        <p>Segera hubungi tim support kami jika mencurigai akses tidak sah, aktivitas mencurigakan, atau potensi pelanggaran keamanan pada akun Anda.</p>
        <div class="feature-list">
          <span class="feature-tag">📞 Hotline 24/7</span>
          <span class="feature-tag">📞 Respons Cepat</span>
          <span class="feature-tag">📞 Investigasi Menyeluruh</span>
        </div>
      </div>
    </div>
    
    <div class="callout-box warning">
      <h4>🔐 TIPS KEAMANAN AKUN</h4>
      <p>Selalu logout setelah selesai menggunakan platform, jangan membagikan kredensial akun, dan perbarui informasi kontak secara berkala untuk menjaga keamanan optimal.</p>
    </div>

    <h2 id="pemesanan" class="section">🛒 4. PEMESANAN & PEMBAYARAN</h2>
    <div class="payment-grid">
      <div class="payment-card">
        <h4>💰 STRUKTUR HARGA</h4>
        <p>Harga material insulasi dan aksesoris HVAC bersifat dinamis mengikuti kondisi pasar. Harga final yang mengikat tercantum pada quotation resmi dan invoice yang kami terbitkan.</p>
        <div class="price-features">
          <span class="price-tag">📊 Harga Kompetitif</span>
          <span class="price-tag">📊 Update Real-time</span>
          <span class="price-tag">📊 Quotation Resmi</span>
        </div>
      </div>
      
      <div class="payment-card">
        <h4>💳 METODE PEMBAYARAN</h4>
        <p>Pembayaran dapat dilakukan melalui transfer bank atau payment gateway yang tersedia sesuai instruksi pada dokumen pemesanan untuk kemudahan dan keamanan transaksi.</p>
        <div class="payment-methods">
          <span class="method-tag">🏦 Transfer Bank</span>
          <span class="method-tag">🏦 Payment Gateway</span>
          <span class="method-tag">🏦 E-Wallet</span>
        </div>
      </div>
      
      <div class="payment-card">
        <h4>📋 PROSES PEMESANAN</h4>
        <p>Pemesanan material insulasi dan HVAC melalui sistem terintegrasi dengan konfirmasi otomatis, tracking real-time, dan dokumentasi lengkap untuk setiap tahap proses.</p>
        <div class="process-steps">
          <span class="step-tag">1️⃣ Inquiry</span>
          <span class="step-tag">2️⃣ Quotation</span>
          <span class="step-tag">3️⃣ Payment</span>
          <span class="step-tag">4️⃣ Delivery</span>
        </div>
      </div>
      
      <div class="payment-card">
        <h4>🔒 KEAMANAN TRANSAKSI</h4>
        <p>Semua transaksi dilindungi dengan enkripsi SSL, verifikasi multi-layer, dan sistem monitoring fraud untuk menjamin keamanan data finansial Anda.</p>
        <div class="security-features">
          <span class="security-tag">🛡️ SSL Encryption</span>
          <span class="security-tag">🛡️ Fraud Detection</span>
          <span class="security-tag">🛡️ Secure Gateway</span>
        </div>
      </div>
    </div>
    
    <div class="callout-box success">
      <h4>✅ JAMINAN PEMBAYARAN</h4>
      <p>Kami menjamin keamanan setiap transaksi pembayaran material insulasi dan HVAC dengan sistem yang tersertifikasi internasional dan dukungan customer service 24/7.</p>
    </div>
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
          <li>Email: <a href="mailto:talirejeki@gmail.com">talirejeki@gmail.com</a></li>
          <li>Telepon/WhatsApp: 0813 1682 6959</li>
          <li>Alamat: JL. RAYA TARUMAJAYA NO. 11 RT 001 RW 029 DUSUN III DESA SETIA ASIH KEC. TARUMAJAYA KAB. BEKASI 17215</li>
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
<button class="scroll-to-top" id="scrollToTop" title="Kembali ke atas" aria-label="Kembali ke atas">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
    <path d="M7 14l5-5 5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</button>

<script>
// Premium Terms Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
  
  // ====== READING PROGRESS BAR ======
  const progressBar = document.getElementById('progress');
  const content = document.querySelector('.content');
  
  function updateProgress() {
    if (!content || !progressBar) return;
    
    const scrollTop = window.pageYOffset;
    const docHeight = document.body.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    progressBar.style.width = Math.min(100, Math.max(0, scrollPercent)) + '%';
  }
  
  window.addEventListener('scroll', updateProgress);
  
  // ====== ENHANCED TOC NAVIGATION ======
  const tocLinks = document.querySelectorAll('.toc .nav-item, .toc a[href^="#"]');
  
  tocLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        // Remove active state from all links
        tocLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        
        // Add visual feedback
        this.style.transform = 'scale(1.05)';
        setTimeout(() => {
          this.style.transform = '';
        }, 200);
        
        // Calculate offset for smooth scroll
        const offsetTop = targetElement.offsetTop - 100;
        
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
  
  // ====== ACTIVE SECTION HIGHLIGHTING ======
  const sections = document.querySelectorAll('section[id], .card[id]');
  
  function highlightActiveSection() {
    let activeSection = null;
    const scrollPos = window.pageYOffset + 100;
    
    sections.forEach(section => {
      const top = section.offsetTop;
      const bottom = top + section.offsetHeight;
      
      if (scrollPos >= top && scrollPos <= bottom) {
        activeSection = section;
      }
    });
    
    if (activeSection) {
      const activeId = activeSection.getAttribute('id');
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + activeId) {
          link.classList.add('active');
        }
      });
    }
  }
  
  window.addEventListener('scroll', highlightActiveSection);
  
  // ====== FLOATING PARTICLES ANIMATION ======
  const particles = document.querySelectorAll('.floating-particles .particle');
  
  particles.forEach((particle, index) => {
    // Random initial position
    const randomX = Math.random() * 100;
    const randomY = Math.random() * 100;
    const randomDelay = Math.random() * 5;
    const randomDuration = 15 + Math.random() * 10;
    
    particle.style.left = randomX + '%';
    particle.style.top = randomY + '%';
    particle.style.animationDelay = randomDelay + 's';
    particle.style.animationDuration = randomDuration + 's';
    
    // Random size
    const size = 4 + Math.random() * 8;
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
  });
  
  // ====== FLOATING SHAPES MOVEMENT ======
  const shapes = document.querySelectorAll('.floating-shape');
  
  shapes.forEach((shape, index) => {
    const randomDelay = Math.random() * 3;
    const randomDuration = 20 + Math.random() * 15;
    
    shape.style.animationDelay = randomDelay + 's';
    shape.style.animationDuration = randomDuration + 's';
    
    // Random starting position
    const randomX = Math.random() * 80;
    const randomY = Math.random() * 80;
    shape.style.left = randomX + '%';
    shape.style.top = randomY + '%';
  });
  
  // ====== ENHANCED SCROLL TO TOP BUTTON ======
  const scrollToTopBtn = document.getElementById('scrollToTop');
  
  if (scrollToTopBtn) {
    function toggleScrollButton() {
      const scrolled = window.pageYOffset;
      const threshold = 300;
      
      if (scrolled > threshold) {
        scrollToTopBtn.classList.add('visible');
      } else {
        scrollToTopBtn.classList.remove('visible');
      }
    }
    
    // Throttled scroll event for better performance
    let ticking = false;
    function requestTick() {
      if (!ticking) {
        requestAnimationFrame(toggleScrollButton);
        ticking = true;
        setTimeout(() => { ticking = false; }, 16);
      }
    }
    
    window.addEventListener('scroll', requestTick, { passive: true });
    
    scrollToTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      
      // Add click animation
      scrollToTopBtn.style.transform = 'translateY(-6px) scale(1.2)';
      
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      
      // Reset animation after scroll
      setTimeout(() => {
        scrollToTopBtn.style.transform = '';
      }, 300);
    });
    
    // Initialize button state
    toggleScrollButton();
  }
  
  // ====== READING TIME CALCULATOR ======
  const readTimeElement = document.getElementById('readTime');
  if (readTimeElement && content) {
    const text = content.textContent || content.innerText || '';
    const wordCount = text.trim().split(/\s+/).length;
    const readingSpeed = 200; // words per minute
    const readTime = Math.ceil(wordCount / readingSpeed);
    
    readTimeElement.textContent = `~${readTime} menit baca`;
  }
  
  // ====== INITIAL ANIMATIONS ======
  setTimeout(() => {
    document.body.classList.add('loaded');
  }, 100);
  
  // ====== PERFORMANCE OPTIMIZATIONS ======
  // Reduce motion for users who prefer it
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.body.classList.add('reduce-motion');
    
    // Disable heavy animations
    const style = document.createElement('style');
    style.textContent = `
      .reduce-motion * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
      .reduce-motion .floating-particles,
      .reduce-motion .floating-shape {
        display: none !important;
      }
    `;
    document.head.appendChild(style);
  }
  
  // ====== LOADING PERFORMANCE ======
  // Initialize animations after page load
  window.addEventListener('load', () => {
    document.body.classList.add('loaded');
    
    // Start particle animations
    const particles = document.querySelectorAll('.floating-particles .particle');
    particles.forEach((particle, index) => {
      setTimeout(() => {
        particle.style.opacity = '0.7';
      }, index * 100);
    });
  });
  
  // ====== RESPONSIVE BEHAVIOR ======
  function handleResize() {
    const isMobile = window.innerWidth <= 768;
    const particles = document.querySelectorAll('.floating-particles .particle');
    
    if (isMobile) {
      // Reduce particles on mobile
      particles.forEach((particle, index) => {
        if (index > 6) particle.style.display = 'none';
      });
    } else {
      // Show all particles on desktop
      particles.forEach(particle => {
        particle.style.display = 'block';
      });
    }
  }
  
  window.addEventListener('resize', handleResize);
  handleResize(); // Initial call
  
});
</script>
@endsection
