<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    protected $table = 'formatos';
    protected $primaryKey = 'id_formato';
    public $timestamps = false;

    protected $fillable = [
        'nombre_formato',
        'descripcion_formato',
    ];
}
