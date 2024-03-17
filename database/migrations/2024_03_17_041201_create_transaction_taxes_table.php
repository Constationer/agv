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
        Schema::create('transaction_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('transactionable_type');
            $table->foreignId('transactionable_id')->constrained('buy_sell_transactions');
            $table->foreignId('currency_id')->constrained('currencies');
            $table->decimal('amount', 18, 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_taxes');
    }
};
