<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Docente;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Gestion;
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
            'crud grupos',
            'consultar kardex',
            'inscribirse'
        ]);

        $roleDocente = Role::create(['name' => 'docente']);
        $roleDocente->syncPermissions([
            'consultar kardex',
            'ver alumnos',
            'ver grupos'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Sistemas Computacionales',
            'plan_estudios_carrera' => 'ISIC-2010-224'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería Industrial',
            'plan_estudios_carrera' => 'IIND-2010-227'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Tecnologías de la Información y Comunicaciones',
            'plan_estudios_carrera' => 'ITIC-2010-225'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Gestión Empresarial',
            'plan_estudios_carrera' => 'IGEM-2009-201'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería Electrónica',
            'plan_estudios_carrera' => 'IELC-2010-211'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería Electromecánica',
            'plan_estudios_carrera' => 'IEME-2010-210'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingenierría Mecatrónica',
            'plan_estudios_carrera' => 'IMCT-2010-229'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Logística',
            'plan_estudios_carrera' => 'ILOG-2009-202'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Maestría en Ciencias de la Computación',
            'plan_estudios_carrera' => '¿?'
        ]);

        Carrera::create([
            'nombre_carrera' => 'Maestría en Ciencias de la Ingeniería',
            'plan_estudios_carrera' => '¿..?'
        ]);

        $adminUser = User::query()->create([
            'name' => 'Coordinador',
            'email' => 'coordinacion@coordinacion.com',
            'phonenumber' => '4772941234',
            'password' => bcrypt('coordinacion123'),
            'email_verified_at' => now(),
        ]);

        $adminUser->assignRole($roleAdmin);

        $adminUser = User::query()->create([
            'name' => 'admin_chido',
            'email' => 'admin@admin.com',
            'phonenumber' => '4772954125',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

        $adminUser->assignRole($roleAdmin_);

        $alumnoUser = User::query()->create([
            'name' => 'alumno',
            'email' => 'alumno@alumno.com',
            'phonenumber' => '4772942057',
            'password' => bcrypt('alumno123'),
            'email_verified_at' => now(),
        ]);

        $alumno = Alumno::create([
            'id_usuario' => $alumnoUser->id,
            'id_carrera' => 1,
            'matricula_alumno' => '21240551',
            'nombre_alumno' => 'Joseph Alexander',
            'apellidos_alumno' => 'Martínez Cortés',
            'edad_alumno' => 20,
            'sexo_alumno' => 'Masculino',
            'semestre_alumno' => 8,
            'inscrito' => false,
            'acredita' => false,
        ]);

        $alumnoUser->assignRole($roleAlumno);

        $docenteUser = User::query()->create([
            'name' => 'docente',
            'email' => 'docente@docente.com',
            'phonenumber' => '4772941237',
            'password' => bcrypt('docente123'),
            'email_verified_at' => now(),
        ]);

        Docente::create([
            'id_usuario' => $docenteUser->id,
            'docente_clave' => '1123456',
            'docente_nombre' => 'Ana Fernanda',
            'docente_apellidos' => 'González Pérez',
            'docente_sexo' => 'Femenino',
            'docente_edad' => 25
        ]);

        $docenteUser->assignRole($roleDocente);

        Gestion::create([
            'nombre_accion' => 'Inscripciones',
            'estado' => false,
        ]);

        Gestion::create([
            'nombre_accion' => 'Calificar alumnos',
            'estado' => false,
        ]);

        Gestion::create([
            'nombre_accion' => 'Calificar docentes',
            'estado' => false,
        ]);
    }
}
