<?php

namespace App\Livewire;

use App\WithNotification;
use App\Models\DepartemenBiro;
use App\Models\Fungsi;
use App\Models\ProgramKerja;
use App\Models\Agenda;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ManageDepartemenBiro extends Component
{
    use WithFileUploads, WithPagination, WithNotification;

    // Main DepartemenBiro properties
    public $selectedDepartemen = null;
    public $nama = '';
    public $logo = null;
    public $logoPath = '';
    public $deskripsi = '';
    public $divisi = '';

    // Related entity properties
    public $activeTab = 'fungsi';
    public $showModal = false;
    public $modalType = '';
    public $editingId = null;

    // Fungsi properties
    public $fungsiJudul = '';

    // Program Kerja properties
    public $programKerjaJudul = '';
    public $programKerjaDeskripsi = '';

    // Agenda properties
    public $agendaJudul = '';
    public $agendaDeskripsi = '';

    // Anggota properties
    public $anggotaNama = '';
    public $anggotaJabatan = '';
    public $anggotaFoto = null;
    public $anggotaFotoPath = '';
    public $anggotaTahunMulai = '';
    public $anggotaTahunSelesai = '';

    // Search and filter
    public $search = '';
    public $filterDivisi = '';
    
    // Sorting
    public $sortField = 'nama';
    public $sortDirection = 'asc';
    
    // Delete confirmation
    public $selectedForDelete = null;

    protected $queryString = ['search', 'filterDivisi', 'sortField', 'sortDirection'];

    public function mount()
    {
        $this->anggotaTahunMulai = now()->year;
    }

    // Validation Rules
    protected function getDepartemenRules()
    {
        return [
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
            'divisi' => ['required', Rule::in(['Internal', 'PSTI', 'Eksternal'])],
        ];
    }

    protected function getFungsiRules()
    {
        return [
            'fungsiJudul' => 'required|string|max:255',
        ];
    }

    protected function getProgramKerjaRules()
    {
        return [
            'programKerjaJudul' => 'required|string|max:255',
            'programKerjaDeskripsi' => 'nullable|string',
        ];
    }

    protected function getAgendaRules()
    {
        return [
            'agendaJudul' => 'required|string|max:255',
            'agendaDeskripsi' => 'nullable|string',
        ];
    }

    protected function getAnggotaRules()
    {
        return [
            'anggotaNama' => 'required|string|max:255',
            'anggotaJabatan' => ['required', Rule::in(['Kepala', 'Staff'])],
            'anggotaFoto' => 'nullable|image|max:2048',
            'anggotaTahunMulai' => 'required|integer|min:2020|max:' . (now()->year + 5),
            'anggotaTahunSelesai' => 'nullable|integer|min:' . $this->anggotaTahunMulai . '|max:' . (now()->year + 10),
        ];
    }

    // Main DepartemenBiro CRUD Operations
    public function createDepartemen()
    {
        $this->resetDepartemenForm();
        $this->showModal = true;
        $this->modalType = 'create-departemen';
    }
    
    public function confirmDelete($id)
    {
        $this->selectedForDelete = $id;
    }

    public function editDepartemen($id)
    {
        $departemen = DepartemenBiro::findOrFail($id);
        $this->editingId = $id;
        $this->nama = $departemen->nama;
        $this->logoPath = $departemen->logo;
        $this->deskripsi = $departemen->deskripsi;
        $this->divisi = $departemen->divisi;

        $this->showModal = true;
        $this->modalType = 'edit-departemen';
    }

    public function saveDepartemen()
    {
        $this->validate($this->getDepartemenRules());

        $data = [
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'divisi' => $this->divisi,
        ];

        // Handle logo upload
        if ($this->logo) {
            // Delete old logo if editing
            if ($this->editingId && $this->logoPath) {
                Storage::disk('public')->delete($this->logoPath);
            }

            $data['logo'] = $this->logo->store('departemen-logos', 'public');
        }

        if ($this->editingId) {
            DepartemenBiro::find($this->editingId)->update($data);
            session()->flash('message', 'Departemen berhasil diperbarui!');
        } else {
            DepartemenBiro::create($data);
            session()->flash('message', 'Departemen berhasil dibuat!');
        }

        $this->closeModal();
    }

    public function deleteDepartemen($id)
    {
        $departemen = DepartemenBiro::findOrFail($id);

        // Delete logo file
        if ($departemen->logo) {
            Storage::disk('public')->delete($departemen->logo);
        }

        $departemen->delete();
        session()->flash('message', 'Departemen berhasil dihapus!');

        // Reset selected departemen if it was deleted
        if ($this->selectedDepartemen && $this->selectedDepartemen->id === $id) {
            $this->selectedDepartemen = null;
        }
    }

    public function selectDepartemen($id)
    {
        $this->selectedDepartemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'anggotas'])->findOrFail($id);
        $this->activeTab = 'fungsi';
    }

    // Related Entity CRUD Operations
    public function createRelatedEntity($type)
    {
        if (!$this->selectedDepartemen) {
            session()->flash('error', 'Pilih departemen terlebih dahulu!');
            return;
        }

        $this->resetRelatedForm($type);
        $this->showModal = true;
        $this->modalType = "create-{$type}";
    }

    public function editRelatedEntity($type, $id)
    {
        $this->editingId = $id;

        switch ($type) {
            case 'fungsi':
                $entity = Fungsi::findOrFail($id);
                $this->fungsiJudul = $entity->judul;
                break;

            case 'program-kerja':
                $entity = ProgramKerja::findOrFail($id);
                $this->programKerjaJudul = $entity->judul;
                $this->programKerjaDeskripsi = $entity->deskripsi;
                break;

            case 'agenda':
                $entity = Agenda::findOrFail($id);
                $this->agendaJudul = $entity->judul;
                $this->agendaDeskripsi = $entity->deskripsi;
                break;

            case 'anggota':
                $entity = Anggota::findOrFail($id);
                $this->anggotaNama = $entity->nama;
                $this->anggotaJabatan = $entity->jabatan;
                $this->anggotaFotoPath = $entity->foto;
                $this->anggotaTahunMulai = $entity->tahun_mulai;
                $this->anggotaTahunSelesai = $entity->tahun_selesai;
                break;
        }

        $this->showModal = true;
        $this->modalType = "edit-{$type}";
    }

    public function saveRelatedEntity($type)
    {
        switch ($type) {
            case 'fungsi':
                $this->saveFungsi();
                break;
            case 'program-kerja':
                $this->saveProgramKerja();
                break;
            case 'agenda':
                $this->saveAgenda();
                break;
            case 'anggota':
                $this->saveAnggota();
                break;
        }
    }

    private function saveFungsi()
    {
        $this->validate($this->getFungsiRules());

        $data = [
            'judul' => $this->fungsiJudul,
            'departemen_biro_id' => $this->selectedDepartemen->id,
        ];

        if ($this->editingId) {
            Fungsi::find($this->editingId)->update($data);
            session()->flash('message', 'Fungsi berhasil diperbarui!');
        } else {
            Fungsi::create($data);
            session()->flash('message', 'Fungsi berhasil ditambahkan!');
        }

        $this->refreshSelectedDepartemen();
        $this->closeModal();
    }

    private function saveProgramKerja()
    {
        $this->validate($this->getProgramKerjaRules());

        $data = [
            'judul' => $this->programKerjaJudul,
            'deskripsi' => $this->programKerjaDeskripsi,
            'departemen_biro_id' => $this->selectedDepartemen->id,
        ];

        if ($this->editingId) {
            ProgramKerja::find($this->editingId)->update($data);
            session()->flash('message', 'Program Kerja berhasil diperbarui!');
        } else {
            ProgramKerja::create($data);
            session()->flash('message', 'Program Kerja berhasil ditambahkan!');
        }

        $this->refreshSelectedDepartemen();
        $this->closeModal();
    }

    private function saveAgenda()
    {
        $this->validate($this->getAgendaRules());

        $data = [
            'judul' => $this->agendaJudul,
            'deskripsi' => $this->agendaDeskripsi,
            'departemen_biro_id' => $this->selectedDepartemen->id,
        ];

        if ($this->editingId) {
            Agenda::find($this->editingId)->update($data);
            session()->flash('message', 'Agenda berhasil diperbarui!');
        } else {
            Agenda::create($data);
            session()->flash('message', 'Agenda berhasil ditambahkan!');
        }

        $this->refreshSelectedDepartemen();
        $this->closeModal();
    }

    private function saveAnggota()
    {
        $this->validate($this->getAnggotaRules());

        $data = [
            'nama' => $this->anggotaNama,
            'jabatan' => $this->anggotaJabatan,
            'tahun_mulai' => $this->anggotaTahunMulai,
            'tahun_selesai' => $this->anggotaTahunSelesai,
            'departemen_biro_id' => $this->selectedDepartemen->id,
        ];

        // Handle foto upload
        if ($this->anggotaFoto) {
            // Delete old foto if editing
            if ($this->editingId && $this->anggotaFotoPath) {
                Storage::disk('public')->delete($this->anggotaFotoPath);
            }

            $data['foto'] = $this->anggotaFoto->store('anggota-fotos', 'public');
        }

        if ($this->editingId) {
            Anggota::find($this->editingId)->update($data);
            session()->flash('message', 'Anggota berhasil diperbarui!');
        } else {
            Anggota::create($data);
            session()->flash('message', 'Anggota berhasil ditambahkan!');
        }

        $this->refreshSelectedDepartemen();
        $this->closeModal();
    }

    public function deleteRelatedEntity($type, $id)
    {
        switch ($type) {
            case 'fungsi':
                Fungsi::findOrFail($id)->delete();
                session()->flash('message', 'Fungsi berhasil dihapus!');
                break;

            case 'program-kerja':
                ProgramKerja::findOrFail($id)->delete();
                session()->flash('message', 'Program Kerja berhasil dihapus!');
                break;

            case 'agenda':
                Agenda::findOrFail($id)->delete();
                session()->flash('message', 'Agenda berhasil dihapus!');
                break;

            case 'anggota':
                $anggota = Anggota::findOrFail($id);
                if ($anggota->foto) {
                    Storage::disk('public')->delete($anggota->foto);
                }
                $anggota->delete();
                session()->flash('message', 'Anggota berhasil dihapus!');
                break;
        }

        $this->refreshSelectedDepartemen();
    }

    // Utility Methods
    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->modalType = '';
        $this->editingId = null;
        $this->resetDepartemenForm();
        $this->resetAllRelatedForms();
    }

    private function resetDepartemenForm()
    {
        $this->nama = '';
        $this->logo = null;
        $this->logoPath = '';
        $this->deskripsi = '';
        $this->divisi = '';
    }

    private function resetRelatedForm($type)
    {
        switch ($type) {
            case 'fungsi':
                $this->fungsiJudul = '';
                break;
            case 'program-kerja':
                $this->programKerjaJudul = '';
                $this->programKerjaDeskripsi = '';
                break;
            case 'agenda':
                $this->agendaJudul = '';
                $this->agendaDeskripsi = '';
                break;
            case 'anggota':
                $this->anggotaNama = '';
                $this->anggotaJabatan = '';
                $this->anggotaFoto = null;
                $this->anggotaFotoPath = '';
                $this->anggotaTahunMulai = now()->year;
                $this->anggotaTahunSelesai = '';
                break;
        }
    }

    private function resetAllRelatedForms()
    {
        $this->resetRelatedForm('fungsi');
        $this->resetRelatedForm('program-kerja');
        $this->resetRelatedForm('agenda');
        $this->resetRelatedForm('anggota');
    }

    private function refreshSelectedDepartemen()
    {
        if ($this->selectedDepartemen) {
            $this->selectedDepartemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'anggotas'])
                ->find($this->selectedDepartemen->id);
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->filterDivisi = '';
        $this->resetPage();
    }

    public function render()
    {
        $departemenBiros = DepartemenBiro::query()
            ->withCount(['anggotas', 'fungsis', 'programKerjas', 'agendas'])
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterDivisi, function ($query) {
                $query->where('divisi', $this->filterDivisi);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.manage-departemen-biro', [
            'departemenBiros' => $departemenBiros,
            'divisiOptions' => ['Internal', 'PSTI', 'Eksternal'],
            'jabatanOptions' => ['Kepala', 'Staff'],
        ]);
    }
}
