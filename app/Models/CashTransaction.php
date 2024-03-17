<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'bank_account_id',
        'currency_id',
        'amount',
        'description',
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }
}
