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
        Schema::create('training_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('institution_name')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('institution_address')->nullable();
            $table->string('institution_email')->nullable();
            $table->string('institution_phone')->nullable();
            $table->string('institution_website')->nullable();
            $table->string('institution_logo')->nullable();
            $table->string('institution_description')->nullable();
            $table->string('license')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('status')->default(\App\Status::PENDING->value);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_providers');
    }
};
