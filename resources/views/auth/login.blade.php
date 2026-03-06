<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login — BookShelf</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { background: #0d0f14; }</style>
</head>
<body class="bg-[#0d0f14] font-sans antialiased min-h-screen flex items-center justify-center px-4 py-12">

{{-- Flash error --}}
@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Login Gagal!',
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

    {{-- Logo + heading --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-[#6c8cff] shadow-xl shadow-[#6c8cff]/30 mb-5">
            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.966 8.966 0 0 0-6 2.292m0-14.25v14.25"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-white tracking-tight">Selamat datang kembali</h1>
        <p class="text-sm text-[#7c8497] mt-1">Masuk ke akun BookShelf kamu</p>
    </div>

    {{-- Card --}}
    <div class="rounded-2xl border border-white/[0.06] bg-[#1a1d27] shadow-2xl overflow-hidden">

        {{-- Card top bar --}}
        <div class="px-6 py-4 border-b border-white/[0.06] flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-[#6c8cff] shadow-[0_0_6px_2px_rgba(108,140,255,0.5)]"></span>
            <span class="text-sm font-medium text-[#c4c9d9]">Login</span>
        </div>

        <form action="{{ route('action.login') }}" method="POST" class="px-6 py-7 space-y-5">
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
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="contoh@email.com"
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#6c8cff]/60 focus:ring-1 focus:ring-[#6c8cff]/20 transition-all duration-150 @error('email') border-[#f87171]/50 @enderror"
                    />
                </div>
                @error('email')
                <p class="mt-1.5 text-xs text-[#f87171] flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold tracking-widest text-[#7c8497] uppercase">
                        Password <span class="text-[#f87171]">*</span>
                    </label>
                    <a href="#" class="text-xs text-[#6c8cff] hover:text-[#8aa4ff] transition-colors">Lupa password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full pl-10 pr-12 py-3 rounded-xl bg-[#111318] border border-white/[0.08] text-sm text-white placeholder-[#7c8497] focus:outline-none focus:border-[#6c8cff]/60 focus:ring-1 focus:ring-[#6c8cff]/20 transition-all duration-150 @error('password') border-[#f87171]/50 @enderror"
                    />
                    {{-- Toggle show/hide --}}
                    <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#7c8497] hover:text-[#c4c9d9] transition-colors">
                        <svg id="eyeOpen" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeClosed" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                @error('password')
                <p class="mt-1.5 text-xs text-[#f87171] flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#6c8cff] py-3 text-sm font-semibold text-white shadow-lg shadow-[#6c8cff]/25 hover:bg-[#8aa4ff] hover:shadow-[#6c8cff]/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 mt-1">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                </svg>
                Sign In
            </button>

        </form>

        {{-- Footer --}}
        <div class="px-6 py-4 border-t border-white/[0.06] bg-[#111318]/40 text-center">
            <p class="text-xs text-[#7c8497]">
                Belum punya akun?
                <a href="{{ route('auth.register') }}" class="text-[#6c8cff] font-semibold hover:text-[#8aa4ff] transition-colors ml-1">Daftar sekarang</a>
            </p>
        </div>

    </div>

    {{-- Back to library --}}
    <div class="mt-5 text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs text-[#7c8497] hover:text-[#c4c9d9] transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Kembali ke Library
        </a>
    </div>

</div>

<script>
    const toggleBtn  = document.getElementById('togglePassword');
    const pwInput    = document.getElementById('password');
    const eyeOpen    = document.getElementById('eyeOpen');
    const eyeClosed  = document.getElementById('eyeClosed');

    toggleBtn.addEventListener('click', function () {
        const isHidden = pwInput.type === 'password';
        pwInput.type   = isHidden ? 'text' : 'password';
        eyeOpen.classList.toggle('hidden', isHidden);
        eyeClosed.classList.toggle('hidden', !isHidden);
    });
</script>

</body>
</html>