<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buy_sell_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('date');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('currency_id')->constrained('currencies');
            $table->bigInteger('amount');
            $table->foreignId('bank_account_method_id')->constrained('bank_accounts');
            $table->text('description');
            $table->foreignId('purchase_rate_currency_id')->constrained('currencies');
            $table->decimal('purchase_rate_amount', 18, 2);
            $table->foreignId('bank_account_id')->constrained('bank_accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_sell_transactions');
    }
};
