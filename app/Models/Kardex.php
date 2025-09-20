<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $table = 'kardex';
    protected $primaryKey = 'id_kardex';
    public $timestamps = false;

    protected $fillable = [
        'id_alumno',
        'id_nivel',
        'calificacion_kardex',
        'periodo_kardex',
        'estado_kardex',
        'evaluado_kardex'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }

}
