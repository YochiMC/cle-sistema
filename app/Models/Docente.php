<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $primaryKey = 'id_docente';
    public $timestamps = false;

    protected $fillable = [
        'id_docente',
        'id_usuario',
        'rfc_docente',
        'nombre_docente',
        'apellido_paterno_docente',
        'apellido_materno_docente',
        'sexo_docente',
        'edad_docente'
    ];

    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where(function ($q) use ($term) {
                $q->where('rfc_docente', 'like', "%{$term}%")
                    ->orWhere('nombre_docente', 'like', "%{$term}%")
                    ->orWhere('apellido_paterno_docente', 'like', "%{$term}%")
                    ->orWhere('apellido_materno_docente', 'like', "%{$term}%");
            });
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_docente');
    }
}
