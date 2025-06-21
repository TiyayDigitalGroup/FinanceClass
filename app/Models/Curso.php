<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'premium',
    ];

    protected static function booted(): void
    {
        static::creating(function (Curso $curso) {
            $prefix = $curso->premium ? 'CP' : 'CG';
            $nextId = (static::max('id') ?? 0) + 1;
            $curso->codigo = $prefix . str_pad($nextId, 2, '0', STR_PAD_LEFT);
        });
    }
    
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
