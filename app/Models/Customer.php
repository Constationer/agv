<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'telephone',
        'npwp_or_ktp'
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'model_id');
    }
}
