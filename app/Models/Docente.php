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
        'id_docente', 'id_usuario', 'docente_nombre', 'docente_apellidos'
    ];

    // Relación con User (un docente es un usuario)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
