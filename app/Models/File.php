<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'original_name',
        'path',
        'type',
        'transcription',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
