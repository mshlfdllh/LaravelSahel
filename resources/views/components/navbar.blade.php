{{-- resources/views/components/navbar.blade.php --}}
<nav class="sticky top-0 z-50 bg-[#0d0f14]/95 backdrop-blur-md border-b border-white/[0.06]" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                <div class="w-8 h-8 rounded-lg bg-[#6c8cff] flex items-center justify-center shadow-lg shadow-[#6c8cff]/30">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.966 8.966 0 0 0-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <span class="font-bold text-white tracking-wide text-sm hidden sm:block">BookShelf</span>
            </a>

            {{-- Desktop nav links --}}
            <div class="hidden sm:flex items-center gap-1">

                {{-- Public link — semua bisa lihat --}}
                <a href="{{ route('home') }}"
                   class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                          {{ request()->routeIs('home') ? 'bg-[#6c8cff]/15 text-[#8aa4ff] border border-[#6c8cff]/25' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                    Library
                </a>

                {{-- ADMIN ONLY links — hanya muncul kalau role admin --}}
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                                  {{ request()->routeIs('dashboard') ? 'bg-[#6c8cff]/15 text-[#8aa4ff] border border-[#6c8cff]/25' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('books.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                                  {{ request()->routeIs('books.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff] border border-[#6c8cff]/25' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                            Books
                        </a>
                        <a href="{{ route('genre.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                                  {{ request()->routeIs('genre.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff] border border-[#6c8cff]/25' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                            Genres
                        </a>
                        <a href="{{ route('penulis.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                                  {{ request()->routeIs('penulis.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff] border border-[#6c8cff]/25' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                            Authors
                        </a>
                    @endif
                @endauth

            </div>

            {{-- Auth buttons --}}
            <div class="flex items-center gap-2">

                @guest
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-4 py-2 text-sm font-medium text-white bg-[#6c8cff] shadow-md shadow-[#6c8cff]/20 hover:bg-[#8aa4ff] hover:-translate-y-0.5 transition-all duration-150">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                        </svg>
                        Login
                    </a>
                @endguest

                @auth
                <div class="flex items-center gap-2">

                    {{-- User badge --}}
                    <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/[0.04] border border-white/[0.06]">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold
                            {{ Auth::user()->role === 'admin' ? 'bg-[#f59e0b]/20 border border-[#f59e0b]/30 text-[#f59e0b]' : 'bg-[#6c8cff]/20 border border-[#6c8cff]/30 text-[#6c8cff]' }}">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="flex flex-col leading-none">
                            <span class="text-xs text-[#c4c9d9] font-medium">{{ Auth::user()->name }}</span>
                            <span class="text-[10px] {{ Auth::user()->role === 'admin' ? 'text-[#f59e0b]' : 'text-[#7c8497]' }}">
                                {{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}
                            </span>
                        </div>
                    </div>

                    {{-- Logout --}}
                    <a href="{{ route('logout') }}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-4 py-2 text-sm font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 hover:bg-[#f87171]/20 hover:border-[#f87171]/40 transition-all duration-150">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>
                        </svg>
                        Logout
                    </a>
                </div>
                @endauth

                {{-- Mobile hamburger --}}
                <button @click="open = !open"
                        class="sm:hidden w-9 h-9 rounded-lg flex items-center justify-center text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all">
                    <svg x-show="!open" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="sm:hidden border-t border-white/[0.06] bg-[#0d0f14]"
         style="display:none">
        <div class="px-4 py-3 space-y-1">

            <a href="{{ route('home') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                      {{ request()->routeIs('home') ? 'bg-[#6c8cff]/15 text-[#8aa4ff]' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Library
            </a>

            {{-- Admin only links di mobile --}}
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('dashboard') ? 'bg-[#6c8cff]/15 text-[#8aa4ff]' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('books.index') }}"
                       class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('books.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff]' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        Books
                    </a>
                    <a href="{{ route('genre.index') }}"
                       class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('genre.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff]' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/></svg>
                        Genres
                    </a>
                    <a href="{{ route('penulis.index') }}"
                       class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('penulis.*') ? 'bg-[#6c8cff]/15 text-[#8aa4ff]' : 'text-[#9ca3af] hover:text-white hover:bg-white/[0.05]' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        Authors
                    </a>
                @endif
            @endauth

        </div>
    </div>
</nav>