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
        $cursos = [
            [
                'id_docente' => 1,
                'id_nivel' => 1,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Semi intensivo',
                'nombre_tms_curso' => 'SB100A_MAR25',
                'inicio_curso' => '2025-03-22',
                'fin_curso' => '2025-05-24',
                'dias_curso' => 'Sabados',
                'horario_curso' => 'DE 9:00 A 12:00 hrs',
                'alumnos_actuales_curso' => 0,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'teacher7.gtyv@leon.tecnm.mx',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => '---',
            ],
            [
                'id_docente' => 1,
                'id_nivel' => 2,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Regular',
                'nombre_tms_curso' => 'RB200A_MAR25',
                'inicio_curso' => '2025-03-19',
                'fin_curso' => '2025-05-28',
                'dias_curso' => 'Lunes y Miércoles',
                'horario_curso' => 'DE 18:00 A 21:00 hrs',
                'alumnos_actuales_curso' => 0,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'teacher8.gtyv@leon.tecnm.mx',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => '---',
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}
