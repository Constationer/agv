<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'model_id',
        'path',
        'name',
    ];

    public function modelable(): MorphTo
    {
        return $this->morphTo();
    }
}
