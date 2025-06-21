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
        ];

        // Create permissions in the database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole = Role::create(['name' => 'Admin']);

        // Assign all permissions to super-admin
        $superAdminRole->givePermissionTo($permissions);

        // Assign a subset of permissions to admin
        $adminPermissions = [
            'access dashboard',
            'manage users',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Create users by role
        User::create([
            'name' => 'Zachran Razendra',
            'email' => 'zachranraze@recodex.id',
            'password' => bcrypt('admin123'),
        ])->assignRole($superAdminRole);

        // Create users by role
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@hmtitelkomuniversity.com',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $superAdminUser2 = User::create([
            'name' => 'Ketua Himpunan',
            'email' => 'kahim@hmtitelkomuniversity.com',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser2->assignRole($superAdminRole);

        $superAdminUser3 = User::create([
            'name' => 'Kepala Departemen Kominfo',
            'email' => 'kadepkominfo@hmtitelkomuniversity.com',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser3->assignRole($superAdminRole);

        $adminUser = User::create([
            'name' => 'Kominfo',
            'email' => 'kominfo@hmtitelkomuniversity.com',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);
    }
}
