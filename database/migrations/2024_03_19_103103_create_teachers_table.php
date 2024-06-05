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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('school_id')->nullable()->constrained()->onDelete('set null');
            $table->string('school_name')->nullable();
            $table->text('address')->nullable();
            $table->string('subject_taught')->nullable();
            $table->string('qualification')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('previous_experience')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
