<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * Kelas ManageUsers untuk mengelola data pengguna
 * Menggunakan Livewire untuk interaksi real-time
 */
class ManageUsers extends Component
{
    // Menggunakan trait WithPagination untuk paginasi dan WithNotification untuk notifikasi
    use WithPagination, WithNotification;

    // Property untuk form input
    public $userId;          // ID pengguna yang sedang dikelola
    public $name;            // Nama pengguna
    public $email;           // Email pengguna
    public $password;        // Password pengguna
    public $selectedRoles = []; // Daftar role yang dipilih

    // Property untuk status UI
    public $isEditing = false;   // Status mode edit
    public $searchTerm = '';     // Kata kunci pencarian

    // Add these new properties for sorting
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    /**
     * Mendefinisikan aturan validasi untuk form
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',      // Nama wajib diisi, string, maksimal 255 karakter
            'email' => 'required|email|max:255',      // Email wajib diisi, format email, maksimal 255 karakter
            'password' => 'nullable|min:8',           // Password opsional, minimal 8 karakter
            'selectedRoles' => 'array',               // Role harus dalam bentuk array
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
     * Menampilkan form untuk membuat pengguna baru
     */
    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Menampilkan form untuk mengedit pengguna
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $this->isEditing = true;
            $this->userId = $id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = '';
            $this->selectedRoles = $user->roles->pluck('id')->toArray();

            $this->modal('form')->show();
        }
    }

    /**
     * Menampilkan konfirmasi hapus pengguna
     */
    public function confirmDelete($id)
    {
        $this->userId = $id;
        $this->modal('delete')->show();
    }

    /**
     * Menghapus pengguna dari database
     */
    public function delete()
    {
        $user = User::findOrFail($this->userId);

        if ($user) {
            $user->delete();
            $this->notifySuccess('User deleted successfully');
            $this->modal('delete')->close();
        }
    }

    /**
     * Mengatur ulang form ke kondisi awal
     */
    public function resetForm()
    {
        $this->reset(['userId', 'name', 'email', 'password', 'selectedRoles']);
        $this->resetValidation();
    }

    /**
     * Menyimpan data pengguna (create/update)
     */
    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                // Mode edit: Update pengguna yang ada
                $user = User::findOrFail($this->userId);

                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);

                // Update password jika diisi
                if (!empty($this->password)) {
                    $user->update([
                        'password' => Hash::make($this->password),
                    ]);
                }

                // Update role pengguna
                $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
                $user->syncRoles($roleNames);

                $this->notifySuccess('User updated successfully');
            } else {
                // Mode create: Buat pengguna baru
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);

                // Assign role ke pengguna baru
                $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
                $user->syncRoles($roleNames);

                $this->notifySuccess('User created successfully');
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

    /**
     * Render tampilan komponen
     */
    public function render()
    {
        $users = User::when($this->searchTerm, function($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
            });

        // Handle role sorting separately
        if ($this->sortField === 'role') {
            $users->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->groupBy('users.id', 'users.name', 'users.email', 'users.created_at') // Add all necessary user fields
                ->orderBy(DB::raw('MIN(roles.name)'), $this->sortDirection)
                ->select('users.*');
        } else {
            $users->orderBy($this->sortField, $this->sortDirection);
        }

        $users = $users->paginate(10);
        $roles = Role::all();

        return view('livewire.admin.manage-users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}