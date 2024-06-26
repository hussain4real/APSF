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
        Schema::create('pay2m_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('err_code')->nullable();
            $table->string('err_msg')->nullable();
            $table->string('basket_id')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->string('response_key')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay2m_transactions');
    }
};
