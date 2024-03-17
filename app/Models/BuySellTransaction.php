<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuySellTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'customer_id',
        'currency_id',
        'amount',
        'bank_account_method_id',
        'description',
        'purchase_rate_currency_id',
        'purchase_rate_amount',
        'bank_account_id',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }

    public function bankAccountMethod()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_method_id');
    }

    public function fundingBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }
}
