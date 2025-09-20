<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';
    public $timestamps = false;

    protected $fillable = [
        'nombre_tms_curso',
        'id_docente',
        'id_nivel',
        'horario_curso',
        'inicio_curso',
        'duracion_curso',
        'alumnos_actuales_curso',
        'cupo_curso',
        'modalidad_curso',
        'via_curso',
        'id_salon',
        'periodo_curso',
        'estado_curso',
    ];

    // Relación: un curso pertenece a un docente
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class, 'id_salon');
    }
}
