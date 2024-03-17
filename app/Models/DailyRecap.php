<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyRecap extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'date',
        'bank_account_id',
        'debit_currency_id',
        'debit_amount',
        'credit_currency_id',
        'credit_amount',
        'description',
    ];

    // Relationships
    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function debitCurrency()
    {
        return $this->belongsTo(Currencies::class, 'debit_currency_id');
    }

    public function creditCurrency()
    {
        return $this->belongsTo(Currencies::class, 'credit_currency_id');
    }
}
