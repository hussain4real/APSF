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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('address')->nullable();
            $table->string('school_name')->nullable();
            $table->string('current_grade')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('students');
    }
};
