<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $table = 'salones';
    protected $primaryKey = 'id_salon';
    public $timestamps = false;

    protected $fillable = [
        'nombre_salon',
        'edificio_salon',
        'capacidad_salon',
        'disponibilidad_salon',
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_salon');
    }
}
