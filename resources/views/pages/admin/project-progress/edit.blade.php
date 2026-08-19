<x-app-layout>
<div class="container mx-auto p-6 max-w-5xl">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Progres Proyek</h1>
            <p class="text-xs text-gray-500 mt-1">Perbarui informasi proyek, tahapan, dan centang poin kegiatan yang telah selesai.</p>
        </div>
        <a href="{{ route('admin.project-progress.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition">
            ← Kembali
        </a>
    </div>

    {{-- Form Utama Edit --}}
    <form action="{{ route('admin.project-progress.update', $projectProgress->id) }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
        @method('PUT')

        {{-- SECTION 1: Informasi Utama Proyek --}}
        <div class="bg-white p-6 rounded-xl shadow mb-6 border border-gray-100">
            <h2 class="text-base font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Informasi Utama Proyek
            </h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Klien <span class="text-red-500">*</span></label>
                <select name="user_id" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 text-sm" required>
                    <option value="">-- Pilih Klien --</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('user_id', $projectProgress->user_id) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }} ({{ $client->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Proyek / Pekerjaan <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $projectProgress->title) }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Contoh: Perencanaan Penanganan Defect Jalan Tol" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Pengerjaan</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Catatan umum atau rincian singkat proyek...">{{ old('description', $projectProgress->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Persentase Progres (%) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" id="percentageInput" name="percentage" min="0" max="100" value="{{ old('percentage', $projectProgress->percentage) }}" class="w-full border border-gray-300 rounded-lg p-2.5 bg-gray-100 font-bold text-blue-700 text-sm cursor-not-allowed focus:outline-none" readonly required>
                        <span class="absolute right-3 top-2.5 text-xs text-gray-500 font-medium bg-white px-2 py-0.5 rounded border border-gray-200">
                            Otomatis
                        </span>
                    </div>
                    <p class="text-[11px] text-gray-500 mt-1">*Otomatis terhitung dari jumlah poin kegiatan yang dicentang di bawah.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status Progres <span class="text-red-500">*</span>
                    </label>

                    {{-- Input Hidden untuk mengirimkan nilai status ke Laravel Controller --}}
                    <input type="hidden" id="hiddenStatusInput" name="status" value="{{ old('status', $projectProgress->status) }}">

                    {{-- Select di-disabled agar Admin TIDAK BISA memilih manual --}}
                    <select id="statusSelect" disabled class="w-full border border-gray-300 rounded-lg p-2.5 text-sm bg-gray-100 text-gray-700 font-semibold cursor-not-allowed focus:outline-none">
                        <option value="pending" {{ $projectProgress->status == 'pending' ? 'selected' : '' }}>Pending (Belum Dimulai)</option>
                        <option value="in_progress" {{ $projectProgress->status == 'in_progress' ? 'selected' : '' }}>Dalam Proses (In Progress)</option>
                        <option value="completed" {{ $projectProgress->status == 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                    </select>
                    <p class="text-[11px] text-gray-500 mt-1">*Otomatis menyesuaikan dengan persentase progres.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ old('start_date', optional($projectProgress->start_date)->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Target Selesai</label>
                    <input type="date" name="target_date" value="{{ old('target_date', optional($projectProgress->target_date)->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto / Lampiran Lapangan</label>
                @if($projectProgress->image)
                    <div class="mb-3 flex items-center gap-3 bg-gray-50 p-2 rounded-lg border border-gray-200 max-w-xs">
                        <img src="{{ asset('storage/' . $projectProgress->image) }}" alt="Foto Progres" class="w-20 h-16 object-cover rounded-lg border">
                        <span class="text-xs text-gray-500 font-medium">Lampiran saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 text-sm bg-gray-50">
            </div>
        </div>

        {{-- SECTION 2: Dynamic Input Tahapan & Poin --}}
        <div class="bg-white p-6 rounded-xl shadow mb-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                <div>
                    <h2 class="text-base font-bold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Kelola Tahapan & Poin Pekerjaan
                    </h2>
                    <p class="text-xs text-gray-500 mt-0.5">Tambah, hapus, atau centang poin kegiatan yang sudah dikerjakan.</p>
                </div>
                <button type="button" onclick="addStage()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3 py-2 rounded-lg transition flex items-center gap-1 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    + Tambah Tahap
                </button>
            </div>

            {{-- Container Tempat Tahapan --}}
            <div id="stagesContainer" class="space-y-6">
                @if($projectProgress->relationLoaded('stages') && $projectProgress->stages->count() > 0)
                    @foreach($projectProgress->stages as $sIndex => $stage)
                        @php $sLoop = $sIndex + 1; @endphp
                        <div class="stage-card border border-gray-200 rounded-xl p-5 bg-slate-50 relative transition hover:border-blue-300" id="stage_{{ $sLoop }}">
                            <div class="flex items-center justify-between gap-4 mb-4 pb-3 border-b border-gray-200">
                                <div class="flex items-center gap-2 flex-grow">
                                    <span class="stage-number-badge w-7 h-7 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">
                                        {{ $sLoop }}
                                    </span>
                                    <input type="text" name="stages[{{ $sLoop }}][title]" value="{{ old("stages.$sLoop.title", $stage->title) }}" class="stage-title-input w-full border border-gray-300 rounded-lg p-2 text-sm font-semibold focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Contoh: Tahap {{ $sLoop }} - Persiapan Awal" required>
                                </div>
                                <button type="button" onclick="removeStage({{ $sLoop }})" class="text-xs text-red-600 hover:text-red-800 font-semibold hover:bg-red-50 p-2 rounded-lg transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus Tahap
                                </button>
                            </div>

                            <div class="pl-2 sm:pl-4 space-y-3">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Daftar Poin Kegiatan:</label>
                                <div id="pointsContainer_{{ $sLoop }}" class="space-y-3">
                                    @foreach($stage->items as $pIndex => $item)
                                        @php $pLoop = $pIndex + 1; @endphp
                                        <div class="point-item bg-white p-3 rounded-lg border border-gray-200 space-y-2 relative shadow-sm" id="point_{{ $sLoop }}_{{ $pLoop }}">
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" name="stages[{{ $sLoop }}][items][{{ $pLoop }}][is_completed]" value="1" {{ old("stages.$sLoop.items.$pLoop.is_completed", $item->is_completed) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500 cursor-pointer" title="Centang jika poin ini sudah selesai">
                                                <input type="text" name="stages[{{ $sLoop }}][items][{{ $pLoop }}][title]" value="{{ old("stages.$sLoop.items.$pLoop.title", $item->title) }}" class="w-full border border-gray-300 rounded-md p-2 text-xs font-semibold focus:ring-2 focus:ring-blue-500" placeholder="Judul Poin" required>
                                                <button type="button" onclick="removePoint({{ $sLoop }}, {{ $pLoop }})" class="text-gray-400 hover:text-red-500 p-1" title="Hapus Poin">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                </button>
                                            </div>
                                            <div class="pl-6">
                                                <textarea name="stages[{{ $sLoop }}][items][{{ $pLoop }}][description]" rows="1" class="w-full border border-gray-200 rounded-md p-2 text-xs text-gray-600 focus:ring-2 focus:ring-blue-500" placeholder="Deskripsi singkat kegiatan (opsional)...">{{ old("stages.$sLoop.items.$pLoop.description", $item->description) }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="button" onclick="addPoint({{ $sLoop }})" class="mt-3 text-xs text-blue-600 hover:text-blue-800 font-semibold bg-blue-50 hover:bg-blue-100 px-3 py-2 rounded-lg transition flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    + Tambah Poin Kegiatan
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit" form="projectForm" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Update Progres Proyek
        </button>
    </form>
</div>

<script>
    // Inisialisasi Counter berdasarkan data yang dirender dari backend
    let stageCounter = {{ ($projectProgress->relationLoaded('stages') && $projectProgress->stages->count() > 0) ? $projectProgress->stages->count() : 0 }};
    let pointIndexes = {};

    // Isi pointIndexes awal berdasarkan jumlah item per stage yang ada
    @if($projectProgress->relationLoaded('stages'))
        @foreach($projectProgress->stages as $sIndex => $stage)
            pointIndexes[{{ $sIndex + 1 }}] = {{ $stage->items->count() }};
        @endforeach
    @endif

    // FUNGSI UTAMA 1: Hitung Persentase & Auto Update Status Progres
    function calculateProgressPercentage() {
        const percentageInput = document.getElementById('percentageInput');
        const statusSelect = document.getElementById('statusSelect');
        const hiddenStatusInput = document.getElementById('hiddenStatusInput');
        
        const allCheckboxes = document.querySelectorAll('#stagesContainer input[type="checkbox"]');
        const totalPoints = allCheckboxes.length;
        
        let percentage = 0;
        let currentStatus = 'pending';

        if (totalPoints > 0) {
            let checkedCount = 0;
            allCheckboxes.forEach(cb => {
                if (cb.checked) checkedCount++;
            });

            percentage = Math.round((checkedCount / totalPoints) * 100);

            if (percentage === 100) {
                currentStatus = 'completed';
            } else if (percentage > 0) {
                currentStatus = 'in_progress';
            } else {
                currentStatus = 'pending';
            }
        } else {
            // Jika tidak ada poin kegiatan sama sekali, pertahankan nilai awal dari database
            percentage = parseInt("{{ $projectProgress->percentage ?? 0 }}");
            currentStatus = "{{ $projectProgress->status ?? 'pending' }}";
        }

        if (percentageInput) percentageInput.value = percentage;
        if (statusSelect) statusSelect.value = currentStatus;
        if (hiddenStatusInput) hiddenStatusInput.value = currentStatus;
    }

    // FUNGSI UTAMA 2: Re-indexing nomor urut tahap yang tampil
    function renumberStages() {
        const stageCards = document.querySelectorAll('.stage-card');
        stageCards.forEach((card, index) => {
            const newIndex = index + 1;

            const badge = card.querySelector('.stage-number-badge');
            if (badge) {
                badge.textContent = newIndex;
            }

            const titleInput = card.querySelector('.stage-title-input');
            if (titleInput && !titleInput.value) {
                titleInput.placeholder = `Contoh: Tahap ${newIndex} - Persiapan Awal`;
            }
        });
    }

    // Fungsi Menambah Card Tahap Baru
    function addStage() {
        stageCounter++;
        const container = document.getElementById('stagesContainer');

        const stageHtml = `
            <div class="stage-card border border-gray-200 rounded-xl p-5 bg-slate-50 relative transition hover:border-blue-300" id="stage_${stageCounter}">
                <div class="flex items-center justify-between gap-4 mb-4 pb-3 border-b border-gray-200">
                    <div class="flex items-center gap-2 flex-grow">
                        <span class="stage-number-badge w-7 h-7 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">
                            1
                        </span>
                        <input type="text" name="stages[${stageCounter}][title]" class="stage-title-input w-full border border-gray-300 rounded-lg p-2 text-sm font-semibold focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Contoh: Tahap ${stageCounter} - Persiapan Awal" required>
                    </div>
                    <button type="button" onclick="removeStage(${stageCounter})" class="text-xs text-red-600 hover:text-red-800 font-semibold hover:bg-red-50 p-2 rounded-lg transition flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Tahap
                    </button>
                </div>

                <div class="pl-2 sm:pl-4 space-y-3">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Daftar Poin Kegiatan:</label>
                    <div id="pointsContainer_${stageCounter}" class="space-y-3">
                    </div>

                    <button type="button" onclick="addPoint(${stageCounter})" class="mt-3 text-xs text-blue-600 hover:text-blue-800 font-semibold bg-blue-50 hover:bg-blue-100 px-3 py-2 rounded-lg transition flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        + Tambah Poin Kegiatan
                    </button>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', stageHtml);
        
        addPoint(stageCounter);
        renumberStages();
        calculateProgressPercentage();
    }

    // Fungsi Menambah Input Poin & Deskripsi
    function addPoint(sIndex) {
        if (!pointIndexes[sIndex]) {
            pointIndexes[sIndex] = 0;
        }
        pointIndexes[sIndex]++;
        const pIndex = pointIndexes[sIndex];

        const pointsContainer = document.getElementById(`pointsContainer_${sIndex}`);

        const pointHtml = `
            <div class="point-item bg-white p-3 rounded-lg border border-gray-200 space-y-2 relative shadow-sm" id="point_${sIndex}_${pIndex}">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="stages[${sIndex}][items][${pIndex}][is_completed]" value="1" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500 cursor-pointer" title="Centang jika poin ini sudah selesai">
                    <input type="text" name="stages[${sIndex}][items][${pIndex}][title]" class="w-full border border-gray-300 rounded-md p-2 text-xs font-semibold focus:ring-2 focus:ring-blue-500" placeholder="Judul Poin Kegiatan" required>
                    <button type="button" onclick="removePoint(${sIndex}, ${pIndex})" class="text-gray-400 hover:text-red-500 p-1" title="Hapus Poin">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="pl-6">
                    <textarea name="stages[${sIndex}][items][${pIndex}][description]" rows="1" class="w-full border border-gray-200 rounded-md p-2 text-xs text-gray-600 focus:ring-2 focus:ring-blue-500" placeholder="Deskripsi singkat kegiatan (opsional)..."></textarea>
                </div>
            </div>
        `;

        pointsContainer.insertAdjacentHTML('beforeend', pointHtml);
        calculateProgressPercentage();
    }

    // Hapus Card Tahap
    function removeStage(sIndex) {
        const stageElem = document.getElementById(`stage_${sIndex}`);
        if (stageElem) {
            stageElem.remove();
            renumberStages();
            calculateProgressPercentage();
        }
    }

    // Hapus Item Poin
    function removePoint(sIndex, pIndex) {
        const pointElem = document.getElementById(`point_${sIndex}_${pIndex}`);
        if (pointElem) {
            pointElem.remove();
            calculateProgressPercentage();
        }
    }

    // Event Listener saat Halaman Selesai Load
    document.addEventListener('DOMContentLoaded', function() {
        // Jika belum ada stage dari database, tambahkan 1 stage default
        if (stageCounter === 0) {
            addStage();
        } else {
            calculateProgressPercentage();
        }

        // Pantau perubahan centang pada checkbox di container
        const stagesContainer = document.getElementById('stagesContainer');
        if (stagesContainer) {
            stagesContainer.addEventListener('change', function(e) {
                if (e.target && e.target.type === 'checkbox') {
                    calculateProgressPercentage();
                }
            });
        }
    });
</script>
</x-app-layout>