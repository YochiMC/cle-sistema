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
        'matricula_alumno',
        'nombre_alumno',
        'apellidos_alumno',
        'edad_alumno',
        'sexo_alumno',
        'carrera_alumno',
        'semestre_alumno',
        'kardex_alumno',
        'inscrito',
        'acredita'
    ];

    protected $casts = [
        'kardex_alumno' => 'array', // convierte el JSON a array automáticamente
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
