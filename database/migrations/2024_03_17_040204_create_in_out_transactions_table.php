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
        Schema::create('in_out_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('date');
            $table->foreignId('bank_account_id')->constrained('bank_accounts');
            $table->foreignId('bank_account_method_id')->constrained('bank_accounts');
            $table->foreignId('currency_id')->constrained('currencies');
            $table->decimal('amount', 18, 2);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_out_transactions');
    }
};
