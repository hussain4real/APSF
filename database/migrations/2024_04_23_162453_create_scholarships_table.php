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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description');
            $table->string('institution')->nullable();
            $table->string('program')->nullable();
            $table->string('country')->nullable();
            $table->string('status')->default(\App\ScholarshipStatus::UPCOMING);
            $table->string('type')->default(\App\ScholarshipType::FULL);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_lines');
    }
};
