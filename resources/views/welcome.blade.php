<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPI Club - Bachelors Party of India</title>

    <!-- Theme Initialization Script (Prevents flash of light mode) -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback Tailwind CDN since npm build is missing -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
            }
        </script>
    @endif

    <!-- Halo Stylesheet -->
    <link rel="stylesheet" href="/css/system.css">

    <style>
        /* ===== Page-only layout for the Halo style BPI landing page ===== */
        body {
            background:
                radial-gradient(1200px 700px at 80% -10%, rgba(91, 107, 255, 0.08), transparent 60%),
                radial-gradient(900px 600px at -10% 30%, rgba(61, 215, 229, 0.04), transparent 60%),
                var(--color-background);
            min-height: 100vh;
        }

        /* Nav */
        .page-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
            background-color: var(--color-overlay);
            border-bottom: 1px solid var(--color-border);
            transition: background-color var(--motion-slow) var(--easing-standard), border-color var(--motion-slow) var(--easing-standard);
        }
        
        .brand-row { display: inline-flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-mark {
            width: 24px; height: 24px;
            border-radius: 7px;
            position: relative;
            background: conic-gradient(from 220deg at 50% 50%, var(--color-primary), var(--color-elevated) 35%, var(--color-elevated) 65%, var(--color-primary));
            border: 1px solid var(--color-border-strong);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
        }
        .brand-name { font-family: var(--font-display); font-weight: 600; letter-spacing: -0.01em; color: var(--color-text-primary); }
        .brand-suffix { color: var(--color-text-muted); font-weight: 500; }
        .nav-items { display: inline-flex; align-items: center; gap: var(--space-6); }
        .nav-items a {
            font-family: var(--font-display);
            font-size: 0.875rem;
            color: var(--color-text-secondary);
            text-decoration: none;
            transition: color var(--motion-base) var(--easing-standard);
        }
        .nav-items a:hover { color: var(--color-text-primary); }

        /* Hero */
        .hero {
            padding: 80px 0 64px;
            position: relative;
        }
        .hero .container { display: grid; grid-template-columns: 1.05fr 1fr; gap: 56px; align-items: center; }
        
        @media (max-width: 980px) {
            .hero .container { grid-template-columns: 1fr; }
            .product-shell { grid-template-columns: 1fr; }
            .side-nav { display: none; }
            .comp-grid { grid-template-columns: 1fr; }
            .comp-card { grid-column: span 12 !important; }
        }

        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 4px 12px 4px 4px;
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-full);
            color: var(--color-text-secondary);
            font-family: var(--font-display);
            font-size: 0.75rem; font-weight: 500; letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .hero-eyebrow .pill-dot {
            width: 22px; height: 22px;
            border-radius: var(--radius-full);
            background: var(--color-primary);
            display: inline-flex; align-items: center; justify-content: center;
            color: white;
        }
        
        .hero h1 {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5.6vw, 4rem);
            font-weight: 600;
            letter-spacing: -0.03em;
            line-height: 1.05;
            color: var(--color-text-primary);
            margin: 22px 0 20px;
        }
        .hero h1 .accent { color: var(--color-primary); }
        .hero h1 .muted { color: var(--color-text-muted); }
        
        .hero-sub {
            font-family: var(--font-body);
            font-size: 1.0625rem;
            color: var(--color-text-secondary);
            line-height: 1.55;
            max-width: 52ch;
            margin: 0 0 28px;
        }
        .hero-actions { display: inline-flex; gap: var(--space-3); align-items: center; flex-wrap: wrap; }
        
        .hero-meta {
            margin-top: 36px;
            display: flex; align-items: center; gap: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--color-border);
        }
        .meta-item { display: flex; flex-direction: column; gap: 4px; }
        .meta-item .num { font-family: var(--font-mono); font-size: 1.25rem; font-weight: 600; color: var(--color-text-primary); letter-spacing: -0.02em; }
        .meta-item .lbl { font-family: var(--font-display); font-size: 0.6875rem; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase; color: var(--color-text-muted); }

        /* Hero panel (dashboard mock) */
        .hero-panel {
            position: relative;
            background: linear-gradient(180deg, rgba(30,32,41,0.4), rgba(20,21,28,0.6));
            border: 1px solid var(--color-border);
            border-radius: 20px;
            padding: 18px;
            box-shadow: var(--shadow-lg);
        }
        .dark .hero-panel {
            background: linear-gradient(180deg, rgba(30,32,41,0.65), rgba(20,21,28,0.85));
        }
        
        .panel-bar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 4px 8px 14px;
            border-bottom: 1px solid var(--color-border);
            margin-bottom: 14px;
        }
        .panel-bar .dots { display: inline-flex; gap: 6px; }
        .panel-bar .dot { width: 10px; height: 10px; border-radius: 50%; background: var(--color-elevated); border: 1px solid var(--color-border); }
        .panel-bar .title { font-family: var(--font-mono); font-size: 0.75rem; color: var(--color-text-muted); }
        .panel-bar .right { display: inline-flex; align-items: center; gap: 6px; color: var(--color-text-muted); }

        .panel-row { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
        
        .mini-tile {
            position: relative;
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 14px;
            overflow: hidden;
        }
        .mini-tile::before {
            content: ""; position: absolute; inset: 0 0 auto 0; height: 2px;
            background: var(--color-primary);
        }
        .mini-tile[data-tone="success"]::before { background: var(--color-success); }
        .mini-tile[data-tone="warning"]::before { background: var(--color-warning); }
        .mini-tile[data-tone="info"]::before { background: var(--color-info); }
        .mini-tile .head { display: flex; align-items: center; justify-content: space-between; }
        .mini-tile .eyb { font-family: var(--font-display); font-size: 0.625rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-text-muted); }
        .mini-tile .val { font-family: var(--font-mono); font-weight: 600; font-size: 1.625rem; letter-spacing: -0.02em; color: var(--color-text-primary); margin-top: 6px; }
        .mini-tile .foot { display: flex; align-items: center; justify-content: space-between; margin-top: 10px; }
        .mini-tile .delta { font-family: var(--font-mono); font-size: 0.6875rem; padding: 2px 6px; border-radius: 999px; }
        .delta-up { color: var(--color-success); background: var(--color-success-soft); }
        
        /* Custom floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Product Simulator Shell */
        .product-shell {
            display: grid; grid-template-columns: 240px 1fr; gap: 0;
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 20px;
            overflow: hidden;
            min-height: 540px;
            box-shadow: var(--shadow-lg);
        }
        .side-nav {
            background: rgba(0, 0, 0, 0.02);
            border-right: 1px solid var(--color-border);
            padding: 20px 16px;
            display: flex; flex-direction: column; gap: 16px;
        }
        .dark .side-nav {
            background: rgba(10, 11, 15, 0.55);
        }
        .side-brand { display: inline-flex; align-items: center; gap: 10px; font-family: var(--font-display); font-weight: 600; color: var(--color-text-primary); padding: 0 8px 12px; border-bottom: 1px solid var(--color-border); }
        .side-section { display: flex; flex-direction: column; gap: 4px; }
        .side-section .grp { font-family: var(--font-display); font-size: 0.6875rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-text-muted); padding: 8px 8px 4px; }
        
        .side-link {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 8px 10px;
            border-radius: 8px;
            font-family: var(--font-display); font-size: 0.875rem;
            color: var(--color-text-secondary);
            text-decoration: none;
            text-align: left;
            transition: background var(--motion-base) var(--easing-standard), color var(--motion-base) var(--easing-standard);
            background: transparent;
            border: 0;
            width: 100%;
            cursor: pointer;
        }
        .side-link svg { width: 16px; height: 16px; color: var(--color-text-muted); }
        .side-link:hover { background: var(--color-elevated); color: var(--color-text-primary); }
        .side-link.is-active { background: var(--color-elevated); color: var(--color-text-primary); border: 1px solid var(--color-border-strong); }
        .side-link.is-active svg { color: var(--color-primary); }
        
        .side-foot { margin-top: auto; padding: 12px; background: var(--color-elevated); border: 1px solid var(--color-border-strong); border-radius: 12px; display: flex; align-items: center; gap: 10px; }
        .avatar { width: 32px; height: 32px; border-radius: 50%; background: conic-gradient(from 200deg, var(--color-primary), var(--color-info), var(--color-primary)); border: 1px solid var(--color-border-strong); }
        .who { display: flex; flex-direction: column; min-width: 0; text-align: left; }
        .who .nm { font-family: var(--font-display); font-size: 0.8125rem; color: var(--color-text-primary); font-weight: 500; }
        .who .em { font-family: var(--font-mono); font-size: 0.6875rem; color: var(--color-text-muted); }

        .main-area { padding: 24px 28px 28px; display: flex; flex-direction: column; gap: 20px; }
        .main-head { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        .crumb { font-family: var(--font-mono); font-size: 0.75rem; color: var(--color-text-muted); display: inline-flex; align-items: center; gap: 8px; }
        .crumb b { color: var(--color-text-primary); font-weight: 500; }
        
        .work-panel {
            background: rgba(0, 0, 0, 0.01);
            border: 1px solid var(--color-border);
            border-radius: 14px;
            padding: 18px;
            display: flex; flex-direction: column; gap: 14px;
        }
        .dark .work-panel {
            background: rgba(10,11,15,0.4);
        }
        .work-panel h3 { font-family: var(--font-display); font-size: 1rem; font-weight: 600; letter-spacing: -0.01em; color: var(--color-text-primary); margin: 0; }

        /* Custom typing effect animations */
        @keyframes blink {
            50% { opacity: 0; }
        }
        .cursor-blink::after {
            content: '|';
            animation: blink 1s step-end infinite;
            color: var(--color-primary);
        }

        /* Section layout */
        .section { padding: 80px 0; }
        .section-head { display: flex; flex-direction: column; align-items: flex-start; gap: 14px; margin-bottom: 40px; max-width: 720px; text-align: left; }
        .section-head h2 { font-family: var(--font-display); font-size: clamp(1.75rem, 3.5vw, 2.5rem); letter-spacing: -0.025em; line-height: 1.08; font-weight: 600; color: var(--color-text-primary); margin: 0; }
        .section-head p { font-family: var(--font-body); font-size: 1rem; color: var(--color-text-secondary); margin: 0; max-width: 60ch; line-height: 1.55; }
        
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 20px;
        }
        .comp-card {
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-height: 100%;
            text-align: left;
            transition: border-color var(--motion-base) var(--easing-standard);
        }
        .comp-card:hover {
            border-color: var(--color-border-strong);
        }
        .comp-card .icon-wrapper {
            width: 44px; height: 44px;
            border-radius: 10px;
            background: var(--color-primary-soft);
            color: var(--color-primary);
            display: flex; align-items: center; justify-content: center;
        }
    </style>
