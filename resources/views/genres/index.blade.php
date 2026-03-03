@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-1">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase">Management</p>
        <div class="flex items-end justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Genre <span class="text-[#6c8cff]">Directory</span>
            </h1>
            <a href="{{ route('genre.create') }}"
               class="group inline-flex items-center gap-2 rounded-lg bg-[#6c8cff] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#6c8cff]/20 transition-all duration-200 hover:bg-[#8aa4ff] hover:shadow-[#6c8cff]/40 hover:-translate-y-0.5 active:translate-y-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Add Genre
            </a>
            @if (@session('succes'))
                <script>
                    Swal.fire({
                    title: "Success",
                    text: "{{ session('success') }}",
                    icon: "success",
                    
                    });
                </script>
            @endif
        </div>
    </div>

    {{-- Stats strip --}}
    <div class="mb-6 grid grid-cols-3 gap-4">
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Total Genres</p>
            <p class="text-2xl font-bold text-white">{{ $genres->count() }}</p>
        </div>
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Last Added</p>
            <p class="text-sm font-semibold text-white truncate">
                {{ $genres->last()?->name_genres ?? '—' }}
            </p>
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
                <span class="text-sm font-medium text-[#c4c9d9]">All Genres</span>
            </div>
            {{-- Search --}}
            <div class="relative hidden sm:block">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input type="text" placeholder="Search genre…"
                       class="pl-9 pr-4 py-1.5 rounded-lg bg-[#111318] border border-white/[0.08] text-sm text-[#c4c9d9] placeholder-[#7c8497] focus:outline-none focus:border-[#6c8cff]/60 transition w-48"/>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/[0.06]">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase w-16">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Genre Name</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04]">
                    @forelse ($genres as $item)
                    <tr class="group transition-colors duration-150 hover:bg-white/[0.025]">

                        {{-- No --}}
                        <td class="px-6 py-4 text-[#7c8497] font-mono text-xs">
                            {{ str_pad($no++, 2, '0', STR_PAD_LEFT) }}
                        </td>

                        {{-- Genre name with icon --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center text-[#6c8cff]">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-white group-hover:text-[#8aa4ff] transition-colors duration-150">
                                    {{ $item->name_genres }}
                                </span>
                            </div>
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">

                                {{-- Edit --}}
                                <a href="{{ route('genre.edit', $item->id) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 transition hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('genre.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus genre \'{{ addslashes($item->name_genres) }}\'? Tindakan ini tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"/>
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                            <path d="M10 11v6M14 11v6"/>
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-[#111318] border border-white/[0.06] flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                                    </svg>
                                </div>
                                <p class="text-[#7c8497] text-sm">No genres found</p>
                                <a href="{{ route('genre.create') }}" class="text-xs text-[#6c8cff] hover:underline">Add your first genre →</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        @if($genres instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="px-6 py-4 border-t border-white/[0.06] flex items-center justify-between text-xs text-[#7c8497]">
            <span>Showing {{ $genres->firstItem() }}–{{ $genres->lastItem() }} of {{ $genres->total() }} genres</span>
            <div>{{ $genres->links() }}</div>
        </div>
        @else
        <div class="px-6 py-3.5 border-t border-white/[0.06] text-xs text-[#7c8497]">
            {{ $genres->count() }} genre(s) total
        </div>
        @endif

    </div>{{-- end card --}}

</div>

@endsection