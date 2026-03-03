@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Management / Author</p>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Edit <span class="text-[#f59e0b]">Author</span>
            </h1>
            <a href="{{ route('penulis.index') }}"
               class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Back to Authors
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
            <div class="px-6 py-4 border-b border-white/[0.06] flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-[#f59e0b] shadow-[0_0_6px_2px_rgba(245,158,11,0.5)]"></span>
                    <span class="text-sm font-medium text-[#c4c9d9]">
                        Editing: <span class="text-[#f59e0b] font-semibold">{{ $edit->name_author }}</span>
                    </span>
                </div>
                {{-- Avatar preview --}}
                <div class="w-9 h-9 rounded-full bg-[#f59e0b]/15 border border-[#f59e0b]/25 flex items-center justify-center text-[#f59e0b] text-sm font-bold">
                    {{ strtoupper(substr($edit->name_author, 0, 1)) }}
                </div>
            </div>

            {{-- Form --}}
            <form action="{{ route('penulis.update', $edit->id) }}" method="POST" class="px-6 py-7 space-y-5">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div>
                    <label for="name_author" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Author Name <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="name_author"
                            name="name_author"
                            value="{{ old('name_author', $edit->name_author) }}"
                            required
                            placeholder="Enter author's full name…"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#f59e0b]/60 focus:ring-1 focus:ring-[#f59e0b]/20 transition-all duration-150 @error('name_author') border-[#f87171]/50 @enderror"
                        />
                    </div>
                    @error('name_author')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Age --}}
                <div>
                    <label for="age" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Age <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                            </svg>
                        </div>
                        <input
                            type="number"
                            id="age"
                            name="age"
                            value="{{ old('age', $edit->age) }}"
                            required
                            min="1"
                            max="120"
                            placeholder="e.g. 35"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#f59e0b]/60 focus:ring-1 focus:ring-[#f59e0b]/20 transition-all duration-150 @error('age') border-[#f87171]/50 @enderror"
                        />
                    </div>
                    @error('age')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label for="alamat" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Alamat <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute top-3.5 left-0 pl-4 flex items-start pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                        </div>
                        <textarea
                            id="alamat"
                            name="alamat"
                            rows="3"
                            required
                            placeholder="Enter full address…"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#f59e0b]/60 focus:ring-1 focus:ring-[#f59e0b]/20 transition-all duration-150 resize-none @error('alamat') border-[#f87171]/50 @enderror"
                        >{{ old('alamat', $edit->alamat) }}</textarea>
                    </div>
                    @error('alamat')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-[#f59e0b] px-5 py-2.5 text-sm font-semibold text-[#111318] shadow-lg shadow-[#f59e0b]/20 transition-all duration-200 hover:bg-[#fbbf24] hover:shadow-[#f59e0b]/40 hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Changes
                    </button>
                    <a href="{{ route('penulis.show', $edit->id) }}"
                       class="inline-flex items-center gap-2 rounded-lg px-5 py-2.5 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                        Cancel
                    </a>
                </div>

            </form>
        </div>

        {{-- Hint card --}}
        <div class="mt-4 rounded-xl border border-[#f59e0b]/15 bg-[#f59e0b]/[0.05] px-5 py-4 flex items-start gap-3">
            <svg class="w-4 h-4 text-[#f59e0b] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
            </svg>
            <p class="text-xs text-[#7c8497] leading-relaxed">
                You are editing <span class="text-[#f59e0b] font-medium">{{ $edit->name_author }}</span>.
                Changes will be reflected across all books associated with this author.
            </p>
        </div>

    </div>

</div>

@endsection