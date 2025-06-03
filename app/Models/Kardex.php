<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $table = 'kardex';
    public $timestamps = true;

    protected $fillable = [
        'alumno_id',
        'materia',
        'calificacion',
        'periodo',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id', 'id_alumno');
    }

    public function kardex()
    {
        return $this->hasMany(Kardex::class, 'id_alumno');
    }

}
