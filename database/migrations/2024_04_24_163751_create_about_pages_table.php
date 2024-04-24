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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description_one')->nullable();
            $table->text('hero_description_two')->nullable();
            $table->text('hero_description_three')->nullable();
            $table->text('hero_description_four')->nullable();
            $table->string('objective_heading')->nullable();
            $table->string('objective_title_one')->nullable();
            $table->text('objective_description_one')->nullable();
            $table->string('objective_title_two')->nullable();
            $table->text('objective_description_two')->nullable();
            $table->string('objective_title_three')->nullable();
            $table->text('objective_description_three')->nullable();
            $table->string('objective_title_four')->nullable();
            $table->text('objective_description_four')->nullable();
            $table->string('objective_title_five')->nullable();
            $table->text('objective_description_five')->nullable();
            $table->string('objective_title_six')->nullable();
            $table->text('objective_description_six')->nullable();
            $table->string('objective_title_seven')->nullable();
            $table->text('objective_description_seven')->nullable();
            $table->string('objective_title_eight')->nullable();
            $table->text('objective_description_eight')->nullable();
            $table->string('objective_title_nine')->nullable();
            $table->text('objective_description_nine')->nullable();
            $table->string('objective_title_ten')->nullable();
            $table->text('objective_description_ten')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
