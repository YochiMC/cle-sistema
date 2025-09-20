<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    protected $table = 'gestion';
    protected $primaryKey = 'id_gestion';
    public $timestamps = false;

    protected $fillable = [
        'nombre_accion',
        'estado_accion',
    ];
}
