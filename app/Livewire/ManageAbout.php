<?php

namespace App\Livewire;

use Livewire\Component;
use App\WithNotification;
use App\Models\TentangKami;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageAbout extends Component
{
    use WithNotification, WithFileUploads;

    public $tentangId;
    public $definisi;
    public $kedudukan_peran;
    public $visi;
    public $misi = [];
    public $gambar_stuktural;
    public $temp_gambar_stuktural;

    protected function rules()
    {
        return [
            'definisi' => 'required|string',
            'kedudukan_peran' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|array|min:1',
            'misi.*' => 'required|string',
            'temp_gambar_stuktural' => $this->tentangId ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ];
    }

    public function mount()
    {
        $tentang = TentangKami::first();
        if ($tentang) {
            $this->tentangId = $tentang->id;
            $this->definisi = $tentang->definisi;
            $this->kedudukan_peran = $tentang->kedudukan_peran;
            $this->visi = $tentang->visi;
            $this->misi = $tentang->misi;
            $this->gambar_stuktural = $tentang->gambar_stuktural;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addMission()
    {
        $this->misi[] = '';
    }

    public function removeMission($index)
    {
        unset($this->misi[$index]);
        $this->misi = array_values($this->misi);
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $data = [
                'definisi' => $this->definisi,
                'kedudukan_peran' => $this->kedudukan_peran,
                'visi' => $this->visi,
                'misi' => array_values($this->misi),
            ];

            if ($this->temp_gambar_stuktural) {
                if ($this->gambar_stuktural && Storage::exists($this->gambar_stuktural)) {
                    Storage::delete($this->gambar_stuktural);
                }
                $data['gambar_stuktural'] = $this->temp_gambar_stuktural->store('gambar_stuktural', 'public');
            }

            if ($this->tentangId) {
                TentangKami::findOrFail($this->tentangId)->update($data);
                $this->notifySuccess('TentangKami page updated successfully.');
            } else {
                $tentang = TentangKami::create($data);
                $this->tentangId = $tentang->id;
                $this->notifySuccess('TentangKami page created successfully.');
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-about');
    }
}
