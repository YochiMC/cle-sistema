<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = [
        'id_alumno',
        'nombre',
        'ruta',
        'tipo',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }
}
