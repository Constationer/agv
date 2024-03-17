<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InOutTranscation extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date',
        'bank_account_id',
        'bank_account_method_id',
        'currency_id',
        'amount',
        'description',
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function bankAccountMethod() // Optional
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_method_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }
}
