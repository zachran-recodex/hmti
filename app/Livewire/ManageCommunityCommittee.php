<?php

namespace App\Livewire;

use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use App\Models\CommunityCommittee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageCommunityCommittee extends Component
{
    use WithNotification, WithFileUploads;

    // Form Properties
    public $communityCommitteeId;
    public $title;
    public $description;
    public $category;
    public $logo;
    public $temp_logo;
    public $logoPreview;

    // UI State Properties
    public $isEditing = false;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:' . implode(',', CommunityCommittee::getCategories()),
            'temp_logo' => 'nullable|logo|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
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
        $this->modal('form')->close();
    }

    public function edit($id)
    {
        $communityCommittee = CommunityCommittee::findOrFail($id);

        if ($communityCommittee) {
            $this->isEditing = true;
            $this->communityCommitteeId = $id;
            $this->title = $communityCommittee->title;
            $this->description = $communityCommittee->description;
            $this->category = $communityCommittee->category;
            $this->logo = $communityCommittee->logo;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->communityCommitteeId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $communityCommittee = CommunityCommittee::findOrFail($this->communityCommitteeId);

        if ($communityCommittee) {
            // Delete the associated logo
            if ($communityCommittee->logo && Storage::disk('public')->exists($communityCommittee->logo)) {
                Storage::disk('public')->delete($communityCommittee->logo);
            }

            $communityCommittee->delete();
            $this->notifySuccess('Community & Committee deleted successfully');

            $this->modal('delete')->close();
        }
    }

    public function updatedTempImage()
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
        $this->reset(['communityCommitteeId', 'title', 'description', 'category', 'temp_logo', 'logoPreview']);
        $this->resetValidation();
    }

    private function handleImageUpload()
    {
        if (!$this->temp_logo) {
            return null;
        }

        return $this->temp_logo->store('communityCommittees', 'public');
    }

    private function deleteOldImage($communityCommittee)
    {
        if ($communityCommittee->logo && Storage::disk('public')->exists($communityCommittee->logo)) {
            Storage::disk('public')->delete($communityCommittee->logo);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $logoPath = $this->handleImageUpload();

            if ($this->isEditing) {
                $communityCommittee = CommunityCommittee::findOrFail($this->communityCommitteeId);

                if ($this->temp_logo) {
                    $this->deleteOldImage($communityCommittee);
                }

                $communityCommittee->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'category' => $this->category,
                    'logo' => $logoPath ?? $this->logo,
                ]);
                $this->notifySuccess('Community & Committee updated successfully');
            } else {
                CommunityCommittee::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'category' => $this->category,
                    'logo' => $logoPath,
                ]);
                $this->notifySuccess('Community & Committee created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
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
        $communityCommittees = CommunityCommittee::orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.manage-community-committee', [
            'communityCommittees' => $communityCommittees,
        ]);
    }
}
