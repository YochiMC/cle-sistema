<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'id_archivo';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario',
        'nombre_archivo',
        'ruta_archivo',
        'tipo_archivo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
