@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Management / Books</p>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Book <span class="text-[#6c8cff]">Detail</span>
            </h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('books.edit', $detail->id) }}"
                   class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40 transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('books.index') }}"
                   class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 5l-7 7 7 7"/>
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-3xl space-y-4">

        {{-- ── BOOK CARD ── --}}
        <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

            {{-- Card top bar --}}
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#6c8cff] shadow-[0_0_6px_2px_rgba(108,140,255,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">Book Profile</span>
                <span class="ml-auto font-mono text-xs text-[#7c8497]">#{{ str_pad($detail->id, 4, '0', STR_PAD_LEFT) }}</span>
            </div>

            {{-- Hero: cover + title --}}
            <div class="px-6 py-7 flex items-start gap-6 border-b border-white/[0.06]">

                {{-- Cover --}}
                <div class="flex-shrink-0">
                    @if($detail->image)
                        <img
                            src="{{ asset('storage/' . $detail->image) }}"
                            alt="{{ $detail->title }}"
                            class="w-28 h-40 object-cover rounded-xl border border-white/[0.08] shadow-lg shadow-black/40"
                        />
                    @else
                        <div class="w-28 h-40 rounded-xl bg-[#111318] border border-white/[0.06] flex flex-col items-center justify-center gap-2 shadow-lg">
                            <svg class="w-8 h-8 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                            </svg>
                            <span class="text-[10px] text-[#7c8497] tracking-wider">No Cover</span>
                        </div>
                    @endif
                </div>

                {{-- Title + badges --}}
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold text-white mb-3 leading-tight">{{ $detail->title }}</h2>
                    <div class="flex flex-wrap items-center gap-2">
                        {{-- Genre badge --}}
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#f59e0b]/10 border border-[#f59e0b]/20 px-3 py-1 text-xs font-semibold text-[#f59e0b]">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                            </svg>
                            {{ $detail->genre->name_genres }}
                        </span>
                        {{-- Year badge --}}
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#6c8cff]/10 border border-[#6c8cff]/20 px-3 py-1 text-xs font-semibold text-[#6c8cff]">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            {{ $detail->tahun_terbit }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Detail rows --}}
            <div class="divide-y divide-white/[0.04]">

                {{-- Sinopsis --}}
                <div class="px-6 py-5 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#6c8cff]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h12"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">Sinopsis</p>
                        <p class="text-sm text-[#c4c9d9] leading-relaxed">{{ $detail->sinopsis }}</p>
                    </div>
                </div>

                {{-- Tahun Terbit --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#4ade80]/15 border border-[#4ade80]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#4ade80]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Tahun Terbit</p>
                        <p class="text-sm text-white">{{ $detail->tahun_terbit }}</p>
                    </div>
                </div>

                {{-- Genre --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#f59e0b]/15 border border-[#f59e0b]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#f59e0b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Genre</p>
                        <p class="text-sm text-white">{{ $detail->genre->name_genres }}</p>
                    </div>
                </div>

            </div>

            {{-- Card footer actions --}}
            <div class="px-6 py-4 border-t border-white/[0.06] bg-[#111318]/40 flex items-center justify-end gap-2 flex-wrap">
                <a href="{{ route('books.edit', $detail->id) }}"
                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 transition hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit Book
                </a>
                <form action="{{ route('books.destroy', $detail->id) }}" method="POST"
                      onsubmit="return confirm('Hapus buku \'{{ addslashes($detail->title) }}\'? Tindakan ini tidak bisa dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                        Delete
                    </button>
                </form>
            </div>

        </div>{{-- end book card --}}

        {{-- ── AUTHOR CARD ── --}}
        <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

            {{-- Card top bar --}}
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#a78bfa] shadow-[0_0_6px_2px_rgba(167,139,250,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">Author Info</span>
            </div>

            {{-- Author hero --}}
            <div class="px-6 py-5 flex items-center gap-4 border-b border-white/[0.06]">
                <div class="w-12 h-12 rounded-xl bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center text-[#a78bfa] text-lg font-bold flex-shrink-0">
                    {{ strtoupper(substr($detail->author->name_author, 0, 1)) }}
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white">{{ $detail->author->name_author }}</h3>
                    <span class="inline-flex items-center gap-1 rounded-full bg-[#4ade80]/10 border border-[#4ade80]/20 px-2.5 py-0.5 text-xs font-semibold text-[#4ade80] mt-1">
                        {{ $detail->author->age }} Tahun
                    </span>
                </div>
                <a href="{{ route('penulis.show', $detail->author->id) }}"
                   class="ml-auto inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#a78bfa] bg-[#a78bfa]/10 border border-[#a78bfa]/20 transition hover:bg-[#a78bfa]/20 hover:border-[#a78bfa]/40">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                    View Profile
                </a>
            </div>

            {{-- Author detail rows --}}
            <div class="divide-y divide-white/[0.04]">

                {{-- Age --}}
                <div class="px-6 py-4 flex items-center gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#4ade80]/15 border border-[#4ade80]/25 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-[#4ade80]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-0.5">Age</p>
                        <p class="text-sm text-white">{{ $detail->author->age }} Tahun</p>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="px-6 py-4 flex items-center gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-[#a78bfa]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/>
                            <path d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-0.5">Alamat</p>
                        <p class="text-sm text-white">{{ $detail->author->alamat }}</p>
                    </div>
                </div>

            </div>

        </div>{{-- end author card --}}

    </div>

</div>

@endsection