<?php

namespace App\Livewire;

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
        ];
    }

    public function edit($id)
    {
        $departemenBiro = DepartemenBiro::findOrFail($id);

        $this->isEditing = true;
        $this->departemenbiroId = $id;
        $this->title = $departemenBiro->title;
        $this->description = $departemenBiro->description;
        $this->logo = $departemenBiro->logo;

        $this->showFormModal = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showFormModal = true;
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
        $this->reset(['departemenbiroId', 'title', 'description', 'temp_logo', 'logoPreview']);
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

            if ($this->isEditing) {
                $departemenBiro = DepartemenBiro::findOrFail($this->departemenbiroId);

                if ($this->temp_logo) {
                    $this->deleteOldLogo($departemenBiro);
                }

                $departemenBiro->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'logo' => $logoPath ?? $this->logo,
                ]);
                $this->notifySuccess('Departemen & Biro updated successfully');
            } else {
                DepartemenBiro::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'logo' => $logoPath,
                ]);
                $this->notifySuccess('Departemen & Biro created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->showFormModal = false;

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
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
