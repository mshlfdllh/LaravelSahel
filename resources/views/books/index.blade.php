@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-1">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase">Management</p>
        <div class="flex items-end justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Books <span class="text-[#6c8cff]">Directory</span>
            </h1>
            <a href="{{ route('books.create') }}"
               class="group inline-flex items-center gap-2 rounded-lg bg-[#6c8cff] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#6c8cff]/20 transition-all duration-200 hover:bg-[#8aa4ff] hover:shadow-[#6c8cff]/40 hover:-translate-y-0.5 active:translate-y-0">
                <svg class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Add Book
            </a>
        </div>
    </div>

    {{-- Stats strip --}}
    <div class="mb-6 grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Total Books</p>
            <p class="text-2xl font-bold text-white">{{ $books->count() }}</p>
        </div>
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Latest</p>
            <p class="text-sm font-semibold text-white truncate">{{ $books->first()?->title ?? '—' }}</p>
        </div>
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Genres</p>
            <p class="text-2xl font-bold text-white">{{ $books->pluck('genre_id')->unique()->count() }}</p>
        </div>
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Status</p>
            <p class="text-2xl font-bold text-[#4ade80]">Active</p>
        </div>
    </div>

    {{-- Table card --}}
    <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

        {{-- Card top bar --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-white/[0.06]">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#6c8cff] shadow-[0_0_6px_2px_rgba(108,140,255,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">All Books</span>
            </div>
            <div class="relative hidden sm:block">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input type="text" placeholder="Search books…"
                       class="pl-9 pr-4 py-1.5 rounded-lg bg-[#111318] border border-white/[0.08] text-sm text-[#c4c9d9] placeholder-[#7c8497] focus:outline-none focus:border-[#6c8cff]/60 transition w-52"/>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/[0.06]">
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase w-12">No</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Cover</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Judul</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Sinopsis</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Tahun</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Genre</th>
                        <th class="px-4 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Author</th>
                        <th class="px-4 py-3.5 text-right text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04]">
                    @forelse ($books as $book)
                    <tr class="group transition-colors duration-150 hover:bg-white/[0.025]">

                        {{-- No --}}
                        <td class="px-4 py-4 text-[#7c8497] font-mono text-xs">
                            {{ str_pad($no++, 2, '0', STR_PAD_LEFT) }}
                        </td>

                        {{-- Cover --}}
                        <td class="px-4 py-4" x-data="{ open:false }">

                        @if($book->image)
                            <img
                                src="{{ asset('storage/' . $book->image) }}"
                                alt="{{ $book->title }}"
                                @click="open = true"
                                class="w-10 h-14 object-cover rounded-md border border-white/[0.08] shadow cursor-pointer hover:scale-105 transition"
                            />

                            {{-- Modal --}}
                            <div x-show="open"
                                x-transition
                                class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50"
                                @click.self="open = false">

                                <div class="relative">
                                    <img
                                        src="{{ asset('storage/' . $book->image) }}"
                                        class="max-h-[80vh] rounded-lg shadow-2xl border border-white/10"
                                    />

                                    <button @click="open = false"
                                            class="absolute -top-3 -right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full shadow">
                                        ✕
                                    </button>
                                </div>
                            </div>

                        @else
                            <div class="w-10 h-14 rounded-md bg-[#111318] border border-white/[0.06] flex items-center justify-center">
                                —
                            </div>
                        @endif

                    </td>

                        {{-- Title --}}
                        <td class="px-4 py-4">
                            <span class="font-medium text-white group-hover:text-[#8aa4ff] transition-colors duration-150 line-clamp-1 max-w-[140px] block">
                                {{ $book->title }}
                            </span>
                        </td>

                        {{-- Sinopsis --}}
                        <td class="px-4 py-4">
                            <span class="text-[#9ca3af] text-lg line-clamp-2 max-w-[200px] block leading-relaxed max-h-30 overflow-y-auto">
                                {{ $book->sinopsis }}
                            </span>
                        </td>

                        {{-- Tahun terbit --}}
                        <td class="px-6 py-6">
                            <span class="inline-flex items-center rounded-md bg-[#111318] border border-white/[0.07] px-2.5 py-0.5 text-xs font-medium text-[#c4c9d9]">
                                {{ $book->tahun_terbit }}
                            </span>
                        </td>

                        {{-- Genre --}}
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center rounded-full bg-[#f59e0b]/10 border border-[#f59e0b]/20 px-2.5 py-0.5 text-xs font-medium text-[#f59e0b]">
                                {{ $book->genre->name_genres }}
                            </span>
                        </td>

                        {{-- Author --}}
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center text-[#a78bfa] text-[10px] font-bold flex-shrink-0">
                                    {{ strtoupper(substr($book->author->name_author ?? '?', 0, 1)) }}
                                </div>
                                <span class="text-[#9ca3af] text-xs truncate max-w-[100px]">
                                    {{ $book->author->name_author }}
                                </span>
                            </div>
                        </td>

                        {{-- Actions --}}
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-end gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('books.detail', $book->id) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#6c8cff] bg-[#6c8cff]/10 border border-[#6c8cff]/20 transition hover:bg-[#6c8cff]/20 hover:border-[#6c8cff]/40">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Detail
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('books.edit', $book->id) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 transition hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin mau hapus buku \'{{ addslashes($book->title) }}\'?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-[#111318] border border-white/[0.06] flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                    </svg>
                                </div>
                                <p class="text-[#7c8497] text-sm">No books found</p>
                                <a href="{{ route('books.create') }}" class="text-xs text-[#6c8cff] hover:underline">Add your first book →</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        @if($books instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="px-6 py-4 border-t border-white/[0.06] flex items-center justify-between text-xs text-[#7c8497]">
            <span>Showing {{ $books->firstItem() }}–{{ $books->lastItem() }} of {{ $books->total() }} books</span>
            <div>{{ $books->links() }}</div>
        </div>
        @else
        <div class="px-6 py-3.5 border-t border-white/[0.06] text-xs text-[#7c8497]">
            {{ $books->count() }} book(s) total
        </div>
        @endif

    </div>

</div>

@endsection