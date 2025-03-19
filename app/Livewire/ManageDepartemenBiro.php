<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use App\Models\DepartemenBiro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageDepartemenBiro extends Component
{
    use WithNotification, WithFileUploads;

    // Form Properties
    public $departemenbiroId;
    public $title;
    public $description;
    public $logo;
    public $temp_logo;
    public $logoPreview;
    public $fungsis = [];
    public $programKerjas = [];
    public $agendas = [];
    public $members = [];

    public $newFungsi = ['title' => '', 'description' => ''];
    public $newProgramKerja = ['title' => '', 'description' => ''];
    public $newAgenda = ['title' => '', 'description' => ''];
    public $newMember = ['name' => '', 'position' => ''];

    // UI State Properties
    public $isEditing = false;
    public $showFormModal = false;
    public $showDeleteModal = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:departemen_biros,title,' . $this->departemenbiroId,
            'description' => 'required|string',
            'temp_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
            'fungsis.*.title' => 'required|string|max:255',
            'fungsis.*.description' => 'required|string',
            'programKerjas.*.title' => 'required|string|max:255',
            'programKerjas.*.description' => 'required|string',
            'agendas.*.title' => 'required|string|max:255',
            'agendas.*.description' => 'required|string',
            'members.*.name' => 'required|string|max:255',
            'members.*.position' => 'required|string|in:' . implode(',', Member::getPositions()),
        ];
    }

    public function addFungsi()
    {
        $this->validate([
            'newFungsi.title' => 'required|string|max:255',
            'newFungsi.description' => 'required|string',
        ]);

        $this->fungsis[] = $this->newFungsi;
        $this->newFungsi = ['title' => '', 'description' => ''];
    }

    public function addProgramKerja()
    {
        $this->validate([
            'newProgramKerja.title' => 'required|string|max:255',
            'newProgramKerja.description' => 'required|string',
        ]);

        $this->programKerjas[] = $this->newProgramKerja;
        $this->newProgramKerja = ['title' => '', 'description' => ''];
    }

    public function addAgenda()
    {
        $this->validate([
            'newAgenda.title' => 'required|string|max:255',
            'newAgenda.description' => 'required|string',
        ]);

        $this->agendas[] = $this->newAgenda;
        $this->newAgenda = ['title' => '', 'description' => ''];
    }

    public function addMember()
    {
        $this->validate([
            'newMember.name' => 'required|string|max:255',
            'newMember.position' => 'required|string|in:' . implode(',', Member::getPositions()),
        ]);

        $this->members[] = $this->newMember;
        $this->newMember = ['name' => '', 'position' => ''];
    }

    public function removeFungsi($index)
    {
        unset($this->fungsis[$index]);
        $this->fungsis = array_values($this->fungsis);
    }

    public function removeProgramKerja($index)
    {
        unset($this->programKerjas[$index]);
        $this->programKerjas = array_values($this->programKerjas);
    }

    public function removeAgenda($index)
    {
        unset($this->agendas[$index]);
        $this->agendas = array_values($this->agendas);
    }

    public function removeMember($index)
    {
        unset($this->members[$index]);
        $this->members = array_values($this->members);
    }

    public function edit($id)
    {
        $departemenBiro = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->findOrFail($id);

        $this->isEditing = true;
        $this->departemenbiroId = $id;
        $this->title = $departemenBiro->title;
        $this->description = $departemenBiro->description;
        $this->logo = $departemenBiro->logo;

        $this->fungsis = $departemenBiro->fungsis->map(function($fungsi) {
            return ['title' => $fungsi->title, 'description' => $fungsi->description];
        })->toArray();

        $this->programKerjas = $departemenBiro->programKerjas->map(function($programKerja) {
            return ['title' => $programKerja->title, 'description' => $programKerja->description];
        })->toArray();

        $this->agendas = $departemenBiro->agendas->map(function($agenda) {
            return ['title' => $agenda->title, 'description' => $agenda->description];
        })->toArray();

        $this->members = $departemenBiro->members->map(function($member) {
            return ['name' => $member->name, 'position' => $member->position];
        })->toArray();

        $this->showFormModal = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function confirmDelete($id)
    {
        $this->departemenbiroId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $departemenBiro = DepartemenBiro::findOrFail($this->departemenbiroId);

        if ($departemenBiro) {
            if ($departemenBiro->logo && Storage::disk('public')->exists($departemenBiro->logo)) {
                Storage::disk('public')->delete($departemenBiro->logo);
            }

            $departemenBiro->delete();
            $this->notifySuccess('Departemen & Biro deleted successfully');
            $this->showDeleteModal = false;
        }
    }

    public function updatedTempLogo()
    {
        try {
            if ($this->temp_logo) {
                $this->logoPreview = $this->temp_logo->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset([
            'departemenbiroId', 'title', 'description', 'temp_logo', 'logoPreview',
            'fungsis', 'programKerjas', 'agendas', 'members',
            'newFungsi', 'newProgramKerja', 'newAgenda', 'newMember'
        ]);
        $this->resetValidation();
    }

    private function handleLogoUpload()
    {
        if (!$this->temp_logo) {
            return null;
        }

        return $this->temp_logo->store('departemenBiros', 'public');
    }

    private function deleteOldLogo($departemenBiro)
    {
        if ($departemenBiro->logo && Storage::disk('public')->exists($departemenBiro->logo)) {
            Storage::disk('public')->delete($departemenBiro->logo);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $logoPath = $this->handleLogoUpload();
            $departemenBiro = DepartemenBiro::findOrFail($this->departemenbiroId);

            if ($this->temp_logo) {
                $this->deleteOldLogo($departemenBiro);
            }

            $departemenBiro->update([
                'title' => $this->title,
                'description' => $this->description,
                'logo' => $logoPath ?? $this->logo,
            ]);

            // Delete existing relationships
            $departemenBiro->fungsis()->delete();
            $departemenBiro->programKerjas()->delete();
            $departemenBiro->agendas()->delete();
            $departemenBiro->members()->delete();

            // Create Fungsis
            foreach ($this->fungsis as $fungsi) {
                $departemenBiro->fungsis()->create([
                    'title' => $fungsi['title'],
                    'description' => $fungsi['description']
                ]);
            }

            // Create Program Kerjas
            foreach ($this->programKerjas as $programKerja) {
                $departemenBiro->programKerjas()->create([
                    'title' => $programKerja['title'],
                    'description' => $programKerja['description']
                ]);
            }

            // Create Agendas
            foreach ($this->agendas as $agenda) {
                $departemenBiro->agendas()->create([
                    'title' => $agenda['title'],
                    'description' => $agenda['description']
                ]);
            }

            // Create Members
            foreach ($this->members as $member) {
                $departemenBiro->members()->create([
                    'name' => $member['name'],
                    'position' => $member['position']
                ]);
            }

            DB::commit();

            $this->notifySuccess('Updated successfully');
            $this->resetForm();
            $this->showFormModal = false;

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $departemenBiros = DepartemenBiro::orderBy('created_at', 'desc')
            ->get();

        return view('livewire.manage-departemen-biro', [
            'departemenBiros' => $departemenBiros
        ]);
    }
}
