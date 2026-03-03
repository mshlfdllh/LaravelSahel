@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Management / Author</p>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Author <span class="text-[#6c8cff]">Detail</span>
            </h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('penulis.edit', $penulis->id) }}"
                   class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40 transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('penulis.index') }}"
                   class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 5l-7 7 7 7"/>
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-2xl">

        {{-- Profile card --}}
        <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden mb-4">

            {{-- Card top bar --}}
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#6c8cff] shadow-[0_0_6px_2px_rgba(108,140,255,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">Author Profile</span>
            </div>

            {{-- Avatar + name hero --}}
            <div class="px-6 py-8 flex items-center gap-6 border-b border-white/[0.06]">
                {{-- Large avatar --}}
                <div class="w-20 h-20 rounded-2xl bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center flex-shrink-0 shadow-lg shadow-[#6c8cff]/10">
                    <span class="text-3xl font-bold text-[#6c8cff]">
                        {{ strtoupper(substr($penulis->name_author, 0, 1)) }}
                    </span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">{{ $penulis->name_author }}</h2>
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#4ade80]/10 border border-[#4ade80]/25 px-3 py-1 text-xs font-semibold text-[#4ade80]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#4ade80]"></span>
                            {{ $penulis->age }} Years Old
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#6c8cff]/10 border border-[#6c8cff]/25 px-3 py-1 text-xs font-semibold text-[#6c8cff]">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                            Author
                        </span>
                    </div>
                </div>
            </div>

            {{-- Detail rows --}}
            <div class="divide-y divide-white/[0.04]">

                {{-- Alamat --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#a78bfa]/15 border border-[#a78bfa]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#a78bfa]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Alamat</p>
                        <p class="text-sm text-white">{{ $penulis->alamat }}</p>
                    </div>
                </div>

                {{-- Age --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#4ade80]/15 border border-[#4ade80]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#4ade80]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Age</p>
                        <p class="text-sm text-white">{{ $penulis->age }} Tahun</p>
                    </div>
                </div>

                {{-- Created at --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#f59e0b]/15 border border-[#f59e0b]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#f59e0b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Dibuat Pada</p>
                        <p class="text-sm text-white">{{ $penulis->created_at->format('d M Y') }}</p>
                        <p class="text-xs text-[#7c8497] mt-0.5">{{ $penulis->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                {{-- Updated at --}}
                <div class="px-6 py-4 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#6c8cff]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 0 1-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-1">Terakhir Diupdate</p>
                        <p class="text-sm text-white">{{ $penulis->updated_at->format('d M Y') }}</p>
                        <p class="text-xs text-[#7c8497] mt-0.5">{{ $penulis->updated_at->diffForHumans() }}</p>
                    </div>
                </div>

            </div>

            {{-- Card footer actions --}}
            <div class="px-6 py-4 border-t border-white/[0.06] bg-[#111318]/40 flex items-center justify-between flex-wrap gap-3">
                <p class="text-xs text-[#7c8497]">ID: <span class="font-mono text-[#c4c9d9]">#{{ str_pad($penulis->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                <div class="flex items-center gap-2">
                    <a href="{{ route('penulis.edit', $penulis->id) }}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 transition hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit Author
                    </a>
                    <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST"
                          onsubmit="return confirm('Hapus author {{ addslashes($penulis->name_author) }}? Tindakan ini tidak bisa dibatalkan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection