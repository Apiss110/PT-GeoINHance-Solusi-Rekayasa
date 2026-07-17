@props(['route', 'items'])

{{-- 
    $route: Route untuk form action
    $items: Koleksi data (misal: $sliders, $messages, $trainings) 
--}}

@php
    // Ambil semua ID dari koleksi untuk kebutuhan select-all
    $allIds = $items->pluck('id')->toArray();
@endphp

<div x-data="{ 
        selectedIds: [], 
        allIds: {{ json_encode($allIds) }},
        toggleAll() {
            this.selectedIds = (this.selectedIds.length === this.allIds.length) ? [] : [...this.allIds];
        }
    }">
    
    <form action="{{ $route }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')">
        @csrf
        @method('DELETE')

        {{-- Header Bar --}}
        <div class="flex justify-between items-center mb-4">
            {{ $header ?? '' }}

            {{-- Tombol Hapus (Muncul otomatis saat ada yang dipilih) --}}
            <div x-show="selectedIds.length > 0" x-cloak x-transition>
                <button type="submit" class="inline-flex items-center space-x-1.5 text-xs font-bold uppercase tracking-wider text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition-all shadow-sm">
                    <i class="fa-solid fa-trash-can"></i>
                    <span>Hapus (<span x-text="selectedIds.length"></span>)</span>
                </button>
            </div>
        </div>

        {{-- Slot untuk Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 w-10 text-center">
                            <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 text-blue-600 border-gray-300 rounded cursor-pointer">
                        </th>
                        {{ $thead }}
                    </tr>
                </thead>
                <tbody>
                    {{ $tbody }}
                </tbody>
            </table>
        </div>
    </form>
</div>