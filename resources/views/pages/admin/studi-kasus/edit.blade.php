<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Edit Case Study</h3>
                <p class="text-gray-500 text-sm mt-1">Perbarui informasi atau berkas dokumen studi kasus</p>
            </div>
            <div>
                <a href="{{ route('admin.studi-kasus.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.studi-kasus.update', $caseStudy->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Case Study <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $caseStudy->title) }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('title') border-red-500 @enderror" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sector" class="block text-sm font-semibold text-gray-700 mb-2">Sektor / Bidang <span class="text-red-500">*</span></label>
                        <select name="sector" id="sector" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition bg-white @error('sector') border-red-500 @enderror" required>
                            <option value="Geotechnical" {{ old('sector', $caseStudy->sector) == 'Geotechnical' ? 'selected' : '' }}>Geotechnical</option>
                            <option value="Structural" {{ old('sector', $caseStudy->sector) == 'Structural' ? 'selected' : '' }}>Structural</option>
                            <option value="Infrastructure" {{ old('sector', $caseStudy->sector) == 'Infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                        </select>
                        @error('sector')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="year" class="block text-sm font-semibold text-gray-700 mb-2">Tahun Publikasi <span class="text-red-500">*</span></label>
                        <input type="number" name="year" id="year" value="{{ old('year', $caseStudy->year) }}" min="2000" max="{{ date('Y') + 1 }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('year') border-red-500 @enderror" required>
                        @error('year')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">File Dokumen (PDF) <span class="text-gray-400 font-normal">(Biarkan kosong jika tidak ingin mengganti file)</span></label>
                        
                        @if($caseStudy->file_path)
                        <div class="mb-3 flex items-center p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <span class="truncate font-medium">File aktif saat ini: {{ basename($caseStudy->file_path) }}</span>
                        </div>
                        @endif

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#0e1d82] transition">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L32 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M28 8v12h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="file_pdf" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0e1d82] hover:text-[#0e1d82]/80 focus-within:outline-none">
                                        <span>Unggah file baru</span>
                                        <input id="file_pdf" name="file_pdf" type="file" accept="application/pdf" class="sr-only" onchange="updateFileName(this)">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Format PDF (Maks. 10MB)</p>
                                <p id="file-name-preview" class="text-sm font-semibold text-emerald-600 mt-2 hidden"></p>
                            </div>
                        </div>
                        @error('file_pdf')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat / Ringkasan</label>
                        <textarea name="description" id="description" rows="4" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('description') border-red-500 @enderror" 
                            placeholder="Tulis ringkasan singkat mengenai cakupan analisis studi kasus teknik ini...">{{ old('description', $caseStudy->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('