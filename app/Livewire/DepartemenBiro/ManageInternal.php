<?php

namespace App\Livewire\DepartemenBiro;

use App\WithNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HumanResource;
use App\Models\Kaderisasi;
use App\Models\Kemahasiswaan;
use App\Models\ProgramKerja;
use App\Models\Agenda;
use App\Models\Fungsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageInternal extends Component
{
    use WithFileUploads, WithNotification;

    public $hrd;
    public $kaderisasi;
    public $kemahasiswaan;

    // Form fields
    public $logo;
    public $description;
    public $fungsis = [];
    public $program_kerjas = [];
    public $agendas = [];

    protected function rules()
    {
        return [
            'logo' => 'nullable|image|max:1024',
            'description' => 'required|string',
            'fungsis' => 'array',
            'program_kerjas' => 'array',
            'agendas' => 'array',
        ];
    }

    public function mount()
    {
        $this->hrd = HumanResource::with(['fungsis', 'programKerjas', 'agendas'])->first();
        if (!$this->hrd) {
            $this->hrd = HumanResource::create([
                'description' => 'Default description',
            ]);
        }

        $this->description = $this->hrd->description;

        // Load existing relationships into form fields
        $this->fungsis = $this->hrd->fungsis->map(function($fungsi) {
            return [
                'title' => $fungsi->title,
                'description' => $fungsi->description
            ];
        })->toArray();

        $this->program_kerjas = $this->hrd->programKerjas->map(function($program) {
            return [
                'title' => $program->title,
                'description' => $program->description
            ];
        })->toArray();

        $this->agendas = $this->hrd->agendas->map(function($agenda) {
            return [
                'title' => $agenda->title,
                'description' => $agenda->description
            ];
        })->toArray();

        $this->kaderisasi = Kaderisasi::first() ?? new Kaderisasi();
        $this->kemahasiswaan = Kemahasiswaan::first() ?? new Kemahasiswaan();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateHrd()
    {
        $validated = $this->validate();

        try {
            DB::beginTransaction();

            // Handle logo upload
            if ($this->logo) {
                if ($this->hrd->logo) {
                    Storage::disk('public')->delete($this->hrd->logo);
                }
                $validated['logo'] = $this->logo->store('logos', 'public');
            }

            // Update HRD with description
            $this->hrd->update([
                'logo' => $validated['logo'] ?? $this->hrd->logo,
                'description' => $validated['description'],
            ]);

            // Handle Fungsis
            if (!empty($validated['fungsis'])) {
                $this->hrd->fungsis()->delete();
                $fungsiRecords = collect($validated['fungsis'])->map(function ($fungsi) {
                    return new Fungsi([
                        'title' => $fungsi['title'],
                        'description' => $fungsi['description']
                    ]);
                });
                $this->hrd->fungsis()->saveMany($fungsiRecords);
            }

            // Handle Program Kerjas
            if (!empty($validated['program_kerjas'])) {
                $this->hrd->programKerjas()->delete();
                $programKerjaRecords = collect($validated['program_kerjas'])->map(function ($program) {
                    return new ProgramKerja([
                        'title' => $program['title'],
                        'description' => $program['description']
                    ]);
                });
                $this->hrd->programKerjas()->saveMany($programKerjaRecords);
            }

            // Handle Agendas
            if (!empty($validated['agendas'])) {
                $this->hrd->agendas()->delete();
                $agendaRecords = collect($validated['agendas'])->map(function ($agenda) {
                    return new Agenda([
                        'title' => $agenda['title'],
                        'description' => $agenda['description']
                    ]);
                });
                $this->hrd->agendas()->saveMany($agendaRecords);
            }

            DB::commit();
            $this->notifySuccess('Human Resource data updated successfully');
            $this->reset(['logo']);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function addFungsi()
    {
        $this->fungsis[] = ['title' => '', 'description' => ''];
    }

    public function removeFungsi($index)
    {
        unset($this->fungsis[$index]);
        $this->fungsis = array_values($this->fungsis);
    }

    public function addProgramKerja()
    {
        $this->program_kerjas[] = ['title' => '', 'description' => ''];
    }

    public function removeProgramKerja($index)
    {
        unset($this->program_kerjas[$index]);
        $this->program_kerjas = array_values($this->program_kerjas);
    }

    public function addAgenda()
    {
        $this->agendas[] = ['title' => '', 'description' => ''];
    }

    public function removeAgenda($index)
    {
        unset($this->agendas[$index]);
        $this->agendas = array_values($this->agendas);
    }

    public function render()
    {
        return view('livewire.departemen-biro.manage-internal');
    }
}
