<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Active nav glow */
        .nav-link.active {
            background: rgba(108,140,255,0.12);
            border-color: rgba(108,140,255,0.3);
            color: #8aa4ff;
        }
        .nav-link.active .nav-icon { color: #6c8cff; }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #111318; }
        ::-webkit-scrollbar-thumb { background: #2a2d3a; border-radius: 4px; }
    </style>
</head>
<body class="bg-[#111318] font-sans antialiased">

    @if (session('success'))
<script>
Swal.fire({
    title: "Success",
    text: "{{ session('success') }}",
    icon: "success",
    background: "#2a2d35",
    color: "#ffffff",
});
</script>
@endif

<div class="flex min-h-screen">

    {{-- ── SIDEBAR ── --}}
    <aside class="w-64 flex-shrink-0 bg-[#1a1d27] border-r border-white/[0.06] flex flex-col">

        {{-- Logo / Brand --}}
        <div class="px-6 py-6 border-b border-white/[0.06]">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#6c8cff] flex items-center justify-center shadow-lg shadow-[#6c8cff]/30">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.966 8.966 0 0 0-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white font-bold text-sm tracking-wide">BookShelf</p>
                    <p class="text-[#7c8497] text-[10px] tracking-widest uppercase">Admin Panel</p>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-5 space-y-1">
            <p class="px-3 mb-3 text-[10px] font-semibold tracking-[0.2em] text-[#7c8497] uppercase">Main Menu</p>

            <a href="/first" class="nav-link group flex items-center gap-3 px-3 py-2.5 rounded-lg border border-transparent text-[#9ca3af] text-sm font-medium transition-all duration-150 hover:bg-white/[0.04] hover:text-white hover:border-white/[0.06]">
                <span class="nav-icon text-[#7c8497] transition-colors group-hover:text-[#6c8cff]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </span>
                Home
            </a>

            <a href="{{ route('genre.index') }}" class="nav-link group flex items-center gap-3 px-3 py-2.5 rounded-lg border border-transparent text-[#9ca3af] text-sm font-medium transition-all duration-150 hover:bg-white/[0.04] hover:text-white hover:border-white/[0.06]">
                <span class="nav-icon text-[#7c8497] transition-colors group-hover:text-[#6c8cff]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                    </svg>
                </span>
                Genre
            </a>

            <a href="{{ route('penulis.index') }}" class="nav-link group flex items-center gap-3 px-3 py-2.5 rounded-lg border border-transparent text-[#9ca3af] text-sm font-medium transition-all duration-150 hover:bg-white/[0.04] hover:text-white hover:border-white/[0.06]">
                <span class="nav-icon text-[#7c8497] transition-colors group-hover:text-[#6c8cff]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </span>
                Author
            </a>

            <a href="{{ route('books.index') }}" class="nav-link group flex items-center gap-3 px-3 py-2.5 rounded-lg border border-transparent text-[#9ca3af] text-sm font-medium transition-all duration-150 hover:bg-white/[0.04] hover:text-white hover:border-white/[0.06]">
                <span class="nav-icon text-[#7c8497] transition-colors group-hover:text-[#6c8cff]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </span>
                Books
            </a>
        </nav>

        {{-- Sidebar footer --}}
        <div class="px-4 py-4 border-t border-white/[0.06]">
            <div class="flex items-center gap-3 px-2">
                <div class="w-7 h-7 rounded-full bg-[#6c8cff]/20 border border-[#6c8cff]/30 flex items-center justify-center text-[#6c8cff] text-xs font-bold flex-shrink-0">
                    U
                </div>
                <div class="min-w-0">
                    <p class="text-white text-xs font-medium truncate">User</p>
                    <p class="text-[#7c8497] text-[10px] truncate">Administrator</p>
                </div>
            </div>
        </div>

    </aside>
    {{-- ── END SIDEBAR ── --}}

    {{-- ── MAIN AREA ── --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Topbar --}}
        <header class="h-16 bg-[#1a1d27] border-b border-white/[0.06] flex items-center justify-between px-6 flex-shrink-0">

            {{-- Page breadcrumb / title --}}
            <div class="flex items-center gap-2 text-sm">
                <span class="text-[#7c8497]">Dashboard</span>
                <svg class="w-3 h-3 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                <span class="text-white font-medium" id="page-title">Overview</span>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-4">

                {{-- Notification bell --}}
                <button class="relative w-8 h-8 rounded-lg bg-white/[0.04] border border-white/[0.06] flex items-center justify-center text-[#7c8497] hover:text-white hover:bg-white/[0.08] transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                    <span class="absolute top-1 right-1 w-1.5 h-1.5 bg-[#6c8cff] rounded-full"></span>
                </button>

                {{-- Divider --}}
                <div class="w-px h-5 bg-white/[0.08]"></div>

                {{-- User + logout --}}
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-white text-xs font-medium">Welcome back</p>
                        <p class="text-[#7c8497] text-[11px]"><span>{{Auth::user()->name}}</span></p>
                    </div>
                    <a href="{{route('logout')}}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>

    </div>
    {{-- ── END MAIN AREA ── --}}

</div>

{{-- Active nav highlight script --}}
<script>
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPath.startsWith(href) && href !== '/') {
            link.classList.add('active');
        } else if (href === '/' && currentPath === '/') {
            link.classList.add('active');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>