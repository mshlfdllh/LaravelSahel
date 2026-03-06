<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register — BookShelf</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { background: #0d0f14; }</style>
</head>
<body class="bg-[#0d0f14] font-sans antialiased min-h-screen flex items-center justify-center px-4 py-12">

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Oops!',
            text: "{{ session('error') }}",
            icon: 'error',
            background: '#1a1d27',
            color: '#c4c9d9',
            iconColor: '#f87171',
            confirmButtonColor: '#6c8cff',
            customClass: { popup: 'rounded-2xl' }
        });
    });
</script>
@endif

<div class="w-full max-w-md">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-[#4ade80] shadow-xl shadow-[#4ade80]/25 mb-5 hover:-translate-y-0.5 transition-transform">
            <svg class="w-7 h-7 text-[#0d0f14]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.966 8.966 0 0 0-6 2.292m0-14.25v14.25"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-white tracking-tight">Buat akun baru</h1>
        <p class="text-sm text-[#7c8497] mt-1">Bergabung dengan BookShelf sekarang</p>
    </div>

    {{-- Card --}}
    <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

        <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-[#4ade80] shadow-[0_0_6px_2px_rgba(74,222,128,0.5)]"></span>
            <span class="text-sm font-medium text-[#c4c9d9]">Daftar Akun</span>
        </div>

        <form action="{{ route('action.register') }}" method="POST" class="px-6 py-7 space-y-5">
            @csrf

            {{-- Validation errors --}}
            @if($errors->any())
            <div class="rounded-xl border border-[#f87171]/25 bg-[#f87171]/[0.07] px-4 py-3 flex items-start gap-3">
                <svg class="w-4 h-4 text-[#f87171] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <ul class="space-y-0.5">
                    @foreach($errors->all() as $error)
                    <li class="text-xs text-[#fca5a5]">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Name --}}
            <div>
                <label for="name" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                    Nama Lengkap <span class="text-[#f87171]">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <input
                        type="text" id="name" name="name"
                        value="{{ old('name') }}"
                        required autocomplete="name"
                        placeholder="Nama kamu"
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all @error('name') border-[#f87171]/50 @enderror"
                    />
                </div>
                @error('name')
                <p class="mt-1.5 text-xs text-[#f87171] flex items-center gap-1">
                    <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                    Email <span class="text-[#f87171]">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <input
                        type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        required autocomplete="email"
                        placeholder="contoh@email.com"
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all @error('email') border-[#f87171]/50 @enderror"
                    />
                </div>
                @error('email')
                <p class="mt-1.5 text-xs text-[#f87171] flex items-center gap-1">
                    <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase mb-2">
                    Password <span class="text-[#f87171]">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    <input
                        type="password" id="password" name="password"
                        required
                        placeholder="Min. 4 karakter"
                        class="w-full pl-10 pr-12 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#4ade80]/60 focus:ring-1 focus:ring-[#4ade80]/20 transition-all @error('password') border-[#f87171]/50 @enderror"
                    />
                    <button type="button" id="togglePw" class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#7c8497] hover:text-[#c4c9d9] transition-colors">
                        <svg id="eyeShow" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeHide" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                @error('password')
                <p class="mt-1.5 text-xs text-[#f87171] flex items-center gap-1">
                    <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </p>
                @enderror

                {{-- Strength bar --}}
                <div class="mt-2 flex gap-1" id="strengthBars">
                    <div class="h-1 flex-1 rounded-full bg-white/[0.08] transition-all duration-300" id="bar1"></div>
                    <div class="h-1 flex-1 rounded-full bg-white/[0.08] transition-all duration-300" id="bar2"></div>
                    <div class="h-1 flex-1 rounded-full bg-white/[0.08] transition-all duration-300" id="bar3"></div>
                    <div class="h-1 flex-1 rounded-full bg-white/[0.08] transition-all duration-300" id="bar4"></div>
                </div>
                <p class="text-[10px] text-[#7c8497] mt-1" id="strengthLabel"></p>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#4ade80] py-3 text-sm font-semibold text-[#0d0f14] shadow-lg shadow-[#4ade80]/20 hover:bg-[#6ee7a0] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 mt-1">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM3 20a6 6 0 0 1 12 0v1H3v-1z"/>
                </svg>
                Buat Akun
            </button>

        </form>

        <div class="px-6 py-4 border-t border-white/[0.06] bg-[#111318]/50 text-center">
            <p class="text-xs text-[#7c8497]">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-[#6c8cff] font-semibold hover:text-[#8aa4ff] transition-colors ml-1">Login sekarang →</a>
            </p>
        </div>
    </div>

    <div class="mt-5 text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs text-[#7c8497] hover:text-[#c4c9d9] transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Kembali ke Library
        </a>
    </div>
</div>

<script>
    // Toggle password visibility
    const pw   = document.getElementById('password');
    const show = document.getElementById('eyeShow');
    const hide = document.getElementById('eyeHide');
    document.getElementById('togglePw').addEventListener('click', function () {
        const hidden = pw.type === 'password';
        pw.type = hidden ? 'text' : 'password';
        show.classList.toggle('hidden', hidden);
        hide.classList.toggle('hidden', !hidden);
    });

    // Password strength meter
    const bars   = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3'), document.getElementById('bar4')];
    const label  = document.getElementById('strengthLabel');
    const colors = ['bg-[#f87171]', 'bg-[#f59e0b]', 'bg-[#6c8cff]', 'bg-[#4ade80]'];
    const labels = ['Lemah', 'Cukup', 'Kuat', 'Sangat kuat'];

    pw.addEventListener('input', function () {
        const v = this.value;
        let score = 0;
        if (v.length >= 4)  score++;
        if (v.length >= 8)  score++;
        if (/[A-Z]/.test(v) || /[0-9]/.test(v)) score++;
        if (/[^A-Za-z0-9]/.test(v)) score++;

        bars.forEach((bar, i) => {
            bar.className = 'h-1 flex-1 rounded-full transition-all duration-300 ' + (i < score ? colors[score - 1] : 'bg-white/[0.08]');
        });
        label.textContent = v.length > 0 ? labels[score - 1] ?? '' : '';
        label.style.color = v.length > 0 ? ['#f87171','#f59e0b','#6c8cff','#4ade80'][score - 1] : '';
    });
</script>
</body>
</html>