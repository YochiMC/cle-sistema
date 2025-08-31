<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $primaryKey = 'id_docente';

    public $timestamps = true;

    protected $fillable = [
        'id_docente',
        'id_usuario',
        'docente_clave',
        'docente_nombre',
        'docente_apellidos',
        'docente_sexo',
        'docente_edad'
    ];

    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where(function ($q) use ($term) {
                $q->where('docente_clave', 'like', "%{$term}%")
                    ->orWhere('docente_nombre', 'like', "%{$term}%")
                    ->orWhere('docente_apellidos', 'like', "%{$term}%");
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
