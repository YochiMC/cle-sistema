<?php

namespace Database\Seeders;

use App\Models\Curso;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Poblar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'id_docente' => 1,
            'modelo_solucion_curso' => 'TECNM',
            'tecnm_curso' => 'León',
            'modelo_curso' => 'Semi intensivo',
            'modulo_curso' => 'BÁSICO 1',
            'nombre_tms_curso' => 'SB100A_MAR25',
            'inicio_curso' => '2025-03-22',
            'fin_curso' => '2025-05-24',
            'dias_curso' => 'Sabados',
            'horario_curso' => "DE 9:00 A 12:00 hrs",
            'alumnos_actuales_curso' => 23,
            'cupo_curso' => 30,
            'clases_via_curso' => 'Teams LEON',
            'tipo_curso' => 'Online',
            'acceso_plataforma_curso' => 'teacher7.gtyv@leon.tecnm.mx',
            'acceso_teams_curso' => 'Ok',
            'link_clase_curso' => '---',
        ]);
    }
}
