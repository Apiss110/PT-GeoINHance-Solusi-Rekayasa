<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Branch;
use App\Models\StrategicProject;
use Illuminate\Support\Facades\Storage;

class BranchManager extends Component
{
    public $daerah;
    public $title;
    public $desc;
    public $lat;
    public $lng;
    public $link; // Menampung /proyek/{id}

    public $selectedBranchId = null;
    public $isEdit = false;

    protected function rules()
    {
        return [
            'daerah' => 'required|string|max:50',
            'title'  => 'required|string|max:100',
            'desc'   => 'required|string|max:500',
            'lat'    => 'required|numeric|between:-90,90',
            'lng'    => 'required|numeric|between:-180,180',
            'link'   => 'required|string|max:255', 
        ];
    }

    protected $messages = [
        'daerah.required' => 'Nama daerah wajib diisi.',
        'title.required'  => 'Title atau nama cabang tidak boleh kosong.',
        'desc.required'   => 'Deskripsi operasional wajib ditulis.',
        'lat.required'    => 'Titik koordinat Latitude wajib diisi.',
        'lat.numeric'     => 'Latitude harus berupa angka desimal.',
        'lng.required'    => 'Titik koordinat Longitude wajib diisi.',
        'lng.numeric'     => 'Longitude harus berupa angka desimal.',
        'link.required'   => 'Anda wajib memilih Hubungan Proyek Strategis.',
    ];

    public function saveBranch()
{
    $this->validate();

    // 1. Ambil ID Project dari link
    $projectId = null;
    if ($this->link) {
        $projectId = str_replace('/proyek/', '', $this->link);
    }

    // 2. Ambil data branch lama jika Edit
    $existingBranch = null;
    if ($this->isEdit) {
        $existingBranch = Branch::find($this->selectedBranchId);
    }

    // 3. Logika Gambar
    $projectImagePath = null;
    if ($projectId) {
        $project = StrategicProject::find($projectId);
        if ($project) {
            $projectImagePath = $project->image_path ?? $project->image ?? $project->img;
        }
    }

    if ($this->isEdit && !$projectImagePath && $existingBranch) {
        $projectImagePath = $existingBranch->img;
    }

    // 4. Perbaikan Utama: Masukkan 'project_id' ke dalam array $data
    $data = [
        'daerah'     => strtolower(trim($this->daerah)),
        'title'      => str(trim($this->title))->upper()->toString(),
        'desc'       => trim($this->desc),
        'lat'        => $this->lat,
        'lng'        => $this->lng,
        'link'       => trim($this->link),
        'project_id' => $projectId,
        // Tambahkan ?? '' agar jika projectImagePath null, akan dikirim string kosong
        'img'        => $projectImagePath ?? '', 
    ];

    if ($this->isEdit && $existingBranch) {
        $existingBranch->update($data);
        session()->flash('success', 'Titik peta berhasil diperbarui!');
    } else {
        Branch::create($data);
        session()->flash('success', 'Titik cabang baru berhasil ditambahkan!');
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
        $this->link = $branch->link; 
        $this->isEdit = true;

        $this->dispatch('branch-edited'); 
    }

    public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $namaCabang = $branch->title;
        
        $branch->delete();
        session()->flash('success', 'Titik cabang "' . $namaCabang . '" telah berhasil dihapus dari website.');
        
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['daerah', 'title', 'desc', 'lat', 'lng', 'link', 'selectedBranchId', 'isEdit']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('pages.admin.branch.branch-manager', [
            'branches' => Branch::latest()->get(),
            'projects' => StrategicProject::orderBy('title', 'asc')->get()
        ]);
    }
}