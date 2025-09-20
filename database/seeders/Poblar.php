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
                'nombre_tms_curso' => 'SB100A_MAR25',
                'id_docente' => 1,
                'id_nivel' => 1,
                'horario_curso' => 'L-10:30; M-21:40',
                'inicio_curso' => '2025-09-22',
                'duracion_curso' => 5,
                'alumnos_actuales_curso' => 0,
                'cupo_curso' => 25,
                'modalidad_curso' => 'Presencial',
                'via_curso' => 'No aplica',
                'id_salon' => 2,
                'periodo_curso' => 'Sept-oct',
                'estado_curso' => false,
            ],
            [
                'nombre_tms_curso' => 'RB200A_MAR25',
                'id_docente' => 1,
                'id_nivel' => 2,
                'horario_curso' => 'L-10:30; M-21:40',
                'inicio_curso' => '2025-09-19',
                'duracion_curso' => 5,
                'alumnos_actuales_curso' => 0,
                'cupo_curso' => 25,
                'modalidad_curso' => 'Online',
                'via_curso' => 'Teams',
                'id_salon' => 1,
                'periodo_curso' => 'Sept-oct',
                'estado_curso' => false,
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}
