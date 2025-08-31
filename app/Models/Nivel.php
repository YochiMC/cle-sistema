<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';
    protected $fillable = [
        'nombre_nivel',
        'mcr_nivel',
        'horas_nivel'
    ];

    public $timestamps = true;

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_carrera');
    }

}