</head>
<body class="font-sans antialiased overflow-x-hidden selection:bg-purple-500/30 selection:text-purple-200 transition-colors duration-300">
    
    <!-- Navigation Header -->
    <header class="page-nav">
        <div class="container flex items-center justify-between h-16">
            <div class="nav-left flex items-center gap-8">
                <a href="#" class="brand-row" aria-label="BPI home">
                    <span class="brand-mark" aria-hidden="true"></span>
                    <span class="brand-name">BPI<span class="brand-suffix"> / Club</span></span>
                </a>
                <nav class="nav-items hidden md:flex items-center gap-6">
                    <a href="#events">Events</a>
                    <a href="#cities">Cities</a>
                    <a href="#membership">Membership</a>
                    <a href="#community">Community</a>
                    <a href="#blog">Blog</a>
                </nav>
            </div>
            <div class="nav-right flex items-center gap-4 sm:gap-6">
                <!-- Theme Toggle Switch (Shadcn UI style) -->
                <div class="flex items-center gap-2">
                    <button id="theme-toggle-btn" onclick="toggleTheme()" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-slate-950 bg-slate-200 dark:bg-indigo-600" aria-label="Toggle Theme">
                        <span id="theme-toggle-thumb" class="pointer-events-none block h-5 w-5 rounded-full bg-white shadow-lg ring-0 transition-transform duration-200 translate-x-0 dark:translate-x-5 flex items-center justify-center">
                            <!-- Sun icon in light mode -->
                            <svg class="w-3 h-3 text-amber-500 dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.413 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/></svg>
                            <!-- Moon icon in dark mode -->
                            <svg class="w-3 h-3 text-indigo-500 hidden dark:block" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg>
                        </span>
                    </button>
                </div>

                <a href="#" class="hidden sm:inline-flex btn btn-tertiary btn-sm">Sign In</a>
                <a href="#membership" class="btn btn-primary btn-sm">
                    Join Free
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        
        <!-- Hero Section -->
        <section class="hero" id="system">
            <div class="container">
                <div class="hero-text">
                    <span class="hero-eyebrow">
                        <span class="pill-dot">★</span>
                        India's Largest Bachelor Community
                    </span>
                    <h1>
                        Meet. Party. Travel.<br />
                        <span class="accent">Make New Friends.</span>
                    </h1>
                    <p class="hero-sub">
                        Join exclusive bachelor events, weekend trips, nightlife, and social meetups across India.
                    </p>
                    <div class="hero-actions">
                        <a href="#membership" class="btn btn-primary btn-lg">Join Free</a>
                        <a href="#events" class="btn btn-secondary btn-lg">Explore Events</a>
                    </div>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <span class="num">10,000+</span>
                            <span class="lbl">Members</span>
                        </div>
                        <div class="meta-item">
                            <span class="num">250+</span>
                            <span class="lbl">Events</span>
                        </div>
                        <div class="meta-item">
                            <span class="num">30+</span>
                            <span class="lbl">Cities</span>
                        </div>
                    </div>
                </div>

                <!-- Right column - Rooftop Party image styled as Halo Dashboard Panel -->
                <aside class="hero-panel" aria-label="Rooftop Event Mock Panel">
                    <div class="panel-bar">
                        <div class="dots" aria-hidden="true">
                            <span class="dot"></span><span class="dot"></span><span class="dot"></span>
                        </div>
                        <span class="title">bpi.club / rooftop-mumbai</span>
                        <div class="right">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        </div>
                    </div>

                    <div class="panel-row mb-3">
                        <div class="mini-tile text-left" data-tone="info">
                            <div class="head">
                                <span class="eyb">Live Attendance</span>
                                <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            </div>
                            <div class="val">128 / 150</div>
                            <div class="foot">
                                <span class="delta delta-up">↑ 92% full</span>
                                <svg class="spark" viewBox="0 0 70 22" fill="none" stroke="var(--color-info)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="0,16 10,14 18,15 26,11 34,12 42,8 50,9 58,5 66,7" />
                                </svg>
                            </div>
                        </div>
                        <div class="mini-tile text-left" data-tone="success">
                            <div class="head">
                                <span class="eyb">Members Rating</span>
                                <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.961 0 1.367 1.243.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.907a1 1 0 00.95-.69l1.519-4.674z" /></svg>
                            </div>
                            <div class="val">4.9 / 5.0</div>
                            <div class="foot">
                                <span class="delta delta-up">↑ 240 reviews</span>
                                <svg class="spark" viewBox="0 0 70 22" fill="none" stroke="var(--color-success)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="0,14 10,15 18,12 26,13 34,9 42,11 50,7 58,8 66,4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Image with hover zoom & motion float -->
                    <div class="relative w-full aspect-[16/10] rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-lg animate-float transition-colors duration-300">
                        <img src="/rooftop_party.png" alt="Rooftop event" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-left">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-slate-950/60 backdrop-blur-sm text-[10px] text-white font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Rooftop Social in Mumbai
                            </span>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Scroll Indicator -->
            <div class="flex justify-center items-center pt-16">
                <a href="#events" class="flex flex-col items-center gap-2 group cursor-pointer text-decoration-none">
                    <span class="text-[10px] font-bold tracking-wider text-slate-500 group-hover:text-indigo-500 transition-colors uppercase">Scroll to Explore</span>
                    <div class="w-5 h-9 rounded-full border border-slate-300 dark:border-slate-800 flex justify-center pt-1 group-hover:border-indigo-500 transition-colors duration-300">
                        <div class="w-1 h-2 rounded-full bg-slate-400 dark:bg-slate-700 group-hover:bg-indigo-500 animate-bounce"></div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Features / Event Categories Section -->
        <section id="events" class="section border-t border-[var(--color-border)] bg-[var(--color-surface)]/20 transition-colors duration-300">
            <div class="container">
                <header class="section-head">
                    <span class="eyebrow">Event Styles</span>
                    <h2>Find Your Perfect Vibe</h2>
                    <p>From cozy rooftop gatherings to wild camping trips, we design curated environments for bachelors to connect and unwind.</p>
                </header>

                <div class="comp-grid">
                    <!-- Feature 1 -->
                    <div class="comp-card" style="grid-column: span 4">
                        <div class="icon-wrapper">
                            <!-- Star/Party icon -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                        </div>
                        <h3 class="t-title-md font-bold">Premium Parties</h3>
                        <p class="t-body-sm leading-relaxed">
                            Exclusive access to pool parties, villa takeovers, rooftop gatherings, and curated pub crawls in top tier clubs.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="comp-card" style="grid-column: span 4">
                        <div class="icon-wrapper">
                            <!-- Compass/Travel icon -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                        </div>
                        <h3 class="t-title-md font-bold">Weekend Getaways</h3>
                        <p class="t-body-sm leading-relaxed">
                            Road trips, forest camping, surfing trips in Goa, and mountain treks designed for adventure seekers.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="comp-card" style="grid-column: span 4">
                        <div class="icon-wrapper">
                            <!-- Chats/Social icon -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
                        </div>
                        <h3 class="t-title-md font-bold">Social Mixers</h3>
                        <p class="t-body-sm leading-relaxed">
                            Structured offline meetups, board game nights, coffee socials, and private network groups for working professionals.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive AI Playground / Simulator -->
        <section id="community" class="section border-t border-[var(--color-border)] bg-[var(--color-surface)]/10 transition-colors duration-300">
            <div class="container">
                <header class="section-head">
                    <span class="eyebrow">Virtual Console</span>
                    <h2>Interactive Task Simulator</h2>
                    <p>Choose an action in the workspace sidebar below to run diagnostic agent tasks and watch simulated execution logs.</p>
                </header>

                <!-- Product Shell Mockup -->
                <div class="product-shell">
                    <!-- Left Sidebar -->
                    <div class="side-nav">
                        <div class="side-brand">
                            <span class="brand-mark"></span>
                            <span>BPI console</span>
                        </div>
                        <div class="side-section">
                            <span class="grp">Simulated Tasks</span>
                            
                            <button onclick="runCommand('email')" class="cmd-btn side-link is-active" id="btn-email">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                Dispatch Invites
                            </button>

                            <button onclick="runCommand('schema')" class="cmd-btn side-link" id="btn-schema">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4" /></svg>
                                Inspect database
                            </button>

                            <button onclick="runCommand('test')" class="cmd-btn side-link" id="btn-test">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Run unit validation
                            </button>
                        </div>

                        <!-- Footer indicator inside sidebar -->
                        <div class="side-foot">
                            <span class="avatar"></span>
                            <div class="who">
                                <span class="nm">Vikram Sen</span>
                                <span class="em">admin@bpi.club</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Console Panel -->
                    <div class="main-area">
                        <div class="main-head">
                            <div class="crumb">
                                console / <b>tasks</b>
                            </div>
                            <span class="chip" data-tone="success">
                                <span class="badge-dot" data-tone="success"></span>
                                Agent Online
                            </span>
                        </div>

                        <!-- Terminal Panel -->
                        <div class="work-panel text-left">
                            <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-3 mb-2">
                                <h3>Console Execution Output</h3>
                                <span class="t-mono-sm t-muted text-xs">agent-output.log</span>
                            </div>
                            <!-- Terminal Screen -->
                            <div class="font-mono text-xs sm:text-sm min-h-[250px] overflow-y-auto max-h-[300px] p-2 bg-transparent" id="terminal-content">
                                <div class="text-slate-400 dark:text-slate-500 mb-2">// Click any task in the sidebar on the left to start execution...</div>
                                <div id="terminal-cursor" class="text-[var(--color-primary)] font-semibold cursor-blink">$ </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="membership" class="section border-t border-[var(--color-border)] bg-[var(--color-surface)]/20 transition-colors duration-300">
            <div class="container text-center">
                <header class="section-head mx-auto text-center items-center">
                    <span class="eyebrow">Pricing</span>
                    <h2>Simple, Transparent Tiers</h2>
                    <p>Choose the level of access that matches your lifestyle. Upgrade or downgrade anytime.</p>

                    <!-- Toggle Monthly/Yearly -->
                    <div class="mt-8 flex items-center justify-center gap-3">
                        <span id="label-monthly" class="text-sm font-medium text-slate-900 dark:text-white">Monthly</span>
                        <button onclick="togglePricing()" id="pricing-toggle" class="relative inline-flex h-6 w-11 items-center rounded-full bg-[var(--color-primary)] transition-colors duration-200 focus:outline-none">
                            <span id="pricing-toggle-dot" class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 translate-x-1"></span>
                        </button>
                        <span id="label-yearly" class="text-sm font-medium text-slate-400 dark:text-slate-500">Yearly <span class="text-[var(--color-primary)] text-xs font-semibold bg-indigo-500/10 px-2 py-0.5 rounded-full border border-indigo-500/20">Save 20%</span></span>
                    </div>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto mt-12">
                    <!-- Dev Tier -->
                    <div class="card text-left flex flex-col justify-between hover:shadow-lg transition-all duration-300">
                        <div>
                            <h3 class="t-title-md font-bold text-slate-900 dark:text-white mb-2">Free</h3>
                            <p class="text-slate-500 text-xs mb-6">Browse events and read blogs.</p>
                            <div class="flex items-baseline mb-6">
                                <span class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">$</span>
                                <span id="price-dev" class="text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">0</span>
                                <span class="text-slate-500 text-sm ml-2">/ month</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8 list-none p-0">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Browse all open events
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    View featured cities
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Join the online community group
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-secondary w-full">Join Free</a>
                    </div>

                    <!-- Pro Tier -->
                    <div class="card card-elevated card-accent text-left flex flex-col justify-between relative shadow-xl">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-[var(--color-primary)] text-white text-[10px] font-bold uppercase tracking-wider">Most Popular</div>
                        <div>
                            <h3 class="t-title-md font-bold text-slate-900 dark:text-white mb-2">Premium Pass</h3>
                            <p class="text-slate-500 text-xs mb-6">Access to exclusive trips & VIP events.</p>
                            <div class="flex items-baseline mb-6">
                                <span class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">$</span>
                                <span id="price-pro" class="text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">49</span>
                                <span class="text-slate-500 text-sm ml-2">/ month</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8 list-none p-0">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    VIP Event Invites (Pool & Villa parties)
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Early Booking Access
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Private Event Groups (Local meetups)
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Up to 20% discount on tickets
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-primary w-full">Start 14-day trial</a>
                    </div>

                    <!-- Enterprise Tier -->
                    <div class="card text-left flex flex-col justify-between hover:shadow-lg transition-all duration-300">
                        <div>
                            <h3 class="t-title-md font-bold text-slate-900 dark:text-white mb-2">Club VIP</h3>
                            <p class="text-slate-500 text-xs mb-6">Fully managed private groups & custom trips.</p>
                            <div class="flex items-baseline mb-6">
                                <span id="price-ent" class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Custom</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8 list-none p-0">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Bespoke weekend trip itineraries
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Dedicated relationship host
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Private booking portal access
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Unlimited event entries
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-secondary w-full">Contact sales</a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="foot bg-[var(--color-surface)] transition-colors duration-300">
        <div class="container">
            <div class="foot-left">
                <a href="#" class="brand-row" aria-label="BPI home">
                    <span class="brand-mark" aria-hidden="true"></span>
                    <span class="brand-name">BPI<span class="brand-suffix"> / Club</span></span>
                </a>
                <span class="foot-version">v1.0.0</span>
            </div>
            <p class="foot-copy">
                &copy; {{ date('Y') }} Bachelors Party of India. All rights reserved.
            </p>
            <div class="foot-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Support</a>
            </div>
        </div>
    </footer>

    <!-- Interactive JS Scripts -->
    <script>
        // Theme Toggling Logic
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        // Terminal Scripts
        const termContent = document.getElementById('terminal-content');
        const termCursor = document.getElementById('terminal-cursor');
        
        const commands = {
            email: [
                { text: '$ php artisan dispatch:event InviteBachelorsEvent --id=102', delay: 100 },
                { text: '[INFO] Dispatching event: App\\Events\\InviteBachelorsEvent', delay: 500 },
                { text: '[INFO] Compiling guestlist from Mumbai & Pune regions...', delay: 300 },
                { text: '[INFO] Dispatching 124 invites to queued emails...', delay: 400 },
                { text: '[SUCCESS] Invites pushed to mail gateway queue. Job ID: 887212', delay: 300 },
                { text: '[INFO] Processing job: App\\Jobs\\SendQueuedInvites (ID: 887212)', delay: 500 },
                { text: '[SUCCESS] Mail notifications dispatched to guests successfully.', delay: 400 }
            ],
            schema: [
                { text: '$ php artisan inspect:database --table=events', delay: 100 },
                { text: '[INFO] Scanning event metadata schema structures...', delay: 600 },
                { text: '[INFO] Found table columns: id, name, location, price, max_seats, date, created_at', delay: 300 },
                { text: '[INFO] Status: Database tables indexing matching all constraints.', delay: 400 },
                { text: '[SUCCESS] DB metadata analysis successfully complete.', delay: 200 }
            ],
            test: [
                { text: '$ php artisan test --filter=EventBookingTest', delay: 100 },
                { text: '   INFO  Running tests...', delay: 400 },
                { text: '  ✓ App\\Tests\\Feature\\EventBookingTest > user_can_book_available_seat', delay: 300 },
                { text: '  ✓ App\\Tests\\Feature\\EventBookingTest > user_cannot_book_filled_seats', delay: 200 },
                { text: '', delay: 100 },
                { text: '  Tests:    2 passed (2 assertions)', delay: 100 },
                { text: '  Duration: 0.12s', delay: 100 },
                { text: '[SUCCESS] All execution validation tests completed.', delay: 200 }
            ]
        };

        function runCommand(key) {
            // Update Active button state in Sidebar
            const buttons = document.querySelectorAll('.cmd-btn');
            buttons.forEach(btn => {
                btn.classList.remove('is-active');
            });
            document.getElementById('btn-' + key).classList.add('is-active');

            // Disable buttons during output simulation
            buttons.forEach(btn => btn.classList.add('opacity-50', 'pointer-events-none'));

            termContent.innerHTML = '';
            termContent.appendChild(termCursor);
            termCursor.className = 'text-[var(--color-primary)] font-semibold cursor-blink';

            let lineIndex = 0;
            const lines = commands[key];

            function addNextLine() {
                if (lineIndex >= lines.length) {
                    buttons.forEach(btn => btn.classList.remove('opacity-50', 'pointer-events-none'));
                    termCursor.className = 'text-[var(--color-primary)] font-semibold cursor-blink';
                    return;
                }

                const lineData = lines[lineIndex];
                const newLine = document.createElement('div');
                
                if (lineData.text.startsWith('$')) {
                    newLine.className = 'text-slate-800 dark:text-slate-300 font-bold mt-3 mb-1';
                    termCursor.className = 'text-[var(--color-primary)] font-semibold';
                } else if (lineData.text.includes('[SUCCESS]')) {
                    newLine.className = 'text-emerald-600 dark:text-emerald-400';
                } else if (lineData.text.includes('[WARNING]')) {
                    newLine.className = 'text-amber-600 dark:text-amber-400';
                } else if (lineData.text.includes('✓')) {
                    newLine.className = 'text-emerald-600 dark:text-emerald-400 pl-2';
                } else if (lineData.text.includes('passed')) {
                    newLine.className = 'text-emerald-600 dark:text-emerald-400 font-bold mt-2';
                } else {
                    newLine.className = 'text-slate-500 dark:text-slate-400';
                }

                newLine.textContent = lineData.text;
                termContent.insertBefore(newLine, termCursor);
                termContent.scrollTop = termContent.scrollHeight;

                lineIndex++;
                setTimeout(addNextLine, lineData.delay);
            }

            addNextLine();
        }

        // Pricing Script
        let isYearly = false;
        const prices = {
            monthly: { dev: "0", pro: "49" },
            yearly: { dev: "0", pro: "39" }
        };

        function togglePricing() {
            isYearly = !isYearly;
            
            const dot = document.getElementById('pricing-toggle-dot');
            const toggle = document.getElementById('pricing-toggle');
            const monthlyLabel = document.getElementById('label-monthly');
            const yearlyLabel = document.getElementById('label-yearly');
            
            const devPrice = document.getElementById('price-dev');
            const proPrice = document.getElementById('price-pro');

            if (isYearly) {
                dot.className = 'inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 translate-x-6';
                toggle.className = 'relative inline-flex h-6 w-11 items-center rounded-full bg-[var(--color-primary)] transition-colors duration-200 focus:outline-none';
                monthlyLabel.className = 'text-sm font-medium text-slate-400 dark:text-slate-500';
                yearlyLabel.className = 'text-sm font-medium text-slate-900 dark:text-white';
                
                devPrice.textContent = prices.yearly.dev;
                proPrice.textContent = prices.yearly.pro;
            } else {
                dot.className = 'inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 translate-x-1';
                toggle.className = 'relative inline-flex h-6 w-11 items-center rounded-full bg-[var(--color-primary)] transition-colors duration-200 focus:outline-none';
                monthlyLabel.className = 'text-sm font-medium text-slate-900 dark:text-white';
                yearlyLabel.className = 'text-sm font-medium text-slate-400 dark:text-slate-500';
                
                devPrice.textContent = prices.monthly.dev;
                proPrice.textContent = prices.monthly.pro;
            }
        }
    </script>
</body>
</html>
