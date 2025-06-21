<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'nombre_original',
        'ruta',
        'tipo',
        'descripcion',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
