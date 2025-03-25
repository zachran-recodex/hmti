<?php

namespace App\Livewire;

use App\Models\Inti;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageInti extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    // Properties for form input
    public $intiId;
    public $name;
    public $position;
    public $photo;
    public $tempPhoto;

    // UI state properties
    public $isEditing = false;
    public $searchTerm = '';

    // Sorting properties
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|in:' . implode(',', Inti::POSITIONS),
            'tempPhoto' => $this->isEditing
                ? 'nullable|image|max:1024'
                : 'required|image|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    public function edit($id)
    {
        $inti = Inti::findOrFail($id);

        if ($inti) {
            $this->isEditing = true;
            $this->intiId = $id;
            $this->name = $inti->name;
            $this->position = $inti->position;
            $this->photo = $inti->photo;
            $this->tempPhoto = null;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->intiId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $inti = Inti::findOrFail($this->intiId);

        if ($inti) {
            // Delete old photo
            if ($inti->photo && Storage::exists('public/' . $inti->photo)) {
                Storage::delete('public/' . $inti->photo);
            }

            $inti->delete();
            $this->notifySuccess('Core team member deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['intiId', 'name', 'position', 'photo', 'tempPhoto']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->isEditing) {
                $inti = Inti::findOrFail($this->intiId);

                // Handle photo upload if new photo is selected
                if ($this->tempPhoto) {
                    // Delete old photo
                    if ($inti->photo && Storage::exists('public/' . $inti->photo)) {
                        Storage::delete('public/' . $inti->photo);
                    }
                    // Store new photo
                    $photoPath = $this->tempPhoto->store('inti-photos', 'public');
                    $inti->photo = $photoPath;
                }

                $inti->name = $this->name;
                $inti->position = $this->position;
                $inti->save();

                $this->notifySuccess('Core team member updated successfully');
            } else {
                // Store photo
                $photoPath = $this->tempPhoto->store('inti-photos', 'public');

                Inti::create([
                    'name' => $this->name,
                    'position' => $this->position,
                    'photo' => $photoPath,
                ]);

                $this->notifySuccess('Core team member created successfully');
            }

            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            $this->notifyError('Something went wrong: ' . $e->getMessage());
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
    }

    public function render()
    {
        $intis = Inti::when($this->searchTerm, function($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('position', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.manage-inti', [
            'intis' => $intis,
            'positions' => Inti::getPositions(),
        ]);
    }
}