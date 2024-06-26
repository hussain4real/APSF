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
        Schema::create('training_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->nullOnDelete();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('member_price')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('mode_of_delivery')->default(\App\TraininingMode::ONLINE);
            $table->string('type')->default(\App\TrainingType::COURSE);
            $table->string('status')->default(\App\TrainingStatus::UPCOMING);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('link')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_programs');
    }
};
