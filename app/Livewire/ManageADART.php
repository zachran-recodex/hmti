<?php

namespace App\Livewire;

use App\Models\AdArt;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageADART extends Component
{
    use WithNotification, WithFileUploads;

    public $adArtId;
    public $file_path;
    public $temp_file;

    protected function rules()
    {
        return [
            'temp_file' => $this->adArtId ? 'nullable|mimes:pdf|max:10240' : 'required|mimes:pdf|max:10240',
        ];
    }

    public function mount()
    {
        $adArt = AdArt::first();
        if ($adArt) {
            $this->adArtId = $adArt->id;
            $this->file_path = $adArt->file_path;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->temp_file) {
                if ($this->file_path && Storage::exists($this->file_path)) {
                    Storage::delete($this->file_path);
                }
                $data['file_path'] = $this->temp_file->store('ad_art', 'public');
            }

            if ($this->adArtId) {
                AdArt::findOrFail($this->adArtId)->update($data);
                $this->notifySuccess('AD/ART updated successfully.');
            } else {
                $adArt = AdArt::create($data);
                $this->adArtId = $adArt->id;
                $this->notifySuccess('AD/ART created successfully.');
            }

        } catch (\Exception $e) {
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-ad-art');
    }
}
