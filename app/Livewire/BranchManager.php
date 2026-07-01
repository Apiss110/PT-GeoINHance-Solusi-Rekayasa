<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // 1. WAJIB IMPORT INI UNTUK UPLOAD FILE
use App\Models\Branch;
use Illuminate\Support\Facades\Storage; // Untuk menghapus foto lama saat edit/hapus

class BranchManager extends Component
{
    use WithFileUploads; // 2. GUNAKAN TRAIT DI DALAM CLASS

    public $daerah;
    public $title;
    public $desc;
    public $img; // Sekarang properti ini akan menampung object file biner temporer
    public $lat;
    public $lng;
    public $link; // <--- TAMBAHAN BARU: Properti untuk menyimpan URL Proyek

    public $selectedBranchId = null;
    public $isEdit = false;
    public $oldImg = null; // Properti tambahan untuk menyimpan nama file foto lama saat edit

    protected function rules()
    {
        return [
            'daerah' => 'required|string|max:50',
            'title'  => 'required|string|max:100',
            'desc'   => 'required|string|max:500',
            'img'    => $this->isEdit ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120' : 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
            'lat'    => 'required|numeric|between:-90,90',
            'lng'    => 'required|numeric|between:-180,180',
            
            // UBAH BAGIAN INI MENJADI STRING AGAR BISA MENERIMA PATH /proyek/...
            'link'   => 'nullable|string|max:255', 
        ];
    }

    protected $messages = [
        'daerah.required' => 'Nama daerah wajib diisi.',
        'title.required' => 'Title atau nama cabang tidak boleh kosong.',
        'desc.required' => 'Deskripsi operasional wajib ditulis.',
        'img.required' => 'File gambar kantor wajib diunggah.',
        'img.image' => 'File harus berupa gambar.',
        'img.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
        'img.max' => 'Ukuran gambar maksimal adalah 5MB.',
        'lat.required' => 'Titik koordinat Latitude wajib diisi.',
        'lat.numeric' => 'Latitude harus berupa angka desimal.',
        'lng.required' => 'Titik koordinat Longitude wajib diisi.',
        'lng.numeric' => 'Longitude harus berupa angka desimal.',
        'link.url' => 'Format tautan proyek harus berupa URL valid (contoh: http://...)', // <--- TAMBAHAN BARU
    ];

    public function saveBranch()
    {
        $this->validate();

        $data = [
            'daerah' => strtolower(trim($this->daerah)),
            'title' => str(trim($this->title))->upper()->toString(),
            'desc' => trim($this->desc),
            'lat' => $this->lat,
            'lng' => $this->lng,
            'link' => trim($this->link), // <--- TAMBAHAN BARU: Masukkan data link ke array database
        ];

        // 3. PROSES UPLOAD FOTO
        if ($this->img && !is_string($this->img)) {
            // Simpan foto ke folder storage/app/public/branches
            $path = $this->img->store('branches', 'public');
            $data['img'] = $path;

            // Jika sedang edit dan ada foto lama, hapus foto yang lama agar storage tidak penuh
            if ($this->isEdit && $this->oldImg) {
                Storage::disk('public')->delete($this->oldImg);
            }
        }

        if ($this->isEdit) {
            $branch = Branch::findOrFail($this->selectedBranchId);
            $branch->update($data);
            session()->flash('success', 'Selamat, titik peta ' . $this->title . ' berhasil diperbarui!');
        } else {
            Branch::create($data);
            session()->flash('success', 'Sukses! Titik cabang baru berhasil ditambahkan ke dalam peta.');
        }

        $this->resetForm();
    }

    public function editBranch($id)
    {
        $branch = Branch::findOrFail($id);
        
        $this->selectedBranchId = $branch->id;
        $this->daerah = $branch->daerah;
        $this->title = $branch->title;
        $this->desc = $branch->desc;
        $this->lat = $branch->lat;
        $this->lng = $branch->lng;
        
        // PASTIKAN BARIS INI SUDAH TERPASANG DI BRANCHMANAGER.PHP ANDA
        $this->link = $branch->link; 
        
        $this->oldImg = $branch->img; 
        $this->img = null; 
        $this->isEdit = true;
    }

    public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $namaCabang = $branch->title;
        
        // Hapus file gambar dari storage sebelum datanya dihapus dari DB
        if ($branch->img) {
            Storage::disk('public')->delete($branch->img);
        }

        $branch->delete();
        session()->flash('success', 'Titik cabang "' . $namaCabang . '" telah berhasil dihapus dari website.');
        
        $this->resetForm();
    }

    public function resetForm()
    {
        // <--- TAMBAHAN BARU: Masukkan 'link' ke array reset agar form kosong kembali setelah disubmit
        $this->reset(['daerah', 'title', 'desc', 'img', 'lat', 'lng', 'link', 'selectedBranchId', 'isEdit', 'oldImg']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('pages.admin.branch.branch-manager', [
            'branches' => Branch::latest()->get()
        ]);
    }
}