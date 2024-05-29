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
        Schema::create('public_votes', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->unsignedBigInteger('option1')->default(0);
            $table->unsignedBigInteger('option2')->default(0);
            $table->unsignedBigInteger('option3')->default(0);
            $table->ipAddress('ip_address')->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_votes');
    }
};
