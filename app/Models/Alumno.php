<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos'; // Nombre de la tabla en la BD

    protected $primaryKey = 'id_alumno'; // Clave primaria

    public $timestamps = true; // Habilita created_at y updated_at

    protected $fillable = [
        'id_alumno', 'id_usuario', 'alumno_edad', 'alumno_nombre',
        'alumno_apeliidos', 'carrera', 'semestre',
        'id_seguimiento', 'inscrito', 'acredita',
    ];

    // Relación con User (un alumno es un usuario)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
