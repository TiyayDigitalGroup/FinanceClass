<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'premium'];

    protected static function booted(): void
    {
        static::creating(function (Course $course) {
            $prefix = $course->premium ? 'CP' : 'CG';
            $ultimo = static::where('premium', $course->premium)
                ->orderByDesc('code')
                ->pluck('code')
                ->first();
            $nextNumber = 1;
            if ($ultimo && preg_match('/\d+$/', $ultimo, $matches)) {
                $nextNumber = intval($matches[0]) + 1;
            }
            $course->code = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('attempts', 'grade', 'passed', 'last_attempt')
            ->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
