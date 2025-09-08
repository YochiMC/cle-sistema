<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'id_carrera',
        'id_nivel',
        'matricula_alumno',
        'nombre_alumno',
        'apellidos_alumno',
        'edad_alumno',
        'sexo_alumno',
        'semestre_alumno',
        'inscrito',
        'acredita',
        'liberado'
    ];

    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where(function ($q) use ($term) {
                $q->where('nombre_alumno', 'like', "%{$term}%")
                    ->orWhere('apellidos_alumno', 'like', "%{$term}%")
                    ->orWhere('matricula_alumno', 'like', "%{$term}%")
                    ->orWhereHas('carrera', function ($q) use ($term) {
                        $q->where('nombre_carrera', 'like', "%{$term}%");
                    });
            });
        }
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function kardex()
    {
        return $this->hasMany(Kardex::class, 'id_alumno', 'id_alumno');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }

}
