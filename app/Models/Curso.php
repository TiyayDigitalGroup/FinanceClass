<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'premium'];

    protected $casts = ['premium' => 'boolean'];

    protected static function booted(): void
    {
        static::creating(function (Curso $curso) {
            $prefix = $curso->premium ? 'CP' : 'CG';
            $ultimo = static::where('premium', $curso->premium)
                ->orderByDesc('codigo')
                ->pluck('codigo')
                ->first();
            $nextNumber = 1;
            if ($ultimo && preg_match('/\d+$/', $ultimo, $matches)) {
                $nextNumber = intval($matches[0]) + 1;
            }
            $curso->codigo = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
        });
    }

    public function archivos(): HasMany
    {
        return $this->hasMany(Archivo::class);
    }
}
