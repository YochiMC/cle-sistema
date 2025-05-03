<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';
    public $timestamps = true;

    protected $fillable = [
        'id_docente',
        'modelo_solucion_curso',
        'tecnm_curso',
        'modelo_curso',
        'modulo_curso',
        'nombre_tms_curso',
        'inicio_curso',
        'fin_curso',
        'dias_curso',
        'horario_curso',
        'alumnos_actuales_curso',
        'cupo_curso',
        'clases_via_curso',
        'tipo_curso',
        'acceso_plataforma_curso',
        'acceso_teams_curso',
        'link_clase_curso',
    ];

    // Relación: un curso pertenece a un docente
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }
}
