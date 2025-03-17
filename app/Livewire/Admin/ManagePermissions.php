<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class ManagePermissions extends Component
{
    // Menggunakan trait WithPagination untuk paginasi dan WithNotification untuk notifikasi
    use WithPagination, WithNotification;

    // Property untuk form input
    public $permissionId;
    public $name;

    // Property untuk status UI
    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    /**
     * Method yang dipanggil setiap kali ada perubahan pada property
     */
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
        $permission = Permission::find($id);

        if ($permission) {
            $this->isEditing = true;
            $this->permissionId = $id;
            $this->name = $permission->name;

            $this->modal('form')->show();
        }
    }

    /**
     * Menampilkan konfirmasi hapus permission
     */
    public function confirmDelete($id)
    {
        $this->permissionId = $id;
        $this->modal('delete')->show();
    }

    /**
     * Menghapus permission dari database
     */
    public function delete()
    {
        $permission = Permission::findOrFail($this->permissionId);

        if ($permission) {
            $permission->delete();
            $this->notifySuccess('Permission deleted successfully');
            $this->modal('delete')->close();
        }
    }

    /**
     * Mengatur ulang form ke kondisi awal
     */
    public function resetForm()
    {
        $this->reset(['permissionId', 'name']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $permission = Permission::findOrFail($this->permissionId);

                $permission->update([
                    'name' => $this->name,
                    'guard_name' => 'web'  // Add this line
                ]);

                $this->notifySuccess('Permission updated successfully');
            } else {
                $permission = Permission::create([
                    'name' => $this->name,
                    'guard_name' => 'web'  // Add this line
                ]);

                $this->notifySuccess('Permission created successfully');
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

    public function render()
    {
        $permissions = Permission::when( $this->searchTerm, function($query) {
                $query->where('name', 'like', '%'. $this->searchTerm. '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.manage-permissions', [
            'permissions' => $permissions,
        ]);
    }
}
