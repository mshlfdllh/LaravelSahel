@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Management / Genre</p>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Create <span class="text-[#4ade80]">Genre</span>
            </h1>
            <a href="{{ route('genre.index') }}"
               class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Back to Genres
            </a>
        </div>
    </div>

    <div class="max-w-xl">

        {{-- Validation errors --}}
        @if($errors->any())
        <div class="mb-5 rounded-xl border border-[#f87171]/25 bg-[#f87171]/[0.07] px-5 py-4 flex items-start gap-3">
            <svg class="w-4 h-4 text-[#f87171] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <div>
                <p class="text-xs font-semibold text-[#f87171] mb-1.5">Please fix the following errors:</p>
                <ul class="space-y-0.5">
                    @foreach($errors->all() as $error)
                    <li class="text-xs text-[#fca5a5] flex items-center gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-[#f87171] flex-shrink-0"></span>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        {{-- Form card --}}
        <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

            {{-- Card top bar --}}
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-[#4ade80] shadow-[0_0_6px_2px_rgba(74,222,128,0.5)]"></span>
                <span class="text-sm font-medium text-[#c4c9d9]">New Genre</span>
            </div>

            {{-- Form --}}
            <form action="{{ route('genre.store') }}" method="POST" class="px-6 py-7">
                @csrf

                {{-- Input field --}}
                <div class="mb-6">
                    <label for="name_genres" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Genre Name <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="name_genres"
                            name="name_genres"
                            value="{{ old('name_genres') }}"
                            required
                            placeholder="e.g. Science Fiction, Romance, Horror…"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 @error('name_genres') border-[#f87171]/50 focus:border-[#f87171]/60 focus:ring-[#f87171]/20 @enderror"
                        />
                    </div>

                    {{-- Inline validation error --}}
                    @error('name_genres')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-1">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-[#4ade80] px-5 py-2.5 text-sm font-semibold text-[#111318] shadow-lg shadow-[#4ade80]/20 transition-all duration-200 hover:bg-[#6ee7a0] hover:shadow-[#4ade80]/40 hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Genre
                    </button>

                    <a href="{{ route('genre.index') }}"
                       class="inline-flex items-center gap-2 rounded-lg px-5 py-2.5 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                        Cancel
                    </a>
                </div>

            </form>
        </div>

        {{-- Hint card --}}
        <div class="mt-4 rounded-xl border border-[#4ade80]/15 bg-[#4ade80]/[0.05] px-5 py-4 flex items-start gap-3">
            <svg class="w-4 h-4 text-[#4ade80] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
            </svg>
            <p class="text-xs text-[#7c8497] leading-relaxed">
                Genre names should be clear and consistent. Examples:
                <span class="text-[#4ade80] font-medium">Fiction</span>,
                <span class="text-[#4ade80] font-medium">Biography</span>,
                <span class="text-[#4ade80] font-medium">Science Fiction</span>.
                They will be used to categorise books across the library.
            </p>
        </div>

    </div>

</div>

@endsection