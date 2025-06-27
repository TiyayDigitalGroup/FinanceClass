<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'titulo', 'nombre_original', 'ruta', 'tipo', 'descripcion'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
}
