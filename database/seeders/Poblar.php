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
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Semi intensivo',
                'modulo_curso' => 'BÁSICO 1',
                'nombre_tms_curso' => 'SB100A_MAR25',
                'inicio_curso' => '2025-03-22',
                'fin_curso' => '2025-05-24',
                'dias_curso' => 'Sabados',
                'horario_curso' => 'DE 9:00 A 12:00 hrs',
                'alumnos_actuales_curso' => 23,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'teacher7.gtyv@leon.tecnm.mx',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => '---',
            ],
            [
                'id_docente' => 1,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Regular',
                'modulo_curso' => 'BÁSICO 2',
                'nombre_tms_curso' => 'RB200A_MAR25',
                'inicio_curso' => '2025-03-19',
                'fin_curso' => '2025-05-28',
                'dias_curso' => 'Lunes y Miércoles',
                'horario_curso' => 'DE 18:00 A 21:00 hrs',
                'alumnos_actuales_curso' => 20,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'teacher8.gtyv@leon.tecnm.mx',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => '---',
            ],
            [
                'id_docente' => 1,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Regular',
                'modulo_curso' => 'BÁSICO 3',
                'nombre_tms_curso' => 'RB300A_MAR25',
                'inicio_curso' => '2025-03-20',
                'fin_curso' => '2025-05-29',
                'dias_curso' => 'Martes y Jueves',
                'horario_curso' => 'DE 18:00 A 21:00 hrs',
                'alumnos_actuales_curso' => 17,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'Google Meet',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => 'https://meet.google.com/nzk-zvzs-wuz',
            ],
            [
                'id_docente' => 1,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Regular',
                'modulo_curso' => 'BÁSICO 4',
                'nombre_tms_curso' => 'RB400A_MAR25',
                'inicio_curso' => '2025-03-19',
                'fin_curso' => '2025-05-28',
                'dias_curso' => 'Lunes y Miércoles',
                'horario_curso' => 'DE 18:00 A 21:00 hrs',
                'alumnos_actuales_curso' => 13,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'Google Meet',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => 'https://meet.google.com/nzk-zvzs-wuz',
            ],
            [
                'id_docente' => 1,
                'modelo_solucion_curso' => 'TECNM',
                'tecnm_curso' => 'León',
                'modelo_curso' => 'Semi intensivo',
                'modulo_curso' => 'INTERMEDIO 1',
                'nombre_tms_curso' => 'SI100A_MAR25',
                'inicio_curso' => '2025-03-22',
                'fin_curso' => '2025-05-24',
                'dias_curso' => 'Sabados',
                'horario_curso' => 'DE 9:00 A 12:00 hrs',
                'alumnos_actuales_curso' => 16,
                'cupo_curso' => 30,
                'clases_via_curso' => 'Teams LEON',
                'tipo_curso' => 'Online',
                'acceso_plataforma_curso' => 'teacher2.gtyv@leon.tecnm.mx',
                'acceso_teams_curso' => 'OK',
                'link_clase_curso' => '---',
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}
