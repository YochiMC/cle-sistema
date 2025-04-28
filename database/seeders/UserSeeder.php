<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\User;
use App\Models\Alumno;
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

        Permission::create(['name' => 'crear alumnos']);
        Permission::create(['name' => 'crear docentes']);
        Permission::create(['name' => 'crear admins']);
        Permission::create(['name' => 'crear grupos']);

        Permission::create(['name' => 'ver alumnos']);
        Permission::create(['name' => 'ver docentes']);
        Permission::create(['name' => 'ver admins']);
        Permission::create(['name' => 'ver grupos']);

        Permission::create(['name' => 'editar alumnos']);
        Permission::create(['name' => 'editar docentes']);
        Permission::create(['name' => 'editar admins']);
        Permission::create(['name' => 'editar grupos']);

        Permission::create(['name' => 'eliminar alumnos']);
        Permission::create(['name' => 'eliminar docentes']);
        Permission::create(['name' => 'eliminar admins']);
        Permission::create(['name' => 'eliminar grupos']);

        Permission::create(['name' => 'consultar kardex']);
        Permission::create(['name' => 'inscribirse']);

        Permission::create(['name' => 'crud usuarios']);
        Permission::create(['name' => 'crud grupos']);


        $roleAdmin = Role::create(['name' => 'coordinador']);
        $roleAdmin->syncPermissions([
            'ver usuarios',
            'crear usuarios',
            'eliminar usuarios',
            'editar usuarios',

            'crear alumnos',
            'crear docentes',
            'crear admins',
            'crear grupos',

            'ver alumnos',
            'ver docentes',
            'ver admins',
            'ver grupos',

            'editar alumnos',
            'editar docentes',
            'editar admins',
            'editar grupos',

            'eliminar alumnos',
            'eliminar docentes',
            'eliminar admins',
            'eliminar grupos',

            'consultar kardex',

            'crud usuarios',
            'crud grupos'
        ]);

        $roleAdmin_ = Role::create(['name' => 'admin']);
        $roleAdmin_->syncPermissions([
            'ver usuarios',
            'crear usuarios',
            'eliminar usuarios',
            'editar usuarios',

            'crear alumnos',
            'crear docentes',
            'crear grupos',

            'ver alumnos',
            'ver docentes',
            'ver grupos',

            'editar alumnos',
            'editar docentes',
            'editar grupos',

            'crud usuarios',
            'crud grupos'
        ]);

        $roleAlumno = Role::create(['name' => 'alumno']);
        $roleAlumno->syncPermissions([
            'consultar kardex',
            'inscribirse'
        ]);

        $roleDocente = Role::create(['name' => 'docente']);
        $roleDocente->syncPermissions([
            'consultar kardex',
            'ver alumnos',
            'ver grupos'
        ]);

        $adminUser = User::query()->create([
            'name' => 'Coordinador',
            'email' => 'coordinacion@coordinacion.com',
            'password' => bcrypt('coordinacion123'),
            'email_verified_at' => now(),
        ]);

        $adminUser->assignRole($roleAdmin);

        $adminUser = User::query()->create([
            'name' => 'admin_chido',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

        $adminUser->assignRole($roleAdmin_);

        $alumnoUser = User::query()->create([
            'name' => 'alumno',
            'email' => 'alumno@alumno.com',
            'password' => bcrypt('alumno123'),
            'email_verified_at' => now(),
        ]);

        Alumno::query()->create([
            'id_alumno' => 21240551,
            'id_usuario' => $alumnoUser->id,
            'alumno_nombre' => 'Joseph Alexander',
            'alumno_apellidos' => 'Martinez Cortes',
            'alumno_edad' => 20,
            'carrera' => 'Ingeniería en Sistemas',
            'semestre' => 8,
            'id_seguimiento' => 1,
            'inscrito' => true,
            'acredita' => false
        ]);

        $alumnoUser->assignRole($roleAlumno);

        $docenteUser = User::query()->create([
            'name' => 'docente',
            'email' => 'docente@docente.com',
            'password' => bcrypt('docente123'),
            'email_verified_at' => now(),
        ]);

        Docente::create([
            'id_docente' => 11921,
            'id_usuario' => $docenteUser->id,
            'docente_nombre' => 'Ana',
            'docente_apellidos' => 'González Pérez',
            'docente_edad' => 25
        ]);

        $docenteUser->assignRole($roleDocente);
    }
}
