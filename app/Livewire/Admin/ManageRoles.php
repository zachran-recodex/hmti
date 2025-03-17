<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 * Class ManageRoles untuk mengelola data role dan permissions
 * Menggunakan Livewire untuk interaksi real-time
 */
class ManageRoles extends Component
{
    use WithPagination, WithNotification;

    // Property untuk form input
    public $roleId;
    public $name;
    public $selectedPermissions = [];

    // Property untuk status UI
    public $isEditing = false;
    public $searchTerm = '';

    /**
     * Mendefinisikan aturan validasi untuk form
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'selectedPermissions' => 'array',
        ];
    }

    /**
     * Method yang dipanggil setiap kali ada perubahan pada property
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Menampilkan form untuk membuat role baru
     */
    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Menampilkan form untuk mengedit role
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        if ($role) {
            $this->isEditing = true;
            $this->roleId = $id;
            $this->name = $role->name;
            $this->selectedPermissions = $role->permissions->pluck('id')->toArray();

            $this->modal('form')->show();
        }
    }

    /**
     * Menampilkan konfirmasi hapus role
     */
    public function confirmDelete($id)
    {
        $this->roleId = $id;
        $this->modal('delete')->show();
    }

    /**
     * Menghapus role dari database
     */
    public function delete()
    {
        $role = Role::findOrFail($this->roleId);

        if ($role) {
            $role->delete();
            $this->notifySuccess('User deleted successfully');
            $this->modal('delete')->close();
        }
    }

    /**
     * Mengatur ulang form ke kondisi awal
     */
    public function resetForm()
    {
        $this->reset(['roleId', 'name', 'selectedPermissions']);
        $this->resetValidation();
    }

    /**
     * Menyimpan data role (create/update)
     */
    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Get Permission instances based on selected IDs
            $permissions = Permission::whereIn('id', $this->selectedPermissions)->get();

            if ($this->isEditing) {
                $role = Role::findOrFail($this->roleId);

                // Prevent name changes for admin and super-admin roles
                if (!in_array($role->name, ['admin', 'super-admin'])) {
                    $role->update([
                        'name' => $this->name,
                    ]);
                }

                $role->syncPermissions($permissions);

                $this->notifySuccess('Role updated successfully.');
            } else {
                $role = Role::create([
                    'name' => $this->name,
                ]);

                $role->syncPermissions($permissions);

                $this->notifySuccess('Role created successfully.');
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

    /**
     * Render tampilan komponen
     */
    public function render()
    {
        $roles = Role::when($this->searchTerm, function($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $permissions = Permission::all();

        return view('livewire.admin.manage-roles', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}