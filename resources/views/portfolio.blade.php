<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['name'] }} — Portfolio</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Anti-Flicker Theme Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 dark:bg-slate-950 dark:text-slate-100 antialiased selection:bg-indigo-500 selection:text-white min-h-screen relative overflow-x-hidden transition-colors duration-300">

    <!-- Background Mesh Gradients -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[500px] bg-gradient-to-tr from-indigo-500/10 via-sky-500/10 to-transparent dark:from-indigo-600/20 dark:via-sky-500/10 blur-3xl pointer-events-none -z-10"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-indigo-500/10 dark:bg-indigo-900/20 blur-3xl pointer-events-none -z-10"></div>

    <!-- Floating Sticky Navbar with Brand Logo -->
    <header class="sticky top-4 z-50 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <nav class="flex items-center justify-between p-2 sm:px-4 rounded-2xl bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 shadow-lg shadow-slate-900/5 transition-all duration-300">
            
            <!-- Brand Logo / Fallback Badge -->
            <a href="#about" class="flex items-center gap-2 group">
                @if(file_exists(public_path($profile['logo'])))
                    <img src="{{ asset($profile['logo']) }}" alt="Logo" class="w-8 h-8 rounded-xl object-contain border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-1 group-hover:scale-105 transition-transform duration-200">
                @else
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-500 to-sky-400 flex items-center justify-center text-white font-extrabold text-xs shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform duration-200">
                        KT
                    </div>
                @endif
                <span class="font-bold text-sm tracking-tight text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                    {{ $profile['name'] }}
                </span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center gap-1 text-sm font-semibold text-slate-600 dark:text-slate-300">
                <a href="#about" class="px-3 py-1.5 rounded-xl hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">About</a>
                <a href="#education" class="px-3 py-1.5 rounded-xl hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">Education</a>
                <a href="#skills" class="px-3 py-1.5 rounded-xl hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">Skills</a>
                <a href="#certifications" class="px-3 py-1.5 rounded-xl hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">Certifications</a>
                <a href="#projects" class="px-3 py-1.5 rounded-xl hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">Projects</a>
            </div>

            <!-- Theme Toggle Button -->
            <button id="theme-toggle" type="button" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:border-indigo-500 transition-all duration-300 text-sm cursor-pointer" aria-label="Toggle Theme">
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z"></path>
                </svg>
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>
        </nav>
    </header>

    <main class="max-w-4xl mx-auto px-4 pb-12 sm:px-6 lg:px-8 space-y-10">
        
        <!-- About Section / Hero Profile -->
        <section id="about" class="scroll-mt-24 relative bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl dark:shadow-2xl overflow-hidden transition-all duration-300">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 via-sky-400 to-emerald-400"></div>
            
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 relative z-10">
                <div class="relative group/avatar">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-sky-500 rounded-2xl blur opacity-60 dark:opacity-75 group-hover/avatar:opacity-100 transition duration-300"></div>
                    <img class="relative w-32 h-32 sm:w-36 sm:h-36 rounded-2xl object-cover shadow-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900" 
                         src="{{ asset('images/profile.jpg') }}" alt="{{ $profile['name'] }}">
                </div>

                <div class="flex-1 text-center sm:text-left space-y-3">
                    <div class="space-y-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 mb-1">
                            Available for Projects & Collaboration
                        </span>
                        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">{{ $profile['name'] }}</h1>
                        <p class="text-indigo-600 dark:text-indigo-400 font-medium text-base sm:text-lg">{{ $profile['role'] }}</p>
                    </div>

                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pt-1">
                        {{ $profile['about'] }}
                    </p>

                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 pt-2 text-sm text-slate-600 dark:text-slate-300">
                        <a href="mailto:{{ $profile['email'] }}" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/80 hover:border-indigo-500 text-xs font-medium hover:text-indigo-600 dark:hover:text-white transition-all duration-200">
                            <svg class="w-4 h-4 text-indigo-500 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            {{ $profile['email'] }}
                        </a>

                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/80 text-xs font-medium">
                            <svg class="w-4 h-4 text-indigo-500 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $profile['phone'] }}
                        </span>

                        <a href="{{ $profile['github'] }}" target="_blank" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/80 hover:border-indigo-500 text-xs font-medium hover:text-indigo-600 dark:hover:text-white transition-all duration-200">
                            <svg class="w-4 h-4 text-indigo-500 dark:text-indigo-400" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                            GitHub Profile
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education Section -->
        <section id="education" class="scroll-mt-24 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-lg dark:shadow-xl space-y-6">
            <div class="flex items-center gap-3 border-b border-slate-200 dark:border-slate-800 pb-4">
                <div class="p-2.5 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Education Background</h2>
            </div>

            <div class="relative border-l-2 border-slate-200 dark:border-slate-800 ml-4 pl-6 space-y-8">
                @foreach($profile['education'] as $edu)
                    <div class="relative group">
                        <div class="absolute -left-[31px] top-1.5 w-3.5 h-3.5 rounded-full border-2 border-slate-50 dark:border-slate-950 bg-indigo-500 group-hover:scale-125 transition-transform duration-200"></div>
                        
                        <div class="bg-slate-100/70 dark:bg-slate-800/50 border border-slate-200/80 dark:border-slate-700/70 hover:border-indigo-500 rounded-2xl p-5 transition-all duration-200 space-y-2">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-md bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20">
                                    {{ $edu['level'] }}
                                </span>
                                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                                    {{ $edu['year'] }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-300 transition-colors">{{ $edu['school'] }}</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-300 font-medium">{{ $edu['program'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Technical Skills Section -->
        <section id="skills" class="scroll-mt-24 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-lg dark:shadow-xl space-y-6">
            <div class="flex items-center gap-3 border-b border-slate-200 dark:border-slate-800 pb-4">
                <div class="p-2.5 rounded-xl bg-sky-500/10 border border-sky-500/20 text-sky-600 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Technical Skills</h2>
            </div>

            <div class="space-y-6">
                @foreach($profile['skills'] as $category => $skillList)
                    <div class="space-y-3">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">{{ $category }}</h3>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($skillList as $skill)
                                <span class="px-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/80 text-slate-700 dark:text-slate-200 text-sm font-medium hover:border-indigo-500 hover:text-indigo-600 dark:hover:text-white transition-all duration-200 cursor-default shadow-sm">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Certifications Section -->
        <section id="certifications" class="scroll-mt-24 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-lg dark:shadow-xl space-y-6">
            <div class="flex items-center gap-3 border-b border-slate-200 dark:border-slate-800 pb-4">
                <div class="p-2.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Certifications & Seminars</h2>
            </div>

            <div class="grid grid-cols-1 gap-4">
                @foreach($profile['certifications'] as $cert)
                    <div class="p-5 rounded-2xl bg-slate-100/70 dark:bg-slate-800/50 border border-slate-200/80 dark:border-slate-700/70 hover:border-emerald-500 transition-all duration-200 space-y-4">
                        @if(!empty($cert['image']))
                            <a href="{{ asset($cert['image']) }}" target="_blank" rel="noopener" class="block overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900">
                                <img src="{{ asset($cert['image']) }}" alt="{{ $cert['title'] }} certificate" class="w-full h-auto object-cover hover:scale-[1.02] transition-transform duration-300">
                            </a>
                        @endif
                        <div class="flex items-start gap-4">
                            <div class="p-2 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-bold text-slate-900 dark:text-white text-lg">{{ $cert['title'] }}</h3>
                                @if(!empty($cert['date']))
                                    <p class="text-indigo-600 dark:text-indigo-400 text-sm font-semibold">{{ $cert['date'] }}</p>
                                @endif
                                @if(!empty($cert['issuer']))
                                    <p class="text-slate-600 dark:text-slate-400 text-sm font-medium">{{ $cert['issuer'] }}</p>
                                @endif
                                @if(!empty($cert['type']))
                                    <span class="inline-block text-xs font-semibold px-2.5 py-0.5 rounded bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-300 dark:border-slate-700 mt-2">
                                        {{ $cert['type'] }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="scroll-mt-24 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-lg dark:shadow-xl space-y-6">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 dark:border-slate-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Projects</h2>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Selected work & live deployments</p>
                    </div>
                </div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    {{ count($profile['projects']) }} {{ count($profile['projects']) === 1 ? 'Project' : 'Projects' }}
                </span>
            </div>

            <div class="space-y-6">
                @foreach($profile['projects'] as $project)
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 dark:border-slate-700/70 bg-gradient-to-br from-slate-100/90 via-white/60 to-indigo-50/50 dark:from-slate-800/60 dark:via-slate-900/40 dark:to-indigo-950/20 shadow-sm hover:shadow-xl hover:border-indigo-400/60 dark:hover:border-indigo-500/50 transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 via-sky-400 to-emerald-400"></div>

                        <div class="grid lg:grid-cols-[minmax(0,1fr)_270px]">
                            <!-- Screenshot gallery -->
                            <div class="p-5 sm:p-7">
                                <div class="flex gap-3 sm:gap-4 overflow-x-auto snap-x snap-mandatory pb-2 sm:pb-0 sm:justify-center">
                                    @foreach($project['images'] as $index => $image)
                                        <a href="{{ asset($image) }}" target="_blank" rel="noopener" class="group relative w-[128px] sm:w-full max-w-[155px] shrink-0 snap-center" aria-label="Open {{ $project['title'] }} screenshot {{ $index + 1 }}">
                                            <div class="relative aspect-[1290/2796] rounded-[1.4rem] sm:rounded-[1.6rem] border-[4px] sm:border-[5px] border-slate-900 dark:border-slate-700 bg-slate-900 shadow-xl shadow-slate-900/25 overflow-hidden">
                                                <img src="{{ asset($image) }}" alt="{{ $project['title'] }} project screenshot {{ $index + 1 }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                                <div class="absolute inset-0 flex items-end justify-center p-3 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    <span class="text-[10px] font-semibold text-white bg-white/15 backdrop-blur px-2.5 py-1 rounded-full">View</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <p class="mt-3 text-center text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                    {{ count($project['images']) }} screens · tap any screen to enlarge
                                </p>
                            </div>

                            <!-- Project details -->
                            <div class="flex flex-col justify-center gap-4 p-6 sm:p-7 border-t lg:border-t-0 lg:border-l border-slate-200/80 dark:border-slate-700/60 bg-white/40 dark:bg-slate-900/30">
                                <div class="flex items-center gap-2">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                    </span>
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">Live Project</span>
                                </div>

                                <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">{{ $project['title'] }}</h3>

                                <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-300">
                                    A live web project with a mobile-first interface. Browse the key screens above, or visit the deployed site.
                                </p>

                                @if(!empty($project['url']))
                                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 w-full px-5 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-sky-500 text-white text-sm font-semibold shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5 transition-all duration-200">
                                        Visit Live Site
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="text-xs font-medium text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 break-all transition-colors">
                                        {{ $project['url'] }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center pt-6 text-slate-500 text-xs space-y-1">
            <p>© {{ date('Y') }} {{ $profile['name'] }}. Built with Laravel & Tailwind CSS.</p>
        </footer>

    </main>

    <!-- Theme Toggle JavaScript Logic -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        function updateToggleIcons() {
            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }

        updateToggleIcons();

        themeToggleBtn.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateToggleIcons();
        });
    </script>
</body>
</html>