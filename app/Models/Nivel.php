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

    public function alumno()
    {
        return $this->hasMany(Alumno::class, 'id_nivel');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_nivel');
    }
    public function kardex()
    {
        return $this->hasMany(Kardex::class,'id_nivel');
    }

}
