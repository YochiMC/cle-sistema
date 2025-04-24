<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos'; // Nombre de la tabla en la BD

    protected $primaryKey = 'id_curso'; // Clave primaria

    public $timestamps = true; // Habilita created_at y updated_at

    protected $fillable = [
        'id_curso', 'id_docente', 'nivel', 'modalidad',
        'hora', 'dias', 'cupo',
    ];

    // Relación con User (un alumno es un usuario)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_docente');
    }
}
