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
        Schema::create('training_program_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_program_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('status')->default(\App\TrainingEnrollmentStatus::PENDING);
            $table->timestamp('enrolled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_program_users');
    }
};
