<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);
        Permission::create(['name' => 'editar usuarios']);

        Permission::create(['name' => 'ver alumnos']);
        Permission::create(['name' => 'ver docentes']);
        Permission::create(['name' => 'ver grupos']);

        $adminUser = User::query()->create([
            'name' => 'admin_chido',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

        $roleAdmin = Role::create(['name' => 'coordinador']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);
    }
}
