<?php
/**
 * Portada: landing de conversión de Grow Finance.
 *
 * El CSS y el JS van embebidos a propósito: son exclusivos de esta página
 * y así se evita una petición extra en la vista más visitada del sitio.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8" />
<!-- Google Tag Manager (mismo contenedor del sitio anterior) -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MWJHGNGC');</script>
<!-- End Google Tag Manager -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />





<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&display=swap" rel="stylesheet">

<style>
  :root {
    --black: #1B2837;
    --night: #1B2837;
    --navy: #243447;
    --deep: #131D29;
    --green: #5DD3A8;
    --green-dark: #4ABF95;
    --green-deep: #2C8C6B;
    --ink: #131D29;
    --muted: #5A6B7B;
    --line: #E5E7EB;
    --bg: #F4F6F8;
    --white: #FFFFFF;
    --whatsapp: #25D366;

    --radius-sm: 10px;
    --radius: 14px;
    --radius-lg: 22px;
    --shadow-card: 0 10px 40px -10px rgba(11,25,41,0.18);
    --shadow-soft: 0 4px 20px -8px rgba(0,0,0,0.12);
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }
  body {
    font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    color: var(--ink);
    background: var(--white);
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    font-feature-settings: "ss01", "cv11";
  }
  h1, h2, h3, h4, .wordmark, .case-metric, .stat-value, .hero h1, .features-section h2, .stats-section h2, .testimonials-section h2, .form-section h2, .final-cta-section h2, .showcase-head h2, .quote-section blockquote {
    font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    font-feature-settings: "ss01";
  }
  img, svg { max-width: 100%; display: block; }
  a { color: inherit; text-decoration: none; }
  button { font-family: inherit; cursor: pointer; }

  .container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }

  /* ============ NAV ============ */
  .nav {
    position: fixed; top: 0; left: 0; right: 0;
    z-index: 50;
    background: rgba(27,40,55,0.80);
    backdrop-filter: saturate(180%) blur(14px);
    -webkit-backdrop-filter: saturate(180%) blur(14px);
    border-bottom: 1px solid rgba(255,255,255,0.06);
    transition: background .25s;
  }
  .nav.scrolled { background: rgba(19,29,41,0.95); }
  .nav-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 18px 24px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px;
  }
  .logo {
    display: inline-flex; align-items: center;
    color: var(--white);
    text-decoration: none;
  }
  .wordmark {
    font-weight: 700;
    font-size: 30px;
    letter-spacing: -0.035em;
    line-height: 1;
    color: var(--white);
    font-family: 'Inter', sans-serif;
  }
  .wordmark.sm { font-size: 24px; }
  .nav-links {
    display: flex; align-items: center; gap: 28px;
    font-size: 14px; font-weight: 500;
    color: rgba(255,255,255,0.85);
  }
  .nav-links a:hover { color: var(--green); }
  .nav-actions {
    display: inline-flex;
    align-items: center;
    gap: 10px;
  }
  .nav-cta-outline {
    display: inline-block;
    background: transparent;
    color: var(--white);
    font-weight: 600;
    font-size: 14px;
    padding: 11px 20px;
    border-radius: 999px;
    border: 1.5px solid rgba(255,255,255,0.25);
    transition: border-color .15s, color .15s, background .15s;
  }
  .nav-cta-outline:hover {
    border-color: var(--green);
    color: var(--green);
    background: rgba(93,211,168,0.06);
  }
  .nav-cta {
    display: inline-block;
    background: var(--green);
    color: var(--black);
    font-weight: 700;
    font-size: 14px;
    padding: 12px 22px;
    border-radius: 999px;
    transition: background .15s, transform .15s;
  }
  .nav-cta:hover { background: var(--green-dark); transform: translateY(-1px); }
  .nav-toggle {
    display: none;
    background: none; border: none;
    color: var(--white);
    width: 36px; height: 36px;
    align-items: center; justify-content: center;
  }

  /* ============ BUTTONS ============ */
  .btn-cta {
    display: inline-block;
    background: var(--green);
    color: var(--black);
    font-weight: 700;
    font-size: 17px;
    padding: 20px 38px;
    border-radius: 999px;
    border: none;
    transition: transform .15s ease, background .15s ease, box-shadow .15s;
    box-shadow: 0 8px 28px -8px rgba(93,211,168,0.55);
  }
  .btn-cta:hover { transform: translateY(-2px); background: var(--green-dark); }

  /* ============ HERO ============ */
  .hero {
    position: relative;
    background: var(--black);
    color: var(--white);
    min-height: 760px;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 140px 0 60px;
  }
  .hero::before {
    content: "";
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse at 75% 50%, rgba(93,211,168,0.18), transparent 55%),
      radial-gradient(ellipse at 25% 80%, rgba(36,52,71,0.85), transparent 60%),
      linear-gradient(180deg, #131D29 0%, #1B2837 100%);
    z-index: 0;
  }
  .hero::after {
    content: "";
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 60px 60px;
    z-index: 1;
    mask-image: radial-gradient(ellipse at center, black 30%, transparent 75%);
    -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 75%);
  }
  .hero-grid {
    position: relative; z-index: 2;
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: 48px;
    align-items: center;
    width: 100%;
  }
  .hero-logo-card {
    display: inline-flex;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    padding: 18px 22px;
    border-radius: 12px;
    margin-bottom: 36px;
    align-items: center;
    gap: 12px;
    backdrop-filter: blur(8px);
  }
  .hero h1 {
    font-size: clamp(46px, 6.5vw, 92px);
    font-weight: 800;
    line-height: 0.96;
    letter-spacing: -0.028em;
    margin-bottom: 24px;
  }
  .hero h1 em { font-style: normal; color: var(--green); }
  .hero .subtitle {
    font-size: clamp(18px, 1.6vw, 24px);
    font-weight: 400;
    color: #CBD5E1;
    margin-bottom: 40px;
    max-width: 540px;
    line-height: 1.45;
  }
  .hero-trust {
    margin-top: 28px;
    font-size: 13px;
    color: rgba(255,255,255,0.6);
    display: flex; align-items: center; gap: 14px;
  }
  .hero-trust .dot { width: 8px; height: 8px; background: var(--green); border-radius: 50%; box-shadow: 0 0 12px var(--green); }

  /* Hero illustration */
  .hero-visual {
    position: relative;
    aspect-ratio: 4/5;
    border-radius: var(--radius-lg);
    overflow: hidden;
    background:
      radial-gradient(ellipse at 30% 20%, rgba(93,211,168,0.18), transparent 60%),
      linear-gradient(160deg, #243447 0%, #131D29 100%);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 30px 80px -20px rgba(0,0,0,0.6);
  }
  .hero-visual svg { width: 100%; height: 100%; }
  .hero-visual img.hero-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .hero-visual .hero-photo-overlay {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background:
      linear-gradient(180deg, rgba(19,29,41,0) 55%, rgba(19,29,41,0.55) 100%),
      radial-gradient(ellipse at 30% 20%, rgba(93,211,168,0.18), transparent 60%);
  }

  /* ============ PRESS / LOGOS ============ */
  .press {
    background: var(--black);
    padding: 36px 0 44px;
    color: var(--white);
    position: relative; z-index: 2;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .press-row {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-between;
    gap: 28px;
    overflow-x: auto;
    scrollbar-width: none;
  }
  .press-row::-webkit-scrollbar { display: none; }
  .press-row span {
    font-size: clamp(13px, 1.15vw, 17px);
    color: rgba(255,255,255,0.85);
    white-space: nowrap;
    line-height: 1;
    flex-shrink: 0;
    transition: color .2s;
  }
  .press-row span:hover { color: var(--white); }

  /* Vary typography per "logo" to mimic real brand variety */
  .press-row span:nth-child(1) {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    letter-spacing: -0.01em;
  }
  .press-row span:nth-child(2) {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    letter-spacing: -0.02em;
  }
  .press-row span:nth-child(3) {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    font-style: italic;
  }
  .press-row span:nth-child(4) {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-size: clamp(11px, 0.95vw, 14px);
  }
  .press-row span:nth-child(5) {
    font-family: 'Playfair Display', serif;
    font-weight: 500;
    font-style: italic;
  }
  .press-row span:nth-child(6) {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: clamp(13px, 1.1vw, 16px);
  }
  .press-row span:nth-child(7) {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    letter-spacing: -0.01em;
  }
  .press-row span:nth-child(8) {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 600;
    font-style: italic;
    letter-spacing: -0.01em;
  }
  @media (max-width: 768px) {
    .press-row { justify-content: flex-start; padding: 0 4px; }
  }

  /* ============ SECTIONS ============ */
  .section { padding: 130px 0; }

  .split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
  }
  .split h2 {
    font-size: clamp(38px, 4.4vw, 64px);
    font-weight: 800;
    line-height: 1.0;
    letter-spacing: -0.022em;
    margin-bottom: 32px;
  }
  .split p {
    font-size: 17px;
    color: var(--muted);
    margin-bottom: 18px;
    line-height: 1.6;
  }
  .split .btn-cta {
    margin-top: 16px;
  }
  .split-visual {
    aspect-ratio: 3/2;
    border-radius: var(--radius-lg);
    overflow: hidden;
    background:
      radial-gradient(ellipse at 70% 30%, rgba(93,211,168,0.12), transparent 60%),
      linear-gradient(150deg, #243447 0%, #131D29 100%);
    box-shadow: var(--shadow-card);
  }
  .split-visual svg { width: 100%; height: 100%; }
  .split-visual img.split-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .split-caption {
    font-size: 14px;
    color: var(--muted);
    margin-top: 18px;
    line-height: 1.5;
  }

  /* ============ FEATURES (6) ============ */
  .features-section {
    background: var(--green);
    padding: 140px 0;
    color: var(--black);
    position: relative;
    overflow: hidden;
  }
  .features-section::before {
    content: "";
    position: absolute; inset: 0;
    background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.06) 1px, transparent 0);
    background-size: 32px 32px;
    opacity: .5;
  }
  .features-section .container { position: relative; z-index: 1; }
  .features-section h2 {
    font-size: clamp(40px, 5vw, 72px);
    font-weight: 800;
    line-height: 1.02;
    letter-spacing: -0.025em;
    text-align: center;
    margin-bottom: 14px;
  }
  .features-section .lead {
    text-align: center;
    font-size: clamp(20px, 1.9vw, 28px);
    font-weight: 500;
    margin-bottom: 80px;
    color: rgba(0,0,0,0.78);
  }
  .features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 56px 40px;
  }
  .feature { text-align: left; }
  .feature-icon {
    width: 56px; height: 56px;
    background: rgba(0,0,0,0.08);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 24px;
    color: var(--black);
  }
  .feature h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.2;
    letter-spacing: -0.01em;
  }
  .feature p {
    font-size: 16px;
    line-height: 1.55;
    color: rgba(0,0,0,0.72);
  }

  /* ============ SERVICES (3 lines) — flat on teal ============ */
  .services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px 48px;
    margin-top: 64px;
  }
  .service-card {
    background: transparent;
    padding: 0;
    display: flex;
    flex-direction: column;
    position: relative;
  }
  .service-card + .service-card::before {
    content: "";
    position: absolute;
    left: -24px; top: 8px; bottom: 8px;
    width: 1px;
    background: rgba(11,29,41,0.12);
  }
  .service-icon-wrap {
    width: 54px; height: 54px;
    background: rgba(11,29,41,0.08);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 24px;
    color: var(--ink);
    transition: background .2s;
  }
  .service-card:hover .service-icon-wrap { background: rgba(11,29,41,0.14); }
  .service-card h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 18px;
    letter-spacing: -0.015em;
    line-height: 1.2;
    color: var(--ink);
  }
  .service-list { list-style: none; padding: 0; margin: 0; }
  .service-list li {
    font-size: 15px;
    color: rgba(11,29,41,0.78);
    padding: 11px 0;
    border-bottom: 1px solid rgba(11,29,41,0.15);
    display: flex;
    align-items: flex-start;
    gap: 12px;
    line-height: 1.45;
    font-weight: 500;
  }
  .service-list li:last-child { border-bottom: none; padding-bottom: 0; }
  .service-list li::before {
    content: "";
    width: 5px; height: 5px;
    background: var(--ink);
    border-radius: 50%;
    margin-top: 8px;
    flex-shrink: 0;
  }

  /* ============ METHODOLOGY tags per phase ============ */
  .fase-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 16px;
  }
  .fase-tag {
    background: var(--bg);
    border: 1px solid var(--line);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 12px;
    color: var(--muted);
    font-weight: 500;
    line-height: 1.2;
  }
  .how-lead {
    text-align: center;
    font-size: 18px;
    color: var(--muted);
    max-width: 640px;
    margin: -56px auto 64px;
    line-height: 1.6;
  }

  /* ============ QUOTE ============ */
  .quote-section {
    background: var(--black);
    color: var(--white);
    padding: 140px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .quote-section::before {
    content: "";
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse at 50% 50%, rgba(30,80,200,0.35), transparent 60%),
      #131D29;
  }
  .quote-section .container { position: relative; z-index: 2; }
  .quote-section blockquote {
    font-size: clamp(30px, 4vw, 56px);
    font-weight: 700;
    line-height: 1.15;
    letter-spacing: -0.022em;
    max-width: 1000px;
    margin: 0 auto 32px;
  }
  .quote-author {
    font-size: clamp(22px, 2.2vw, 32px);
    font-weight: 600;
    color: var(--green);
  }

  /* ============ HOW IT WORKS ============ */
  .how-section { padding: 140px 0; }
  .how-section h2 {
    text-align: center;
    font-size: clamp(40px, 5vw, 72px);
    font-weight: 800;
    letter-spacing: -0.025em;
    margin-bottom: 80px;
  }
  .step {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 80px;
    padding: 40px 0;
    align-items: start;
    border-top: 1px solid var(--line);
  }
  .step:last-child { border-bottom: 1px solid var(--line); }
  .step-num {
    font-size: 28px;
    font-weight: 500;
    color: #B8BCC4;
    letter-spacing: 0.5px;
  }
  .step-content { max-width: 680px; }
  .step-content h3 {
    font-size: clamp(26px, 2.6vw, 36px);
    font-weight: 700;
    margin-bottom: 16px;
    letter-spacing: -0.015em;
  }
  .step-content p {
    font-size: 17px;
    color: var(--muted);
    line-height: 1.6;
  }

  /* ============ STATS ============ */
  .stats-section {
    background: var(--green);
    padding: 140px 0;
    position: relative;
    overflow: hidden;
  }
  .stats-section::before {
    content: "";
    position: absolute; inset: 0;
    background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.06) 1px, transparent 0);
    background-size: 32px 32px;
    opacity: .5;
  }
  .stats-section .container { position: relative; z-index: 1; }
  .stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: start;
  }
  .stats-label {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 28px;
  }
  .stats-label::before {
    content: "";
    width: 10px; height: 10px;
    background: var(--black);
    border-radius: 50%;
  }
  .stats-section h2 {
    font-size: clamp(40px, 4.5vw, 64px);
    font-weight: 800;
    line-height: 1.02;
    letter-spacing: -0.022em;
    margin-bottom: 32px;
  }
  .stats-section .stats-copy {
    font-size: 17px;
    line-height: 1.6;
    color: rgba(0,0,0,0.78);
    max-width: 540px;
  }
  .stats-numbers {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px 56px;
  }
  .stat-item .stat-value {
    font-size: clamp(56px, 6.5vw, 96px);
    font-weight: 800;
    line-height: 1;
    letter-spacing: -0.04em;
    margin-bottom: 14px;
  }
  .stat-item .stat-text {
    font-size: 18px;
    line-height: 1.35;
    color: var(--black);
    max-width: 260px;
    font-weight: 500;
  }

  /* ============ STATS V2 — Vertical Cards with Active Highlight ============ */
  .stats-v2 {
    padding: 140px 0;
    background: var(--white);
    color: var(--ink);
    position: relative;
  }
  .stats-v2-head {
    max-width: 1280px;
    margin: 0 auto 56px;
    padding: 0 24px;
  }
  .stats-v2-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--green-deep);
    margin-bottom: 22px;
  }
  .stats-v2-eyebrow::before {
    content: "";
    width: 8px; height: 8px;
    background: var(--green);
    border-radius: 50%;
  }
  .stats-v2 h2 {
    font-size: clamp(44px, 6vw, 88px);
    font-weight: 800;
    line-height: 0.98;
    letter-spacing: -0.03em;
    text-transform: uppercase;
    color: var(--ink);
  }
  .stats-v2-list {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    flex-direction: column;
  }
  .stats-v2-row {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 80px;
    align-items: center;
    min-height: 280px;
    padding: 28px 0;
  }
  .stats-v2-card {
    display: grid;
    grid-template-columns: 130px 1fr;
    border-radius: var(--radius);
    overflow: hidden;
    min-height: 200px;
    transition: filter .5s ease;
  }
  .stats-v2-card .card-arrow {
    background: #EEF1F4;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .5s ease;
  }
  .stats-v2-card .card-arrow::before {
    content: "";
    position: absolute; inset: 0;
    background-image: repeating-linear-gradient(
      0deg,
      rgba(0,0,0,0.08) 0,
      rgba(0,0,0,0.08) 1px,
      transparent 1px,
      transparent 6px
    );
    opacity: .55;
    transition: opacity .5s ease, background-image .5s ease;
  }
  .stats-v2-card .card-arrow svg {
    position: relative;
    z-index: 1;
    width: 56px; height: 56px;
    color: #C5CCD3;
    transition: color .5s ease;
  }
  .stats-v2-card .card-body {
    background: transparent;
    color: #C5CCD3;
    padding: 28px 36px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
    transition: background .5s ease, color .5s ease;
  }
  .stats-v2-card .card-num {
    font-size: clamp(60px, 7.5vw, 104px);
    font-weight: 800;
    line-height: 0.95;
    letter-spacing: -0.045em;
    transition: color .5s ease;
  }
  .stats-v2-card .card-lbl {
    font-size: 15px;
    font-weight: 500;
    line-height: 1.35;
    max-width: 360px;
    opacity: 0;
    transition: opacity .5s ease, color .5s ease;
  }

  /* Right column: description aligned per row */
  .aside-block {
    transition: opacity .5s ease;
    opacity: 0.25;
  }
  .aside-block h3 {
    font-size: clamp(22px, 2.2vw, 30px);
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -0.015em;
    margin-bottom: 12px;
    color: var(--ink);
  }
  .aside-block p {
    font-size: 17px;
    color: var(--muted);
    line-height: 1.55;
    max-width: 420px;
  }

  /* ACTIVE state — row highlighted */
  .stats-v2-row.active .stats-v2-card .card-arrow { background: var(--green); }
  .stats-v2-row.active .stats-v2-card .card-arrow::before { opacity: .9; }
  .stats-v2-row.active .stats-v2-card .card-arrow svg { color: var(--ink); }
  .stats-v2-row.active .stats-v2-card .card-body { background: var(--ink); color: var(--white); }
  .stats-v2-row.active .stats-v2-card .card-num { color: var(--white); }
  .stats-v2-row.active .stats-v2-card .card-lbl { opacity: 1; color: rgba(255,255,255,0.7); }
  .stats-v2-row.active .aside-block { opacity: 1; }

  /* ============ TESTIMONIALS ============ */
  .testimonials-section { padding: 140px 0; }
  .testimonials-section h2 {
    font-size: clamp(40px, 5vw, 72px);
    font-weight: 800;
    line-height: 1.0;
    letter-spacing: -0.025em;
    margin-bottom: 72px;
    max-width: 680px;
  }
  .testimonials-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
  }
  .testimonial { display: flex; flex-direction: column; }
  .testimonial-media {
    aspect-ratio: 4/5;
    border-radius: var(--radius);
    margin-bottom: 22px;
    position: relative;
    overflow: hidden;
    background: linear-gradient(165deg, #2D3748 0%, #1A202C 100%);
    cursor: pointer;
    transition: transform .25s;
  }
  .testimonial-media:hover { transform: translateY(-4px); }
  .testimonial-media svg { width: 100%; height: 100%; }
  .testimonial-media .play {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 56px; height: 56px;
    background: rgba(255,255,255,0.95);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 6px 20px rgba(0,0,0,0.4);
  }
  .testimonial-media .play::after {
    content: "";
    width: 0; height: 0;
    border-left: 14px solid var(--black);
    border-top: 9px solid transparent;
    border-bottom: 9px solid transparent;
    margin-left: 4px;
  }
  .testimonial-quote {
    font-size: 16px;
    font-weight: 600;
    line-height: 1.45;
    margin-bottom: 14px;
    letter-spacing: -0.005em;
  }
  .testimonial-author {
    font-size: 14px;
    color: var(--muted);
  }

  /* ============ PRODUCT SHOWCASE ============ */
  .showcase-section {
    padding: 130px 0;
    background: var(--bg);
  }
  .showcase-head {
    text-align: center;
    max-width: 760px;
    margin: 0 auto 72px;
  }
  .showcase-head h2 {
    font-size: clamp(38px, 4.4vw, 60px);
    font-weight: 800;
    line-height: 1.02;
    letter-spacing: -0.022em;
    margin-bottom: 18px;
  }
  .showcase-head p {
    font-size: 18px;
    color: var(--muted);
    line-height: 1.55;
  }
  .showcase-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
  }
  .showcase-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--line);
    display: flex;
    flex-direction: column;
    transition: transform .25s, box-shadow .25s;
  }
  .showcase-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-card);
  }
  .showcase-visual {
    aspect-ratio: 16/10;
    background:
      radial-gradient(ellipse at 70% 30%, rgba(93,211,168,0.18), transparent 60%),
      linear-gradient(150deg, var(--navy) 0%, var(--deep) 100%);
    position: relative;
    overflow: hidden;
  }
  .showcase-visual svg { width: 100%; height: 100%; }
  .showcase-visual img.showcase-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* Tarjeta que ademas es enlace: hereda color y gana afordancia propia. */
  a.showcase-card--link {
    color: inherit;
    text-decoration: none;
  }
  .showcase-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 18px;
    font-size: 15px;
    font-weight: 700;
    color: var(--green-deep);
  }
  .showcase-cta svg {
    width: 17px;
    height: 17px;
    transition: transform .25s ease;
  }
  .showcase-card--link:hover .showcase-cta svg { transform: translateX(4px); }
  .showcase-card--link:focus-visible {
    outline: 3px solid var(--green);
    outline-offset: 3px;
  }
  @media (prefers-reduced-motion: reduce) {
    .showcase-cta svg { transition: none; }
    .showcase-card--link:hover .showcase-cta svg { transform: none; }
  }
  .showcase-body {
    padding: 28px 28px 32px;
  }
  .showcase-body .tag {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--green-deep);
    margin-bottom: 10px;
  }
  .showcase-body h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: -0.01em;
    line-height: 1.2;
  }
  .showcase-body p {
    font-size: 15px;
    color: var(--muted);
    line-height: 1.55;
  }

  /* ============ CASE STUDY ============ */
  .case-section {
    padding: 130px 0;
    background: var(--night);
    color: var(--white);
    position: relative;
    overflow: hidden;
  }
  .case-section::before {
    content: "";
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse at 80% 40%, rgba(93,211,168,0.15), transparent 60%);
    z-index: 0;
  }
  .case-section .container { position: relative; z-index: 1; }
  .case-grid {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 64px;
    align-items: center;
  }
  .case-section .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 22px;
  }
  .case-section .eyebrow::before {
    content: "";
    width: 24px; height: 1.5px;
    background: var(--green);
    display: inline-block;
  }
  .case-metric {
    font-size: clamp(80px, 11vw, 168px);
    font-weight: 800;
    line-height: 0.95;
    letter-spacing: -0.045em;
    color: var(--green);
    margin-bottom: 12px;
  }
  .case-metric-label {
    font-size: clamp(20px, 2.2vw, 28px);
    font-weight: 600;
    color: rgba(255,255,255,0.9);
    margin-bottom: 32px;
    line-height: 1.3;
  }
  .case-section blockquote {
    font-size: clamp(20px, 2vw, 26px);
    font-weight: 500;
    line-height: 1.45;
    color: #DBE2EA;
    margin-bottom: 24px;
    letter-spacing: -0.01em;
  }
  .case-author {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 32px;
  }
  .case-avatar {
    width: 52px; height: 52px;
    border-radius: 50%;
    background: linear-gradient(135deg, #243447, #131D29);
    border: 1.5px solid rgba(93,211,168,0.5);
    display: flex; align-items: center; justify-content: center;
    font-weight: 700;
    color: var(--green);
    font-size: 18px;
  }
  .case-author-info .name {
    font-weight: 700;
    font-size: 16px;
    color: var(--white);
  }
  .case-author-info .role {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
  }
  .case-stats {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 20px;
    padding-top: 28px;
    border-top: 1px solid rgba(255,255,255,0.1);
  }
  .case-stat .val {
    font-size: 26px;
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.02em;
  }
  .case-stat .lbl {
    font-size: 12px;
    color: rgba(255,255,255,0.6);
    margin-top: 4px;
  }

  /* ============ FINAL CTA ============ */
  .final-cta-section {
    padding: 120px 0;
    background: var(--green);
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .final-cta-section::before {
    content: "";
    position: absolute; inset: 0;
    background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.06) 1px, transparent 0);
    background-size: 32px 32px;
    opacity: .55;
  }
  .final-cta-section .container { position: relative; z-index: 1; }
  .final-cta-section h2 {
    font-size: clamp(40px, 5vw, 76px);
    font-weight: 800;
    line-height: 1.02;
    letter-spacing: -0.025em;
    color: var(--night);
    margin-bottom: 20px;
    max-width: 880px;
    margin-left: auto;
    margin-right: auto;
  }
  .final-cta-section p {
    font-size: clamp(18px, 1.7vw, 22px);
    color: rgba(19,29,41,0.8);
    margin-bottom: 40px;
    max-width: 640px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.5;
  }
  .btn-cta-dark {
    display: inline-block;
    background: var(--night);
    color: var(--green);
    font-weight: 700;
    font-size: 18px;
    padding: 22px 44px;
    border-radius: 999px;
    transition: transform .15s, background .15s;
    box-shadow: 0 12px 30px -8px rgba(19,29,41,0.4);
  }
  .btn-cta-dark:hover { transform: translateY(-2px); background: var(--deep); }

  /* ============ FAQ ============ */
  .faq-section {
    padding: 140px 0;
    background: var(--bg);
  }
  .faq-section h2 {
    text-align: center;
    font-size: clamp(40px, 5vw, 64px);
    font-weight: 800;
    letter-spacing: -0.025em;
    margin-bottom: 64px;
  }
  .faq-list {
    max-width: 880px;
    margin: 0 auto;
  }
  .faq-item {
    background: var(--white);
    border-radius: var(--radius);
    margin-bottom: 12px;
    overflow: hidden;
    box-shadow: var(--shadow-soft);
  }
  .faq-question {
    width: 100%;
    background: none;
    border: none;
    text-align: left;
    padding: 24px 28px;
    font-size: 18px;
    font-weight: 600;
    color: var(--ink);
    display: flex; align-items: center; justify-content: space-between;
    gap: 16px;
    line-height: 1.4;
  }
  .faq-question .chevron {
    flex-shrink: 0;
    transition: transform .25s;
    color: var(--muted);
  }
  .faq-item.open .chevron { transform: rotate(180deg); }
  .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height .35s ease;
    padding: 0 28px;
    color: var(--muted);
    font-size: 16px;
    line-height: 1.6;
  }
  .faq-item.open .faq-answer {
    max-height: 500px;
    padding-bottom: 24px;
  }

  /* ============ FORM ============ */
  .form-section {
    padding: 120px 0 80px;
    background: var(--white);
  }
  .form-section h2 {
    text-align: center;
    font-size: clamp(46px, 6vw, 92px);
    font-weight: 800;
    letter-spacing: -0.03em;
    line-height: 1;
    margin-bottom: 18px;
  }
  .form-section .lead {
    text-align: center;
    font-size: clamp(19px, 1.7vw, 24px);
    color: var(--ink);
    margin-bottom: 52px;
  }
  form.lead-form {
    max-width: 880px;
    margin: 0 auto;
  }
  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 14px;
  }
  .form-row.single { grid-template-columns: 1fr; }
  .form-row.split-phone { grid-template-columns: 220px 1fr; }
  .form-field { position: relative; }
  .form-field input,
  .form-field select,
  .form-field textarea {
    width: 100%;
    padding: 22px 20px 12px;
    border: 1.5px solid #D1D5DB;
    border-radius: 10px;
    background: #FAFBFC;
    font-size: 16px;
    font-family: inherit;
    color: var(--ink);
    transition: border-color .15s, background .15s;
  }
  .form-field select { padding: 19px 20px; }
  .form-field textarea { padding: 14px 20px; min-height: 100px; resize: vertical; }
  .form-field input:focus,
  .form-field select:focus,
  .form-field textarea:focus {
    outline: none;
    border-color: var(--night);
    background: var(--white);
  }
  .form-field input:invalid:not(:placeholder-shown) {
    border-color: #DC2626;
  }
  .form-field label.float {
    position: absolute;
    top: 18px; left: 20px;
    font-size: 14px;
    color: #9CA3AF;
    pointer-events: none;
    font-weight: 500;
    transition: top .15s, font-size .15s, color .15s;
  }
  .form-field input:focus + label.float,
  .form-field input:not(:placeholder-shown) + label.float {
    top: 7px;
    font-size: 11px;
    color: #6B7280;
    font-weight: 600;
  }
  .form-disclaimer {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.55;
    margin: 22px 0 28px;
  }
  .btn-submit {
    width: 100%;
    background: var(--green);
    color: var(--black);
    font-weight: 700;
    font-size: 19px;
    padding: 24px;
    border: none;
    border-radius: 999px;
    transition: background .15s, transform .15s, box-shadow .15s;
    box-shadow: 0 10px 30px -8px rgba(93,211,168,0.5);
  }
  .btn-submit:hover { background: var(--green-dark); transform: translateY(-1px); }
  .form-success {
    display: none;
    text-align: center;
    padding: 60px 32px;
    background: var(--bg);
    border-radius: var(--radius);
    color: var(--ink);
  }
  .form-success.visible { display: block; }
  .form-success h3 {
    font-size: 28px;
    margin-bottom: 12px;
    font-weight: 800;
  }
  .form-success p { color: var(--muted); }

  /* ============ FLOATING WHATSAPP ============ */
  .wa-float {
    position: fixed;
    bottom: 24px; right: 24px;
    width: 60px; height: 60px;
    background: var(--whatsapp);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 8px 24px rgba(37,211,102,0.4);
    z-index: 40;
    transition: transform .2s;
  }
  .wa-float:hover { transform: scale(1.08); }
  .wa-float svg { width: 30px; height: 30px; fill: white; }

  /* ============ SOCIAL FEED ============ */
  .social-section {
    padding: 110px 0;
    background: var(--bg);
    border-top: 1px solid var(--line);
  }
  .social-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 32px;
    margin-bottom: 44px;
  }
  .social-head h2 {
    font-size: clamp(32px, 3.6vw, 52px);
    font-weight: 800;
    line-height: 1.05;
    letter-spacing: -0.022em;
    color: var(--ink);
  }
  .social-handle {
    display: block;
    margin-top: 12px;
    font-size: 16px;
    color: var(--muted);
  }
  .social-cta {
    flex: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 24px;
    border-radius: 999px;
    border: 1px solid var(--ink);
    color: var(--ink);
    font-weight: 600;
    font-size: 15px;
    white-space: nowrap;
    transition: background .2s ease, color .2s ease;
  }
  .social-cta:hover { background: var(--ink); color: var(--white); }
  .social-cta svg { width: 18px; height: 18px; }

  /* Placeholder shown until the Behold widget renders */
  .social-fallback {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }
  .social-tile {
    aspect-ratio: 1;
    border-radius: var(--radius);
    background: var(--white);
    border: 1px solid var(--line);
    display: grid;
    place-items: center;
    color: var(--muted);
    transition: transform .25s ease, box-shadow .25s ease;
  }
  .social-tile:hover { transform: translateY(-4px); box-shadow: var(--shadow-card); }
  .social-tile svg { width: 30px; height: 30px; opacity: .35; }

  /* ============ FOOTER ============ */
  footer {
    background: var(--black);
    color: rgba(255,255,255,0.65);
    padding: 80px 24px 40px;
    font-size: 14px;
    line-height: 1.7;
  }
  .footer-grid {
    max-width: 1280px;
    margin: 0 auto 40px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 48px;
  }
  .footer-grid h4 {
    color: var(--white);
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 18px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
  }
  .footer-grid a { display: block; padding: 4px 0; }
  .footer-grid a:hover { color: var(--green); }
  .footer-social {
    display: flex; gap: 10px;
    margin-top: 20px;
  }
  .footer-social a {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.1);
    display: inline-flex !important;
    align-items: center; justify-content: center;
    padding: 0 !important;
    transition: background .2s, transform .2s, border-color .2s;
  }
  .footer-social a:hover {
    background: var(--green);
    border-color: var(--green);
    color: var(--night);
    transform: translateY(-2px);
  }
  .footer-social svg { width: 16px; height: 16px; }
  .footer-bottom {
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 32px;
    border-top: 1px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap;
    font-size: 13px;
    opacity: .85;
  }
  .footer-bottom a:hover { color: var(--green); }
  @media (max-width: 600px) {
    .footer-bottom { flex-direction: column; text-align: center; }
  }

  /* ============ MOVIMIENTO LIGADO AL SCROLL ============
     El desplazamiento y la opacidad los calcula el JS en cada fotograma
     segun donde este el elemento, en vez de una transicion de duracion
     fija. Por eso los elementos siguen moviendose mientras se hace
     scroll, en lugar de encajar de golpe y quedarse quietos.

     El estado inicial oculto se aplica solo si el JS arranco (clase
     "motion" en <html>). Sin JS, la pagina se ve entera. */
  html.motion .reveal { opacity: 0; }
  html.motion .reveal-scale { opacity: 0; }
  .reveal, .reveal-scale { will-change: transform, opacity; }

  /* Las imagenes con parallax se amplian un poco para que al
     desplazarse dentro de su marco no asomen los bordes. */
  html.motion .hero-photo,
  html.motion .split-photo { transform: scale(1.07); }

  /* Scale-in variant for big metrics */
  .reveal-scale {
    opacity: 0;
    transform: scale(0.86);
    transition: opacity .9s cubic-bezier(0.22, 1, 0.36, 1),
                transform .9s cubic-bezier(0.22, 1, 0.36, 1);
  }
  .reveal-scale.in {
    opacity: 1;
    transform: scale(1);
  }

  /* Parallax hero visual on scroll */
  .hero-visual {
    transition: transform .15s linear;
    will-change: transform;
  }

  /* Animated trend line in hero SVG */
  .hero-visual .trend-line {
    stroke-dasharray: 600;
    stroke-dashoffset: 600;
    transition: stroke-dashoffset 2s cubic-bezier(0.22, 1, 0.36, 1);
    transition-delay: 600ms;
  }
  .reveal.in .trend-line,
  .hero-visual.in .trend-line { stroke-dashoffset: 0; }

  /* Bar growth animation */
  .hero-visual rect.bar {
    transform-origin: bottom;
    transform: scaleY(0);
    transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1);
  }
  .hero-visual.in rect.bar { transform: scaleY(1); }
  .hero-visual.in rect.bar:nth-of-type(1) { transition-delay: 200ms; }
  .hero-visual.in rect.bar:nth-of-type(2) { transition-delay: 280ms; }
  .hero-visual.in rect.bar:nth-of-type(3) { transition-delay: 360ms; }
  .hero-visual.in rect.bar:nth-of-type(4) { transition-delay: 440ms; }
  .hero-visual.in rect.bar:nth-of-type(5) { transition-delay: 520ms; }
  .hero-visual.in rect.bar:nth-of-type(6) { transition-delay: 600ms; }

  /* Number counter prep */
  .counter { display: inline-block; }

  @media (prefers-reduced-motion: reduce) {
    .reveal, .reveal-scale { opacity: 1; transform: none; transition: none; }
    .hero-visual .trend-line { stroke-dashoffset: 0; transition: none; }
    .hero-visual rect.bar { transform: none; transition: none; }
    html { scroll-behavior: auto; }
  }

  /* ============ RESPONSIVE ============ */
  @media (max-width: 1024px) {
    .services-grid { grid-template-columns: 1fr; gap: 48px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .service-card + .service-card::before { display: none; }
    .service-card + .service-card { padding-top: 36px; border-top: 1px solid rgba(11,29,41,0.15); }
    .showcase-grid { grid-template-columns: 1fr 1fr; }
    .case-grid { grid-template-columns: 1fr; gap: 48px; }
    .case-grid > div:last-child { aspect-ratio: 16/10 !important; max-height: 360px; }
  }
  @media (max-width: 968px) {
    .nav-links { display: none; }
    .nav-cta-outline { display: none; }
    .nav-cta { padding: 10px 18px; font-size: 13px; }
    .stats-v2-row { grid-template-columns: 1fr; gap: 20px; min-height: auto; padding: 20px 0; }
    .stats-v2-row .aside-block { opacity: 1; }
    .stats-v2 h2 { font-size: clamp(40px, 8vw, 64px); }
    .section, .features-section, .stats-section, .quote-section, .how-section, .testimonials-section, .faq-section, .form-section, .showcase-section, .case-section, .final-cta-section, .press { padding: 72px 0; }
    .press { padding: 32px 0 40px; }
    .hero-grid, .split, .stats-grid { grid-template-columns: 1fr; gap: 48px; }
    .features-grid { grid-template-columns: 1fr 1fr; gap: 40px 28px; }
    .testimonials-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
    .stats-numbers { grid-template-columns: 1fr 1fr; gap: 32px; }
    .step { grid-template-columns: 1fr; gap: 12px; padding: 32px 0; }
    .step-num { font-size: 20px; }
    .hero { min-height: auto; padding: 110px 0 60px; }
    .hero-visual { max-width: 520px; margin: 0 auto; aspect-ratio: 4/4.5; }
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
    .case-metric { line-height: 0.95; }
    .case-stats { gap: 16px; }
    .case-stat .val { font-size: 22px; }
  }
  @media (max-width: 720px) {
    .showcase-grid { grid-template-columns: 1fr; gap: 20px; }
    .showcase-card { max-width: 480px; margin: 0 auto; }
    .social-section { padding: 80px 0; }
    .social-head { flex-direction: column; align-items: flex-start; gap: 20px; margin-bottom: 32px; }
    .social-fallback { grid-template-columns: 1fr 1fr; gap: 14px; }
  }
  @media (max-width: 600px) {
    .container { padding: 0 18px; }
    .features-grid { grid-template-columns: 1fr; }
    .testimonials-grid { grid-template-columns: 1fr; }
    .stats-numbers { grid-template-columns: 1fr; gap: 28px; }
    .form-row, .form-row.split-phone { grid-template-columns: 1fr; }
    .nav-inner { padding: 12px 18px; gap: 12px; }
    .wordmark { font-size: 22px; }
    .wordmark.sm { font-size: 20px; }
    .nav-cta { padding: 9px 14px; font-size: 12px; }
    .footer-grid { grid-template-columns: 1fr; }
    .btn-cta { width: 100%; text-align: center; font-size: 16px; padding: 18px 28px; }
    .btn-cta-dark { width: 100%; text-align: center; font-size: 16px; padding: 20px 28px; }
    .wa-float { width: 54px; height: 54px; bottom: 18px; right: 18px; }
    .hero { padding: 96px 0 48px; }
    .hero h1 { line-height: 0.98; }
    .hero .subtitle { margin-bottom: 32px; }
    .hero-logo-card { padding: 14px 16px; margin-bottom: 24px; }
    .hero-trust { font-size: 12px; }
    .features-section, .stats-section, .quote-section, .how-section, .testimonials-section, .faq-section, .form-section, .showcase-section, .case-section, .final-cta-section, .stats-v2 { padding: 64px 0; }
    .stats-v2-head { margin-bottom: 40px; }
    .stats-v2-card { grid-template-columns: 76px 1fr; min-height: 160px; }
    .stats-v2-card .card-arrow svg { width: 32px; height: 32px; }
    .stats-v2-card .card-body { padding: 22px 24px; }
    .stats-v2-card .card-num { font-size: 56px; }
    .stats-v2-card .card-lbl { font-size: 14px; }
    .stats-v2-aside .aside-block h3 { font-size: 20px; }
    .stats-v2-aside .aside-block p { font-size: 15px; }
    .features-section h2, .stats-section h2, .showcase-head h2, .case-section h2 { margin-bottom: 12px; }
    .features-section .lead { margin-bottom: 48px; }
    .testimonials-section h2 { margin-bottom: 48px; }
    .step { padding: 28px 0; }
    .step-content h3 { font-size: 24px; }
    .stat-item .stat-value { font-size: 56px; }
    .case-metric { font-size: 96px; }
    .case-stats { grid-template-columns: 1fr 1fr; gap: 18px; }
    .case-stat:nth-child(3) { grid-column: span 2; }
    .case-stat .val { font-size: 20px; }
    .form-section h2 { font-size: 42px; }
    .final-cta-section { padding: 80px 0; }
    .final-cta-section h2 { font-size: 36px; line-height: 1.05; }
    .quote-section blockquote { font-size: 26px; }
    .quote-author { font-size: 18px; }
    .faq-question { padding: 20px 22px; font-size: 16px; }
    .faq-answer { padding: 0 22px; font-size: 15px; }
    .faq-item.open .faq-answer { padding-bottom: 20px; }
    .testimonial-quote { font-size: 15px; }
    .footer-bottom { padding-top: 24px; font-size: 12px; }
    footer { padding: 60px 18px 32px; }
    .press-row { justify-content: flex-start; gap: 24px; padding-left: 0; padding-right: 12px; }
    .press-row span { font-size: 14px !important; }
    .press-row span:nth-child(4) { font-size: 11px !important; letter-spacing: 2px; }
    .press-row span:nth-child(6) { font-size: 12px !important; letter-spacing: 2px; }
    .pillar-card, .showcase-card, .pillar-card { padding: 28px 24px; }
    .showcase-body { padding: 22px 22px 26px; }
  }
  @media (max-width: 380px) {
    .hero h1 { font-size: 38px; }
    .case-metric { font-size: 76px; }
    .stat-item .stat-value { font-size: 48px; }
    .nav-cta { display: none; }
  }
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============ NAV ============ -->
<nav class="nav" id="nav">
  <div class="nav-inner">
    <a href="#" class="logo" aria-label="Grow Finance">
      <span class="wordmark sm">Grow</span>
    </a>
    <div class="nav-links">
      <a href="#beneficios">Beneficios</a>
      <a href="#proceso">Cómo funciona</a>
      <a href="#resultados">Resultados</a>
      <a href="#testimonios">Testimonios</a>
      <a href="#faq">FAQ</a>
      <a href="<?php echo esc_url( grow_blog_url() ); ?>">Blog</a>
    </div>
    <div class="nav-actions">
      <a href="https://wa.me/573007384060" target="_blank" rel="noopener" class="nav-cta-outline">Hablemos</a>
      <a href="#form" class="nav-cta">Agenda gratuita</a>
    </div>
  </div>
</nav>

<!-- ============ HERO ============ -->
<section class="hero">
  <div class="container hero-grid">
    <div>
      <div class="hero-logo-card reveal">
        <span class="wordmark sm">Grow</span>
        <span style="margin-left:12px; padding-left:14px; border-left:1px solid rgba(255,255,255,0.2); font-size:11px; letter-spacing:3px; opacity:.65; text-transform:uppercase; font-weight:500;">FINANCE</span>
      </div>
      <h1 class="reveal">Alcanza el <em>Crecimiento</em> Financiero</h1>
      <p class="subtitle reveal">Con el sistema de dirección financiera estratégica #1 para empresas que quieren crecer en serio.</p>
      <a href="#form" class="btn-cta reveal">Agenda una sesión gratuita de 30 minutos</a>
      <div class="hero-trust reveal">
        <span class="dot"></span>
        <span>Más de 300 empresas ya transformaron sus finanzas con nosotros</span>
      </div>
    </div>

    <div class="hero-visual reveal" aria-label="Grow Finance - Dirección financiera estratégica">
      <img class="hero-photo" src="<?php echo esc_url( grow_asset( 'img/hero-grow.jpg' ) ); ?>" width="1200" height="1500" alt="Director financiero de Grow Finance" loading="eager" fetchpriority="high"/>
      <div class="hero-photo-overlay"></div>
    </div>
  </div>
</section>

<!-- Franja de nombres de clientes retirada a peticion del cliente.
     Los estilos (.press, .press-row) siguen en el CSS de esta pagina,
     asi que para restaurarla basta con volver a insertar el marcado. -->

<!-- ============ NO COMPITAS SIN DIRECTOR ============ -->
<section class="section" id="beneficios">
  <div class="container split">
    <div class="reveal">
      <h2>No dirijas tu empresa sin un director financiero.</h2>
      <p>Grow Finance es un programa personalizado de dirección financiera estratégica, diseñado para que tu empresa logre crecimiento real y sostenible en todos los frentes.</p>
      <p>Implementamos un sistema de información financiera para que <strong>conozcas tus números reales</strong> en cualquier momento, te acompañamos para que <strong>decidas con estrategia y datos —no con corazonadas—</strong>, y diseñamos la estructura financiera para que <strong>crezcas sin frenar el flujo de caja</strong>. Negociar con proveedores, reestructurar deuda o preparar una fusión: aquí está tu ventaja competitiva.</p>
      <p>Si quieres acceder a las mismas metodologías comprobadas que aplicamos en más de 300 empresas, un director financiero de Grow Finance es tu respuesta.</p>
      <a href="#form" class="btn-cta">Agenda una sesión gratuita de 30 minutos</a>
      <p class="split-caption">Grow Finance fue construido para empresarios que no se conforman: equipos de dirección, líderes de pyme y fundadores que quieren convertir las finanzas en su mayor palanca de crecimiento.</p>
    </div>
    <div class="split-visual reveal">
      <img class="split-photo" src="<?php echo esc_url( grow_asset( 'img/equipo-grow.jpg' ) ); ?>" width="1400" height="933" alt="Equipo de Grow Finance conversando durante una sesión de trabajo" loading="lazy" decoding="async"/>
    </div>
  </div>
</section>

<!-- ============ SERVICES (3 lines) ============ -->
<section class="features-section">
  <div class="container">
    <h2 class="reveal">Cómo te ayudamos a crecer.</h2>
    <p class="lead reveal">Tres líneas de servicio que ordenan, controlan y dirigen tu gestión financiera.</p>
    <div class="services-grid">
      <article class="service-card reveal">
        <div class="service-icon-wrap">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 3v18h18"/>
            <rect x="7" y="13" width="3" height="5" rx="0.5"/>
            <rect x="12" y="9" width="3" height="9" rx="0.5"/>
            <rect x="17" y="5" width="3" height="13" rx="0.5"/>
          </svg>
        </div>
        <h3>Consultoría financiera</h3>
        <ul class="service-list">
          <li>Diagnóstico financiero</li>
          <li>Construcción y seguimiento de flujo de caja</li>
          <li>Modelos financieros</li>
          <li>Análisis de costos y márgenes</li>
          <li>Planeación financiera</li>
          <li>Evaluación de liquidez y capital de trabajo</li>
        </ul>
      </article>
      <article class="service-card reveal">
        <div class="service-icon-wrap">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="9" rx="1.5"/>
            <rect x="14" y="3" width="7" height="5" rx="1.5"/>
            <rect x="14" y="12" width="7" height="9" rx="1.5"/>
            <rect x="3" y="16" width="7" height="5" rx="1.5"/>
          </svg>
        </div>
        <h3>Estructuración y control</h3>
        <ul class="service-list">
          <li>Centros de costos</li>
          <li>Tableros de control financiero</li>
          <li>Indicadores de gestión</li>
          <li>Estructuras de seguimiento</li>
          <li>Organización de bases de información</li>
          <li>Reportes periódicos</li>
        </ul>
      </article>
      <article class="service-card reveal">
        <div class="service-icon-wrap">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
          </svg>
        </div>
        <h3>Acompañamiento estratégico</h3>
        <ul class="service-list">
          <li>Reuniones de seguimiento</li>
          <li>Revisión de resultados</li>
          <li>Priorización de decisiones</li>
          <li>Recomendaciones estratégicas</li>
          <li>Ajuste de herramientas y modelos</li>
        </ul>
      </article>
    </div>
  </div>
</section>

<!-- ============ QUOTE ============ -->
<section class="quote-section">
  <div class="container">
    <blockquote class="reveal">“El camino al crecimiento real es tomar decisiones financieras estratégicas y decididas.”</blockquote>
    <div class="quote-author reveal">— Grow Finance</div>
  </div>
</section>

<!-- ============ METHODOLOGY (6 phases) ============ -->
<section class="how-section" id="proceso">
  <div class="container">
    <h2 class="reveal">Cómo funciona</h2>
    <p class="how-lead reveal">Una metodología estructurada en 6 fases que garantiza resultados consistentes en cada acompañamiento.</p>
    <div class="step reveal">
      <div class="step-num">Fase 1</div>
      <div class="step-content">
        <h3>Activación e inicio del servicio</h3>
        <p>Arrancamos con una reunión de inicio para alinear expectativas, definir el alcance del trabajo y dejar las herramientas listas para operar desde el día uno.</p>
        <div class="fase-tags">
          <span class="fase-tag">Reunión de inicio</span>
          <span class="fase-tag">Definición del alcance</span>
          <span class="fase-tag">Alineación de expectativas</span>
          <span class="fase-tag">Parametrización de herramientas</span>
        </div>
      </div>
    </div>
    <div class="step reveal">
      <div class="step-num">Fase 2</div>
      <div class="step-content">
        <h3>Levantamiento de información</h3>
        <p>Recolectamos y validamos toda la información financiera relevante. Estructuramos las bases de trabajo y verificamos la consistencia de los datos antes de analizar.</p>
        <div class="fase-tags">
          <span class="fase-tag">Recolección financiera</span>
          <span class="fase-tag">Validación de soportes</span>
          <span class="fase-tag">Bases de trabajo</span>
          <span class="fase-tag">Consistencia de datos</span>
        </div>
      </div>
    </div>
    <div class="step reveal">
      <div class="step-num">Fase 3</div>
      <div class="step-content">
        <h3>Diagnóstico y análisis</h3>
        <p>Analizamos a fondo el flujo de caja, la estructura de costos, la rentabilidad y la liquidez. Identificamos los hallazgos clave que van a guiar las decisiones.</p>
        <div class="fase-tags">
          <span class="fase-tag">Flujo de caja</span>
          <span class="fase-tag">Estructura de costos</span>
          <span class="fase-tag">Rentabilidad</span>
          <span class="fase-tag">Liquidez</span>
          <span class="fase-tag">Hallazgos clave</span>
        </div>
      </div>
    </div>
    <div class="step reveal">
      <div class="step-num">Fase 4</div>
      <div class="step-content">
        <h3>Diseño de herramientas y soluciones</h3>
        <p>Construimos los modelos financieros, tableros de seguimiento, centros de costos, estructuras de reportes e indicadores que tu empresa necesita para operar con criterio.</p>
        <div class="fase-tags">
          <span class="fase-tag">Modelos financieros</span>
          <span class="fase-tag">Tableros de seguimiento</span>
          <span class="fase-tag">Centros de costos</span>
          <span class="fase-tag">Reportes</span>
          <span class="fase-tag">Indicadores clave</span>
        </div>
      </div>
    </div>
    <div class="step reveal">
      <div class="step-num">Fase 5</div>
      <div class="step-content">
        <h3>Implementación y acompañamiento</h3>
        <p>Reuniones periódicas para revisar avances, ajustar sobre la marcha y acompañarte en las decisiones financieras del día a día. No te dejamos solo con el plan.</p>
        <div class="fase-tags">
          <span class="fase-tag">Reuniones periódicas</span>
          <span class="fase-tag">Ajustes sobre la marcha</span>
          <span class="fase-tag">Revisión de avances</span>
          <span class="fase-tag">Apoyo en decisiones</span>
        </div>
      </div>
    </div>
    <div class="step reveal">
      <div class="step-num">Fase 6</div>
      <div class="step-content">
        <h3>Seguimiento y mejora continua</h3>
        <p>Hacemos seguimiento a los indicadores y al desempeño, formulamos recomendaciones de mejora y ajustamos la estrategia para que el progreso sea sostenido.</p>
        <div class="fase-tags">
          <span class="fase-tag">Seguimiento a indicadores</span>
          <span class="fase-tag">Revisión de desempeño</span>
          <span class="fase-tag">Recomendaciones</span>
          <span class="fase-tag">Ajustes estratégicos</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ PRODUCT SHOWCASE ============ -->
<section class="showcase-section">
  <div class="container">
    <div class="showcase-head reveal">
      <h2>Qué recibes cuando trabajas con nosotros</h2>
      <p>No es asesoría suelta ni reportes que nadie lee. Son tres entregables prácticos que conviertes en decisiones cada semana.</p>
    </div>
    <div class="showcase-grid">
      <div class="showcase-card reveal">
        <div class="showcase-visual">
          <img class="showcase-photo" src="<?php echo esc_url( grow_asset( 'img/dashboard.jpg' ) ); ?>" width="1200" height="750" alt="Panel financiero de NAIA con ingresos, egresos, utilidad y flujo de caja del mes" loading="lazy" decoding="async"/>
        </div>
        <div class="showcase-body">
          <span class="tag">Entregable 01</span>
          <h3>Dashboard financiero en vivo</h3>
          <p>Métricas críticas de tu negocio actualizadas: flujo de caja, margen operacional, EBITDA, días de cartera. Sin Excel, sin sorpresas.</p>
        </div>
      </div>
      <div class="showcase-card reveal">
        <div class="showcase-visual">
          <img class="showcase-photo" src="<?php echo esc_url( grow_asset( 'img/plan.jpg' ) ); ?>" width="1200" height="750" alt="Detalle del logotipo de Grow bordado en la camisa del equipo" loading="lazy" decoding="async"/>
        </div>
        <div class="showcase-body">
          <span class="tag">Entregable 02</span>
          <h3>Plan financiero estratégico</h3>
          <p>Hoja de ruta clara con prioridades trimestrales, responsables y métricas de éxito. Tu equipo sabe qué mover y en qué orden.</p>
        </div>
      </div>
      <a class="showcase-card showcase-card--link reveal" href="https://www.naiafinance.com/" target="_blank" rel="noopener">
        <div class="showcase-visual">
          <img class="showcase-photo" src="<?php echo esc_url( grow_asset( 'img/naia.jpg' ) ); ?>" width="1200" height="750" alt="NAIA, el asistente financiero de Grow Finance en WhatsApp" loading="lazy" decoding="async"/>
        </div>
        <div class="showcase-body">
          <span class="tag">Entregable 03</span>
          <h3>NAIA: tu asistente financiero por WhatsApp</h3>
          <p>Consulta tu flujo de caja en segundos, registra ingresos y gastos por chat, y recibe alertas y recomendaciones inteligentes. Tus finanzas en tiempo real, sin Excel ni procesos manuales.</p>
          <span class="showcase-cta">Conocer NAIA<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- ============ STATS ============ -->
<section class="stats-v2" id="resultados">
  <div class="stats-v2-head reveal">
    <span class="stats-v2-eyebrow">Resultados respaldados por datos</span>
    <h2>Los números<br>que respaldan<br>nuestro trabajo.</h2>
  </div>
  <div class="stats-v2-list">
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="300" data-prefix="+">+300</div>
          <div class="card-lbl">Empresas transformadas</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Más empresas, más confianza.</h3>
        <p>Cada caso suma aprendizaje. Por eso nuestro sistema mejora con cada empresa que acompañamos.</p>
      </div>
    </article>
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="30" data-suffix="%">30%</div>
          <div class="card-lbl">Menor dependencia de financiamiento externo</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Menos deuda, más autonomía.</h3>
        <p>Reducir la dependencia de capital externo libera tu empresa para crecer con sus propios recursos.</p>
      </div>
    </article>
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="25" data-suffix="%">25%</div>
          <div class="card-lbl">Mejora en eficiencia operativa</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Procesos que generan margen.</h3>
        <p>Cuando tu operación es eficiente, cada peso vendido se convierte en utilidad real, no en sobrecosto.</p>
      </div>
    </article>
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="20" data-suffix="%">20%</div>
          <div class="card-lbl">Mejores términos de pago con proveedores</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Tu flujo, bajo control.</h3>
        <p>Renegociar plazos con proveedores libera caja sin tocar tu producto ni tu equipo.</p>
      </div>
    </article>
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="15" data-suffix="%">15%</div>
          <div class="card-lbl">Reducción de costos operativos</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Menos fuga, más rentabilidad.</h3>
        <p>Identificar y eliminar costos que no aportan valor es la palanca más rápida hacia el margen.</p>
      </div>
    </article>
    <article class="stats-v2-row reveal">
      <div class="stats-v2-card">
        <div class="card-arrow">
          <svg viewBox="0 0 48 48" aria-hidden="true">
            <path d="M24 6 L24 42 M10 20 L24 6 L38 20" stroke="currentColor" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="card-body">
          <div class="card-num" data-count="20" data-suffix="%">20%</div>
          <div class="card-lbl">Más ingresos en procesos de fusión</div>
        </div>
      </div>
      <div class="aside-block">
        <h3>Crecer comprando bien.</h3>
        <p>Una fusión bien estructurada multiplica ingresos sin doblar la complejidad operativa.</p>
      </div>
    </article>
  </div>
</section>

<!-- ============ CASE STUDY ============ -->
<section class="case-section">
  <div class="container case-grid">
    <div class="reveal">
      <span class="eyebrow">Caso de éxito</span>
      <div class="case-metric reveal-scale" data-count="42" data-prefix="+" data-suffix="%">+42%</div>
      <div class="case-metric-label">en rentabilidad operacional durante el primer año.</div>
      <blockquote>“Antes navegaba a ciegas. Hoy tengo el control real de mi empresa: sé exactamente cuánto gano, en qué se va el dinero y cómo escalar sin quebrarme.”</blockquote>
      <div class="case-author">
        <div class="case-avatar">MC</div>
        <div class="case-author-info">
          <div class="name">Mauricio C.</div>
          <div class="role">CEO · Empresa del sector servicios</div>
        </div>
      </div>
      <div class="case-stats">
        <div class="case-stat">
          <div class="val">12 meses</div>
          <div class="lbl">duración del proceso</div>
        </div>
        <div class="case-stat">
          <div class="val">−35%</div>
          <div class="lbl">costos operativos</div>
        </div>
        <div class="case-stat">
          <div class="val">+60%</div>
          <div class="lbl">flujo de caja libre</div>
        </div>
      </div>
    </div>
    <div class="reveal" style="aspect-ratio: 4/5; border-radius: var(--radius-lg); overflow: hidden; background: linear-gradient(160deg, #243447 0%, #131D29 100%); border: 1px solid rgba(255,255,255,0.08);">
      <svg viewBox="0 0 400 500" preserveAspectRatio="xMidYMid slice" style="width:100%; height:100%;">
        <defs>
          <linearGradient id="caseBar" x1="0" y1="1" x2="0" y2="0">
            <stop offset="0%" stop-color="#4ABF95"/>
            <stop offset="100%" stop-color="#5DD3A8"/>
          </linearGradient>
        </defs>
        <text x="40" y="50" font-family="Inter,sans-serif" font-size="11" fill="rgba(255,255,255,0.5)" letter-spacing="1.5">RENTABILIDAD MENSUAL · 12 MESES</text>
        <text x="40" y="78" font-family="Inter,sans-serif" font-size="22" font-weight="800" fill="#fff">$2.4M COP</text>
        <text x="160" y="78" font-family="Inter,sans-serif" font-size="14" fill="#5DD3A8" font-weight="600">↑ +42% YoY</text>

        <g stroke="rgba(255,255,255,0.05)" stroke-width="1">
          <line x1="40" y1="140" x2="360" y2="140"/>
          <line x1="40" y1="220" x2="360" y2="220"/>
          <line x1="40" y1="300" x2="360" y2="300"/>
          <line x1="40" y1="380" x2="360" y2="380"/>
        </g>

        <g>
          <rect x="50" y="340" width="20" height="55" rx="3" fill="rgba(255,255,255,0.15)"/>
          <rect x="80" y="320" width="20" height="75" rx="3" fill="rgba(255,255,255,0.15)"/>
          <rect x="110" y="300" width="20" height="95" rx="3" fill="rgba(255,255,255,0.18)"/>
          <rect x="140" y="280" width="20" height="115" rx="3" fill="rgba(93,211,168,0.35)"/>
          <rect x="170" y="250" width="20" height="145" rx="3" fill="rgba(93,211,168,0.5)"/>
          <rect x="200" y="220" width="20" height="175" rx="3" fill="url(#caseBar)"/>
          <rect x="230" y="200" width="20" height="195" rx="3" fill="url(#caseBar)"/>
          <rect x="260" y="180" width="20" height="215" rx="3" fill="url(#caseBar)"/>
          <rect x="290" y="160" width="20" height="235" rx="3" fill="url(#caseBar)"/>
          <rect x="320" y="135" width="20" height="260" rx="3" fill="url(#caseBar)"/>
        </g>

        <g transform="translate(40, 430)">
          <rect width="320" height="50" rx="10" fill="rgba(93,211,168,0.08)" stroke="rgba(93,211,168,0.3)"/>
          <circle cx="22" cy="25" r="10" fill="rgba(93,211,168,0.2)"/>
          <path d="M17 25 L21 29 L28 21" stroke="#5DD3A8" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          <text x="44" y="22" font-family="Inter,sans-serif" font-size="12" font-weight="700" fill="#fff">Meta anual cumplida en mes 9</text>
          <text x="44" y="38" font-family="Inter,sans-serif" font-size="10" fill="rgba(255,255,255,0.5)">Plan financiero ejecutado al 100%</text>
        </g>
      </svg>
    </div>
  </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="testimonials-section" id="testimonios">
  <div class="container">
    <h2 class="reveal">Lo que dicen nuestros clientes</h2>
    <div class="testimonials-grid">
      <div class="testimonial reveal">
        <div class="testimonial-media" role="button" tabindex="0" aria-label="Ver testimonio de Alejandra">
          <svg viewBox="0 0 200 250" preserveAspectRatio="xMidYMid slice">
            <defs>
              <linearGradient id="t1" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#3D4F66"/>
                <stop offset="100%" stop-color="#1A202C"/>
              </linearGradient>
            </defs>
            <rect width="200" height="250" fill="url(#t1)"/>
            <circle cx="100" cy="100" r="40" fill="rgba(255,255,255,0.18)"/>
            <path d="M60 200 Q60 150 100 150 Q140 150 140 200 Z" fill="rgba(255,255,255,0.18)"/>
          </svg>
          <span class="play"></span>
        </div>
        <p class="testimonial-quote">“La dirección financiera es para cualquier empresario que no se conforma, que sabe que su negocio puede ser mejor de lo que es hoy.”</p>
        <p class="testimonial-author">Alejandra, CEO</p>
      </div>
      <div class="testimonial reveal">
        <div class="testimonial-media" role="button" tabindex="0" aria-label="Ver testimonio de Ana">
          <svg viewBox="0 0 200 250" preserveAspectRatio="xMidYMid slice">
            <defs>
              <linearGradient id="t2" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#4A5568"/>
                <stop offset="100%" stop-color="#1F2937"/>
              </linearGradient>
            </defs>
            <rect width="200" height="250" fill="url(#t2)"/>
            <circle cx="100" cy="100" r="40" fill="rgba(255,255,255,0.18)"/>
            <path d="M60 200 Q60 150 100 150 Q140 150 140 200 Z" fill="rgba(255,255,255,0.18)"/>
          </svg>
          <span class="play"></span>
        </div>
        <p class="testimonial-quote">“No me alcanzan las palabras para agradecer a Grow. Hoy mi empresa tiene claridad financiera real.”</p>
        <p class="testimonial-author">Ana, Fundadora</p>
      </div>
      <div class="testimonial reveal">
        <div class="testimonial-media" role="button" tabindex="0" aria-label="Ver testimonio de David">
          <svg viewBox="0 0 200 250" preserveAspectRatio="xMidYMid slice">
            <defs>
              <linearGradient id="t3" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#2D3748"/>
                <stop offset="100%" stop-color="#111827"/>
              </linearGradient>
            </defs>
            <rect width="200" height="250" fill="url(#t3)"/>
            <circle cx="100" cy="100" r="40" fill="rgba(255,255,255,0.18)"/>
            <path d="M60 200 Q60 150 100 150 Q140 150 140 200 Z" fill="rgba(255,255,255,0.18)"/>
          </svg>
          <span class="play"></span>
        </div>
        <p class="testimonial-quote">“Mi mejor desempeño como empresario ha sido desde que tengo un director financiero a mi lado…”</p>
        <p class="testimonial-author">David, Consultor</p>
      </div>
      <div class="testimonial reveal">
        <div class="testimonial-media" role="button" tabindex="0" aria-label="Ver testimonio de Francesca">
          <svg viewBox="0 0 200 250" preserveAspectRatio="xMidYMid slice">
            <defs>
              <linearGradient id="t4" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#4B5563"/>
                <stop offset="100%" stop-color="#1F2937"/>
              </linearGradient>
            </defs>
            <rect width="200" height="250" fill="url(#t4)"/>
            <circle cx="100" cy="100" r="40" fill="rgba(255,255,255,0.18)"/>
            <path d="M60 200 Q60 150 100 150 Q140 150 140 200 Z" fill="rgba(255,255,255,0.18)"/>
          </svg>
          <span class="play"></span>
        </div>
        <p class="testimonial-quote">“Siempre van a existir curvas y dificultades, pero tener un director financiero que te acompañe lo cambia todo…”</p>
        <p class="testimonial-author">Francesca, Empresaria</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="faq-section" id="faq">
  <div class="container">
    <h2 class="reveal">Preguntas frecuentes</h2>
    <div class="faq-list">
      <div class="faq-item reveal">
        <button class="faq-question" aria-expanded="false">
          <span>¿Qué incluye la sesión gratuita de 30 minutos?</span>
          <svg class="chevron" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Es una conversación 1 a 1 con un director financiero. Diagnosticamos tu situación actual, identificamos los principales bloqueos financieros y te entregamos 2 a 3 acciones concretas que puedes implementar de inmediato. Sin costo y sin compromiso.</p>
        </div>
      </div>
      <div class="faq-item reveal">
        <button class="faq-question" aria-expanded="false">
          <span>¿Para qué tipo de empresas funciona Grow Finance?</span>
          <svg class="chevron" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Trabajamos con pymes y empresas en crecimiento que ya facturan, pero que necesitan tomar el control de sus finanzas, optimizar flujo de caja, mejorar rentabilidad o prepararse para una fusión o ronda de inversión.</p>
        </div>
      </div>
      <div class="faq-item reveal">
        <button class="faq-question" aria-expanded="false">
          <span>¿En cuánto tiempo veo resultados?</span>
          <svg class="chevron" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>La mayoría de nuestros clientes ve mejoras medibles en flujo de caja y eficiencia operativa dentro de los primeros 60 a 90 días. Los resultados de transformación profunda toman entre 6 y 12 meses.</p>
        </div>
      </div>
      <div class="faq-item reveal">
        <button class="faq-question" aria-expanded="false">
          <span>¿Es lo mismo que tener un contador?</span>
          <svg class="chevron" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>No. Un contador registra lo que ya pasó. Un director financiero estratégico diseña el futuro: planifica el flujo, define la estrategia de inversión, negocia con bancos y proveedores, y te ayuda a tomar decisiones con datos antes de que ocurran los problemas.</p>
        </div>
      </div>
      <div class="faq-item reveal">
        <button class="faq-question" aria-expanded="false">
          <span>¿Cómo es la modalidad de trabajo?</span>
          <svg class="chevron" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>100% remoto, con sesiones estratégicas semanales o quincenales según el plan. Implementamos los sistemas en tu empresa y tu equipo recibe acompañamiento permanente por WhatsApp y correo.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="final-cta-section">
  <div class="container">
    <h2 class="reveal">Tu próximo caso de éxito empieza con una conversación.</h2>
    <p class="reveal">30 minutos. Cero compromiso. Te entregamos un diagnóstico claro de cómo Grow Finance puede transformar tu negocio.</p>
    <a href="#form" class="btn-cta-dark reveal">Agenda tu sesión gratuita</a>
  </div>
</section>

<!-- ============ FORM ============ -->
<section class="form-section" id="form">
  <div class="container">
    <h2 class="reveal">Si no es ahora, ¿cuándo?</h2>
    <p class="lead reveal">Agenda tu sesión gratuita de estrategia financiera.</p>

    <form class="lead-form reveal" id="leadForm" novalidate>
      <div class="form-row">
        <div class="form-field">
          <input type="text" id="firstName" name="firstName" placeholder=" " required autocomplete="given-name" />
          <label class="float" for="firstName">Nombre*</label>
        </div>
        <div class="form-field">
          <input type="text" id="lastName" name="lastName" placeholder=" " required autocomplete="family-name" />
          <label class="float" for="lastName">Apellido*</label>
        </div>
      </div>
      <div class="form-row single">
        <div class="form-field">
          <input type="email" id="email" name="email" placeholder=" " required autocomplete="email" />
          <label class="float" for="email">Correo electrónico*</label>
        </div>
      </div>
      <div class="form-row single">
        <div class="form-field">
          <input type="text" id="company" name="company" placeholder=" " autocomplete="organization" />
          <label class="float" for="company">Empresa</label>
        </div>
      </div>
      <div class="form-row split-phone">
        <div class="form-field">
          <select id="country" name="country" required>
            <option value="CO">Colombia</option>
            <option value="MX">México</option>
            <option value="AR">Argentina</option>
            <option value="PE">Perú</option>
            <option value="CL">Chile</option>
            <option value="EC">Ecuador</option>
            <option value="ES">España</option>
            <option value="US">Estados Unidos</option>
          </select>
        </div>
        <div class="form-field">
          <input type="tel" id="phone" name="phone" placeholder=" " required autocomplete="tel" />
          <label class="float" for="phone">Teléfono / WhatsApp*</label>
        </div>
      </div>

      <p class="form-disclaimer">
        Al hacer clic en "Continuar" aceptas los Términos de Uso y la Política de Privacidad de Grow Finance. Aceptas recibir correos, llamadas y mensajes de WhatsApp con información sobre tu solicitud y con fines comerciales. Puedes darte de baja en cualquier momento.
      </p>
      <button type="submit" class="btn-submit">Continuar</button>
    </form>

    <div class="form-success" id="formSuccess">
      <h3>¡Listo! Recibimos tu solicitud.</h3>
      <p>Un director financiero de Grow Finance te contactará por WhatsApp en menos de 24 horas para agendar tu sesión gratuita.</p>
    </div>
  </div>
</section>

<!-- ============ SOCIAL FEED (Instagram) ============ -->
<!--
  Alimentado por Behold (https://behold.so).
  Para activarlo: crea una cuenta, conecta @growxfinance, crea un feed de tipo
  "Widget" limitado a 4 posts, copia el Feed ID y pégalo en data-feed-id abajo.
  Mientras el ID sea el placeholder, se muestran los 4 recuadros de respaldo.
-->
<section class="social-section" id="redes" aria-labelledby="social-title">
  <div class="container">
    <div class="social-head reveal">
      <div>
        <h2 id="social-title">Lo último en nuestras redes.</h2>
        <span class="social-handle">Contenido financiero práctico, cada semana.</span>
      </div>
      <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" class="social-cta">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        Síguenos en Instagram
      </a>
    </div>

    <div class="social-feed reveal" data-feed-id="REEMPLAZA_CON_TU_FEED_ID">
      <div class="social-fallback">
        <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" class="social-tile" aria-label="Ver publicaciones de Grow Finance en Instagram">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" class="social-tile" aria-hidden="true" tabindex="-1">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" class="social-tile" aria-hidden="true" tabindex="-1">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" class="social-tile" aria-hidden="true" tabindex="-1">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============ WHATSAPP FLOAT ============ -->
<a href="https://wa.me/573007384060?text=Hola%20Grow%20Finance%2C%20quiero%20agendar%20una%20sesi%C3%B3n%20gratuita."
   class="wa-float" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp">
  <svg viewBox="0 0 24 24" aria-hidden="true">
    <path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.52 0 .2 5.32.2 11.86c0 2.09.55 4.13 1.59 5.92L0 24l6.4-1.68a11.86 11.86 0 0 0 5.66 1.44h.01c6.54 0 11.86-5.32 11.86-11.86 0-3.17-1.23-6.15-3.41-8.42zM12.07 21.6h-.01a9.74 9.74 0 0 1-4.97-1.36l-.36-.21-3.8 1 1.01-3.7-.23-.38a9.74 9.74 0 0 1-1.49-5.21c0-5.4 4.4-9.78 9.84-9.78 2.62 0 5.08 1.02 6.94 2.88a9.74 9.74 0 0 1 2.88 6.92c0 5.4-4.4 9.78-9.81 9.78zm5.38-7.32c-.29-.15-1.74-.86-2.01-.96-.27-.1-.47-.15-.66.15-.2.29-.76.96-.93 1.15-.17.2-.34.22-.63.07-.29-.15-1.24-.46-2.36-1.45a8.9 8.9 0 0 1-1.64-2.03c-.17-.29-.02-.45.13-.6.13-.13.29-.34.44-.51.15-.17.2-.29.29-.49.1-.2.05-.37-.02-.51-.07-.15-.66-1.59-.9-2.18-.24-.57-.48-.49-.66-.5l-.56-.01c-.2 0-.51.07-.78.37-.27.29-1.02 1-1.02 2.44 0 1.44 1.05 2.83 1.2 3.02.15.2 2.08 3.17 5.04 4.45.7.3 1.25.48 1.68.62.7.22 1.34.19 1.85.12.56-.08 1.74-.71 1.98-1.4.24-.69.24-1.28.17-1.4-.07-.12-.27-.2-.56-.34z"/>
  </svg>
</a>

<!-- ============ FOOTER ============ -->
<footer>
  <div class="footer-grid">
    <div>
      <a href="#" class="logo" aria-label="Grow Finance">
        <span class="wordmark">Grow</span>
      </a>
      <p style="margin-top:16px; max-width:320px;">Dirección financiera estratégica para empresas que quieren crecer en serio. Más de 300 casos de éxito.</p>
      <div class="footer-social">
        <a href="https://linkedin.com/company/www.growfinance.co" target="_blank" rel="noopener" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
        </a>
        <a href="https://instagram.com/growxfinance" target="_blank" rel="noopener" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        <a href="https://youtube.com/@GrowxFinance2026" target="_blank" rel="noopener" aria-label="YouTube">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
        </a>
        <a href="https://wa.me/573007384060" target="_blank" rel="noopener" aria-label="WhatsApp">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.52 0 .2 5.32.2 11.86c0 2.09.55 4.13 1.59 5.92L0 24l6.4-1.68a11.86 11.86 0 0 0 5.66 1.44h.01c6.54 0 11.86-5.32 11.86-11.86 0-3.17-1.23-6.15-3.41-8.42z"/></svg>
        </a>
      </div>
    </div>
    <div>
      <h4>Empresa</h4>
      <a href="#beneficios">Beneficios</a>
      <a href="#proceso">Cómo funciona</a>
      <a href="#resultados">Resultados</a>
      <a href="#testimonios">Testimonios</a>
    </div>
    <div>
      <h4>Recursos</h4>
      <a href="#faq">Preguntas frecuentes</a>
      <a href="#form">Agenda gratuita</a>
      <a href="<?php echo esc_url( grow_blog_url() ); ?>">Blog</a>
      <a href="#resultados">Casos de éxito</a>
    </div>
    <div>
      <h4>Contacto</h4>
      <a href="https://wa.me/573007384060">+57 300 738 4060</a>
      <a href="mailto:hola@growfinance.co">hola@growfinance.co</a>
      <a href="https://linkedin.com/company/www.growfinance.co" target="_blank" rel="noopener">LinkedIn</a>
      <a href="#">Agenda una llamada</a>
    </div>
  </div>
  <div class="footer-bottom">
    <div>© 2026 Grow Finance · Todos los derechos reservados.</div>
    <div>
      <a href="#">Términos</a> ·
      <a href="#">Privacidad</a> ·
      <a href="#">Cookies</a>
    </div>
  </div>
</footer>

<script>
  /* ============ MOTOR DE MOVIMIENTO ============
     Un unico bucle de requestAnimationFrame gobierna el estado del menu,
     los revelados ligados al scroll y el parallax de las imagenes.
     Antes habia tres escuchas de scroll independientes compitiendo.

     La clave del efecto: la posicion y la opacidad se recalculan en cada
     fotograma segun donde este el elemento respecto a la ventana, en vez
     de dispararse una transicion de duracion fija. El movimiento acompana
     al scroll en lugar de ejecutarse al margen de el.
  */
  (() => {
    const menosMovimiento = window.matchMedia('(prefers-reduced-motion: reduce)');
    const raiz = document.documentElement;
    const nav = document.getElementById('nav');

    // Umbrales expresados como fraccion del alto de la ventana.
    const ENTRA = 0.94;   // empieza a aparecer cuando su borde superior llega aqui
    const LLENO = 0.18;   // termina de aparecer aqui (recorrido largo: sigue
                          // moviendose mientras cruza la ventana, que es lo que
                          // da sensacion de vida en vez de encajar de golpe)
    const SUBIDA = 56;    // px que recorre hacia arriba
    const ESCALA = 0.90;  // escala inicial de los numeros grandes
    const DESFASE = 0.09; // retraso entre hermanos de una misma rejilla
    const PARALLAX = 26;  // px de recorrido de las imagenes grandes

    const suave = t => 1 - Math.pow(1 - t, 3);
    const limitar = (v, min, max) => (v < min ? min : v > max ? max : v);

    let piezas = [];
    let imagenes = [];
    let filas = [];
    let pendiente = false;

    /** Indice de un elemento entre sus hermanos animados, para escalonarlos. */
    const indiceEntreHermanos = (el) => {
      if (!el.parentElement) return 0;
      const hermanos = [...el.parentElement.children].filter(
        n => n.classList.contains('reveal') || n.classList.contains('reveal-scale')
      );
      return Math.max(0, hermanos.indexOf(el));
    };

    /** Mide posiciones una sola vez para no forzar recalculo de estilos en cada fotograma. */
    const medir = () => {
      const y = window.scrollY;
      piezas = [...document.querySelectorAll('.reveal, .reveal-scale')].map(el => ({
        el,
        escala: el.classList.contains('reveal-scale'),
        arriba: el.getBoundingClientRect().top + y,
        desfase: indiceEntreHermanos(el) * DESFASE,
        avance: 0,
      }));
      imagenes = [...document.querySelectorAll('.hero-photo, .split-photo')].map(el => ({
        el,
        arriba: el.getBoundingClientRect().top + y,
        alto: el.offsetHeight || 1,
      }));
      filas = [...document.querySelectorAll('.stats-v2-row')];
    };

    const pintar = () => {
      pendiente = false;
      const y = window.scrollY;
      const alto = window.innerHeight;

      if (nav) nav.classList.toggle('scrolled', y > 30);

      // Al llegar al final del documento ya no queda scroll para que los
      // ultimos elementos completen su recorrido. Se rematan ahi mismo para
      // que nunca quede contenido invisible, sobre todo en pantallas cortas.
      const enElFondo = raiz.scrollHeight - (y + alto) < 4;

      // --- Revelados ---
      for (const p of piezas) {
        const superior = p.arriba - y;                    // posicion en la ventana
        // Se resta: cuanto mayor el indice, mas tarde arranca. Sumando,
        // el orden salia invertido y la ultima tarjeta entraba primero.
        const desde = alto * (ENTRA - p.desfase);
        const hasta = alto * LLENO;
        const bruto = enElFondo
          ? 1
          : limitar((desde - superior) / Math.max(1, desde - hasta), 0, 1);
        // Nunca retrocede: al volver hacia arriba el contenido no se desvanece.
        if (bruto <= p.avance) continue;
        p.avance = bruto;
        const t = suave(bruto);
        p.el.style.opacity = t;
        p.el.style.transform = p.escala
          ? `scale(${ESCALA + (1 - ESCALA) * t})`
          : `translate3d(0, ${(1 - t) * SUBIDA}px, 0)`;
        if (bruto >= 1) {
          p.el.classList.add('in');
          p.el.style.willChange = 'auto';
        }
      }

      // --- Parallax de las imagenes grandes ---
      for (const img of imagenes) {
        const centro = (img.arriba - y) + img.alto / 2;
        const avance = limitar((centro - alto * -0.2) / (alto * 1.4), 0, 1);
        const recorrido = (0.5 - avance) * PARALLAX * 2;
        img.el.style.transform = `scale(1.07) translate3d(0, ${recorrido.toFixed(2)}px, 0)`;
      }

      // --- Fila de datos mas centrada en la ventana ---
      if (filas.length) {
        let mejor = 0, minima = Infinity;
        filas.forEach((fila, i) => {
          const r = fila.getBoundingClientRect();
          const d = Math.abs(r.top + r.height / 2 - alto / 2);
          if (d < minima) { minima = d; mejor = i; }
        });
        filas.forEach((fila, i) => fila.classList.toggle('active', i === mejor));
      }
    };

    const alHacerScroll = () => {
      if (!pendiente) { pendiente = true; requestAnimationFrame(pintar); }
    };

    /** Deja todo visible y quieto: sin JS util para quien pide menos movimiento. */
    const desactivar = () => {
      raiz.classList.remove('motion');
      document.querySelectorAll('.reveal, .reveal-scale').forEach(el => {
        el.style.opacity = '';
        el.style.transform = '';
        el.classList.add('in');
      });
      document.querySelectorAll('.hero-photo, .split-photo').forEach(el => { el.style.transform = ''; });
      document.removeEventListener('scroll', alHacerScroll);
    };

    const activar = () => {
      raiz.classList.add('motion');
      medir();
      pintar();
      document.addEventListener('scroll', alHacerScroll, { passive: true });
    };

    if (menosMovimiento.matches) {
      desactivar();
    } else {
      activar();
    }
    menosMovimiento.addEventListener('change', e => (e.matches ? desactivar() : activar()));

    let remedir;
    window.addEventListener('resize', () => {
      clearTimeout(remedir);
      remedir = setTimeout(() => { if (raiz.classList.contains('motion')) { medir(); pintar(); } }, 160);
    }, { passive: true });

    // Las fuentes web cambian alturas al cargar: hay que volver a medir.
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(() => { if (raiz.classList.contains('motion')) { medir(); pintar(); } });
    }
    window.addEventListener('load', () => { if (raiz.classList.contains('motion')) { medir(); pintar(); } });
  })();

  // ====== Animated counters ======
  const easeOutQuart = t => 1 - Math.pow(1 - t, 4);
  const animateCount = (el) => {
    const target = parseFloat(el.dataset.count);
    if (isNaN(target)) return;
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    const duration = 1500;
    const start = performance.now();
    const tick = (now) => {
      const t = Math.min((now - start) / duration, 1);
      const v = Math.round(target * easeOutQuart(t));
      el.textContent = prefix + v + suffix;
      if (t < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };
  const countIO = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        animateCount(e.target);
        countIO.unobserve(e.target);
      }
    });
  }, { threshold: 0.4 });
  document.querySelectorAll('[data-count]').forEach(el => countIO.observe(el));

  /* El parallax del hero y el resaltado de la fila de datos los gobierna
     ahora el motor de movimiento de arriba, en un unico bucle. */

  // ====== FAQ accordion ======
  document.querySelectorAll('.faq-item').forEach(item => {
    const btn = item.querySelector('.faq-question');
    btn.addEventListener('click', () => {
      const open = item.classList.toggle('open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

  // ====== Form submit (replace with real endpoint) ======
  /* ============ FORMULARIO -> HUBSPOT ============
     Pega el Portal ID y el Form GUID de HubSpot abajo.
     El formulario en HubSpot debe tener estos campos, o la API
     rechaza el envío: firstname, lastname, email, company, country, phone.
  */
  const HUBSPOT = {
    portalId: '51460943',
    formGuid: 'a10df435-5394-428b-9272-05116628854e',
    endpoint: 'https://api.hsforms.com/submissions/v3/integration/submit',
  };

  /* Campo del formulario -> nombre interno de la propiedad en HubSpot.
     Solo pueden ir campos que existan en el formulario de HubSpot: la API
     rechaza el envío completo si recibe uno que no esté definido allí.

     'country' está fuera a propósito porque el formulario de HubSpot no lo
     tiene. Para capturarlo: añade la propiedad al formulario en HubSpot y
     descomenta la línea correspondiente. */
  const FIELD_MAP = {
    firstName: 'firstname',
    lastName: 'lastname',
    email: 'email',
    company: 'company',
    phone: 'phone',
    // country: 'country',
  };

  const form = document.getElementById('leadForm');
  const success = document.getElementById('formSuccess');
  const submitBtn = form.querySelector('button[type="submit"]');

  const readCookie = (name) => {
    const match = document.cookie.match(new RegExp('(^|;\\s*)' + name + '=([^;]*)'));
    return match ? decodeURIComponent(match[2]) : undefined;
  };

  const showError = (message) => {
    let box = form.querySelector('.form-error');
    if (!box) {
      box = document.createElement('p');
      box.className = 'form-error';
      box.setAttribute('role', 'alert');
      box.style.cssText = 'color:#C0392B;margin-top:14px;font-size:15px;line-height:1.5;';
      submitBtn.insertAdjacentElement('afterend', box);
    }
    box.textContent = message;
  };

  const clearError = () => {
    const box = form.querySelector('.form-error');
    if (box) box.remove();
  };

  const buildPayload = (formData) => ({
    fields: Object.entries(FIELD_MAP)
      .map(([field, property]) => ({
        objectTypeId: '0-1',
        name: property,
        value: (formData.get(field) || '').toString().trim(),
      }))
      .filter((f) => f.value !== ''),
    context: {
      hutk: readCookie('hubspotutk'),
      pageUri: window.location.href,
      pageName: document.title,
    },
  });

  const showSuccess = () => {
    form.style.display = 'none';
    success.classList.add('visible');
    success.scrollIntoView({ behavior: 'smooth', block: 'center' });
    if (window.dataLayer) {
      window.dataLayer.push({ event: 'lead_form_submit' });
    }
  };

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearError();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    if (HUBSPOT.portalId === 'TU_PORTAL_ID' || HUBSPOT.formGuid === 'TU_FORM_GUID') {
      console.error('[Grow] HubSpot sin configurar: falta portalId o formGuid. El lead NO se envió.');
      showError('El formulario aún no está conectado. Escríbenos por WhatsApp mientras lo solucionamos.');
      return;
    }

    const originalLabel = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Enviando…';

    try {
      const url = `${HUBSPOT.endpoint}/${HUBSPOT.portalId}/${HUBSPOT.formGuid}`;
      const response = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(buildPayload(new FormData(form))),
      });

      if (!response.ok) {
        const detail = await response.text();
        throw new Error(`HubSpot respondió ${response.status}: ${detail}`);
      }

      showSuccess();
    } catch (error) {
      console.error('[Grow] Falló el envío del formulario:', error);
      showError('No pudimos enviar tus datos. Inténtalo de nuevo o escríbenos por WhatsApp al +57 300 738 4060.');
      submitBtn.disabled = false;
      submitBtn.textContent = originalLabel;
    }
  });

  /* ============ INSTAGRAM FEED (Behold) ============ */
  (() => {
    const PLACEHOLDER_ID = 'REEMPLAZA_CON_TU_FEED_ID';
    const WIDGET_SRC = 'https://w.behold.so/widget.js';
    const RENDER_TIMEOUT_MS = 8000;
    const POLL_INTERVAL_MS = 400;
    const MIN_RENDERED_HEIGHT = 60;

    const feed = document.querySelector('.social-feed');
    if (!feed) return;

    const feedId = (feed.dataset.feedId || '').trim();
    if (!feedId || feedId === PLACEHOLDER_ID) {
      console.info('[Grow] Feed de Instagram sin configurar: pega tu Feed ID de Behold en data-feed-id. Se muestran los recuadros de respaldo.');
      return;
    }

    const fallback = feed.querySelector('.social-fallback');
    const widget = document.createElement('behold-widget');
    widget.setAttribute('feed-id', feedId);
    feed.prepend(widget);

    // El widget se renderiza de forma asíncrona: solo retiramos el respaldo
    // cuando confirmamos que dibujó contenido real.
    const deadline = Date.now() + RENDER_TIMEOUT_MS;
    let poll = null;

    const giveUp = (reason) => {
      if (poll) clearInterval(poll);
      poll = null;
      console.warn('[Grow] Feed de Instagram no disponible: ' + reason + ' Se mantienen los recuadros de respaldo.');
      widget.remove();
    };

    const script = document.createElement('script');
    script.type = 'module';
    script.src = WIDGET_SRC;
    script.onerror = () => giveUp('no se pudo cargar ' + WIDGET_SRC + '.');
    document.head.append(script);

    poll = setInterval(() => {
      if (widget.offsetHeight > MIN_RENDERED_HEIGHT) {
        clearInterval(poll);
        poll = null;
        if (fallback) fallback.remove();
        return;
      }
      if (Date.now() > deadline) {
        giveUp('no renderizó en ' + RENDER_TIMEOUT_MS + 'ms; revisa el Feed ID y que la cuenta siga conectada en Behold.');
      }
    }, POLL_INTERVAL_MS);
  })();
</script>

<?php wp_footer(); ?>
</body>
</html>
