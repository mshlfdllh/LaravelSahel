@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase mb-1">Management / Books</p>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Create <span class="text-[#4ade80]">Book</span>
            </h1>
            <a href="{{ route('books.index') }}"
               class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-[#7c8497] bg-white/[0.04] border border-white/[0.06] hover:text-white hover:bg-white/[0.08] transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Back to Books
            </a>
        </div>
    </div>

    <div class="max-w-2xl">

        {{-- Validation errors --}}
        @if($errors->any())
        <div class="mb-5 rounded-xl border border-[#f87171]/25 bg-[#f87171]/[0.07] px-5 py-4 flex items-start gap-3">
            <svg class="w-4 h-4 text-[#f87171] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <div>
                <p class="text-xs font-semibold text-[#f87171] mb-1.5">Please fix the following errors:</p>
                <ul class="space-y-0.5">
                    @foreach($errors->all() as $item)
                    <li class="text-xs text-[#fca5a5] flex items-center gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-[#f87171] flex-shrink-0"></span>
                        {{ $item }}
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
                <span class="text-sm font-medium text-[#c4c9d9]">New Book</span>
            </div>

            {{-- Form --}}
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-7 space-y-5">
                @csrf

                {{-- Judul Buku --}}
                <div>
                    <label for="title" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Judul Buku <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            placeholder="Enter book title…"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 @error('title') border-[#f87171]/50 @enderror"
                        />
                    </div>
                    @error('title')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Sinopsis --}}
                <div>
                    <label for="sinopsis" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Sinopsis <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute top-3.5 left-0 pl-4 flex items-start pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h12"/>
                            </svg>
                        </div>
                        <textarea
                            id="sinopsis"
                            name="sinopsis"
                            rows="4"
                            required
                            placeholder="Enter book synopsis…"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 resize-none @error('sinopsis') border-[#f87171]/50 @enderror"
                        >{{ old('sinopsis') }}</textarea>
                    </div>
                    @error('sinopsis')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Tahun Terbit --}}
                <div>
                    <label for="tahun_terbit" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Tahun Terbit <span class="text-[#f87171]">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                        </div>
                        <input
                            type="number"
                            id="tahun_terbit"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit') }}"
                            required
                            min="1000"
                            max="{{ date('Y') }}"
                            placeholder="e.g. 2023"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 @error('tahun_terbit') border-[#f87171]/50 @enderror"
                        />
                    </div>
                    @error('tahun_terbit')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Genre & Author — 2 columns --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- Genre --}}
                    <div>
                        <label for="genre_id" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                            Genre <span class="text-[#f87171]">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                                </svg>
                            </div>
                            <select
                                id="genre_id"
                                name="genre_id"
                                required
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 appearance-none @error('genre_id') border-[#f87171]/50 @enderror"
                            >
                                <option value="" class="bg-[#111318] text-[#7c8497]">— Select Genre —</option>
                                @foreach($genres as $item)
                                <option value="{{ $item->id }}" {{ old('genre_id') == $item->id ? 'selected' : '' }} class="bg-[#111318]">
                                    {{ $item->name_genres }}
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-3.5 h-3.5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </div>
                        </div>
                        @error('genre_id')
                        <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Author --}}
                    <div>
                        <label for="author_id" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                            Author <span class="text-[#f87171]">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                                </svg>
                            </div>
                            <select
                                id="author_id"
                                name="author_id"
                                required
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all duration-150 appearance-none @error('author_id') border-[#f87171]/50 @enderror"
                            >
                                <option value="" class="bg-[#111318] text-[#7c8497]">— Select Author —</option>
                                @foreach($authors as $key)
                                <option value="{{ $key->id }}" {{ old('author_id') == $key->id ? 'selected' : '' }} class="bg-[#111318]">
                                    {{ $key->name_author }}
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-3.5 h-3.5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </div>
                        </div>
                        @error('author_id')
                        <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                </div>

                {{-- Book Cover --}}
                <div>
                    <label class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                        Book Cover
                    </label>

                    {{-- Drop zone --}}
                    <label for="imageInput"
                           class="group flex flex-col items-center justify-center w-full h-36 rounded-xl border-2 border-dashed border-white/[0.10] bg-[#111318] cursor-pointer hover:border-[#4ade80]/40 hover:bg-[#4ade80]/[0.03] transition-all duration-200"
                           id="dropZone">
                        <div class="flex flex-col items-center gap-2 pointer-events-none" id="dropZoneContent">
                            <svg class="w-8 h-8 text-[#7c8497] group-hover:text-[#4ade80] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5"/>
                            </svg>
                            <p class="text-xs text-[#7c8497]">Click to upload or drag & drop</p>
                            <p class="text-[10px] text-[#7c8497]/60">JPG, JPEG, PNG, WEBP — max 2MB</p>
                        </div>
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden"/>
                    </label>

                    {{-- Preview --}}
                    <div class="mt-4 hidden" id="previewWrap">
                        <div class="flex items-center gap-4 p-3 rounded-xl bg-[#111318] border border-white/[0.06]">
                            <img id="previewImage" src="" alt="Preview" class="w-14 h-20 object-cover rounded-lg border border-white/[0.08] shadow"/>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-white truncate" id="fileName">—</p>
                                <p class="text-[10px] text-[#7c8497] mt-0.5" id="fileSize">—</p>
                            </div>
                            <button type="button" id="removeImage"
                                    class="w-7 h-7 rounded-lg bg-[#f87171]/10 border border-[#f87171]/20 flex items-center justify-center text-[#f87171] hover:bg-[#f87171]/20 transition flex-shrink-0">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            </button>
                        </div>
                    </div>

                    @error('image')
                    <p class="mt-2 text-xs text-[#f87171] flex items-center gap-1.5">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-[#4ade80] px-6 py-2.5 text-sm font-semibold text-[#111318] shadow-lg shadow-[#4ade80]/20 transition-all duration-200 hover:bg-[#6ee7a0] hover:shadow-[#4ade80]/40 hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Save Book
                    </button>
                    <a href="{{ route('books.index') }}"
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
                Make sure you select the correct <span class="text-[#4ade80] font-medium">Genre</span> and
                <span class="text-[#4ade80] font-medium">Author</span> before saving.
                Cover image is optional but recommended for a better display.
            </p>
        </div>

    </div>

</div>

{{-- Image preview script --}}
<script>
    const imageInput   = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const previewWrap  = document.getElementById('previewWrap');
    const dropZone     = document.getElementById('dropZone');
    const fileName     = document.getElementById('fileName');
    const fileSize     = document.getElementById('fileSize');
    const removeBtn    = document.getElementById('removeImage');

    function showPreview(file) {
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            fileName.textContent = file.name;
            fileSize.textContent = (file.size / 1024).toFixed(1) + ' KB';
            previewWrap.classList.remove('hidden');
            dropZone.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }

    imageInput.addEventListener('change', function() {
        showPreview(this.files[0]);
    });

    removeBtn.addEventListener('click', function() {
        imageInput.value = '';
        previewImage.src = '';
        previewWrap.classList.add('hidden');
        dropZone.classList.remove('hidden');
    });

    // Drag & drop
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-[#4ade80]/60', 'bg-[#4ade80]/[0.06]');
    });
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-[#4ade80]/60', 'bg-[#4ade80]/[0.06]');
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-[#4ade80]/60', 'bg-[#4ade80]/[0.06]');
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const dt = new DataTransfer();
            dt.items.add(file);
            imageInput.files = dt.files;
            showPreview(file);
        }
    });
</script>

@endsection