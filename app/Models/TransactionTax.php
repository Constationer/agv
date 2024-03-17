<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TransactionTax extends Model
{
    use HasFactory;

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }
}
