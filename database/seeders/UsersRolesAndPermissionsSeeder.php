<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UsersRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'access dashboard',
            'manage users',
            'manage roles',
            'manage permissions',
        ];

        // Create permissions in the database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);

        // Assign all permissions to super-admin
        $superAdminRole->givePermissionTo($permissions);

        // Assign a subset of permissions to admin
        $adminPermissions = [
            'access dashboard',
            'manage users',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Create users by role
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@hmtitelkomuniversity.id',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $superAdminUser2 = User::create([
            'name' => 'Ketua Himpunan',
            'email' => 'kahim@hmtitelkomuniversity.id',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser2->assignRole($superAdminRole);

        $superAdminUser3 = User::create([
            'name' => 'Kepala Departemen Kominfo',
            'email' => 'kadepkominfo@hmtitelkomuniversity.id',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser3->assignRole($superAdminRole);

        $adminUser = User::create([
            'name' => 'Kominfo',
            'email' => 'kominfo@hmtitelkomuniversity.id',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);
    }
}
