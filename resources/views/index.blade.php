@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Overview</p>
        <h1 class="text-3xl font-bold text-white tracking-tight">
            Welcome back, <span class="text-[#6c8cff]">Admin</span> 👋
        </h1>
        <p class="text-[#7c8497] text-sm mt-1">Here's what's happening in your library today.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

        {{-- Total Books --}}
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-5 flex items-center gap-4 hover:border-[#6c8cff]/30 transition-all duration-200 group">
            <div class="w-11 h-11 rounded-xl bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center flex-shrink-0 group-hover:bg-[#6c8cff]/25 transition-colors">
                <svg class="w-5 h-5 text-[#6c8cff]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-0.5">Total Books</p>
                <p class="text-2xl font-bold text-white">{{ $totalBooks ?? '0' }}</p>
                <p class="text-[10px] text-[#4ade80] mt-0.5">↑ 12% this month</p>
            </div>
        </div>

        {{-- Total Authors --}}
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-5 flex items-center gap-4 hover:border-[#a78bfa]/30 transition-all duration-200 group">
            <div class="w-11 h-11 rounded-xl bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center flex-shrink-0 group-hover:bg-[#a78bfa]/25 transition-colors">
                <svg class="w-5 h-5 text-[#a78bfa]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-0.5">Total Authors</p>
                <p class="text-2xl font-bold text-white">{{ $totalAuthors ?? '0' }}</p>
                <p class="text-[10px] text-[#4ade80] mt-0.5">↑ 4 new this week</p>
            </div>
        </div>

        {{-- Total Genres --}}
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-5 flex items-center gap-4 hover:border-[#f59e0b]/30 transition-all duration-200 group">
            <div class="w-11 h-11 rounded-xl bg-[#f59e0b]/15 border border-[#f59e0b]/25 flex items-center justify-center flex-shrink-0 group-hover:bg-[#f59e0b]/25 transition-colors">
                <svg class="w-5 h-5 text-[#f59e0b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-0.5">Genres</p>
                <p class="text-2xl font-bold text-white">{{ $totalGenres ?? '0' }}</p>
                <p class="text-[10px] text-[#7c8497] mt-0.5">Across all books</p>
            </div>
        </div>

        {{-- Active Users --}}
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-5 flex items-center gap-4 hover:border-[#4ade80]/30 transition-all duration-200 group">
            <div class="w-11 h-11 rounded-xl bg-[#4ade80]/15 border border-[#4ade80]/25 flex items-center justify-center flex-shrink-0 group-hover:bg-[#4ade80]/25 transition-colors">
                <svg class="w-5 h-5 text-[#4ade80]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-0.5">System</p>
                <p class="text-2xl font-bold text-[#4ade80]">Online</p>
                <p class="text-[10px] text-[#4ade80] mt-0.5">All systems normal</p>
            </div>
        </div>

    </div>

    {{-- Main grid: Quick Actions + Recent Activity --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

        {{-- Quick Actions --}}
        <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] overflow-hidden">
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#6c8cff] shadow-[0_0_6px_2px_rgba(108,140,255,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">Quick Actions</span>
            </div>
            <div class="p-5 flex flex-col gap-3">

                <a href="{{ route('books.create') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#6c8cff]/10 border border-[#6c8cff]/20 hover:bg-[#6c8cff]/20 hover:border-[#6c8cff]/40 transition-all group">
                    <div class="w-8 h-8 rounded-lg bg-[#6c8cff]/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-[#6c8cff]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white">Add New Book</p>
                        <p class="text-xs text-[#7c8497]">Create a new book entry</p>
                    </div>
                    <svg class="w-4 h-4 text-[#7c8497] group-hover:text-[#6c8cff] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </a>

                <a href="{{ route('penulis.create') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#a78bfa]/10 border border-[#a78bfa]/20 hover:bg-[#a78bfa]/20 hover:border-[#a78bfa]/40 transition-all group">
                    <div class="w-8 h-8 rounded-lg bg-[#a78bfa]/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-[#a78bfa]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white">Add New Author</p>
                        <p class="text-xs text-[#7c8497]">Register an author profile</p>
                    </div>
                    <svg class="w-4 h-4 text-[#7c8497] group-hover:text-[#a78bfa] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </a>

                <a href="{{ route('genre.create') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#f59e0b]/10 border border-[#f59e0b]/20 hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40 transition-all group">
                    <div class="w-8 h-8 rounded-lg bg-[#f59e0b]/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-[#f59e0b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white">Add New Genre</p>
                        <p class="text-xs text-[#7c8497]">Create a book category</p>
                    </div>
                    <svg class="w-4 h-4 text-[#7c8497] group-hover:text-[#f59e0b] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </a>

            </div>
        </div>

        {{-- Recent Books --}}
        <div class="xl:col-span-2 rounded-2xl border border-white/[0.06] bg-[#1a1d27] overflow-hidden">
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-[#a78bfa] shadow-[0_0_6px_2px_rgba(167,139,250,0.5)]"></span>
                    <span class="text-sm font-medium text-[#c4c9d9]">Recent Books</span>
                </div>
                <a href="{{ route('books.index') }}" class="text-xs text-[#6c8cff] hover:underline">View all →</a>
            </div>
            <div class="divide-y divide-white/[0.04]">
                @forelse ($recentBooks ?? [] as $book)
                <div class="flex items-center gap-4 px-6 py-3.5 hover:bg-white/[0.02] transition-colors">
                    <div class="w-9 h-9 rounded-lg bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center flex-shrink-0 text-[#a78bfa]">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ $book->title }}</p>
                        <p class="text-xs text-[#7c8497] truncate">{{ $book->author->name_author ?? 'Unknown author' }}</p>
                    </div>
                    <span class="inline-flex items-center rounded-md bg-[#111318] border border-white/[0.07] px-2 py-0.5 text-xs text-[#c4c9d9] flex-shrink-0">
                        {{ $book->genre->name_genres ?? '—' }}
                    </span>
                </div>
                @empty
                <div class="flex flex-col items-center gap-2 py-12 text-center">
                    <svg class="w-8 h-8 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    <p class="text-[#7c8497] text-sm">No books yet</p>
                    <a href="{{ route('books.create') }}" class="text-xs text-[#6c8cff] hover:underline">Add your first book →</a>
                </div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- Bottom grid: Navigate cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <a href="{{ route('books.index') }}"
           class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] p-6 flex flex-col gap-4 hover:border-[#6c8cff]/30 hover:-translate-y-1 transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center group-hover:bg-[#6c8cff]/25 transition-colors">
                <svg class="w-5 h-5 text-[#6c8cff]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1 group-hover:text-[#8aa4ff] transition-colors">Books</h3>
                <p class="text-[#7c8497] text-xs leading-relaxed">Browse and manage all books in your library collection.</p>
            </div>
            <span class="text-xs text-[#6c8cff] font-medium mt-auto">Manage Books →</span>
        </a>

        <a href="{{ route('penulis.index') }}"
           class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] p-6 flex flex-col gap-4 hover:border-[#a78bfa]/30 hover:-translate-y-1 transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center group-hover:bg-[#a78bfa]/25 transition-colors">
                <svg class="w-5 h-5 text-[#a78bfa]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1 group-hover:text-[#c4b5fd] transition-colors">Authors</h3>
                <p class="text-[#7c8497] text-xs leading-relaxed">View and manage author profiles and their published works.</p>
            </div>
            <span class="text-xs text-[#a78bfa] font-medium mt-auto">Manage Authors →</span>
        </a>

        <a href="{{ route('genre.index') }}"
           class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] p-6 flex flex-col gap-4 hover:border-[#f59e0b]/30 hover:-translate-y-1 transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-[#f59e0b]/15 border border-[#f59e0b]/25 flex items-center justify-center group-hover:bg-[#f59e0b]/25 transition-colors">
                <svg class="w-5 h-5 text-[#f59e0b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1 group-hover:text-[#fcd34d] transition-colors">Genres</h3>
                <p class="text-[#7c8497] text-xs leading-relaxed">Organise your library with categories and book genres.</p>
            </div>
            <span class="text-xs text-[#f59e0b] font-medium mt-auto">Manage Genres →</span>
        </a>

    </div>

</div>

@endsection