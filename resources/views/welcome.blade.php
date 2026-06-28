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
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        .dark ::-webkit-scrollbar-track {
            background: #020617;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #1e293b;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
        /* Custom floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        /* Custom typing effect animations */
        @keyframes blink {
            50% { opacity: 0; }
        }
        .cursor-blink::after {
            content: '|';
            animation: blink 1s step-end infinite;
            color: #a855f7;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 overflow-x-hidden selection:bg-purple-500/30 selection:text-purple-200 transition-colors duration-300">
    
    <!-- Background Gradients -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[600px] pointer-events-none overflow-hidden -z-10 opacity-30 dark:opacity-40">
        <div class="absolute top-[-10%] left-[20%] w-[600px] h-[600px] rounded-full bg-indigo-500/20 blur-[120px]"></div>
        <div class="absolute top-[10%] right-[10%] w-[500px] h-[500px] rounded-full bg-purple-500/20 blur-[100px]"></div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200 dark:border-slate-900 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    <span class="font-bold text-lg text-white">BPI</span>
                </div>
                <span class="font-bold text-xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-slate-100 dark:to-slate-400">Club</span>
            </div>
            
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600 dark:text-slate-400">
                <a href="#events" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Events</a>
                <a href="#cities" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Cities</a>
                <a href="#membership" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Membership</a>
                <a href="#community" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Community</a>
                <a href="#blog" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Blog</a>
            </nav>

            <div class="flex items-center gap-4 sm:gap-6">
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

                <a href="#" class="hidden sm:inline-flex text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Sign In</a>
                <a href="#membership" class="relative group overflow-hidden rounded-xl px-4 py-2 text-sm font-medium text-white transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 transition-all duration-300 group-hover:opacity-90"></div>
                    <span class="relative flex items-center gap-1.5">
                        Join Free 
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16 lg:pt-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Column (45%) -->
                <div class="lg:col-span-5 text-left flex flex-col justify-center">
                    <div class="inline-flex items-center w-fit gap-2 px-3.5 py-1.5 rounded-full border border-indigo-500/30 bg-indigo-500/10 text-indigo-600 dark:text-indigo-300 text-xs font-bold mb-6 tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-indigo-500 dark:bg-indigo-400 animate-pulse"></span>
                        India's Largest Bachelor Community
                    </div>
                    
                    <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-6 leading-none transition-colors duration-300">
                        Meet. Party. Travel. <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 dark:from-indigo-400 dark:via-purple-400 dark:to-pink-400">Make New Friends.</span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 dark:text-slate-400 max-w-lg mb-8 leading-relaxed transition-colors duration-300">
                        Join exclusive bachelor events, weekend trips, nightlife, and social meetups across India.
                    </p>
                    
                    <div class="flex flex-row items-center gap-4 mb-10">
                        <a href="#membership" class="px-8 py-4 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-bold shadow-lg shadow-indigo-500/20 hover:opacity-95 transition-opacity flex items-center gap-2">
                            Join Free
                        </a>
                        <a href="#events" class="px-8 py-4 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white font-bold shadow-sm hover:bg-slate-200/50 dark:hover:bg-slate-900/60 hover:border-indigo-500/30 transition-all duration-300">
                            Explore Events
                        </a>
                    </div>

                    <!-- Metrics / Social Proof -->
                    <div class="pt-8 border-t border-slate-200 dark:border-slate-900 grid grid-cols-3 gap-6 text-left transition-colors duration-300">
                        <div>
                            <div class="flex items-center gap-0.5 text-amber-500 mb-1">
                                <span class="text-lg">★</span><span class="text-lg">★</span><span class="text-lg">★</span><span class="text-lg">★</span><span class="text-lg">★</span>
                            </div>
                            <p class="text-2xl font-extrabold text-slate-900 dark:text-white">10,000+</p>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Members</p>
                        </div>
                        <div>
                            <div class="h-6 flex items-center mb-1">
                                <span class="text-xs font-bold text-indigo-500 dark:text-indigo-400 bg-indigo-500/10 px-2 py-0.5 rounded-full border border-indigo-500/20">Active</span>
                            </div>
                            <p class="text-2xl font-extrabold text-slate-900 dark:text-white">250+</p>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Events</p>
                        </div>
                        <div>
                            <div class="h-6 flex items-center mb-1">
                                <span class="text-xs font-bold text-pink-500 dark:text-pink-400 bg-pink-500/10 px-2 py-0.5 rounded-full border border-pink-500/20">Pan-India</span>
                            </div>
                            <p class="text-2xl font-extrabold text-slate-900 dark:text-white">30+</p>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Cities</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column (55%) -->
                <div class="lg:col-span-7 flex justify-center items-center relative">
                    <div class="relative w-full max-w-xl aspect-[4/3] rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-2xl animate-float transition-colors duration-300">
                        <img src="/rooftop_party.png" alt="Happy people at a rooftop party overlooking the city" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-left">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-950/50 backdrop-blur-sm border border-white/20 text-white text-[11px] font-semibold mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Featured Event: Rooftop Social in Mumbai
                            </div>
                        </div>
                    </div>
                    <!-- Glow effect under image -->
                    <div class="absolute -z-10 w-[80%] h-[80%] rounded-full bg-indigo-500/10 blur-[100px] pointer-events-none"></div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="flex justify-center items-center pt-16">
                <a href="#events" class="flex flex-col items-center gap-2 group cursor-pointer">
                    <span class="text-xs font-semibold tracking-wider text-slate-500 group-hover:text-indigo-500 transition-colors uppercase">Scroll to Explore</span>
                    <div class="w-6 h-10 rounded-full border-2 border-slate-300 dark:border-slate-800 flex justify-center pt-1.5 group-hover:border-indigo-500 transition-colors duration-300">
                        <div class="w-1.5 h-2.5 rounded-full bg-slate-400 dark:bg-slate-700 group-hover:bg-indigo-500 animate-bounce"></div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="border-t border-slate-200 dark:border-slate-900 bg-slate-50/60 dark:bg-slate-950/60 py-24 relative transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white mb-4">
                        Everything You Need to Automate at Scale
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                        Say goodbye to complex workflows. Our platform provides pre-packaged blocks and models that communicate seamlessly.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="border border-slate-200 dark:border-slate-900 hover:border-indigo-500/20 rounded-2xl p-8 bg-white dark:bg-slate-950/40 backdrop-blur-md transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center mb-6 shadow-md shadow-indigo-500/10">
                            <!-- Database Icon -->
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-3">Database Queries</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Connect your PostgreSQL, MySQL or MongoDB in one click. Our agent queries database structures and executes read-only operations safely.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="border border-slate-200 dark:border-slate-900 hover:border-purple-500/20 rounded-2xl p-8 bg-white dark:bg-slate-950/40 backdrop-blur-md transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-purple-500 to-pink-500 flex items-center justify-center mb-6 shadow-md shadow-purple-500/10">
                            <!-- Code Icon -->
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-3">Code Generation & Lint</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Generate standard PHP classes, refactor models, and automatically run PHP Pint formatting tools directly from within the workflow.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="border border-slate-200 dark:border-slate-900 hover:border-pink-500/20 rounded-2xl p-8 bg-white dark:bg-slate-950/40 backdrop-blur-md transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-pink-500 to-indigo-500 flex items-center justify-center mb-6 shadow-md shadow-pink-500/10">
                            <!-- Testing Icon -->
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-3">Continuous Testing</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Run precise test cases with PHPUnit execution filters on code changes. Catch regressions automatically before they impact staging.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive AI Playground -->
        <section id="playground" class="py-24 bg-white dark:bg-slate-950 relative overflow-hidden transition-colors duration-300">
            <!-- Background Glow -->
            <div class="absolute right-0 bottom-[-10%] w-[450px] h-[450px] rounded-full bg-pink-500/10 blur-[100px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left: Control text -->
                    <div class="lg:col-span-5 text-left">
                        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white mb-4">
                            Interactive Task Simulator
                        </h2>
                        <p class="text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                            Click on one of the common agent commands below to watch the Intelligent Business Platform's virtual agent orchestrate and complete tasks on a simulated stack.
                        </p>
                        
                        <div class="flex flex-col gap-3">
                            <button onclick="runCommand('email')" class="cmd-btn w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-900 hover:border-slate-300 dark:hover:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-900/40 text-left transition-all duration-200 flex items-center justify-between group active:scale-[0.99] bg-white dark:bg-slate-950">
                                <div>
                                    <div class="font-semibold text-slate-900 dark:text-white text-sm">Send Notification Event</div>
                                    <div class="text-xs text-slate-500 mt-1">Triggers queued mails and event system log</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 dark:text-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <button onclick="runCommand('schema')" class="cmd-btn w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-900 hover:border-slate-300 dark:hover:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-900/40 text-left transition-all duration-200 flex items-center justify-between group active:scale-[0.99] bg-white dark:bg-slate-950">
                                <div>
                                    <div class="font-semibold text-slate-900 dark:text-white text-sm">Analyze Database Schema</div>
                                    <div class="text-xs text-slate-500 mt-1">Queries tables and creates a migration script</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 dark:text-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <button onclick="runCommand('test')" class="cmd-btn w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-900 hover:border-slate-300 dark:hover:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-900/40 text-left transition-all duration-200 flex items-center justify-between group active:scale-[0.99] bg-white dark:bg-slate-950">
                                <div>
                                    <div class="font-semibold text-slate-900 dark:text-white text-sm">Run Feature Validation</div>
                                    <div class="text-xs text-slate-500 mt-1">Triggers PHPUnit validation for User model</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 dark:text-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Right: Console terminal simulator -->
                    <div class="lg:col-span-7">
                        <div class="border border-slate-200 dark:border-slate-900 rounded-2xl bg-slate-50 dark:bg-slate-950/80 shadow-2xl relative transition-colors duration-300">
                            <!-- Terminal bar -->
                            <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-900 px-5 py-4">
                                <div class="flex gap-2">
                                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                    <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                </div>
                                <div class="text-xs text-slate-500 font-mono">agent-terminal.sh</div>
                                <div class="text-xs px-2 py-0.5 rounded bg-slate-200 dark:bg-slate-900 text-slate-600 dark:text-slate-400 font-mono transition-colors">online</div>
                            </div>
                            <!-- Terminal content -->
                            <div class="p-6 font-mono text-xs sm:text-sm text-left min-h-[340px] overflow-y-auto max-h-[400px] bg-white dark:bg-slate-950/80 transition-colors duration-300" id="terminal-content">
                                <div class="text-slate-400 dark:text-slate-500 mb-2">// Select a command on the left to start execution simulator...</div>
                                <div id="terminal-cursor" class="text-indigo-600 dark:text-indigo-400 font-semibold cursor-blink">$ </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-24 border-t border-slate-200 dark:border-slate-900 bg-slate-50/40 dark:bg-slate-950/40 relative transition-colors duration-300">
            <div class="absolute left-0 top-[20%] w-[350px] h-[350px] rounded-full bg-indigo-500/5 blur-[80px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-3xl mx-auto mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white mb-4">
                        Simple, Scalable Pricing
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400">
                        Choose the tier that best matches your workflow scale. No hidden fees.
                    </p>

                    <!-- Toggle Monthly/Yearly -->
                    <div class="mt-8 flex items-center justify-center gap-3">
                        <span id="label-monthly" class="text-sm font-medium text-slate-900 dark:text-white">Monthly</span>
                        <button onclick="togglePricing()" id="pricing-toggle" class="relative inline-flex h-6 w-11 items-center rounded-full bg-indigo-600 transition-colors duration-200 focus:outline-none">
                            <span id="pricing-toggle-dot" class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 translate-x-1"></span>
                        </button>
                        <span id="label-yearly" class="text-sm font-medium text-slate-400 dark:text-slate-500">Yearly <span class="text-indigo-600 dark:text-indigo-400 text-xs font-semibold bg-indigo-500/10 px-2 py-0.5 rounded-full border border-indigo-500/20">Save 20%</span></span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <!-- Tier 1 -->
                    <div class="border border-slate-200 dark:border-slate-900 rounded-2xl p-8 bg-white dark:bg-slate-950/60 text-left flex flex-col justify-between hover:shadow-lg dark:hover:shadow-none transition-all duration-300">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Developer</h3>
                            <p class="text-slate-500 text-xs mb-6">Perfect for small side projects.</p>
                            <div class="flex items-baseline mb-6">
                                <span class="text-4xl font-bold text-slate-900 dark:text-white tracking-tight">$</span>
                                <span id="price-dev" class="text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">0</span>
                                <span class="text-slate-500 text-sm ml-2">/ month</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    1 Active Agent Task
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    SQLite Connection
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    100 agent runs / month
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="w-full text-center px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white font-medium hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors">Start for free</a>
                    </div>

                    <!-- Tier 2 -->
                    <div class="border-2 border-indigo-500 rounded-2xl p-8 bg-white dark:bg-slate-950/80 text-left flex flex-col justify-between relative shadow-xl dark:shadow-none">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-indigo-500 text-white text-xs font-semibold uppercase tracking-wider">Most Popular</div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Pro</h3>
                            <p class="text-slate-500 text-xs mb-6">For scaling business automations.</p>
                            <div class="flex items-baseline mb-6">
                                <span class="text-4xl font-bold text-slate-900 dark:text-white tracking-tight">$</span>
                                <span id="price-pro" class="text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">49</span>
                                <span class="text-slate-500 text-sm ml-2">/ month</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    15 Active Agent Tasks
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    PostgreSQL / MySQL Support
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    50,000 runs / month
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Premium Chat Support
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="w-full text-center px-4 py-3 rounded-xl bg-indigo-500 text-white font-medium hover:bg-indigo-600 transition-colors">Start 14-day trial</a>
                    </div>

                    <!-- Tier 3 -->
                    <div class="border border-slate-200 dark:border-slate-900 rounded-2xl p-8 bg-white dark:bg-slate-950/60 text-left flex flex-col justify-between hover:shadow-lg dark:hover:shadow-none transition-all duration-300">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Enterprise</h3>
                            <p class="text-slate-500 text-xs mb-6">Custom workloads and dedicated agents.</p>
                            <div class="flex items-baseline mb-6">
                                <span id="price-ent" class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Custom</span>
                            </div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 mb-8">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Unlimited Active Tasks
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Dedicated Agent Servers
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    SLA-backed Uptime
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4.5 h-4.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    On-premise Deployment
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="w-full text-center px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white font-medium hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors">Contact sales</a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 dark:border-slate-900 bg-slate-50 dark:bg-slate-950 py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center">
                    <span class="font-bold text-xs text-white">IB</span>
                </div>
                <span class="font-bold text-sm tracking-tight text-slate-900 dark:text-white">IBP Platform</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-600">
                &copy; {{ date('Y') }} Intelligent Business Platform. All rights reserved.
            </p>
            <div class="flex items-center gap-6 text-xs text-slate-500 dark:text-slate-600">
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-300">Privacy Policy</a>
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-300">Terms of Service</a>
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-300">Support</a>
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
                { text: '$ php artisan dispatch:event NotifyUserEvent --id=42', delay: 100 },
                { text: '[INFO] Dispatching event: App\\Events\\NotifyUserEvent', delay: 500 },
                { text: '[INFO] Serializing event payload...', delay: 300 },
                { text: '[INFO] Pushing job class App\\Jobs\\SendQueuedMail to queue [default]', delay: 400 },
                { text: '[SUCCESS] Event pushed to redis connection. Job ID: 221298', delay: 300 },
                { text: '[INFO] Running local queue worker instance...', delay: 200 },
                { text: '[INFO] Processing job: App\\Jobs\\SendQueuedMail (ID: 221298)', delay: 500 },
                { text: '[SUCCESS] Mail successfully dispatched to user: test@example.com', delay: 400 }
            ],
            schema: [
                { text: '$ php artisan inspect:schema --table=orders', delay: 100 },
                { text: '[INFO] Scanning database metadata for order table...', delay: 600 },
                { text: '[INFO] Found table columns: id, user_id, amount, status, created_at, updated_at', delay: 300 },
                { text: '[WARNING] Foreign key: user_id is unconstrained. Checking model code...', delay: 500 },
                { text: '$ php artisan make:migration add_constrained_fk_to_orders --table=orders', delay: 100 },
                { text: '[SUCCESS] Created migration: database/migrations/2026_06_28_add_constrained_fk_to_orders.php', delay: 400 },
                { text: '[INFO] Updating file content to specify constrained references...', delay: 400 },
                { text: '[SUCCESS] Schema analysis complete and file updated.', delay: 200 }
            ],
            test: [
                { text: '$ php artisan test --filter=UserValidationTest', delay: 100 },
                { text: '   INFO  Running tests...', delay: 400 },
                { text: '  ✓ App\\Tests\\Feature\\UserValidationTest > validate_user_email_required', delay: 300 },
                { text: '  ✓ App\\Tests\\Feature\\UserValidationTest > validate_user_password_min_length', delay: 200 },
                { text: '  ✓ App\\Tests\\Feature\\UserValidationTest > validate_user_phone_number_optional', delay: 200 },
                { text: '', delay: 100 },
                { text: '  Tests:    3 passed (3 assertions)', delay: 100 },
                { text: '  Duration: 0.14s', delay: 100 },
                { text: '[SUCCESS] All validation tests completed successfully.', delay: 200 }
            ]
        };

        function runCommand(key) {
            const buttons = document.querySelectorAll('.cmd-btn');
            buttons.forEach(btn => btn.classList.add('opacity-50', 'pointer-events-none'));

            termContent.innerHTML = '';
            termContent.appendChild(termCursor);
            termCursor.className = 'text-indigo-600 dark:text-indigo-400 font-semibold cursor-blink';

            let lineIndex = 0;
            const lines = commands[key];

            function addNextLine() {
                if (lineIndex >= lines.length) {
                    buttons.forEach(btn => btn.classList.remove('opacity-50', 'pointer-events-none'));
                    termCursor.className = 'text-indigo-600 dark:text-indigo-400 font-semibold cursor-blink';
                    return;
                }

                const lineData = lines[lineIndex];
                const newLine = document.createElement('div');
                
                if (lineData.text.startsWith('$')) {
                    newLine.className = 'text-slate-800 dark:text-slate-300 font-bold mt-3 mb-1';
                    termCursor.className = 'text-indigo-600 dark:text-indigo-400 font-semibold';
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
                toggle.className = 'relative inline-flex h-6 w-11 items-center rounded-full bg-purple-600 transition-colors duration-200 focus:outline-none';
                monthlyLabel.className = 'text-sm font-medium text-slate-400 dark:text-slate-500';
                yearlyLabel.className = 'text-sm font-medium text-slate-900 dark:text-white';
                
                devPrice.textContent = prices.yearly.dev;
                proPrice.textContent = prices.yearly.pro;
            } else {
                dot.className = 'inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 translate-x-1';
                toggle.className = 'relative inline-flex h-6 w-11 items-center rounded-full bg-indigo-600 transition-colors duration-200 focus:outline-none';
                monthlyLabel.className = 'text-sm font-medium text-slate-900 dark:text-white';
                yearlyLabel.className = 'text-sm font-medium text-slate-400 dark:text-slate-500';
                
                devPrice.textContent = prices.monthly.dev;
                proPrice.textContent = prices.monthly.pro;
            }
        }
    </script>
</body>
</html>
