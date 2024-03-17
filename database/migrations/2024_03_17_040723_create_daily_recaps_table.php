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
        Schema::create('daily_recaps', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->date('date');
            $table->foreignId('bank_account_id')->constrained('bank_accounts');
            $table->foreignId('debit_currency_id')->constrained('currencies');
            $table->decimal('debit_amount', 18, 0);
            $table->foreignId('credit_currency_id')->constrained('currencies');
            $table->decimal('credit_amount', 18, 0);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_recaps');
    }
};
