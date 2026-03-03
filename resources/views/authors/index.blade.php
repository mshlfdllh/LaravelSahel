@extends('layouts.app')

@section('content')

{{-- Page wrapper --}}
<div class="min-h-screen bg-[#111318] px-6 py-10 font-sans">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-1">
        <p class="text-xs font-semibold tracking-[0.25em] text-[#7c8497] uppercase">Management</p>
        <div class="flex items-end justify-between flex-wrap gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Author <span class="text-[#6c8cff]">Directory</span>
            </h1>
            <a href="{{ route('penulis.create') }}"
               class="group inline-flex items-center gap-2 rounded-lg bg-[#6c8cff] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#6c8cff]/20 transition-all duration-200 hover:bg-[#8aa4ff] hover:shadow-[#6c8cff]/40 hover:-translate-y-0.5 active:translate-y-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Add Author
            </a>
        </div>
    </div>

    {{-- Stats strip --}}
    <div class="mb-6 grid grid-cols-3 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Total Authors</p>
            <p class="text-2xl font-bold text-white">{{ $authors->count() }}</p>
        </div>
        <div class="rounded-xl border border-white/[0.06] bg-[#1a1d27] px-5 py-4">
            <p class="text-xs text-[#7c8497] uppercase tracking-widest mb-1">Avg. Age</p>
            <p class="text-2xl font-bold text-white">{{ $authors->count() ? round($authors->avg('age')) : '—' }}</p>
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
                <span class="text-sm font-medium text-[#c4c9d9]">All Authors</span>
            </div>
            {{-- Search (visual only – wire up with Alpine/Livewire if needed) --}}
            <div class="relative hidden sm:block">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input type="text" placeholder="Search author…"
                       class="pl-9 pr-4 py-1.5 rounded-lg bg-[#111318] border border-white/[0.08] text-sm text-[#c4c9d9] placeholder-[#7c8497] focus:outline-none focus:border-[#6c8cff]/60 transition w-52"/>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/[0.06]">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Author Name</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Age</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Alamat</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold tracking-widest text-[#7c8497] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04]">
                    @forelse ($authors as $author)
                    <tr class="group transition-colors duration-150 hover:bg-white/[0.025]">

                        {{-- No --}}
                        <td class="px-6 py-4 text-[#7c8497] font-mono text-xs">
                            {{ str_pad($no++, 2, '0', STR_PAD_LEFT) }}
                        </td>

                        {{-- Author name with avatar --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#6c8cff]/15 border border-[#6c8cff]/25 flex items-center justify-center text-[#6c8cff] text-xs font-bold">
                                    {{ strtoupper(substr($author->name_author, 0, 1)) }}
                                </div>
                                <span class="font-medium text-white group-hover:text-[#8aa4ff] transition-colors duration-150">
                                    {{ $author->name_author }}
                                </span>
                            </div>
                        </td>

                        {{-- Age --}}
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-md bg-[#111318] border border-white/[0.07] px-2.5 py-0.5 text-xs font-medium text-[#c4c9d9]">
                                {{ $author->age }} yr
                            </span>
                        </td>

                        {{-- Alamat --}}
                        <td class="px-6 py-4 text-[#9ca3af] max-w-[180px] truncate" title="{{ $author->alamat }}">
                            {{ $author->alamat }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('penulis.show', $author->id) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#6c8cff] bg-[#6c8cff]/10 border border-[#6c8cff]/20 transition hover:bg-[#6c8cff]/20 hover:border-[#6c8cff]/40">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Detail
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('penulis.edit', $author->id) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f59e0b] bg-[#f59e0b]/10 border border-[#f59e0b]/20 transition hover:bg-[#f59e0b]/20 hover:border-[#f59e0b]/40">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('penulis.destroy', $author->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus author {{ addslashes($author->name_author) }}? Tindakan ini tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-[#f87171] bg-[#f87171]/10 border border-[#f87171]/20 transition hover:bg-[#f87171]/20 hover:border-[#f87171]/40">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-[#111318] border border-white/[0.06] flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#7c8497]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                                </div>
                                <p class="text-[#7c8497] text-sm">No authors found</p>
                                <a href="{{ route('penulis.create') }}" class="text-xs text-[#6c8cff] hover:underline">Add your first author →</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination footer --}}
        @if($authors instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="px-6 py-4 border-t border-white/[0.06] flex items-center justify-between text-xs text-[#7c8497]">
            <span>Showing {{ $authors->firstItem() }}–{{ $authors->lastItem() }} of {{ $authors->total() }} authors</span>
            <div>{{ $authors->links() }}</div>
        </div>
        @else
        <div class="px-6 py-3.5 border-t border-white/[0.06] text-xs text-[#7c8497]">
            {{ $authors->count() }} author(s) total
        </div>
        @endif

    </div>{{-- end card --}}

</div>{{-- end wrapper --}}

@endsection