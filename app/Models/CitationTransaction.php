<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitationTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'customer_id',
        'bank_account_id',
        'currency_id',
        'amount',
        'description',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }
}
