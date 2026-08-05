<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        
        {{-- 1. Session Notifications --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-sm flex items-center justify-between">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- 2. Page Header & Top Action Buttons --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Kelola Artikel</h3>
                <p class="text-gray-500 text-sm mt-1">Daftar seluruh artikel dan wawasan aktif GeoINHance.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                {{-- Bulk Delete Button --}}
                <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" 
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition opacity-50 cursor-not-allowed" disabled>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                    </svg>
                    Hapus Terpilih (<span id="selected-count">0</span>)
                </button>

                {{-- Add New Article Button --}}
                <a href="{{ route('admin.articles.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Artikel Baru
                </a>
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table --}}
        <form id="bulk-delete-form" action="{{ route('admin.articles.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
                <div class="p-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700">Data Artikel Aktif</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 w-10">
                                    <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-6 py-3.5 w-12">No</th>
                                <th scope="col" class="px-6 py-3.5 w-24">Preview</th>
                                <th scope="col" class="px-6 py-3.5">Detail Artikel</th>
                                <th scope="col" class="px-6 py-3.5 w-44">Kategori & Tag</th>
                                <th scope="col" class="px-6 py-3.5 w-36">Tanggal</th>
                                <th scope="col" class="px-6 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($articles as $key => $article)
                                @php
                                    // Clean text from HTML tags for safe display snippet
                                    $rawContent = $article->content ?? $article->description ?? '';
                                    $cleanedDesc = strip_tags($rawContent);
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition">
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" name="ids[]" value="{{ $article->id }}" class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>
                                    
                                    {{-- Nomor Paginasi --}}
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ method_exists($articles, 'firstItem') ? $articles->firstItem() + $key : $key + 1 }}
                                    </td>
                                    
                                    {{-- Preview Gambar --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}" 
                                                 alt="{{ $article->title }}" 
                                                 class="w-16 h-12 object-cover rounded-lg border border-gray-200 shadow-sm">
                                        @else
                                            <div class="w-16 h-12 bg-gray-100 rounded-lg flex flex-col items-center justify-center text-[10px] text-gray-400 border border-gray-200">
                                                <span>No Image</span>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    {{-- Judul & Deskripsi --}}
                                    <td class="px-6 py-4">
                                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-1">
                                            {{ $article->title }}
                                        </h4>
                                        <p class="text-gray-500 text-xs line-clamp-2 mt-1 leading-relaxed" title="{{ $cleanedDesc }}">
                                            {{ Str::limit($cleanedDesc, 110) }}
                                        </p>
                                    </td>

                                    {{-- Kategori & Tag --}}
                                    <td class="px-6 py-4 whitespace-nowrap space-y-1">
                                        @if($article->category)
                                            <div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                                    {{ $article->category }}
                                                </span>
                                            </div>
                                        @endif
                                        @if($article->tag)
                                            <div>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                                    #{{ $article->tag }}
                                                </span>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Tanggal Buat --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="inline-flex space-x-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-lg transition" title="Edit Artikel">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            
                                            {{-- Hapus Satuan --}}
                                            <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { document.getElementById('delete-article-{{ $article->id }}').submit(); }" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg transition" title="Hapus Artikel">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">
                                        Belum ada data artikel yang tersedia. Klik tombol "+ Tambah Artikel Baru" untuk menambahkan data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Hidden Form Single Delete untuk setiap artikel --}}
        @foreach($articles as $article)
            <form id="delete-article-{{ $article->id }}" action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

        {{-- Paginasi Tabel --}}
        @if(method_exists($articles, 'links'))
            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

    {{-- Script JavaScript untuk Checkbox All & Counter Bulk Delete --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxAll = document.getElementById('checkbox-all');
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const btnBulkDelete = document.getElementById('btn-bulk-delete');
            const selectedCount = document.getElementById('selected-count');

            function updateBulkDeleteStatus() {
                const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
                selectedCount.textContent = checkedCount;

                if (checkedCount > 0) {
                    btnBulkDelete.removeAttribute('disabled');
                    btnBulkDelete.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    btnBulkDelete.setAttribute('disabled', 'disabled');
                    btnBulkDelete.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            if(checkboxAll) {
                checkboxAll.addEventListener('change', function () {
                    checkboxes.forEach(cb => { cb.checked = checkboxAll.checked; });
                    updateBulkDeleteStatus();
                });
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    if (!this.checked) {
                        checkboxAll.checked = false;
                    } else {
                        const allChecked = document.querySelectorAll('.item-checkbox:checked').length === checkboxes.length;
                        checkboxAll.checked = allChecked;
                    }
                    updateBulkDeleteStatus();
                });
            });
        });
    </script>
</x-app-layout>