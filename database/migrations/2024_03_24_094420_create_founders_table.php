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
        Schema::create('founders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('school_name')->nullable();
            $table->string('school_website')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_city')->nullable();
            $table->string('school_state')->nullable();
            $table->string('school_country')->nullable();
            $table->string('status')->default(\App\Status::PENDING->value)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founders');
    }
};
